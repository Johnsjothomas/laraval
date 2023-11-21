@include('header')
@include('trainer.navigation')
@include('trainer.submenu')

<style>
    .aspirant_about_text_overflow_css{
        height: 71px;
        text-overflow: ellipsis;
       -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 30px;
        display: -webkit-box;
    }
    .hover_cards {
        border-radius: 20px;
        cursor: pointer;
    }

    .hover_cards:hover {
        border: 1px solid antiquewhite;
        /* box-shadow: 10px 10px 5px #e6ecee; */
        box-shadow: 0 0 80px -10px grey;
        left: -5px;
        top: -5px;
    }

    .ApplicantsTabs .bold {
        border-color: #bfbfe9;
        margin: 0;
        padding: 10px 50px;
        border-radius: 5px;
        font-weight: 500;
        text-align: center;
        font-size: 14px;
    }
    .aspirant-card
    {
        height:370px;
    }
    .filter_bar_css
    {
        display: flex;
        cursor: pointer;
    }
    .filter_bar_css li
    {
        padding: 5px;
        border-radius: 4px;
        background: #e34c1afa;
        color: #fff;
        list-style: none;
        width: auto;
        margin: 2px 10px;
    }
    .filter_bar_css li span.text_filter_name_css
    {
        padding: 5px;
        border-radius: 4px;
        background: #e34c1afa;
        color: #fff;
        list-style: none;
        width: auto;
        margin: 2px 10px;
    }
</style>

<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
            <img class="img-fluid " style="width: 100%" src="/talent/assets/img/myprofile.png">
        </div>
    </div>
    @include('profile_head')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('failed'))
        <div class="alert alert-danger">
            {{ session('failed') }}
        </div>
    @endif


    <div class="row ApplicantsTabs">
            <div class="p-2">
                <button id="searchAspiBtn" class="bold">Search Aspirant</button>
            </div>
            <div class="p-2">
                <button class="bold" id="moduleCreationBtn">Applicant List</button>
            </div>
            <div class="p-2">
                <button class="bold" id="TrainingBtn">Training Summary</button>
            </div>





        <!-- <div class="col-12 mb_15 ApplicantsTabs">
   <span id="searchAspiBtn" class="bold" style="padding:8px; border-radius: 5px; cursor:pointer;"> Search Aspirants</span>
   <span class="bold" style="padding:8px; border-radius: 5px; cursor:pointer;">Applicant List</span>
   <span class="bold" style="padding:8px; border-radius: 5px; cursor:pointer;"> Training Schedule</span>
  </div> -->
    </div>
    {{-- <div class="row">
        <div class="col-12 pt-4">
            <div class="form-group">
                <h5 id="titleH5"></h5>
                <select class="form-control moduleslist_js" name="modulesTitles"
                    onchange="getModule(this)" style="display:none">
                    <option value="">Select Module</option>
                    @if ($eModule)
                        @foreach ($eModule as $mo)
                        <option value="{{ $mo->module_Id }}" {{@$activeModule == $mo->module_Id ? "selected" : ""}}>{{ $mo->moduleTitle }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div> --}}

    <div id="div1" class="search_aspirant_js">
        <!-------------------------->
        <div class="row">
            @foreach ($Modules as $key => $mo)
                @if ($key < 3)
                <?php 

                $companyNamehtml = '';
                if($mo->name_of_customer != "")
                {
                    $companyNamehtml .= " For ".$mo->name_of_customer;
                }
                $jobTypehtml = '';
                if($mo->jobtype_of_customer_contact != "")
                { 
                    if($mo->jobtype_of_customer_contact == "fulltime")
                    {
                        $jobTypehtml .= 'Full Time ';
                    }
                    else if($mo->jobtype_of_customer_contact == "internship")
                    {
                        $jobTypehtml .= 'Internship ';
                    }
                }
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card remove_br">

                            <div class="card-header p-0 ">
                                <img src="/talent/trainer/assets/img/myprofile.png" width="100%"
                                    style="height: 150px;">
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-10">
                                            <h4 class="card-title">{{ $mo->moduleTitle }} {{$companyNamehtml}}</h4>
                                        </div>
                                        {{-- <div class="col-2">
                                    <i class="pt-1 fa fa-bookmark right" aria-hidden="true"></i>
                                </div> --}}
                                    </div>
                                    {{ $mo->moduleDescription }}
                                </div>
                            </div>
                            <div class="card-body">
                                <h6>First Session on</h6>
                                <div class="row">
                                    <div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i> Starts On - {{ $mo->startDateTime }}
                                    </div>
                                    <div class="col-md-6"><i class="fa fa-tasks" aria-hidden="true"></i> Job Type - {{$jobTypehtml}}
                                    </div>
                                    <div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> Max Seats -
                                    {{$mo->maxParticipantPerModule - $mo->leftParticipantPerModule}}/{{ $mo->maxParticipantPerModule }}</div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6">{{ $mo->startDateTime }}</div>
                                </div> -->
                                <br />
                                <h6>Module Duration</h6>
                                <div class="row">
                                    <div class="col-md-6">Start Date</div>
                                    <div class="col-md-6">End Date</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">{{ $mo->startDateTime }}</div>
                                    <div class="col-md-6">{{ $mo->endDateTime }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-------------------------->
    </div>

    <div id="dataByID" class="application_list_js" style="display:none">
        <!-- //need tohide show here to make this -->
        <div class="row">
            <div class="col-12 pt-4">
                <div class="form-group">
                    <h5 id="titleH5"></h5>
                    <select class="form-control moduleslist_js" name="modulesTitles"
                        onchange="getModule(this, 'moduleCreationBtn')" style="display:none">
                        <option value="">Select Module</option>
                        @if (@$eModule)
                            @foreach ($eModule as $mo)
                            <option value="{{ $mo->module_Id }}" {{@$activeModule == $mo->module_Id ? "selected" : ""}}>{{ $mo->moduleTitle }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        @if ($applicantList->count())
            <div class="table-responsive">
                <table class="a table table-bordered">
                    <tr>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant Name</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant Type</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Module Title</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Gender</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Resume</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Send Message Aspirant</th>
                    </tr>
                    @foreach ($applicantList as $rowData)
                        <tr
                            style="text-align: center; justify-content: center; align-items: center; line-height: 2; font-weight: bolder;">
                            <td>{{ $rowData->first_name }} {{ $rowData->second_name }}</td>
                            <td>{{ $rowData->aspirant_type }}</td>
                            <td>{{ $rowData->moduleTitle }}</td>
                            <td>{{ $rowData->gender }}</td>
                            <td><button class="btn bluebtn aspirant_modal_jss" data-id="{{$rowData->aspirant_id}}" >View Resume</button></td>
                            <td><button class="btn whitebtn join_now_send_to_aspirant_js" data-id="{{$rowData->aspirant_id}}" data_module_id="{{$rowData->module_Id}}">Join Now</button></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div class="alert alert-warning" style="margin-left: 16px;">No Aspirant Found....</div>
        @endif
    </div>

    <div id="" class="training_list_js" style="display:none">
        <!-- //need tohide show here to make this -->
        <div class="row">
            <div class="col-12 pt-4">
                <div class="form-group">
                    <h5 id="titleH5"></h5>
                    <select class="form-control moduleslist_js" name="modulesTitles"
                        onchange="getModule(this, 'TrainingBtn')" style="display:none">
                        <option value="">Select Module</option>
                        @if (@$aspiSubscribedOption)
                            @foreach ($aspiSubscribedOption as $mo)
                                <option value="{{ $mo->module_Id }}" {{@$activeModule == $mo->module_Id ? "selected" : ""}}>{{ $mo->moduleTitle }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        @if ($aspiSubscribed->count())
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant Name</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant Type</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">ModuleID</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Module Title</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Completion Date</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Gender</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Status of Issue Certificate</th>
                        <th class="tableborder normalfont1 pinkbackground center p1 bold">Certificate</th>
                    </tr>
                    @foreach ($aspiSubscribed as $aspisSubsc)
                   
                        <tr
                            style="text-align: center; justify-content: center; align-items:    center; line-height: 2; font-weight: bolder;">
                            <td>{{ $aspisSubsc->first_name }} {{ $aspisSubsc->second_name }}</td>
                            <td>{{ $aspisSubsc->aspirant_type }}</td>
                            <td>{{ $aspisSubsc->module_Id }}</td>
                            <td>{{ $aspisSubsc->moduleTitle }}</td>
                            <td>{{ (@$aspisSubsc->endDateTime ? date("d/m/Y",strtotime($aspisSubsc->endDateTime)) : "") }}</td>
                            <td>{{ $aspisSubsc->gender }}</td>
                            <td class="issue_certificate_td_js">{{ (@$aspisSubsc->issue_certificate_date ? date("d/m/Y H:i",strtotime($aspisSubsc->issue_certificate_date)) : "") }}</td>
                            <td><button class="btn bluebtn cetificate_view_btn_jss" aspirant_id="{{$aspisSubsc->aspirant_id}}" data_module_id="{{$aspisSubsc->module_Id}}">Cerificate</button></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div class="alert alert-warning" style="margin-left: 16px;">No Aspirant Found....</div>
        @endif
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="mt-4">
                <ul class="filter_bar_css filter_bar_jss"></ul>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="mt-4">
            <div class="card-body" Id="aspirantsCard">
                <!-- CREATE MODULE -->
                <div class="row aspirants_card_row" data-start="0">
                    {{-- @if ($aspiMasterData->count())
                        @foreach ($aspiMasterData as $aspis)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="aspirant-card hover_cards">

                                    <div class="" style="display: inline-flex;">
                                        <div style="height: 50px; width: 50px;" class="aprofile">
                                            <img id="profilePic" class="pic"
                                                src="https://source.unsplash.com/random/150x150">
                                        </div>
                                        <div style="padding-left: 30px" class="normalfont1 bold">
                                            <br>
                                            <span class="normalfont4">{{ $aspis->first_name }}</span>
                                        </div>
                                        <div style="padding-left: 30px" class="normalfont1 bold">
                                            <br>
                                            <span class="normalfont4">{{ @$aspis->job_title_designation }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="normalfont3 aspirant_about_text_overflow_css">
                                        {{ $aspis->about_you }}
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button class="btn bluebtn aspirant_modal_jss" data-id="{{$aspis->aspirant_id}}">View Resume</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button class="btn whitebtn aspiranttrainingcode_modal_btn" aspirant_id="{{$aspis->aspirant_id}}">Send Training Details</button>
                                        </div>
                                    </div>
                                </div><br><br>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-warning" style="margin-left: 16px;">No Aspirant Found....</div>
                    @endif --}}
                </div>
                <div class="p-5 justify-content-center align-center showmoreBtnblock_js" style="text-align:center;">
                    <div class="showmoreBtn_js bluebtn p-1 pl-3 pr-3" style="width:auto; display:inline-block; padding:10px 20px;cursor:pointer;line-height:2;">See more...</div>
                </div> 
            </div>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="aspiranttrainingcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body mb-4">
                <h5 class="mb-4">Training code Dropdown</h5>
                <div class="col-12  pt-4">

                    <input name="aspirant_id" type="hidden" id="aspirant_id">
                    <select name="training_module" id="training_module" class="module_list_js" aspirant_id="0">
                        <option value="">Select Module</option>
                        @if (@$Modules)
                            @foreach ($Modules as $key => $mo)
                                <option value="{{ $mo->module_Id }}">{{ $mo->moduleTitle }}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
                <br />
                <button type="button" class="btn bluebtn send_mod_detail_this">Send</button>

            </div>

        </div>
    </div>
</div>
<style>
    .pd24 {
        padding-left: 1%;
        padding-right: 10%;
    }
</style>
<!-- Modal -->
<div class="modal bd-example-modal-lg" id="aspirantModal" tabindex="-1" role="dialog" aria-labelledby="aspirantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document" style="max-width: 1180px;width: 100%;padding: 0 20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aspirantModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
 <!------------------------------end Modal---------------------------------->

 <!-- Modal -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="certificateModalLabel">Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <embed src="" type="application/pdf" height="800px" width="100%" class="responsive">
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal End-->

<script>
    $("#training_module").select2({
        allowClear: false
    });
    function getAspirantBox(start=0, limit=6)
    {
        jQuery(".loder").show();
        var location_search = $(".search_aspirant_by_navbar_jss[data-type='location']").val();
        var aspirantname_search = $(".search_aspirant_by_navbar_jss[data-type='aspirant_name']").val();
        $.ajax({
            url: "{{route('getAspirantBox')}}",
            method:'POST',
            data: {
                _token: "{{ csrf_token() }}",  
                skip : start,
                limit : limit,
                aspirantname_search : aspirantname_search,
                location_search : location_search,
            },
            success: function(response) {
                $(".aspirants_card_row").attr("data-start", response.next_start_length);
                if(start == 0)
                {
                    $(".aspirants_card_row").html(response.html);

                }
                else
                {
                    $(".aspirants_card_row").append(response.html);
                }
                if(response.html == "")
                {
                    $(".showmoreBtnblock_js").hide();
                }
                else
                {
                    $(".showmoreBtnblock_js").show();
                }
                $(".filter_bar_jss").html(response.return_filter_bar);
                jQuery(".loder").hide();
            }
        });
    }
    function getModule($this, data_local="") {
        const modulename = $($this).val();
        if(modulename)
        {
            if(data_local)
            {
                localStorage.setItem("activeDataLocal", data_local);
            }
            window.location.replace("/trainer/aspirant/aspirantlist/" + modulename); 
        }
        else
        {
            window.location.replace("/trainer/aspirant/searchaspirant"); 
        }
    }

    $('#aspirantsCard').show();
    //$('#titleH5').html("Select All Training");
    $(document).ready(function() {
        getAspirantBox();
        
        $("body").on("keypress", ".search_aspirant_by_navbar_jss", function(e){
            if (e.which === 13) 
            {
                getAspirantBox();
            }
        });

        $("body").on("click", ".remove_this_filter_jss", function(e){
           var filter_type = $(this).closest("li").attr("data-type");
           $(this).closest("li").remove();
           $(".search_aspirant_by_navbar_jss[data-type='"+filter_type+"']").val("");
           getAspirantBox();
        });

        $('#ModuleCards').show();
        $('#searchAspiBtn').addClass('bluebtn');
        
        $("body").on('click', '.showmoreBtnblock_js .showmoreBtn_js', function() {
			var skip = $(".aspirants_card_row").attr("data-start");
			getAspirantBox(skip);
		});

        $(".ApplicantsTabs button").on("click", function() {
            $(".ApplicantsTabs button").removeClass("bluebtn");
            $(this).addClass("bluebtn");
        });

        $("#TrainingBtn").click(function() {
            $(".application_list_js").hide();
            $(".moduleslist_js").show();
            $(".training_list_js").show();
            $('#aspirantsCard').hide();
            $(".search_aspirant_js").hide();
            $('#titleH5').html("Select Completed Training");
        });

        $("#searchAspiBtn").click(function() {
            $('#aspirantsCard').show();
            $(".moduleslist_js").hide();
            $(".search_aspirant_js").show();
            $(".application_list_js").hide();
            $(".training_list_js").hide();
            //$('#titleH5').html("Select All Training");
            $('#titleH5').html("");
        });

        $("#moduleCreationBtn").click(function() {
            $(".training_list_js").hide();
            $(".moduleslist_js").show();
            $(".application_list_js").show();
            $('#aspirantsCard').hide();
            $(".search_aspirant_js").hide();
            $('#titleH5').html("Select Active Training");
        });
        <?php 
        if(@$activeModule)
        {
            ?>
            $("#moduleCreationBtn").trigger("click");
            <?php 
        }
        ?>

        $("body").on("click", ".aspirant_modal_jss", function(e){
            jQuery(".loder").show();
            var aspirant_id = $(this).attr("data-id");
            $.ajax({
            url: "{{ route('getAspirantProfileBymodal') }}",
            method:'POST',
            data: {"_token": "{{ csrf_token() }}",  "aspirant_id" : aspirant_id}
            }).done(function(data){
                $("#aspirantModal").modal();
                $("#aspirantModal .modal-title").text(data.modaltitle);  
                $("#aspirantModal .modal-body").html(data.modalbody)

                jQuery(".loder").hide();
            });
        });
        $("body").on("click", ".join_now_send_to_aspirant_js", function(e){
            
            jQuery(".loder").show();
            var aspirant_id = $(this).attr("data-id");
            var data_module_id = $(this).attr("data_module_id");
            $.ajax({
                url: "{{route('join_now_send_to_aspirant')}}",
                type: "POST",
                dataType: "json",
                data: {
                    _token: "{{ csrf_token() }}",
                    aspirant_id: aspirant_id,
                    data_module_id: data_module_id
                },
                success: function(response)
                {
                    jQuery(".loder").hide();
                    if(response.status)
                    {
                        alert_msg(1, response.msg);
                    }
                    else
                    {
                        alert_msg(0, response.msg);
                    }
                },
                error: function(err)
                {
                    err = err.responseJSON ? err.responseJSON : {};
                    alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
                    jQuery(".loder").hide();
                }
            });
        });

        $("body").on("click", ".cetificate_view_btn_jss", function(e){
            // jQuery(".loder").show();
            //     $("#certificateModal").modal();
            // jQuery(".loder").hide();
            jQuery(".loder").show();

            var aspirant_id = $(this).attr("aspirant_id");
            var data_module_id = $(this).attr("data_module_id");
            $this = $(this);
            $.ajax({
                url: "{{route('generateCertificate')}}",
                type: "POST",
                dataType: "json",
                data: {
                    _token: "{{ csrf_token() }}",
                    aspirant_id: aspirant_id,
                    data_module_id: data_module_id
                },
                success: function(response)
                {
                    jQuery(".loder").hide();
                    if(response.status)
                    {
                        $("#certificateModal").modal();
                        $("#certificateModal embed").attr("src", '{{url("/")}}'+"/certificates/certificate.php?id="+response.id);
                        $this.closest("tr").find(".issue_certificate_td_js").text(response.date_time_now)
                        // window.open('{{url("/")}}'+"/certificates/certificate.php?id="+response.id);
                    }
                    else
                    {
                        alert_msg(0, response.msg);
                    }
                },
                error: function(err)
                {
                    err = err.responseJSON ? err.responseJSON : {};
                    alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
                    jQuery(".loder").hide();
                }
            });
  		});
        $("body").on("click", ".send_mod_detail_this", function(e){
            var data_module_id = $(".module_list_js").val();
            var aspirant_id = $(".module_list_js").attr("aspirant_id");
            if(!data_module_id || !aspirant_id)
            {
                alert_msg(0, ('Please select a module.'));
                return false;
            }

            jQuery(".loder").show();
            $.ajax({
                url: "{{route('join_now_send_to_aspirant')}}",
                type: "POST",
                dataType: "json",
                data: {
                    _token: "{{ csrf_token() }}",
                    aspirant_id: aspirant_id,
                    data_module_id: data_module_id
                },
                success: function(response)
                {
                    jQuery(".loder").hide();
                    if(response.status)
                    {
                        $("#aspiranttrainingcode .module_list_js").attr("aspirant_id", "0");
                        $("#aspiranttrainingcode").modal("hide");

                        alert_msg(1, response.msg);
                    }
                    else
                    {
                        alert_msg(0, response.msg);
                    }
                },
                error: function(err)
                {
                    err = err.responseJSON ? err.responseJSON : {};
                    alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
                    jQuery(".loder").hide();
                }
            });
        });
        $("body").on("click", ".aspiranttrainingcode_modal_btn", function(e){

            $("#aspiranttrainingcode").modal("show");
            $("#aspiranttrainingcode .module_list_js").attr("aspirant_id", $(this).attr("aspirant_id"));
        });
        setTimeout(() => {
            const activeDataLocal = localStorage.getItem("activeDataLocal");
            if(activeDataLocal)
            {
                $("#"+activeDataLocal).trigger("click");
                localStorage.removeItem("activeDataLocal");
            }
        }, 1000);
    });
</script>

@include('footer')