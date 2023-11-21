@include('header')
@include('aspirant.navigation')
@include('aspirant.submenu')
<?php 
    $jobTypehtml = '';
    if($moduleinfo->jobtype_of_customer_contact != "")
    {
        
        if($moduleinfo->jobtype_of_customer_contact == "fulltime")
        {
            $jobTypehtml .= 'Full Time ';
        }
        else if($moduleinfo->jobtype_of_customer_contact == "internship")
        {
            $jobTypehtml .= 'Internship ';
        }
    }

    $companyNamehtml = '';
    if($moduleinfo->name_of_customer != "")
    {
        $companyNamehtml .= " For ".$moduleinfo->name_of_customer;
    }
    
?>
<div class="container justify-content-center align-center pt-5 pb-5">
    <img class="img-fluid " style="width:100%" src="{{ asset('talent/assets/img/myprofile.png') }}" />
    <div class="row" style=" position: relative; top: -70px; left: 45px; ">
        <div class="col-sm-2">
          <div class="profile-pic-wrapper pt-3">
            <div class="pic-holder">
              <!-- uploaded pic shown here -->
              <img id="profilePic" class="pic" src="{{setProfilePic(@$loggedInUserAspi[0]->profile_pic)}}">
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="top: 74px;">
          <h3>{{session()->get('FirstName')}}</h3>
          <h6>{{repalceWithMentorRole(session()->get('Role'))}}</h6>
      </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <h2 class="pt-3 pb-2">About the Modules</h2>
            <h5 class="pt-3 mb-1">
                {{$moduleinfo->moduleTitle}} {{$companyNamehtml}}
            </h5>
            <h6>
                Total number of Days <small>{{$moduleinfo->totalNoOfDays}}</small>
            </h6>
            <h6>Job Type - <small>{{$jobTypehtml}}</small></h6>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="row  mt-3">
                <div class="col-12">
                    <a class="bluebtn pull-rigt btn-md" style="width:100%; display:block; text-transform: uppercase;" href="#">{{$moduleinfo->amount}}  {{$moduleinfo->currency}}</a>
                </div>
                <!-- <div class="col-6"><a class="whitebtn pull-rigt btn-md" style="width:100%; display:block; border:1px solid #bfbfe9; padding:5px 10px;" href="#">Buy</a></div> -->
                <div class="col-6">
                    @if($incart)
                    <a class="whitebtn pull-rigt btn-md mt-2" style="width:100%; display:block; border:1px solid #bfbfe9; padding:5px 10px;" href="{{route('myBankAsp')}}" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
                    @else
                    <form action="{{route('addModuleToCart')}}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="module_Id" value="{{$moduleinfo->module_Id}}">
                        <button type="submit" class="mt-2 whitebtn pull-rigt btn-md" style="width:100%; display:block; border:1px solid #bfbfe9; padding:5px 10px;" id="addToCartBtn" {{($moduleinfo->maxParticipantPerModule - $moduleinfo->leftParticipantPerModule == 0 ? "disabled" : "")}}><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</button>
                        <!-- <a class="whitebtn pull-rigt btn-md" style="width:100%; display:block; border:1px solid #bfbfe9; padding:5px 10px;" href="{{url('aspirant/moduleinfo/')}}/{{$moduleinfo->module_Id}}"  id="addToCartBtn">Add to cart</a> -->
                    </form>
                    @endif
                </div>
                <div class="col-6" style="text-align:center; margin-top:10px;"><a class="" style="width:100%; display:block;" href="{{ url('talent/aspirant/message') }}">Give Feedback</a></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="pb-2" style="margin-top: 20px;overflow: auto;">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>Day</th>
                            <th>Topic / Title</th>
                            <th>Time(mins)</th>
                            <th>Description</th>
                            <th>Intensity Level</th>
                        </tr>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2">{{$moduleinfo->totalNoOfDays}}</td>
                            <td>Introduction</td>
                            <td>{{$moduleinfo->timeInMinutesPerDay}}</td>
                            <td>{{$moduleinfo->moduleDescription}}</td>
                            <td>{{$moduleinfo->intesityLevel}}</td>
                        </tr>
                        <!-- <tr>
                            <td>Introduction to communication
                                and assessment tool</td>
                            <td>90</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Introduction</td>
                            <td>60</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet massa elit tristique est ultrices tortor, neque, volutpat. Bibendum vitae, egestas ornare accumsan iaculis </td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet massa elit tristique est ultrices tortor, neque, volutpat. Bibendum vitae, egestas ornare accumsan iaculis </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <h5 class="pt-3 pb-2">Session Type<label>{{$moduleinfo->sessiontype}}</label></h5>
    <h5 class="pt-3 pb-2">Preferred Languages<label>{{$moduleinfo->languages}}</label></h5>
    <h5 class="pt-3 pb-2">Duration of the module<label class="pr-5">{{$moduleinfo->startDateTime}} </label><label class="pr-5">to</label><label>{{$moduleinfo->endDateTime}}</label></h5>
    <h5 class="pt-3 pb-2">Maximum Participants quorum<label>{{($moduleinfo->maxParticipantPerModule - $moduleinfo->leftParticipantPerModule)}}/{{$moduleinfo->maxParticipantPerModule}} </label></h5>
    <h5 class="pt-3 pb-2">Lesson Requirments from the participants<label>{{$moduleinfo->lessonRequirementForparti}}</label></h5>
    <h5 class="pt-3 pb-2">Trainer Handout<label>{{$moduleinfo->traineeHandouts}}</label></h5>
    <h5 class="pt-3 pb-2">Digital Certificate Download<label>{{$moduleinfo->traineeHandouts}}</label></h5>

    <h5 class="pt-3 pb-2">About the {{repalceWithMentor('Trainer')}}</h5>
    <div class="row">
        <div class="col-sm-2">
            <img src="{{ asset('talent/assets/img/slider-img-1.jpg ') }}" width="100%">
        </div>
        <div class="col-sm-10">
            <h5 class="pt-3 pb-2">{{@$trainerinfo->first_name}}</h5>
            <!-- <label class="p-0">{{@$trainerinfo->trainer_type}} {{@$trainerinfo->modules}} {{@$trainerinfo->role}}</label>
            <div>4.3</div> -->
            <div><a href="#" data-toggle="modal" data-target="#exampleModal" style="text-decoration:underline;">See {{repalceWithMentor('Trainer')}} Profile</a></div>
        </div>
    </div>
    <p class="col-sm-6 pt-3">
        {{@$trainerinfo->about_you}}
    </p>
    </h5>



    <!-- SUCCESS -->
    <div>
        <img src="{{ asset('talent/assets/img/tech_life_communication.png ') }}">
        <!-- <h2>Your Application has been submited.
            we will get back to you soon </h2> -->
    </div>

</div>

<!----------------Trainer Profile Modal ------------------------->
@php
    $ParentSkillArray = array(
        "healthCare"	=> "Health Care",
        "finance"		=> "Finance",
        "cyber"			=> "Cyber Security",
        "aiMl"			=> "AI/ML/Web 3",
        "industry"		=> "Industrial",
        "legalSkill"	=> "Legal",
        "softSkill"		=> "Softskills"
    );
@endphp
<style>
    .pd24 {
        padding-left: 1%;
        padding-right: 10%;
    }
</style>
 
<!-- Modal -->
<div class="modal bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{repalceWithMentor('Trainer')}} {{@$trainerinfo->first_name}} Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center align-center">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 p-3">
                        <div class="p-3" style="background-color: white;">
                        <img id="profilePic" class="pic" src="{{setProfilePic($trainerinfo->profile_pic)}}" style="width: 100%;height: 60px;margin-bottom: 10px;">
                            <div class="mediumfont">{{@$trainerinfo->first_name}}<i class="fa fa-check-circle" aria-hidden="true" style="color: green;"></i></div>
                            <div class="normalfont2 border-bottom">{{(@$trainerinfo->parent_skill ? 'I&apos;m an '.$ParentSkillArray[$trainerinfo->parent_skill].' '.repalceWithMentor('Trainer') : '')}}</div>
                            <br>
                            <div class="mediumfont1">About me</div>
                            <div class="normalfont2 bluefontcolor border-bottom ">{{@$trainerinfo->about_you}}</div><br>
                            <br>
                            <div class="mediumfont2">Total number of relevant training delivery experience in year</div><br>
                            <div class="border-bottom">
                                <?php $modulear = json_decode(@$trainerinfo->modules); ?>
                                <?php $moduleDeliver = json_decode(@$trainerinfo->companies_deliver_at); ?>
                                <?php $no_of_session_name = json_decode(@$trainerinfo->no_of_session_name); ?>
                                @if($no_of_session_name != [""])
                                <table class="table table-bordered">
                                    <tr style="color: #15284C;background: #F6F6F6;">
                                        <th>Name of the Modules</th>
                                        <th>Name of the companies delivered at</th>
                                        <th>Total number of sessions delivered per module</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if ($modulear)
                                            @foreach($modulear as $mod)
                                            <input class="input2" readonly type="text" name="modulesName[]" placeholders="Module Name" style="text-align:center;" value="{{$mod}}" />
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if ($moduleDeliver)
                                            @foreach($moduleDeliver as $delivery)
                                            <input class="input2" style="text-align:center;" readonly type="text" name="modulesName[]" placeholders="Module Name" value="{{$delivery}}" />
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if ($no_of_session_name)
                                            @foreach($no_of_session_name as $exper)
                                            <input class="input2" style="text-align:center;" readonly type="text" name="modulesName[]" placeholders="Module Name" value="{{$exper}}" />
                                            @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                @else
                                <span class="normalfont3 m10 tags">Fill the Relevant Experience</span>
                                @endif
                            </div><br>
                            <div class="mediumfont2">Total number of industrty/consultancy experience in years</div><br>
                            <div class="border-bottom">
                                <span class="text-center normalfont3 m10 tags1">{{@$trainerinfo->total_experience}}</span>
                            </div><br>
                            <div class="mediumfont1">Specialization</div><br>
                            <div class="border-bottom">
                                <?php $specialization = json_decode(@$trainerinfo->specialization) ?>
                                @if($specialization)
                                @foreach($specialization as $special)
                                @if($specialization != [""])
                                <span class="normalfont3 m10 tags" name="specialization[]">{{$special}}</span>
                                @else
                                <span class="normalfont3 m10 tags">Fill the Specialization</span>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="mediumfont1">Skills</div><br>
                            <div class="border-bottom">
                                <span class="normalfont3 m10 tags">{{trim(@$trainerinfo->skills, ',')}}</span>
                            </div>
                            <div class="mediumfont1">Preferred online platform</div><br>
                            <div class="border-bottom">
                                <?php $preferedOnlinePlatform = json_decode(@$trainerinfo->preferred_online_platform) ?>
                                @if($preferedOnlinePlatform)
                                @foreach($preferedOnlinePlatform as $prefonlinePlat)
                                @if($preferedOnlinePlatform != [""])
                                <span class="normalfont3 m10 tags" name="prefonlineplatform[]">{{$prefonlinePlat}}</span>
                                @else
                                <span class="normalfont3 m10 tags">Fill the Preferred Locations</span>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="mediumfont1">Gamification tools</div><br>
                            <div class="border-bottom">
                                <?php $gamificationTool = json_decode(@$trainerinfo->gamification_tool) ?>
                                @if($gamificationTool)
                                @foreach($gamificationTool as $gametools)
                                @if($gamificationTool != [""])
                                <span class="normalfont3 m10 tags" name="gametools[]">{{$gametools}}</span>
                                @else
                                <span class="normalfont3 m10 tags">Fill the Tools</span>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="border-bottom "><br>
                                <div class="mediumfont1">Additional information</div><br>
                                <div class="normalfont2 p3">D.O.B <span class="dob normalfont3"> - </span><span>{{@$trainerinfo->dob}}</span></div>
                                <div class="normalfont2 p3">Gender <span class="dob normalfont3"> - </span><span>{{@$trainerinfo->gender}}</span></div>
                                <div class="normalfont2 p3">Work Permit<span class="dob normalfont3"> - </span>
                                    @if(@$trainerinfo->country_code == "971")
                                    <span>UAE</span>
                                </div>
                                @else
                                <span>Something Wrong</span>
                            </div>
                            @endif
                            <!-- <div class="normalfont2 p3">Marital status <span class="dob normalfont3"> </span></div> -->
                            <div class="normalfont2 p3">languages
                                <?php $languagesKnown = json_decode(@$trainerinfo->languages_known) ?>
                                @if($languagesKnown)
                                @foreach($languagesKnown as $languagess)
                                @if($languagesKnown != [""])
                                <span class="normalfont3 m10 tags" name="languagess[]">{{$languagess}}</span>
                                @else
                                <span class="normalfont3 m10 tags">Fill the Languages</span>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <!-- <div class="normalfont2 p3">Preferred location <span class="dob normalfont3"> </span></div> -->
                            <!-- <div class="normalfont2 p3">Industries <span class="dob normalfont3"></span></div> -->
                        </div>
                        <div class="flex justify-content-center align-center ">
                            <br>
                            <span class="normalfont3 m10 tags"><a href="#">View My Intro Video</a></span>
                            <br><br>
                        </div>
                        </div>
                    </div>      
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 p-3">
                        <div class="" style="background-color: white;">
                            <br><br>
                            <div class="work p5 border-bottom">
                                <div class="mediumfont1">Top Three Moudles that I have trained on</div><br>
                                <div class="row border-bottom">
                                    <?php $modulles = json_decode(@$trainerinfo->modules);
                                    ?>
                                    @if($modulles)
                                    @foreach($modulles as $keym=> $modls)
                                    @if($preferedOnlinePlatform != [""])
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <center>
                                            <img class="img-responsive " src="{{ asset('talent/assets/img/experiencelogo.png') }}" />
                                        </center>

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="">
                                            <div class="normalfont1 bold">{{ $modls }}</div>
                                            <?php $key = array_search($modls, $no_of_session_name) ?>
                                            <?php $modulles = json_decode(@$trainerinfo->modules) ?>
                                            <div class="dob normalfont3" name="exper[]">Total Sessions Deliver - {{$no_of_session_name[$keym]}} </div><br>
                                            <!-- <div class=" normalfont3">Static Text - Creative and Strategic direction for Fake Crow: A Product Design Studio in Los Angeles, crafting digital solutions for forward thinking companies, entrepreneurs & agencies, focusing on Product, Strategy, UX and UI Design. <a href="#"><span class="skybluefont">See more</span></a></div> -->
                                            <br><br>
                                            <br><br>
                                        </div>
                                    </div>
                                    @else
                                    <span class="normalfont3 m10 tags">Fill the Modules</span>
                                    @endif
                                    @endforeach
                                    @endif

                                </div>
                                <div class="certificate p5 border-bottom">
                                    <div class="mediumfont1">Certifications</div><br>
                                    @php
                                    $certificationsArray = array();
                                    $certificationsArray['certification_name'] = json_decode(@$trainerinfo->certification_name,true);
                                    $certificationsArray['certification_expiry_date'] = json_decode(@$trainerinfo->certification_expiry_date,true);
                                    $certificationsArray['certification_description'] = json_decode(@$trainerinfo->certification_description,true);
                                    @endphp
                                    @if(!empty($certificationsArray['certification_name']))
                                    @foreach($certificationsArray['certification_name'] as $key => $rowData)
                                    <div class="row border-bottom">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                            <center>
                                                <!-- <div class="normalfont3" style="background-color: darkblue;padding:2%;color:white;height:50px;width:50px;"></div> -->
                                                <div class="normalfont3"><i class="fa fa-certificate" aria-hidden="true" style="font-size: 36px;color: gold;"></i></div>
                                            </center>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                            <div class="">
                                                <div class="normalfont1">{{$certificationsArray['certification_name'][$key]}}</div>
                                                <div class="normalfont2 bold"><span class="dob normalfont3">Expired On {{$certificationsArray['certification_expiry_date'][$key]}}</span></div><br>
                                                <div class=" normalfont3" style="color:#6A6A6A">{{$certificationsArray['certification_description'][$key]}}
                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    @endforeach
                                    @endif



                                    <br>

                                </div>
                                <div class="Education p5 border-bottom">
                                    <div class="mediumfont1">Education</div><br>
                                    <div class="row border-bottom">

                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                            <center>
                                                <div class="normalfont3"><i class="fa fa-book" aria-hidden="true" style="font-size: 36px;"></i></div>
                                            </center>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                            <div class="">
                                                <div class="normalfont1">{{@$trainerinfo->school_college_university}}</div>
                                                <div class="normalfont2 bold">{{@$trainerinfo->degree}} <br><span class="dob normalfont3">{{@$trainerinfo->final_year_date}}</span></div><br>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!-------- --->


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!------------------------------end Modal---------------------------------->
  
@include('footer')
<script>
    $(document).ready(function() {
        $(document).on('click', '#addToCartBtn', function() {
            var module_Id = $(this).val();
            console.log(module_Id);
            // $('#edit-modal').modal('show');

            $.ajax({
                type: "Get",
                // url: "/edit-module/" + module_Id, 
                url: "/aspirant/moduleinfo/" + module_Id,
                success: function(response) {
                    console.log(response.module_Id);
                    // document.window.navigate('aspirant/moduleinfo/'+module_Id);
                    // $('#module_Id').val(response.Module[0].module_Id);
                    // $('#edittrainingType').val(response.Module[0].trainingType);

                    // console.log(response.Module[0].moduleTitle);
                    // valll = $('#editmoduleTitle').text();
                    // console.log(valll);
                }
            });
        });
    });
</script>