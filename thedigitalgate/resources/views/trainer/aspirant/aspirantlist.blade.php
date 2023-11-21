@include('header')
@include('trainer.navigation')
@include('trainer.submenu')

<style>
    .hoverCards {
        border-radius: 20px;
        cursor: pointer;
    }

    .hoverCards:hover {
        border: 1px solid antiquewhite;
        /* box-shadow: 10px 10px 5px #e6ecee; */
        box-shadow: 0 0 80px -10px grey;
        left: -5px;
        top: -5px;
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


    <div class="row">
        <div class="row ApplicantsTabs">
            <div class=" p-2">
                <button id="searchAspiBtn" class="bold" style="border-color: #bfbfe9;margin: 0;padding: 10px 50px;border-radius: 5px;font-weight: 500;text-align: center;">Search Aspirants</button>
            </div>
            <div class=" p-2">
                <button class="bold" style="border-color: #bfbfe9;margin: 0;padding: 10px 50px;border-radius: 5px;font-weight: 500;text-align: center;" id="moduleCreationBtn">Applicant List</button>
            </div>
            <div class=" p-2">
                <button class="bold" style="border-color: #bfbfe9;margin: 0;padding: 10px 50px;border-radius: 5px;font-weight: 500;text-align: center;" id="TrainingBtn">Training Summary</button>
            </div>
        </div>





        <!-- <div class="col-12 mb_15 ApplicantsTabs">
			<span id="searchAspiBtn" class="bold" style="padding:8px; border-radius: 5px; cursor:pointer;"> Search Aspirants</span>
			<span class="bold" style="padding:8px; border-radius: 5px; cursor:pointer;">Applicant List</span>
			<span class="bold" style="padding:8px; border-radius: 5px; cursor:pointer;"> Training Schedule</span>
		</div> -->
    </div>
    <?php
    $selected_option = $_GET['selected_option'] ?? '';

?>
    <div class="row">
        <div class="col-12  pt-4">
            <!-- <input type="text" class="form-control col-3" placeholder="Enter Keyword/Skill" style="display:inline-block; margin-right:20px;"> <i class="fa fa-caret-down" aria-hidden="true"></i> -->
            <div class="form-group col-md-3" id="currencyDiv">
                <h5 id="titleH5"></h5>
                <select class="form-control" name="modulesTitles" id="ModulesDropdown" onchange="getModule()">
                    <option value="">Select Module</option>
                    @foreach($Modules as $mo)
                    <option value="{{$mo->module_Id}}" {{$activeModule == $mo->module_Id ? "selected" : ""}}>{{$mo->moduleTitle}}</option>
                    <!-- <option value="{{ url('/GetDataByID', $mo->module_Id) }}">{{$mo->moduleTitle}}</option> -->
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div id="div1"></div>

    <!------------------------------------- Module Cards ----------------------------------------------->
    <div id="ModuleCards">
        <h2 id="UpcomingHeadings">
            Module Name - {{$eModule[0]->moduleTitle}}</h2><br>
        <div class="col-md-4">
            <div class="card remove_br">

                <div class="card-header p-0 ">
                    <img src="/talent/trainer/assets/img/myprofile.png" width="100%" style="height: 150px;">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="card-title">{{$eModule[0]->moduleTitle}}</h4>
                            </div>
                            {{--<div class="col-2">
                                <i class="pt-1 fa fa-bookmark right" aria-hidden="true"></i>
                            </div>--}}
                        </div>
                        {{$eModule[0]->moduleDescription}}
                    </div>
                </div>
                <div class="card-body">
                    <h6>First Session on</h6>
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i> Starts On</div>
                        <div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> Max Seats - {{$eModule[0]->maxParticipantPerModule}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{$eModule[0]->startDateTime}}</div>
                    </div>
                    <br />
                    <h6>Module Duration</h6>
                    <div class="row">
                        <div class="col-md-6">Start Date</div>
                        <div class="col-md-6">End Date</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{$eModule[0]->startDateTime}}</div>
                        <div class="col-md-6">{{$eModule[0]->endDateTime}}</div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <!-- Applicants List by Module Subscription -->
    <div class="row" ID="SubscriberAspirants">
            @if ($aspiSubscribed->count())
            @foreach($aspiSubscribed as $aspisSubsc)
                {{--<div class="col-md-4">
                    <div class="mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="">
                                    <div class="aspirant-card hoverCards">
                                        <div class="" style="display: inline-flex;">
                                            <div style="height: 50px; width: 50px;" class="aprofile">
                                                <img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150">
                                            </div>

                                            <div style="padding-left: 30px" class="normalfont1 bold">
                                                <br>
                                                <span class="normalfont4">{{$aspisSubsc->first_name}} {{$aspisSubsc->second_name}}</span>
                                            </div>
                                            <div style="padding-left: 30px" class="normalfont1 bold">
                                                <br>
                                                <!-- <span class="normalfont4">{{$aspiSubscribed}}</span> -->
                                            </div>
                                            <div style="padding-left: 30px" class="normalfont1 bold">
                                                <br>
                                                <span class="normalfont4">{{$aspisSubsc->job_title_designation}}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="normalfont3" style="height: 100px;">
                                            {{$aspisSubsc->about_you}}
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button class="btn bluebtn">Download Resume</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button onclick="" class="btn whitebtn" data-toggle="modal" data-target="#aspiranttrainingcode">Enter Training to contact Aspirant</button>
                                            </div>
                                        </div>
                                    </div><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}
            @endforeach
            <table class="a" style="width: 100%">
                <tr>
                <th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant Name</th>
                <th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant Type</th> 
                <th class="tableborder normalfont1 pinkbackground center p1 bold">Module Title</th>
                <th class="tableborder normalfont1 pinkbackground center p1 bold">Gender</th>
                <th class="tableborder normalfont1 pinkbackground center p1 bold">Resume</th>
                <th class="tableborder normalfont1 pinkbackground center p1 bold">Enter Training</th>
                </tr>
                @foreach($aspiSubscribed as $aspisSubsc)
                <tr style="text-align: center; justify-content: center; align-items: center; line-height: 4; font-weight: bolder;">
                    <td>{{$aspisSubsc->first_name}} {{$aspisSubsc->second_name}}</td>
                    <td>{{$aspisSubsc->aspirant_type}}</td>
                    <td>{{$aspisSubsc->moduleTitle}}</td>
                    <td>{{$aspisSubsc->gender}}</td>
                    <td><button class="btn bluebtn">Download Resume</button></td>
                    <td><button onclick="" class="btn whitebtn" data-toggle="modal" data-target="#aspiranttrainingcode">Enter Training to contact Aspirant</button></td>   
                </tr>
                @endforeach
            </table>
            
            @else
            <div class="alert alert-warning" style="margin-left: 16px;">No Aspirant Found....</div>
            @endif
        </div>
        <!-- Applicants List by Module Subscription ends here-->

        <div class="row" ID="aspirantsCard">
            @if ($aspiMasterData->count())
            @foreach($aspiMasterData as $aspis)
            <div class="col-md-4">
                <div class="mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <div class="aspirant-card hoverCards">
                                    <div class="" style="display: inline-flex;">
                                        <div style="height: 50px; width: 50px;" class="aprofile">
                                            <img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150">
                                        </div>
                                        <div style="padding-left: 30px" class="normalfont1 bold">
                                            <br>
                                            <span class="normalfont4">{{$aspis->first_name}} {{$aspis->second_name}}</span>
                                        </div>
                                        <div style="padding-left: 30px" class="normalfont1 bold">
                                            <br>
                                            <span class="normalfont4">{{$aspis->job_title_designation}}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="normalfont3" style="height: 100px;">
                                        {{$aspis->about_you}}
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button class="btn bluebtn">Download Resume</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button onclick="" class="btn whitebtn" data-toggle="modal" data-target="#aspiranttrainingcode">Enter Training to contact Aspirant</button>
                                        </div>
                                    </div>
                                </div><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="alert alert-warning" style="margin-left: 16px;">No Aspirant Found....</div>
            @endif
        </div>
    
    <div id="dataByID"></div>

    <div id="" class="row trainning_summry_js" style="display:none">
        @if ($aspiSubscribed->count())
		<table class="a" style="width: 100%">
			<tr>
			<th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant Name</th>
			<th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant Type</th> 
			<th class="tableborder normalfont1 pinkbackground center p1 bold">Module Title</th>
			<th class="tableborder normalfont1 pinkbackground center p1 bold">Gender</th>
			<th class="tableborder normalfont1 pinkbackground center p1 bold">Certificate</th>
			</tr>
			@foreach($aspiSubscribed as $aspisSubsc)
			<tr style="text-align: center; justify-content: center; align-items: center; line-height: 4; font-weight: bolder;">
				<td>{{$aspisSubsc->first_name}} {{$aspisSubsc->second_name}}</td>
				<td>{{$aspisSubsc->aspirant_type}}</td>
				<td>{{$aspisSubsc->moduleTitle}}</td>
				<td>{{$aspisSubsc->gender}}</td>
				<td><button class="btn bluebtn">Cerificate</button></td>
			</tr>
			@endforeach
		</table>
		@else
			<div class="alert alert-warning" style="margin-left: 16px;">No Aspirant Found....</div>
		@endif         
    </div>
    <!---------------------------------------------------------------------------------------------------->
</div>


<!-- Modal -->
<div class="modal fade" id="aspiranttrainingcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <select name="training_module" id="training_module">
                        <option value="">Select Module</option>

                        <option value="fbewkbkewb"> </option>

                    </select>

                </div>
                <br />
                <button type="submit" class="btn bluebtn">Send</button>

            </div>

        </div>
    </div>
</div>

<script>
    function getModule() {
        var modulename = document.getElementById("ModulesDropdown").value;
        console.log("Module Id is : " + modulename);
        window.location.replace("/trainer/aspirant/aspirantlist/" + modulename);
        var module_Id = $(this).val();
        $.ajax({
            type: "Get",
            url: "/trainer/aspirant/aspirantlist/" + modulename,
            // data: {
            // 	'module_Id': modulename,
            // 	"_token": "{{ csrf_token() }}"
            // },
            success: function(response) {
                console.log(response);
            }
        });

    }

    // function to get the URL Parameter
    // Suppose we have the following URL: https://example.com/?id=123

    // Get the value of the 'id' parameter
        var id = getUrlParameter('id');

        // Function to get the value of a URL parameter
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

    // function ends here

    $('#titleH5').html("Select All Training");
    $(document).ready(function() {
       
        $('#SubscriberAspirants').show();
        $('#ModuleCards').show();
        <?php if($activeModule) { ?>
            $('#moduleCreationBtn').addClass('bluebtn');
            $('#aspirantsCard').hide();
        <?php } 
        else 
        { ?>
            $('#aspirantsCard').show();
            $('#searchAspiBtn').addClass('bluebtn');
       <?php  } ?>
            
        $(".ApplicantsTabs button").on("click", function() {
            $(".ApplicantsTabs button").removeClass("bluebtn");
            $(this).addClass("bluebtn");
        });

        $("#TrainingBtn").click(function() {
    		$('.trainning_summry_js').show();
    		$('#aspirantsCard').hide();
            $('#SubscriberAspirants').hide();
            $('#titleH5').html("Select Completed Training");
  		});

		$("#searchAspiBtn").click(function() {
            $('.trainning_summry_js').hide();
    		$('#aspirantsCard').show();
            $('#SubscriberAspirants').hide();
            $('#titleH5').html("Search Aspirants");
  		});

		$("#moduleCreationBtn").click(function() {
            $('.trainning_summry_js').hide();
    		$('#aspirantsCard').hide();
            $('#SubscriberAspirants').show();
            $('#titleH5').html("Select Active Training");
  		});
    });
</script>

@include('footer')