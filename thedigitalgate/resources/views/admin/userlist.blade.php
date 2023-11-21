@include('header')
@if(session()->get('Aspirant_ID') != "")
    @include('aspirant.navigation') 
    @include('aspirant.submenu')

    @php
        $isMentor = 0;
        $isAspirant = 1;
    @endphp
@else
    @include('trainer.navigation') 
    @include('trainer.submenu')

    @php
        $isMentor = 1;
        $isAspirant = 0;
    @endphp
@endif
<style>
.table_tr_css {
    text-align: center; 
    justify-content: center; 
    align-items: center; 
    line-height: 4; 
    font-weight: bolder;
}
.block_user_css {
    width: 25px;
    height: 25px;
    cursor: pointer;
}
.is_approved_css {
    width: 25px;
    height: 25px;
    cursor: pointer;
}
@media screen and (max-width:767px) {
    #userrecord_list_table_jss td, #userrecord_list_table_jss th {
        font-size: 12px;
    }
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-sm-10 col-12">
            <form action="#" method="post" id="search_user_btn_jss">
                <div class="mt-5 d-flex">
                    <input type="text" name="search_user" class="form-control search_user_jss mr-2" placeholder="Search..." />
                    <button type="submit" class="btn btn-success"><span class="fa fa-search"></span></button>
                </div>
            </form>
        </div>
        <div class="col-md-2 col-sm-2 col-12">
            <div class="mt-5 d-flex" style="justify-content: flex-end;">
                <button type="button" class="btn btn-info export_users">Export</button>
            </div>
        </div>

        <!-- table content start -->
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="mt-3 mb-3 table-bordered table-hover w-100" id="userrecord_list_table_jss" style="min-width: 710px;">
                    <thead>
                        <tr>
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Name</th>
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Email</th>
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Phone</th>
                            @if($isMentor)
                                <th class="tableborder normalfont1 pinkbackground center p1 bold">Modules</th>
                            @endif
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Block</th>
                            @if($isMentor)
                                <th class="tableborder normalfont1 pinkbackground center p1 bold">Approve</th>
                            @endif
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- table content end -->
        <div class="col-md-12 text-center">
            <div class="mb-3">
                <button type="button" class="btn btn-primary load_more_user_btn_jss" data-startindex="0">Load More</button>
            </div>
        </div>
    </div>
</div>

@include('footer')
<script>
    function csvmaker(data) {  
        csvRows = []; 

        const headers = ["Name", "Email", "Phone", "Modules", "Block"]; 

        csvRows.push(headers.join(',')); 

        for (const row of data) {
            const values = [row?.first_name+ " " + row?.second_name, row?.email_id, row?.mobile, row?.totalModule, row?.is_block];

            csvRows.push(values.join(',')) 
        }
 
        downloadCsv(csvRows.join('\n'));
    }
    
    const downloadCsv = function (data) { 
    
        const blob = new Blob([data], { type: 'text/csv' }); 

        const url = window.URL.createObjectURL(blob) 

        const a = document.createElement('a') 

        a.setAttribute('href', url) 

        a.setAttribute('download', 'users.csv'); 

        a.click();
    } 
    $(document).ready(function(){
        
        get_user_list();
        $(document).on('click', '.load_more_user_btn_jss', function(e) {
            var start_index = $('.load_more_user_btn_jss').attr("data-startindex");
            get_user_list(start_index);
        });
        $(document).on('click', '.export_users', function(e) {
            get_user_list(0, 1);
        });

        $(document).on('submit', '#search_user_btn_jss', function(e) {
            e.preventDefault();

            get_user_list();
        });

        $(document).on('click', '.delete_user_btn_jss', function(e) {
            e.preventDefault();
           if(confirm("Are you sure to delete this user permanent ?"))
           {
                var user_id = $(this).closest("tr.table_tr_jss").attr("data_id");
                jQuery(".loder").show();
                $this = $(this);
                $.ajax({
                    url: "{{route('delete_user')}}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: user_id,
                    },
                    success: function(response)
                    {
                        jQuery(".loder").hide();
                        alert_msg(response.status, response.msg);
                        $this.closest("tr.table_tr_jss").remove();
                    },
                    error: function(err)
                    {
                        err = err.responseJSON ? err.responseJSON : {};
                        alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
                        jQuery(".loder").hide();
                    }
                });
           }
        });

        $(document).on('change', '.block_user_jss', function(e) {
            e.preventDefault();
            {
                var user_id = $(this).closest("tr.table_tr_jss").attr("data_id");
                $this = $(this);
                if($this.prop("checked"))
                {
                    var is_block = 1;
                }
                else
                {
                    var is_block = 0;
                }
                jQuery(".loder").show();
                $.ajax({
                    url: "{{route('block_user')}}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: user_id,
                        is_block: is_block,
                    },
                    success: function(response)
                    {
                        jQuery(".loder").hide();
                        alert_msg(response.status, response.msg);
                    },
                    error: function(err)
                    {
                        err = err.responseJSON ? err.responseJSON : {};
                        alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
                        jQuery(".loder").hide();
                    }
                });
           }
        });

        $(document).on('change', '.is_approved_jss', function(e) {
            e.preventDefault();
            {
                var user_id = $(this).closest("tr.table_tr_jss").attr("data_id");
                $this = $(this);
                if($this.prop("checked"))
                {
                    var is_approved = 1;
                }
                else
                {
                    var is_approved = 0;
                }
                jQuery(".loder").show();
                $.ajax({
                    url: "{{route('approve_user')}}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: user_id,
                        is_approved: is_approved,
                    },
                    success: function(response)
                    {
                        jQuery(".loder").hide();
                        alert_msg(response.status, response.msg);
                    },
                    error: function(err)
                    {
                        err = err.responseJSON ? err.responseJSON : {};
                        alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
                        jQuery(".loder").hide();
                    }
                });
           }
        });
    });
   
    function get_user_list(start_index = 0, export_file=0)
    {
        var search_by = $(".search_user_jss").val();
        var limit_length = 10;
        jQuery(".loder").show();
        $.ajax({
            url: "{{route('listUserData')}}",
            type: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",
                search_by: search_by,
                start_index: start_index,
                limit_length: limit_length,
                export_file: export_file,
            },
            success: function(response)
            {
                jQuery(".loder").hide();

                if(export_file == 1)
                {
                    if(response?.listData)
                    {
                        csvmaker(response.listData)
                    }
                }
                else
                {
                    $('.load_more_user_btn_jss').attr("data-startindex",(parseInt(start_index) + parseInt(limit_length)));
                    if(response.html == "")
                    {
                        $('.load_more_user_btn_jss').prop("disabled",true);
                    }
                    else
                    {
                        $('.load_more_user_btn_jss').prop("disabled",false);
                    }
                    if(start_index == 0)
                    {
                        $("#userrecord_list_table_jss tbody").html(response.html);
                    }
                    else
                    {
                        $("#userrecord_list_table_jss tbody").append(response.html);
                    }
                }
            },
            error: function(err)
            {
                err = err.responseJSON ? err.responseJSON : {};
                alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
                jQuery(".loder").hide();
            }
        });
    }
</script>