@include('header')
@include('trainer.navigation') 
@include('trainer.submenu')

<style>
.table_tr_css
{
    text-align: center; 
    justify-content: center; 
    align-items: center; 
    line-height: 4; 
    font-weight: bolder;
}
@media screen and (max-width:767px) {
    #modulerecord_list_table_jss td, #modulerecord_list_table_jss th {
        font-size: 12px;
    }
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-sm-10 col-12">
            <div class="mt-5 d-flex">
                <input type="text" name="search_module" class="form-control search_module_jss mr-2" placeholder="Search Module Name,Mentor Name" />
                <button class="btn btn-success search_module_btn_jss"><span class="fa fa-search"></span></button>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-12">
            <div class="mt-5 d-flex" style="justify-content: flex-end;">
                <button type="button" class="btn btn-info export_data">Export</button>
            </div>
        </div>
        <!-- table content start -->
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="mt-3 mb-3 table-bordered table-hover w-100" id="modulerecord_list_table_jss" style="min-width: 710px;">
                    <thead>
                        <tr>
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Id</th>
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Module Name</th>
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Mentor Name</th>
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Date Created</th>
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant</th>
                            <th class="tableborder normalfont1 pinkbackground center p1 bold">Module Status</th>
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
                <button type="button" class="btn btn-primary load_more_module_btn_jss" data-startindex="0">Load More</button>
            </div>
        </div>
    </div>
</div>

@include('footer')
<script>
function csvmaker(data) {  
    csvRows = []; 

    const headers = ["Id", "Name", "Mentor Name", "Date Created", "Aspirant", "Status"]; 

    csvRows.push(headers.join(',')); 

    for (const row of data) {
        const values = [row?.module_Id, row?.moduleTitle, row?.first_name+" "+row?.second_name, row?.created_at, row?.totalAspirant, row?.Status];

        csvRows.push(values.join(',')) 
    }

    downloadCsv(csvRows.join('\n'));
}

const downloadCsv = function (data) { 

    const blob = new Blob([data], { type: 'text/csv' }); 

    const url = window.URL.createObjectURL(blob) 

    const a = document.createElement('a') 

    a.setAttribute('href', url) 

    a.setAttribute('download', 'modules.csv'); 

    a.click();
}
function get_module_list(start_index = 0, export_file = 0)
{
    var search_by = $(".search_module_jss").val();
    var limit_length = 10;
    jQuery(".loder").show();
    $.ajax({
        url: "{{route('listModuleData')}}",
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
                $('.load_more_module_btn_jss').attr("data-startindex",(parseInt(start_index) + parseInt(limit_length)));
                if(response.html == "")
                {
                    $('.load_more_module_btn_jss').prop("disabled",true);
                }
                else
                {
                    $('.load_more_module_btn_jss').prop("disabled",false);
                }
                if(start_index == 0)
                {
                    $("#modulerecord_list_table_jss tbody").html(response.html);
                }
                else
                {
                    $("#modulerecord_list_table_jss tbody").append(response.html);
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
$(document).ready(function(){
    get_module_list();
    $(document).on('click', '.load_more_module_btn_jss', function(e) {
        var start_index = $('.load_more_module_btn_jss').attr("data-startindex");
        get_module_list(start_index);
    });

    $(document).on('click', '.search_module_btn_jss', function(e) {
        get_module_list();
    });

    $(document).on('click', '.export_data', function(e) {
        get_module_list(0, 1);
    });

    $(document).on('click', '.delete_module_btn_jss', function(e) {
        e.preventDefault();
        if(confirm("Are you sure to delete this module permanent ?"))
        {
            var module_id = $(this).closest("tr.table_tr_jss").attr("data_id");
            jQuery(".loder").show();
            $this = $(this);
            $.ajax({
                url: "{{route('delete_module')}}",
                type: "POST",
                dataType: "json",
                data: {
                    _token: "{{ csrf_token() }}",
                    module_id: module_id,
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

});
</script>