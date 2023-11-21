@include('header')
@include('trainer.navigation')
@include('trainer.submenu')
@php
$greenBlockArray = array(
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
.pointer-none-css-of-jss
{
    pointer-events: none !important;
}
.activeSkillcss
{
    background-color:orange;
}
.notactiveSkillcss
{
    background-color:black;
    pointer-events: none;
}
.sessiontype_message_css
{
    margin-top: 13px;
    font-size: 18px;
    font-weight: bold;
    color: #FC6717;
}
.trainingType_select_corporate_css
{
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 14px;
}
.modulesbtnsDiv .bold {
    border-color: #bfbfe9;margin: 0;padding: 10px 50px;border-radius: 5px;font-weight: 500;text-align: center;
    font-size: 14px;
}
.upload_default_module_img_css
{
    padding: 0px;
}
.upload_default_module_img_css li
{
    display: inline-block;
    list-style: none;
    width: 30%;
}
.upload_default_module_img_css li img
{
    cursor: pointer;
    border-radius: 7px;
    box-shadow: 10px 10px 10px grey;
}
.upload_default_module_img_css li input
{
    display: none;
}
.upload_default_module_img_css label input:checked ~ img {
    border: 3px solid #15284C;
}
@media screen and (max-width: 575px) {
    .on_small_left_0 {
        left: 0 !important;
    }
}
</style>
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
            <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png">
        </div>
    </div>
    <div class="row on_small_left_0" style=" position: relative; top: -70px; left: 45px; ">
        <div class="col-sm-2">
            <div class="profile-pic-wrapper pt-3">
                <div class="pic-holder">
                    <!-- uploaded pic shown here -->
                    <img id="profilePic" class="pic" src="{{setProfilePic($trainer_Data['profile_pic'])}}">

                    {{-- <label for="newProfilePhoto" class="upload-file-block">
                        <div class="text-center">
                            <div class="mb-2">
                                <i class="fa fa-camera fa-2x"></i>
                            </div>
                        </div>
                    </label>
                    <input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="display: none;"> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-6" style=" top: 74px; ">
            <h3>{{session()->get('FirstName')}}</h3>
            <h6>{{repalceWithMentorRole(session()->get('Role'))}}</h6>
        </div>
    </div>

    <div class="">
        <!-- <h3>Corporate</h3> -->
        <h3>Corporate/Individual Module</h3>
        <div class="row modulesbtnsDiv">
            <div class="p-2">
                <button class="bold" id="moduleCreationBtn">Create Test Modules</button>
            </div>
            <div class=" p-2">
                <button class="bold" id="upcomingModuleButton">Upcomming / Active Modules</button>
            </div>
            <div class=" p-2">
                <button class="bold" id="DeletedModuleButton">Deleted / Paused Modules</button>
            </div>
            <div class=" p-2">
                <button class="bold" id="PastModuleButton">Completed / Past Modules</button>
            </div>
            <div class=" p-2">
                <button class="bold" disabled id="ListedModuleButton">View listed corporate Trainings (Comming Soon)</button>
            </div>
            <!-- <div class=" p-2">
                <button class="whitebtn">Applied Trainings</button>
            </div> -->
        </div>
    </div>

    <!-------------------------------------Manage Modules----------------------------------------------->

    @if(session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <div class="pt-4" id="manageModulePage">
        <form action="{{route('createmoduled')}}" method="POST" id="createmoduledSave" class="mb-30">
            @csrf
            <input type="hidden" name="module_creations_id" value="0">
            <div class="card">
                <div class="card-body">
                    <!-- CREATE MODULE -->
                    <div class="text-center p-5 d-none">
                        <!-- <button class="bluebtn pl-4 pr-4" id="createModuleBtn">+ CREATE MODULE </button> -->
                    </div>
                    <!-- MANAGE MODULE -->
                    <div class="form-group">
                        <h5>Type of Training</h5>
                        <select class="form-control trainingType_select_js" name="trainingType" required >
                            <option value="">select the Type of training</option>
                            <option value="individual"> Individual </option>
                            <option value="corporate">Corporate</option>
                        </select>
                    </div>
                    <div style="display:none" class="trainingType_select_corporate_css trainingType_select_corporate_jss">
                        <div class="form-group">
                            <h6>Name of Customer</h6>
                            <input type="text" name="name_of_customer" class="form-control">
                        </div>

                        <div class="form-group">
                            <h6>Customer email address</h6>
                            <input type="email" name="emailaddress_of_customer_contact" class="form-control">
                        </div>

                        <div class="form-group">
                            <h6>Contact person of customer full name</h6>
                            <input type="text" name="fullname_of_customer_contact" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                            <h6>Name of the company</h6> --}}
                            <input type="hidden" name="companyname_of_customer_contact">
                        {{-- </div> --}}

                        <div class="form-group">
                            <h6>Contact person in company designation</h6>
                            <select name="designation_of_customer_contact" class="form-control">
                                <option value="hr">HR</option>
                                <option value="lnd">LND</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <h6>Job Type</h6>
                            <select name="jobtype_of_customer_contact" class="form-control">
                                <option value="internship">Internship</option>
                                <option value="fulltime">Full Time</option>
                            </select>
                        </div>  

                    </div>
                    <div class="form-group">
                        <h5>{{repalceWithMentor('Trainer')}} classification</h5>
                        <select class="form-control" name="trainingClassification" required>
                            <option value="" >select the classsification</option>
                            <option value="technical">Technical</option>
                            <option value="softskill">Softskill</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5>Module Title</h5>
                        <input type="text" name="moduleTitle" id="ModuleTitle" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <h5>Total number of Days</h5>
                        <select class="form-control module_element_not_able_to_edit_jss" name="totalDays" id="totalDays" onchange="changestarttime();" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3 col-sm-6">
                            <label> Start Date and Time*</label>
                            <input type="datetime-local" class="form-control module_element_not_able_to_edit_jss" name="startDate" id="startDate" onchange="changestarttime();" required>
                        </div>
                        <!-- <div class="col-3"><label> Start Date*</label></div> -->
                        {{-- <div class="col-3 d-none"><label> Start Time*</label></div> --}}
                        <div class="col-3 d-none">
                            <input type="time" class="form-control" value="12:00 PM" name="starTime" id="starTime" onchange="changestarttime();">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <label> Time Zone*</label>
                            <select class="form-control" name="timeZone">
                                <option value="">Time Zone</option>
                                @if($timezones)
                                    @foreach($timezones as $key_timezone => $row_timezone)
                                        <option value="{{$key_timezone}}">{{$row_timezone}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-6">
                            <input type="datetime-local" class="form-control" name="startDate" id="startDate" onchange="changestarttime();" required>
                        </div>
                        <div class="col-3 d-none">
                            <input type="time" class="form-control" value="12:00 PM" name="starTime" id="starTime" onchange="changestarttime();">
                        </div>
                        <div class="col-3">
                            <!-- <input type="text" class="form-control" placeholder="Time Zone" name="timeZone"> -->
                            <select class="form-control" name="timeZone">
                                <option value="">Time Zone</option>
                                @if($timezones)
                                    @foreach($timezones as $key_timezone => $row_timezone)
                                        <option value="{{$key_timezone}}">{{$row_timezone}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <h5>Total time in minutes per day</h5>
                        <select class="form-control module_element_not_able_to_edit_jss" name="timeInMinutesPerDay"  onchange="changestarttime();">
                            <option value="" >Select your option</option>
                            <option value="45">45</option>
                            <option value="60">60</option>
                            <option value="120">120</option>
                            <option value="180">180</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5>Description</h5>
                        <input class="form-control" name="moduleDescription">
                    </div>
                    

                    <!--add skills start-->
        <div class="">
          <div class="mediumfont bold ">  </div> <br>
          <!-- <div class="normalfont2">Select all relevant skills of attendees/aspirant </div> -->
          <h5>Select all relevant skills for attendee/aspirant to enroll</h5>
          <!-- <textarea class="input2" type="text" name="inputSkils" id="inputSkills" placeholders="Name" ></textarea> -->
          <input class="input2" type="text" name="mskills" id="inputSkills" placeholders="Name"/> <br>
          <div class="row"> <br>
            <div class="col-lg-12 parentskillBlockjss" style="display: flex; flex-direction: row; flex-wrap: wrap;">
              <!-- <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="healthCare"> <i class="fa fa-bookmark" aria-hidden="true"></i> Health Care</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="finance"> <i class="fa fa-bookmark" aria-hidden="true"></i> Finance</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="cyber"> <i class="fa fa-bookmark" aria-hidden="true"></i> Cyber Security</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="aiMl"> <i class="fa fa-bookmark" aria-hidden="true"></i> AI/ML/Web 3</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="industry"> <i class="fa fa-bookmark" aria-hidden="true"></i> Industrial</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="legalSkill"> <i class="fa fa-bookmark" aria-hidden="true"></i> Legal</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="softSkill"> <i class="fa fa-bookmark" aria-hidden="true"></i> Softskills</span> -->
              @foreach ($greenBlockArray as $key => $item)
                <span class="greenblock {{($key == $trainer_Data['parent_skill'] ? ' activeSkillcss' : ' notactiveSkillcss')}}" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="{{$key}}"> <i class="fa fa-bookmark" aria-hidden="true"></i> {{$item}}</span>
            @endforeach
            </div>
          </div> <br>
          <div class="normalfont2">Suggested Skills to add </div>
          <div class="SkillitemsDiv">
            <div class="row helthcareItems" id="subHealthCare"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-en    flex-wrap: wrap; ">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Nursing </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Welness</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Medicine</span>
              </div>
            </div>

            <div class="row" id="subFinance"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Accounting </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Banking</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Insurance</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Trading & Investment</span>
              </div>
            </div>

            <div class="row" id="subCyber"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  GRC & Privacy</span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Technology</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Awareness</span>
              </div>
            </div>

            <div class="row" id="subAiMl"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  ML</span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Metaverse</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Blockchain</span>
              </div>
            </div>

            <div class="row" id="subIndustry"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  SCM </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Shopfloor</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Industry 4.0</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Construction</span>
              </div>
            </div>

            <div class="row" id="subLegal"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Dispute Resolution </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Cyber Law </span>
              </div>
            </div>

            <div class="row" id="subSofts"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Leadership </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Business Communication </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Report Writing </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Stress Management </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Time Management </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Mental Health/Wellness </span>

                <div class="row" id="subSofts">
                  <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Personality Development </span>&nbsp;
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Emotional Quotient </span>&nbsp;
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Presentation Skills </span>&nbsp;
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Customer Care/Excellence </span>&nbsp;
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Interpersonal Skills </span>&nbsp;
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> <br>
        <!--add skills end-->







                    <div class="form-group">
                        <h5>Level of Intensity</h5>
                        <!-- <input class="form-control"> -->
                        <select class="form-control" name="intesityLevel">
                            <option value="" >Select</option>
                            <option value="beginer">Beginer</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>

                    
                    <div class="form-group" id="sessiontype">
                    <h5>Session Type</h5>
                        <select class="form-control sessiontype_select_jss" name="sessiontype" >
                            <option value="" >Select</option>
                            <option value="video">Recorded Video</option>
                            <option value="classroom">Physical Classroom</option>
                            <option value="live">Live Virtual</option>
                        </select>
                        <div>
                            <div class="sessiontype_message_css sessiontype_message_js sessiontype_classroom_message_js" style="display:none">
                                {{repalceWithMentor('Trainer')}} Please sent entry for video to Digital gate admin 
                                to be uploaded in Digital gate youtube private channel. 
                            </div>
                            <div class="sessiontype_message_css sessiontype_message_js sessiontype_video_message_js" style="display:none">
                                Please contract Digital gate admin for portal venue and classroom booking.
                            </div>
                        </div>
                    </div>
                    <!-- <div class="collapse" id="sessiontype">
                        <div class="card card-body">
                            <div class="row">
                                <span class="whitebtn m-2" name="sessionTypeClassroom">Classroom</span>
                                <span class="whitebtn m-2" name="sessionTypeVideo">Recorded Video</span>
                                <span class="whitebtn m-2" name="sessionTypeLive">Live</span>
                            </div>
                        </div>
                    </div> -->
                    <div>
                        <select class="form-control ifLive_select_jss" name="ifLive" style="display:none">
                            <option value="" >If Live - Platform details</option>
                            <option value="teams">MS Teams</option>
                            <option value="zoom">Zoom</option>
                            {{-- <option value="skype">Skype</option> --}}
                            <option value="gmeet">Gmeet</option>
                            <option value="lms">LMS Integration</option>
                            <option value="youtubevideo">Video-Youtube</option>
                        </select>
                    </div><br>
                    <div class="form-group url_to_the_lms_jss">
                        <h5 class="url_to_the_data">URL to the LMS </h5>
                        <input class="form-control" style="width: 50%;" name="lmsURL">
                    </div>
                    <div class="form-group">
                        <h5> Language</h5>
                        <select class="form-control" name="languages">
                            <option value="" >Select</option>
                            <option value="english">English</option>
                            <option value="arabic">Arabic</option>
                            <option value="french">French</option>
                            <option value="spanish">Spanish</option>
                            <option value="hindi">Hindi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5> Duration of the module</h5>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3 col-sm-6">
                            <label> Start Date Time*</label>
                            <input name="startDateTimes" id="startDateTime" type="text" class="form-control" readonly required placeholder="DD/MM/YYYY Hr.Min">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <label> End Date Time*</label>
                            <input name="endDateTimes" readonly id="endDateTime" type="text" class="form-control" placeholder="DD/MM/YYYY Hr.Min" required>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-3"><input name="startDateTimes" id="startDateTime" type="text" class="form-control" readonly required placeholder="DD/MM/YYYY Hr.Min"></div>
                        <div class="col-3"><input name="endDateTimes" readonly id="endDateTime" type="text" class="form-control" placeholder="DD/MM/YYYY Hr.Min" required></div>
                    </div> --}}
                    <div class="form-group">
                        <h5>Maximum participants per module*</h5>
                        <select class="form-control module_element_not_able_to_edit_jss" name="total_seat_by_module" required>
                            <option value="" >Select</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <h5>Seats Per Cohort</h5>
                        <input type="number" name="maxParticipantPerModule" class="form-control module_element_not_able_to_edit_jss" />
                    </div>
                    <div class="form-group">
                        <h5>Prework Requested*</h5>
                        <select class="form-control" onchange="changePrereqWork(this.value)" name="prereqWork" required>
                            <option value="" >Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form-group prereq_work_show_hide" style="display: none;">
                        <h5>Prework Reading - URL*</h5>
                        <input class="form-control" name="preWorkURL">
                    </div>
                    <div class="form-group">
                        <h5>Lesson Requirements from participants (Press "Shift Key" and Multi Select)</h5>
                        <select class="form-control" name="lessonRequirementForparti[]" multiple>
                            <option value="" >Select</option>
                            <option value="laptop">Laptop</option>
                            <option value="mobile">Mobile</option>
                            <option value="physicalclass">Physical Class</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5>Trainee Handout*</h5>
                        <select class="form-control" name="traineeHandouts" required>
                            <option value="" >Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h6>Let us help you streamline your testing module creation process, with few clicks you will be amazed at how effortlessly you can create tests in record time.</h6>
                        
                        <h6>1. Imagine having access to a ready-to-use syllabus template in .xls format -this will be your test headings chronologically and automatically populated on the LMS or Gamified test path. Download and edit syllabus step 1.</h6>
                        <br />
                        <p><a href="{{url('/uploads/images/Template for Quiz _ Lab _ Assignment - Scenario, Beavioural, Technical, Attitude Measurement.docx')}}" download><b>Template 1 (DOC)</b></a></p>
                        <br />
                    </div>
                    <div class="form-group">
                        <h6>2. We have taken automation for Subject Matter Experts to help prepare content to the graduates. Our state of the art avatar will present the actual content under each heading which you have to put into the .pptx file. The generative AI will ready from each your headings and take classes, you can edit the PPT and the avatar will read the change. Download and edit content ppt for the AI avatar twin to read from step 2.</h6>
                        <br />
                        <p><a href="{{url('/uploads/images/Module 1a -Security Awareness -Template for Avatar Based Video Content.pptx')}}" download><b>Template 2 (PPT)</b></a></p>
                        <br />
                    </div>
                    <div class="form-group">
                        <h6>3. Finally the word .doc is the corresponding question bank to check technical know how, along with behaviour and attitude. Download the .doc and start building the question bank for each headin in your syllabus and align it with the ppt content . Download and complete queations for each module and mark the answers step 3.</h6>
                        <br />
                        <p><a href="{{url('/uploads/images/Cyber Security Testing Module - Template for any skill testing syllabus.xlsx')}}" download><b>Template 3 (XLS)</b></a></p>
                        <br />
                    </div>
                   

                    <!-- Upload Handouts -->
                    <div class="p-4">
                        <h5> Upload Course Work (Scorm, xls, pptx, pdf, docx) and Trainee Handout (to be shared with Aspirant)</h5>
                        <input type="hidden" name="courseWorkHandoutUpload_old" value="">
                        <div class="form-group inputDnD">
                            <input type="file" name="courseWorkHandoutUpload[]" class="form-control-file text-primary documentUpload_js"  data-title="Drag &amp; Drop your files here" accept="application/msword, application/pdf, .zip, .xls, .xlsx, .pptx, .docx, image/*" multiple>
                        </div>
                    </div>
                    <!-- Handouts End -->

                    <div class="p-4">
                        <h5> Add Link Of Youtube Video introducing module and yourself*</h5>
                        <div class="form-group inputDnD">
                            <input type="text" name="youtubeVideoUpload" class="form-control" required />
                        </div>
                        {{-- <input type="hidden" name="youtubeVideoUpload_old" value="">
                        <div class="form-group inputDnD">
                            <input type="file" name="youtubeVideoUpload" class="form-control-file text-primary documentUpload_js"  data-title="Drag &amp; Drop your files here" accept="video/mp4,video/x-m4v,video/*">
                        </div> --}}
                        
                        <!-- Upload Jpeg -->
                        
                        <div class="">
                            <h5>Upload your Module Display Picture or Select your Jpeg from these 3 options</h5>
                            <div class="text-center">
                                <button type="button" class="btn btn-info remove_selection">Remove Selection</button>
                                <ul class="upload_default_module_img_css">
                                    <li>
                                        <label for="module1">
                                            <input id="module1" type="radio" name="jpegUpload_default" value="module1.png">
                                            <img src="{{url('/uploads/moduleimage/module1.png')}}" alt="">
                                        </label>
                                    </li>
                                    <li>
                                        <label for="module2">
                                            <input id="module2" type="radio" name="jpegUpload_default" value="module2.png">
                                            <img src="{{url('/uploads/moduleimage/module2.png')}}" alt="">
                                        </label>
                                    </li>
                                    <li>
                                        <label for="module3">
                                            <input id="module3" type="radio" name="jpegUpload_default" value="module3.png">
                                            <img src="{{url('/uploads/moduleimage/module3.png')}}" alt="">
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            <input type="hidden" name="jpegUpload_old" value="">
                            <div class="form-group inputDnD">
                                <input type="file" name="jpegUpload" class="form-control-file text-primary documentUpload_js"  data-title="Drag &amp; Drop your files here" accept="image/*">
                            </div>
                        </div>
                        <!-- Jpeg End -->
                        <div class="text-center d-none">
                            <button class="bluebtn pl-4 pr-4">Upload</button>
                        </div>
                        <div class="form-group">
                            <h5>Price</h5>
                            <select class="form-control" name="price" id="priceType" onchange="changeCurrency(this.value)" >
                                <option value="" >Select</option>
                                <option value="Free">Free</option>
                                <option value="Paid">Paid</option>
                            </select>
                        </div>
                        <div class="form-group currencyDiv_jss" id="currencyDiv" style="display:none">
                            <h5>Currency</h5>
                            <select class="form-control" name="currency">
                                <option value="" >Select</option>
                                <option value="inr">INR</option>
                                <option value="usd">USD</option>
                                <option value="aed">AED</option>
                            </select>
                        </div>
                        <div class="form-group currencyDiv_jss" style="display:none">
                            <h5>Amount</h5>
                            <input type="number" class="form-control" name="amount">
                        </div>
                    </div>
                    <div class="form-group p-3 text-center">
                        <button type="submit" name="createmoduled" class="btn btn-dark" id="addCards">Add</button>
                    </div>
                </div>
            </div>
        </form>



        <!--UPCOMING MODULES -->
        <div class="row">
            @if ($moduleinfo->count())
            @foreach($moduleinfo as $mi)
            @if($mi->Status == 'InActive')
            <!-- <div class="col-md-4" id="Modulecard"> -->
            <?php 

            $companyNamehtml = '';
            if($mi->name_of_customer != "")
            {
                $companyNamehtml .= " For ".$mi->name_of_customer;
            }
            $jobTypehtml = '';
            if($mi->jobtype_of_customer_contact != "")
            { 
                if($mi->jobtype_of_customer_contact == "fulltime")
                {
                    $jobTypehtml .= 'Full Time ';
                }
                else if($mi->jobtype_of_customer_contact == "internship")
                {
                    $jobTypehtml .= 'Internship ';
                }
            }
            ?>
            <div class="col-md-4">
                <div class="card p-2">
                    <div class="card-header p-0">
                        <img src="/talent/trainer/assets/img/myprofile.png" width="100%">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="card-title" id="ModuleT">{{$mi->moduleTitle}} {{$companyNamehtml}}</h3>
                                <!-- <h3 class="card-title" id="moduleId">{{$mi->module_Id}}</h3> -->
                            </div>
                            <!-- <div class="col-2">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Delete Modules </a>
                                        <a class="dropdown-item" href="#">Pause Modules</a>
                                        <a class="dropdown-item" href="#">Edit Modules</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <p>{{$mi->moduleDescription}}</p>
                    </div>
                    <div class="card-body">
                        <h6>First Session and Time On</h6>
                        <div class="row">
                            <div class="col-md-6">{{$mi->startDate}} {{$mi->starTime}}</div>
                            <div class="col-md-6"><label>Seats - {{$mi->maxParticipantPerModule - $mi->leftParticipantPerModule}}/{{$mi->maxParticipantPerModule}}</label></div>
                            
                            
                        </div>
                        <h6>Intensity - {{$mi->intesityLevel}}</h6>
                        <div class="row">
                            <div class="col-md-6"><label>Paid/Free - {{$mi->price}}</label></div>
                            <div class="col-md-6"><label>Platforms - {{$mi->ifLive}}</label></div>
                            <div class="col-md-12"><label>Job Type - {{$jobTypehtml}}</label></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <!-- <a href="{{ url('/trainer/managemodules', $mi->module_Id) }}"><button class="bluebtn pl-4 pr-4" 
                        data-toggle="modal" data-target="#myModal">Edit</button></a>&nbsp;&nbsp; -->

                        <button class="bluebtn pl-4 pr-4 edit_on_modal" value="{{$mi->module_Id}}" type="button">Edit</button>&nbsp;&nbsp;

                        <a href="/trainer/managemodules/active/{{$mi->module_Id}}"><button class="bluebtn pl-4 pr-4">Publish</button></a>&nbsp;&nbsp;

                        <a href="/trainer/managemodules/delete/{{$mi->module_Id}}"><button class="bluebtn pl-4 pr-4" id="deleteCard">Delete</button></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @else
            <div class="alert alert-warning">No Module found...</div>
            @endif
        </div>
    </div>


    <!-------------------------------------Upcoming Modules----------------------------------------------->
<div id="UpcomingModulesPage" class="upcoming_modules_page_css">
    <h2 class="pb-2 mt-4" id="UpcomingHeadings">Upcoming Modules</h2>
    <div class="row">
        @if ($moduleinfoactiveUpcoming->count())
        @foreach($moduleinfoactiveUpcoming as $upmoduleinfo)
        <?php 

        $companyNamehtml = '';
        if($upmoduleinfo->name_of_customer != "")
        {
            $companyNamehtml .= " For ".$upmoduleinfo->name_of_customer;
        }
        ?>
        <div class="col-12 col-md-4">
            <div class="card mb-2">
                <!-- remove_br -->

                <div class="card-header p-0 ">
                    <img src="/talent/trainer/assets/img/myprofile.png" width="100%" style="height: 150px;">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-12 text-right"><button class="bluebtn pl-4 pr-4 mt-1 edit_on_modal" value="{{$upmoduleinfo->module_Id}}" type="button">Edit</button>&nbsp;&nbsp;</div>

                            <div class="col-10">
                                <h4 class="card-title">{{$upmoduleinfo->moduleTitle}} {{$companyNamehtml}}</h4>
                            </div>
                            {{--<div class="col-2">
                                <i class="pt-1 fa fa-bookmark right" aria-hidden="true"></i>
                            </div>--}}
                        </div>
                        <div class="row">
                            <div class="col-md-6"><i class="fa fa-archive" aria-hidden="true"></i> Session Type - {{$upmoduleinfo->sessiontype}}</div>
                            <?php 
                            if($upmoduleinfo->jobtype_of_customer_contact != "")
                            { 
                                $jobTypehtml = "";
                            ?>
                            
                                <div class="col-md-6">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                    <?php if($upmoduleinfo->jobtype_of_customer_contact == "fulltime")
                                    {
                                        $jobTypehtml .= 'Full Time -';
                                    }
                                    else if($upmoduleinfo->jobtype_of_customer_contact == "internship")
                                    {
                                        $jobTypehtml .= 'Internship -';
                                    }
                                    $jobTypehtml .= ' Job Type
                                </div>'; ?>
                            <?php echo $jobTypehtml;
                            }
                            ?>
                            <div class="col-md-6"><i class="fa fa-television" aria-hidden="true"></i> Platform - {{$upmoduleinfo->ifLive}}</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6>First Session on</h6>
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-calendar" aria-hidden="true"></i> Start - {{$upmoduleinfo->startDate}}</div>
                        <div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> {{$upmoduleinfo->maxParticipantPerModule - $upmoduleinfo->leftParticipantPerModule}}/{{$upmoduleinfo->maxParticipantPerModule}} Seats remaining</div>
                        <div class="col-md-6"><i class="fa fa-clock-o" aria-hidden="true"></i> Start - {{date("h:i a",strtotime($upmoduleinfo->startDate))}}</div>
                    </div>
                    <br />
                    <h6>Last Session on</h6>
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-calendar" aria-hidden="true"></i> End - {{$upmoduleinfo->endDateTime}}</div>
                        <div class="col-md-6">Skills</div>
                    </div>
                    <div class="row">
                      
                        <!-- <div class="col-md-6">{{date("h:i a",strtotime($upmoduleinfo->startDate))}}</div> -->
                        <div class="col-md-6"><i class="fa fa-clock-o" aria-hidden="true"></i> Start - {{date("h:i a",strtotime($upmoduleinfo->endDateTime))}}</div>
						<div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i>{{$upmoduleinfo->skills}}</div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br />
                            <a class="bluebtn pl-4 pr-4 click_to_redirect_with_local" data_local="moduleCreationBtn" href="{{route('tmanageAspirant')}}">View Aspirants</a>
                            <a class="bluebtn" href="/trainer/downloadModulePDF/{{$upmoduleinfo->module_Id}}">Download Module Details</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-warning" style="margin-left: 16px;">No Upcomming Modules Found....</div>
        @endif

    </div>
</div>
<!---------------------------------------------------------------------------------------------------->


<!-------------------------------------Deleted Modules----------------------------------------------->
<div id="DeletedModulesPage">
    <h2 class="pb-2 mt-4" id="UpcomingHeadings">Deleted Modules</h2>
    <div class="row">
        @if ($ModulesDeleted->count())
        @foreach($ModulesDeleted as $Delmoduleinfo)
        <?php 

        $companyNamehtml = '';
        if($Delmoduleinfo->name_of_customer != "")
        {
            $companyNamehtml .= " For ".$Delmoduleinfo->name_of_customer;
        }
        ?>
        <div class="col-12 col-md-4">
            <div class="card remove_br">

                <div class="card-header p-0 ">
                    <img src="/talent/trainer/assets/img/myprofile.png" width="100%" style="height: 150px;">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="card-title">{{$Delmoduleinfo->moduleTitle}} {{$companyNamehtml}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><i class="fa fa-archive" aria-hidden="true"></i> Session Type - {{$Delmoduleinfo->sessiontype}}</div>
                           <?php 
                           if($Delmoduleinfo->jobtype_of_customer_contact != "")
                            { 
                                $jobTypehtml = "";
                            ?>
                            
                                <div class="col-md-6">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                    <?php if($Delmoduleinfo->jobtype_of_customer_contact == "fulltime")
                                    {
                                        $jobTypehtml .= 'Full Time -';
                                    }
                                    else if($Delmoduleinfo->jobtype_of_customer_contact == "internship")
                                    {
                                        $jobTypehtml .= 'Internship -';
                                    }
                                    $jobTypehtml .= ' Job Type
                                </div>'; ?>
                            <?php echo $jobTypehtml;
                            }
                            ?>
                            <div class="col-md-6"><i class="fa fa-television" aria-hidden="true"></i> Platform - {{$Delmoduleinfo->ifLive}}</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6>First Session on</h6>
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-calendar" aria-hidden="true"></i> Start - {{$Delmoduleinfo->startDate}}</div>
                        <div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> {{$Delmoduleinfo->maxParticipantPerModule - $Delmoduleinfo->leftParticipantPerModule}}/{{$Delmoduleinfo->maxParticipantPerModule}} Seats remaining</div>
                        <div class="col-md-6"><i class="fa fa-clock-o" aria-hidden="true"></i> Start - {{date("h:i a",strtotime($Delmoduleinfo->startDate))}}</div>
                    </div>
                    <br />
                    <h6>Last Session on</h6>
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-calendar" aria-hidden="true"></i> End - {{$Delmoduleinfo->endDateTime}}</div>
                        <div class="col-md-6">Skills</div>
                    </div>
                    <div class="row">
                      
                        <!-- <div class="col-md-6">{{date("h:i a",strtotime($Delmoduleinfo->startDate))}}</div> -->
                        <div class="col-md-6"><i class="fa fa-clock-o" aria-hidden="true"></i> Start - {{date("h:i a",strtotime($Delmoduleinfo->endDateTime))}}</div>
						<div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i>{{$Delmoduleinfo->skills}}</div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br />
                        </div>
                    </div>
                </div>
                <button class="bluebtn pl-4 pr-4 edit_on_modal"  value="{{$Delmoduleinfo->module_Id}}" data_type="deleted" type="button">Re-use this Template</button>&nbsp;&nbsp;
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-warning" style="margin-left: 16px;">No Deleted Modules Found....</div>
        @endif

    </div>
</div>
<!---------------------------------------------------------------------------------------------------->


<!-------------------------------------Past Modules----------------------------------------------->
<div id="PastModulesPage">
    <div class="row">
        <h2 class="pb-2 mt-4" id="UpcomingHeadings">Past Modules</h2>
    @if ($PastModules->count())
        <div class="table-responsive">
        <table class="a table table-bordered">
            <tr>
            <th class="tableborder normalfont1 pinkbackground center p1 bold">Module Title</th>
            <!-- <th class="tableborder normalfont1 pinkbackground center p1 bold">Aspirant Name</th> -->
            <th class="tableborder normalfont1 pinkbackground center p1 bold">Start Date</th>
            <th class="tableborder normalfont1 pinkbackground center p1 bold">End time</th>
            <th class="tableborder normalfont1 pinkbackground center p1 bold">Paid/Free</th>
            <th class="tableborder normalfont1 pinkbackground center p1 bold">ModuleID</th>
            <th class="tableborder normalfont1 pinkbackground center p1 bold"></th>
            </tr>
            @foreach($PastModules as $Pastmoduleinfo)
                <?php //pre($Pastmoduleinfo);?>
            <tr style="text-align: center; justify-content: center; align-items: center; line-height: 2; font-weight: bolder;">
                <td>{{$Pastmoduleinfo->moduleTitle}}</td>
                <td>{{date("d-m-Y h:i",strtotime($Pastmoduleinfo->startDate))}}</td>
                <td>{{$Pastmoduleinfo->endDateTime}}</td>
                <td>{{$Pastmoduleinfo->price}}</td>
                <td>
                    <a class="bluebtn pl-4 pr-4 click_to_redirect_with_local" data_local="TrainingBtn" href="{{route('tmanageAspirant')}}">Issue Certificate</a>
                </td>   
            </tr>
            @endforeach
        </table>
        </div>
    @else
        <div class="alert alert-warning" style="margin-left: 16px;">No Past Modules Found....</div>
    @endif
        
      {{-- @if ($PastModules->count())
        @foreach($PastModules as $Pastmoduleinfo)
        <div class="col-md-4">
            <div class="card remove_br">

                <div class="card-header p-0 ">
                    <img src="/talent/trainer/assets/img/myprofile.png" width="100%" style="height: 150px;">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="card-title">{{$Pastmoduleinfo->moduleTitle}}</h4>
                            </div>
                            <div class="col-2">
                                <i class="pt-1 fa fa-bookmark right" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6"><i class="fa fa-archive" aria-hidden="true"></i> Session Type - {{$Pastmoduleinfo->sessiontype}}</div>
                            <div class="col-md-6"><i class="fa fa-television" aria-hidden="true"></i> Platform - {{$Pastmoduleinfo->ifLive}}</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6>First Session on</h6>
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-calendar" aria-hidden="true"></i> Start - {{$Pastmoduleinfo->startDate}}</div>
                        <div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> {{$Pastmoduleinfo->maxParticipantPerModule}} Seats remaining</div>
                        <div class="col-md-6"><i class="fa fa-clock-o" aria-hidden="true"></i> Start - {{date("h:i a",strtotime($Pastmoduleinfo->startDate))}}</div>
                    </div>
                    <br />
                    <h6>Last Session on</h6>
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-calendar" aria-hidden="true"></i> End - {{$Pastmoduleinfo->endDateTime}}</div>
                        <div class="col-md-6">Skills</div>
                    </div>
                    <div class="row">
                      
                        <!-- <div class="col-md-6">{{date("h:i a",strtotime($Pastmoduleinfo->startDate))}}</div> -->
                        <div class="col-md-6"><i class="fa fa-clock-o" aria-hidden="true"></i> Start - {{date("h:i a",strtotime($Pastmoduleinfo->endDateTime))}}</div>
						<div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i>{{$Pastmoduleinfo->skills}}</div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br />
                            <!-- <button class="bluebtn mr-2">Buy now</button> -->
                            <a class="bluebtn pl-4 pr-4" href="{{route('tmanageAspirant')}}">Issue Certificate</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-body">
                    <h6>First Session on</h6>
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i> {{$Pastmoduleinfo->startDate}}</div>
                        <div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> {{$Pastmoduleinfo->maxParticipantPerModule}} Seats remaining</div>
                    </div>
                    <br />
                    <h6>Next Session on</h6>
                    <div class="row">
                        <div class="col-md-6">Start Time</div>
                        <div class="col-md-6">End Time</div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">{{date("h:i a",strtotime($Pastmoduleinfo->startDate))}}</div>
						<div class="col-md-6">{{date("h:i a",strtotime($Pastmoduleinfo->endDateTime))}}</div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br />
                            <button class="bluebtn mr-2">Buy now</button> 
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-warning" style="margin-left: 16px;">No Past Modules Found....</div>
        @endif--}}

    </div>
</div>
<!---------------------------------------------------------------------------------------------------->


</div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h5>Are you sure wants to delete</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------Modal For Edit Form-------------------------------->
<div class="modal bd-example-modal-xl" id="edit-modal">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Module Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="{{url('update-module')}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="module_Id" id="module_Id" />
                <!-- <input type="text" name="module_Id" id="module_Id" /> -->

                <div class="card">
                    <div class="card-body">
                        <!-- CREATE MODULE -->
                        <div class="text-center p-5">
                            <!-- <button class="bluebtn pl-4 pr-4" id="createModuleBtn">+ CREATE MODULE </button> -->
                        </div>
                        <!-- MANAGE MODULE -->
                        <div class="form-group">
                            <h5>Type of Training</h5>
                            <select class="form-control" name="edittrainingType" id="edittrainingType">
                                <option value="">select the Type of training</option>
                                <option value="individual"> Individual </option>
                                <option value="corporate">Corporate</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>{{repalceWithMentor('Trainer')}} classification</h5>
                            <select class="form-control" name="edittrainingClassification" id="edittrainingClassification">
                                <option value="">select the classsification</option>
                                <option value="technical">Techinical </option>
                                <option value="softskill">Softskills</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Module Title</h5>
                            <input type="text" name="editmoduleTitle" id="editmoduleTitle" class="form-control">
                        </div>
                        <div class="form-group">
                            <h5>Total number of Days</h5>
                            <select class="form-control" name="edittotalDays" id="edittotalDays" onchange="changestarttimeForEdit();">
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-6"><label> Start Date and Time*</label></div>
                            <!-- <div class="col-3"><label> Start Date*</label></div> -->
                            <div class="col-3 d-none"><label> Start Time*</label></div>
                            <div class="col-3"><label> Time Zone*</label></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6"><input type="datetime-local" class="form-control" name="editstartDate" id="editstartDate" onchange="changestarttimeForEdit()"></div>
                            <div class="col-3 d-none"><input type="time" class="form-control" onchange="changestarttimeForEdit()" value="12:00 PM" name="editstarTime" id="editstarTime"></div>
                            <div class="col-3"><input type="text" class="form-control" placeholder="Time Zone" name="edittimeZone" id="edittimeZone"></div>
                        </div>
                        <div class="form-group">
                            <h5>Total time in minutes per day</h5>
                            <select class="form-control" name="edittimeInMinutesPerDay" id="edittimeInMinutesPerDay">
                                <option value="">Select your option</option>
                                <option value="45">45</option>
                                <option value="60">60</option>
                                <option value="120">120</option>
                                <option value="180">180</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Description</h5>
                            <input class="form-control" name="editmoduleDescription" id="editmoduleDescription">
                        </div>

                        <!--add skills start-->
        <div class="">
          <div class="mediumfont bold ">  </div> <br>
          <!-- <div class="normalfont2">Select all relevant skills of attendees/aspirant </div> -->
          <h5>Select all relevant skills for attendee/aspirant to enroll</h5>
          <!-- <textarea class="input2" type="text" name="inputSkils" id="inputSkills" placeholders="Name" ></textarea> -->
          <input class="input2" type="text" name="skills" id="editSkills" placeholders="Name"/> <br>
          <div class="row"> <br>
            <div class="col-lg-12" style="display: flex; flex-direction: row; flex-wrap: wrap;">
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="mhealthCare"> <i class="fa fa-bookmark" aria-hidden="true"></i> Health Care</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="mfinance"> <i class="fa fa-bookmark" aria-hidden="true"></i> Finance</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="mcyber"> <i class="fa fa-bookmark" aria-hidden="true"></i> Cyber Security</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="maiMl"> <i class="fa fa-bookmark" aria-hidden="true"></i> AI/ML/Web 3</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="mindustry"> <i class="fa fa-bookmark" aria-hidden="true"></i> Industrial</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="mlegalSkill"> <i class="fa fa-bookmark" aria-hidden="true"></i> Legal</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="msoftSkill"> <i class="fa fa-bookmark" aria-hidden="true"></i> Softskills</span>
            </div>
          </div> <br>
          <div class="normalfont2">Suggested Skills to add </div>
          <div class="ModelSkillitemsDiv">
            <div class="row helthcareItems" id="msubHealthCare"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-en    flex-wrap: wrap; ">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Nursing </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Welness</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Medicine</span>
              </div>
            </div>

            <div class="row" id="msubFinance"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Accounting </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Banking</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Insurance</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Trading & Investment</span>
              </div>
            </div>

            <div class="row" id="msubCyber"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  GRC & Privacy</span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Technology</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Awareness</span>
              </div>
            </div>

            <div class="row" id="msubAiMl"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  ML</span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Metaverse</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Blockchain</span>
              </div>
            </div>

            <div class="row" id="msubIndustry"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  SCM </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Shopfloor</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Industry 4.0</span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Construction</span>
              </div>
            </div>

            <div class="row" id="msubLegal"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Dispute Resolution </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Cyber Law </span>
              </div>
            </div>

            <div class="row" id="msubSofts"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Leadership </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Business Communication </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Report Writing </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Stress Management </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Time Management </span>&nbsp;
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Mental Health/Wellness </span>

                <div class="row" id="msubSofts">
                  <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Personality Development </span>&nbsp;
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Emotional Quotient </span>&nbsp;
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Presentation Skills </span>&nbsp;
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Customer Care/Excellence </span>&nbsp;
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                      Interpersonal Skills </span>&nbsp;
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> <br>
        <!--add skills end-->

                        <div class="form-group">
                            <h5>Level of Intensity</h5>
                            <!-- <input class="form-control"> -->
                            <select class="form-control" name="editintesityLevel" id="editintesityLevel">
                                <option value="">Select</option>
                                <option value="beginer">Beginer</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                            </select>
                        </div>

                        <h5>Session Type</h5>
                        <div class="form-group" id="sessiontype">
                            <select class="form-control" name="editsessiontype" id="editsessiontype">
                                <option value="">Select</option>
                                <option value="video">Recorded Video</option>
                                <option value="classroom">Physical Classroom</option>
                                <option value="live">Live Virtual</option>
                            </select>
                        </div>
                        <!-- <div class="collapse" id="sessiontype">
                        <div class="card card-body">
                            <div class="row">
                                <span class="whitebtn m-2" name="sessionTypeClassroom">Classroom</span>
                                <span class="whitebtn m-2" name="sessionTypeVideo">Recorded Video</span>
                                <span class="whitebtn m-2" name="sessionTypeLive">Live</span>
                            </div>
                        </div>
                    </div> -->
                        <div>
                            <select class="form-control" name="eidtifLive" id="editifLive">
                                <option value="">If Live - Platform details</option>
                                <option value="teams">Teams</option>
                                <option value="zoom">Zoom</option>
                                <option value="skype">Skype</option>
                                <option value="gmeet">Gmeet</option>
                                <option value="lms">LMS Integration</option>
                                <option value="youtubevideo">Video-Youtube</option>
                            </select>
                        </div><br>

                        <div class="form-group">
                            <h5> Language</h5>
                            <select class="form-control" name="editlanguages" id="editlanguages">
                                <option value="">Select</option>
                                <option value="english">English</option>
                                <option value="arabic">Arabic</option>
                                <option value="french">French</option>
                                <option value="spanish">Spanish</option>
                                <option value="hindi">Hindi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5> Duration of the module</h5>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><label> Start Date Time*</label></div>
                            <div class="col-3"><label> End Date Time*</label></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"><input name="editstartDateTime" id="editstartDateTime" type="text" class="form-control"  placeholder="DD/MM/YYYY Hr.Min"></div>
                            <div class="col-3"><input name="editendDateTime" id="editendDateTime" type="text" class="form-control" placeholder="DD/MM/YYYY Hr.Min"></div>
                        </div>
                        <div class="form-group">
                            <h5>Prework Requested</h5>
                            <select class="form-control" name="editprereqWork" id="editprereqWork">
                                <option value="">Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Maximum participants per module</h5>
                            <select class="form-control" name="editmaxParticipantPerModule" id="editmaxParticipantPerModule">
                                <option value="">Select</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Prework Reading - URL</h5>
                            <input class="form-control" name="editpreWorkURL" id="editpreWorkURL">
                        </div>
                        <div class="form-group">
                            <h5>Lesson Requirements from participants</h5>
                            <select class="form-control" name="editlessonRequirementForparti" id="editlessonRequirementForparti">
                                <option value="">Select</option>
                                <option value="laptop">Laptop</option>
                                <option value="mobile">Mobile</option>
                                <option value="physicalclass">Physical Class</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Trainee Handout</h5>
                            <select class="form-control" name="edittraineeHandouts" id="edittraineeHandouts">
                                <option value="">Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>URL to the LMS</h5>
                            <input class="form-control" style="width: 50%;" name="editlmsURL" id="editlmsURL">
                        </div>

                        <!-- Upload Handouts -->
                        <div class="p-4">
                            <h5> Upload Course work and Handouts</h5>
                            <div class="form-group inputDnD">
                                <input type="file" name="editcourseWorkHandoutUpload" class="form-control-file text-primary" id="editcourseWorkHandoutUpload" data-title="Drag &amp; Drop your files here" accept="application/msword, application/pdf">
                            </div>
                        </div>
                        <!-- Handouts End -->

                        <div class="p-4">
                            <h5> Upload Youtube Video introducing module and yourself</h5>
                            <div class="form-group inputDnD">
                                <input type="file" name="edityoutubeVideoUpload" class="form-control-file text-primary" id="edityoutubeVideoUpload" data-title="Drag &amp; Drop your files here" accept="application/msword, application/pdf">
                            </div>
                            <!-- Upload Jpeg -->
                            <div class="">
                                <h5> Upload your Jpeg for the Module</h5>
                                <div class="form-group inputDnD">
                                    <input type="file" name="editjpegUpload" class="form-control-file text-primary" id="editjpegUpload" data-title="Drag &amp; Drop your files here" accept="application/msword, application/pdf">
                                </div>
                            </div>
                            <!-- Jpeg End -->
                            <div class="text-center">
                                <button class="bluebtn pl-4 pr-4">Upload</button>
                            </div>
                            <div class="form-group">
                                <h5>Price</h5>
                                <select class="form-control" name="editprice" id="editpriceType" onchange="changeCurrency(this.value)">
                                    <option value="">Select</option>
                                    <option value="Free">Free</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                            <div class="form-group" id="currencyDiv">
                                <h5>Currency</h5>
                                <select class="form-control" name="editcurrency" id="editcurrency">
                                    <option value="">Select</option>
                                    <option value="inr">INR</option>
                                    <option value="usd">USD</option>
                                    <option value="aed">AED</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <h5>Amount</h5>
                                <input type="number" class="form-control" name="editamount" id="editamount">
                            </div>
                        </div>
                        <div class="form-group p-3 text-center">
                            <button type="submit" name="updatemodule" class="btn btn-dark" id="updatemodule">Update</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------->



@include('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
<!-- <script src="jquery-3.6.1.min.js"></script> -->
<script>
    function changeCurrency(value) {
        $('#createmoduledSave [name="currency"]').val("");
        $('#createmoduledSave [name="amount"]').val("");
        if (value == 'Free') 
        {
            $('.currencyDiv_jss').slideUp();
        } 
        else 
        {
            $('.currencyDiv_jss').slideDown();
        }
    }
    function changePrereqWork(value) {
        if (value == 'yes') 
        {
            $('.prereq_work_show_hide').slideDown();
            $('.prereq_work_show_hide [name="preWorkURL"]').prop("required", true);
        } 
        else 
        {
            $('.prereq_work_show_hide').slideUp();
            $('.prereq_work_show_hide [name="preWorkURL"]').prop("required", false);
        }
    }

    function changestarttime() {
        var totalDays = $("#totalDays").val();
        var startDate = $("#startDate").val();
        var ed = startDate.split("T")[0];
        var edd = new Date(ed);
        if(Number(totalDays) - 1 > 0)
        {
            var newed = moment(edd.setDate(new Date(ed).getDate() + (Number(totalDays) - 1))).format("YYYY-MM-DD");
        }
        else
        {
            var newed = moment(edd.setDate(new Date(ed).getDate())).format("YYYY-MM-DD");

        }
        
        if (totalDays != "" && startDate != "") 
        {
            var newsd = new Date(startDate);
            var valnewsd = newsd.getFullYear() + '-' + (newsd.getMonth() + 1) + '-' + newsd.getDate() + ' ' + newsd.getHours() + ':' + newsd.getMinutes();
            $('#startDateTime').val(moment(valnewsd).format("YYYY-MM-DD HH:mm"));
            
            const timeInMinutesPerDay = $('#createmoduledSave [name="timeInMinutesPerDay"]').val();
            let enddateSet = newed + ' ' + newsd.getHours() + ':' + newsd.getMinutes();
            if(timeInMinutesPerDay && timeInMinutesPerDay != '')
            {
                enddateSet = moment(enddateSet).add(timeInMinutesPerDay,'minutes').format("YYYY-MM-DD HH:mm");
            }
            $('#endDateTime').val(moment(enddateSet).format("YYYY-MM-DD HH:mm"));
        } else {}
    }

    function changestarttimeForEdit() {
        var totalDays = $("#edittotalDays").val();
        var startDate = $("#editstartDate").val();
        var ed = startDate.split("T")[0];
        var edd = new Date(ed);
        var newed = moment(edd.setDate(new Date(ed).getDate() + Number(totalDays))).format("YYYY-MM-DD")
        if (totalDays != "" && startDate != "") {
            var newsd = new Date(startDate);
            console.log(new Date(startDate));
            var valnewsd = newsd.getFullYear() + '-' + (newsd.getMonth() + 1) + '-' + newsd.getDate() + ' ' + newsd.getHours() + ':' + newsd.getMinutes();
            $('#editstartDateTime').val(valnewsd);
            $('#editendDateTime').val(newed + ' ' + newsd.getHours() + ':' + newsd.getMinutes());
        } else {}
    }


    $(document).ready(function() {

        
		$("body").on("click", ".upcoming_modules_page_css .download_module_details_btn_js", function(e){
			e.preventDefault();
			jQuery(".loder").show();
            var moduleId = $(this).attr("data-id");
            $this = $(this);
            // $.ajax({
            //     url: "{{route('trainingRemoveFromCart')}}",
            //     type: "POST",
            //     dataType: "json",
            //     data: {
            //         recorId : recorId,
            //         _token: "{{ csrf_token() }}",
            //     },
            //     success: function(response)
            //     {
            //         if(response.status)
            //         {
            //             alert_msg(1, response.msg);
            //             $this.closest("tr").remove();
            //         }
            //         else
            //         {
            //             alert_msg(0, response.msg);
            //         }
            //         jQuery(".loder").hide();
            //     },
            //     error: function(err)
            //     {
            //         err = err.responseJSON ? err.responseJSON : {};
            //         alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
            //         jQuery(".loder").hide();
            //     }
            // });
			
		});

        $("#createmoduledSave").submit(function(e){
			e.preventDefault();
			
            // const old_files = $(this).find('[name="youtubeVideoUpload_old"]').val();
            // if(!old_files || old_files == '')
            // {
            //     const files = $(this).find('[name="youtubeVideoUpload"]').prop('files');
            //     if(files.length == 0)
            //     {
            //         alert_msg(0, "Upload Youtube Video is required...!");
            //         return false;
            //     }
            // }
            
            // var files = $(this).find('[name="youtubeVideoUpload"]').prop('files');
			// if(files.length > 0 && (files[0].size / 1048576) > 1.5)
			// {
			// 	alert_msg(0, "The youtube video upload must not be greater than 1.5MB...!");
			// 	return;
			// }

            var files = $(this).find('[name="courseWorkHandoutUpload[]"]').prop('files');
            var courseWorkHandoutUpload_old = $(this).find('[name="courseWorkHandoutUpload_old"]').val();
			if(files.length > 0)
			{
                let showHandError = false;
                for (let i = 0; i < files.length; i++) {
                    if((files[i].size / 1048576) > 0.05)
                    {
                        showHandError = true;
                    }
                }
                if(showHandError)
                {
				    alert_msg(0, "The course work handout files must not be greater than 1.5MB...!");
				    return;
                }
			}
            else if(courseWorkHandoutUpload_old == '')
            {
                alert_msg(0, "The course work handout upload is required...!");
				return;
            }
            var files = $(this).find('[name="jpegUpload"]').prop('files');
			if(files.length > 0 && (files[0].size / 1048576) > 1.5)
			{
				alert_msg(0, "The jpeg upload must not be greater than 1.5MB...!");
				return;
			}

			jQuery(".loder").show();
			var data = new FormData(this);
			data.append("parent_skill", $(".parentskillBlockjss .activeSkillcss").attr("id"));
			var $this = $(this);
			$.ajax({
				url: "{{route('createmoduled')}}",
				type: "POST",
				dataType: "json",
				data: data,
				contentType: false,
				processData: false,
				success: function(response)
				{
					if(response.status)
					{
						alert_msg(1, response.msg);
						setTimeout(function(){
							//window.location.href = "{{route('tmyprofile')}}";
                            location.reload(true)
						}, 2000);
					}
					else
					{
						alert_msg(0, response.msg);
					}
					jQuery(".loder").hide();
				},
				error: function(err)
				{
					jQuery(".loder").hide();
					err = err.responseJSON ? err.responseJSON : {};
					alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
				}
			});
		});
        $(document).on('click', '.edit_on_modal', function() {
            
            $('#moduleCreationBtn').trigger("click");

            var module_Id = $(this).val();
            var data_type = $(this).attr("data_type");
            
            $(".loder").show();
            $.ajax({
                type: "Get",
                url: "/edit-module/" + module_Id,
                success: function(response)
                {
                    let responseModule = response.Module[0];

                    $('#createmoduledSave [name="module_creations_id"]').val(responseModule.module_Id);
                    $('#createmoduledSave [name="trainingType"]').val(responseModule.trainingType);
                    if(responseModule.trainingType == 'corporate')
                    {
                        $('#createmoduledSave .trainingType_select_corporate_jss').slideDown();

                        $('#createmoduledSave [name="name_of_customer"]').val(responseModule.name_of_customer);
                        $('#createmoduledSave [name="emailaddress_of_customer_contact"]').val(responseModule.emailaddress_of_customer_contact);
                        $('#createmoduledSave [name="fullname_of_customer_contact"]').val(responseModule.fullname_of_customer_contact);
                        $('#createmoduledSave [name="companyname_of_customer_contact"]').val(responseModule.companyname_of_customer_contact);
                        $('#createmoduledSave [name="designation_of_customer_contact"]').val(responseModule.designation_of_customer_contact);
                        $('#createmoduledSave [name="jobtype_of_customer_contact"]').val(responseModule.jobtype_of_customer_contact);
                    }
                    else
                    {
                        $('#createmoduledSave .trainingType_select_corporate_jss').slideUp();
                        
                        $('#createmoduledSave [name="name_of_customer"]').val('');
                        $('#createmoduledSave [name="emailaddress_of_customer_contact"]').val('');
                        $('#createmoduledSave [name="fullname_of_customer_contact"]').val('');
                        $('#createmoduledSave [name="companyname_of_customer_contact"]').val('');
                        $('#createmoduledSave [name="designation_of_customer_contact"]').val('');
                        $('#createmoduledSave [name="jobtype_of_customer_contact"]').val('');
                    }

                    $('#createmoduledSave [name="trainingClassification"]').val(responseModule.trainingClassification);
                    $('#createmoduledSave [name="moduleTitle"]').val(responseModule.moduleTitle);
                    $('#createmoduledSave [name="totalDays"]').val(responseModule.totalNoOfDays);
                    $('#createmoduledSave [name="startDate"]').val(responseModule.startDate);
                    $('#createmoduledSave [name="timeZone"]').val(responseModule.timeZone);
                    $('#createmoduledSave [name="timeInMinutesPerDay"]').val(responseModule.timeInMinutesPerDay ? responseModule.timeInMinutesPerDay : '');
                    $('#createmoduledSave [name="moduleDescription"]').val(responseModule.moduleDescription);
                    $('#createmoduledSave [name="mskills"]').val(responseModule.skills);
                    
                    $('#createmoduledSave [name="intesityLevel"]').val(responseModule.intesityLevel);
                    $('#createmoduledSave [name="sessiontype"]').val(responseModule.sessiontype);
                    $('#createmoduledSave [name="sessiontype"]').trigger("change");

                    $('#createmoduledSave [name="ifLive"]').val(responseModule.ifLive);
                    $('#createmoduledSave [name="ifLive"]').trigger("change");

                    $('#createmoduledSave [name="lmsURL"]').val(responseModule.lmsURL);
                    $('#createmoduledSave [name="languages"]').val(responseModule.languages);
                    $('#createmoduledSave [name="startDateTimes"]').val(responseModule.startDateTime);
                    $('#createmoduledSave [name="endDateTimes"]').val(responseModule.endDateTime);
                    $('#createmoduledSave [name="prereqWork"]').val(responseModule.prereqWork);
                    $('#createmoduledSave [name="prereqWork"]').trigger("change");
                    $('#createmoduledSave [name="maxParticipantPerModule"]').val(responseModule.maxParticipantPerModule);
                    $('#createmoduledSave [name="preWorkURL"]').val(responseModule.preWorkURL);
                    //responseModule.lessonRequirementForparti
                    $('#createmoduledSave [name="lessonRequirementForparti[]"]').val(responseModule.lessonRequirementForparti);

                    if(responseModule.lessonRequirementForparti)
                    {
                        let lessonRequirementForparti = JSON.parse(responseModule.lessonRequirementForparti);
                        $.each(lessonRequirementForparti, function (i, items) {
                            $('#createmoduledSave [name="lessonRequirementForparti[]"] [value="'+items+'"]').prop("selected", true);
                        });
                    }

                    $('#createmoduledSave [name="traineeHandouts"]').val(responseModule.traineeHandouts);
                    
                    if(responseModule.courseWorkHandoutUpload)
                    {
                        $('#createmoduledSave [name="courseWorkHandoutUpload[]"]').attr("data-title",responseModule.courseWorkHandoutUpload);
                    }
                    else
                    {
                        $('#createmoduledSave [name="courseWorkHandoutUpload[]"]').attr("data-title","Drag & Drop your files here");
                    }
                    $('#createmoduledSave [name="courseWorkHandoutUpload_old"]').val(responseModule.courseWorkHandoutUpload);

                    $('#createmoduledSave [name="youtubeVideoUpload"]').val(responseModule.youtubeVideoUpload);
                    // if(responseModule.youtubeVideoUpload)
                    // {
                    //     $('#createmoduledSave [name="youtubeVideoUpload"]').attr("data-title",responseModule.youtubeVideoUpload);
                    // }
                    // else
                    // {
                    //     $('#createmoduledSave [name="youtubeVideoUpload"]').attr("data-title","Drag & Drop your files here");
                    // }
                    // $('#createmoduledSave [name="youtubeVideoUpload_old"]').val(responseModule.youtubeVideoUpload);
                    // $('#createmoduledSave [name="youtubeVideoUpload"]').prop("required", false);

                    if(responseModule.jpegUpload)
                    {
                        $('#createmoduledSave [name="jpegUpload"]').attr("data-title",responseModule.jpegUpload);
                    }
                    else
                    {
                        $('#createmoduledSave [name="jpegUpload"]').attr("data-title","Drag & Drop your files here");
                    }
                    $('#createmoduledSave [name="jpegUpload_old"]').val(responseModule.jpegUpload);

                    $('#createmoduledSave [name="price"]').val(responseModule.price);
                    $('#createmoduledSave [name="price"]').trigger("change");
                    if(responseModule.price == 'Paid' || responseModule.price == 'paid')
                    {
                        $('#createmoduledSave [name="currency"]').val(responseModule.currency);
                        $('#createmoduledSave [name="amount"]').val(responseModule.amount);
                    }
                    $('#createmoduledSave [name="createmoduled"]').html("Update");

                    if(data_type && data_type == 'deleted')
                    {
                        $('#createmoduledSave [name="startDate"]').val('');
                    }
                    $('#createmoduledSave [name="total_seat_by_module"]').val(responseModule.total_seat_by_module);
                    
                    if(responseModule.total_seat_by_module != responseModule.maxParticipantPerModule)
                    {
                        $('#createmoduledSave .module_element_not_able_to_edit_jss').addClass("pointer-none-css-of-jss")
                    }
                    else
                    {
                        $('#createmoduledSave .module_element_not_able_to_edit_jss').removeClass("pointer-none-css-of-jss")
                    }
                    $('html,body').animate({scrollTop: 820},'slow');
                    $(".loder").hide();
                }
            });
        });
        $(document).on('click', '#editOnModal', function() {
            var module_Id = $(this).val();
            // console.log(module_Id);
            $('#edit-modal').modal('show');

            $.ajax({
                type: "Get",
                url: "/edit-module/" + module_Id,
                success: function(response) {
                    console.log(response.Module[0].totalNoOfDays);
                    $('#module_Id').val(response.Module[0].module_Id);
                    $('#edittrainingType').val(response.Module[0].trainingType);
                    $('#edittrainingClassification').val(response.Module[0].trainingClassification);
                    $('#editmoduleTitle').val(response.Module[0].moduleTitle);
                    $('#edittotalDays').val(response.Module[0].totalNoOfDays);
                    $('#editstartDate').val(response.Module[0].startDate);
                    $('#editstarTime').val(response.Module[0].starTime);
                    $('#edittimeZone').val(response.Module[0].timeZone);
                    $('#edittimeInMinutesPerDay').val(response.Module[0].timeInMinutesPerDay);
                    $('#editmoduleDescription').val(response.Module[0].moduleDescription);
                    $('#editSkills').val(response.Module[0].skills);
                    $('#editintesityLevel').val(response.Module[0].intesityLevel);
                    $('#editsessiontype').val(response.Module[0].sessiontype);
                    $('#editifLive').val(response.Module[0].ifLive);
                    $('#editlanguages').val(response.Module[0].languages);
                    $('#editstartDateTime').val(response.Module[0].startDateTime);
                    $('#editendDateTime').val(response.Module[0].endDateTime);
                    $('#editprereqWork').val(response.Module[0].prereqWork);
                    $('#editmaxParticipantPerModule').val(response.Module[0].maxParticipantPerModule);
                    $('#editpreWorkURL').val(response.Module[0].preWorkURL);
                    $('#editlessonRequirementForparti').val(response.Module[0].lessonRequirementForparti);
                    $('#edittraineeHandouts').val(response.Module[0].traineeHandouts);
                    $('#editlmsURL').val(response.Module[0].lmsURL);
                    $('#editcourseWorkHandoutUpload').val(response.Module[0].courseWorkHandoutUpload);
                    $('#edityoutubeVideoUpload').val(response.Module[0].youtubeVideoUpload);
                    $('#editjpegUpload').val(response.Module[0].jpegUpload);
                    $('#editprice').val(response.Module[0].price);
                    $('#editcurrency').val(response.Module[0].currency);
                    $('#editamount').val(response.Module[0].amount);


                    // console.log(response.Module[0].moduleTitle);
                    valll = $('#editmoduleTitle').text();
                    console.log(valll);
                }
            });
        });

        $(document).on('change', '.trainingType_select_js', function() {
            var trainingType = $(this).val();
            if(trainingType == 'corporate')
            {
                $(".trainingType_select_corporate_jss").slideDown();
            }
            else
            {
                $(".trainingType_select_corporate_jss").slideUp();
            }
        });
        $(document).on('click', '.remove_selection', function() {
            $(".upload_default_module_img_css li input").prop("checked", false);
        });
        $(document).on('change', '.sessiontype_select_jss', function() {
            var sessiontype_val = $(this).val();
            $(".sessiontype_message_js").hide();
            if(sessiontype_val != 'live')
            {
                $(".ifLive_select_jss").slideUp();
                $(".url_to_the_lms_jss").slideUp();
                if(sessiontype_val == 'classroom')
                {
                    $(".sessiontype_classroom_message_js").show();
                }
                else if(sessiontype_val == 'video')
                {
                    $(".sessiontype_video_message_js").show();
                }
            }
            else
            {
                $(".ifLive_select_jss").slideDown();
                $(".ifLive_select_jss").trigger("change");
            }
        });

        $(document).on('change', '.ifLive_select_jss', function() {
            var ifLive_select = $(this).val();
            
            if(ifLive_select == 'lms' || ifLive_select == 'teams' || ifLive_select == 'zoom' || ifLive_select == 'gmeet')
            {
                // url_to_the_data
                $(".url_to_the_data").html("URL to the "+ifLive_select.toUpperCase());
                $(".url_to_the_lms_jss").slideDown();
            }
            else
            {
                $(".url_to_the_lms_jss").slideUp();
            }
        });

        $("body").on('change', '.documentUpload_js', function(e){
            e.preventDefault();
            var data_text = $(this).attr("data_text");
            if(!data_text || data_text == '')
            {
                data_text = 'Drag & Drop your files here';
            }
            if(e.target.files.length > 0)
            {
                for(i = 0; i < e.target.files.length; i++)
                {
                    if(i == 0)
                    {
                        $(this).attr("data-title", e.target.files[0].name);
                    }
                    else
                    {
                        $(this).attr("data-title", $(this).attr("data-title") + ',' + e.target.files[i].name);
                    }
                }
            }
            else
            {
                $(this).attr("data-title", data_text);
            }
        });
        $("body").on('click', '.click_to_redirect_with_local', function(e){
            e.preventDefault();
            const data_local = $(this).attr("data_local");
            const data_href = $(this).attr("href");
            if(data_local)
            {
                localStorage.setItem("activeDataLocal", data_local);
            }
            if(data_href != '')
            {
                window.location.href = data_href;
            }
        });

        $('#UpcomingModulesPage').hide();
        $('#manageModulePage').show();
        $('#Modulecard').hide();
        $('#DeletedModulesPage').hide();
        $('#PastModulesPage').hide();
        $('#createModuleBtn').click(function() {
            location.reload();
        });

        $('#addCards').click(function() {
            var valueTitle = $('#ModuleTitle').val();
            $('#ModuleT').html(valueTitle);
            $('#Modulecard').slideDown();
        });
        $('#deleteCard').click(function() {
            $('#Modulecard').hide();
        });

        $('#upcomingModuleButton').click(function() {
            $('#UpcomingModulesPage').slideDown();
            $('#DeletedModulesPage').hide();
            // $('#UpcomingHeadings').html('Upcoming Modules');
            $('#manageModulePage').hide();
            $('#PastModulesPage').hide();
        });

        $('#moduleCreationBtn').click(function() {
            $('#UpcomingModulesPage').hide();
            $('#DeletedModulesPage').hide();
            $('#manageModulePage').show();
            $('#PastModulesPage').hide();
        });

        $('#DeletedModuleButton').click(function() {
            $('#DeletedModulesPage').slideDown();
            $('#UpcomingModulesPage').hide();
            // $('#UpcomingHeadings').html('Deleted Modules');
            $('#manageModulePage').hide();
            $('#PastModulesPage').hide();
        });

        $('#PastModuleButton').click(function() {
            $('#UpcomingModulesPage').hide();
            $('#PastModulesPage').slideDown();
            $('#DeletedModulesPage').hide();
            // $('#UpcomingHeadings').html('Past Modules');
            $('#manageModulePage').hide();
        });

        var valifLive_select = $('.ifLive_select_jss').val();
        var valPriceTypeFr = $('#priceType').val();
        //valPriceTypePay = $('#priceType').val('Free');

        $('#createmoduledSave [name="currency"]').val("");
        $('#createmoduledSave [name="amount"]').val("");
        if (valPriceTypeFr == 'Free' || valPriceTypeFr == '') 
        {
            //$('#currencyDiv').hide();
            $('.currencyDiv_jss').slideUp();
        }
        else
        {
            $('.currencyDiv_jss').slideDown();
        }
        // if (valPriceTypePay) 
        // {
        //    // $('#currencyDiv').slideDown();
        //     $('.currencyDiv_jss').slideDown();
        // }
        
        if(valifLive_select == 'lms')
        {
            $(".url_to_the_lms_jss").slideDown();
        }
        else
        {
            $(".url_to_the_lms_jss").slideUp();
        }
            
        $('#moduleCreationBtn').addClass('bluebtn');
        $(".modulesbtnsDiv button").on("click", function() {
			$(".modulesbtnsDiv button").removeClass("bluebtn");
			$(this).addClass("bluebtn");
		});

    $("#subHealthCare").hide();
    $("#subFinance").hide();
    $("#subCyber").hide();
    $("#subAiMl").hide();
    $("#subIndustry").hide();
    $("#subLegal").hide();
    $("#subSofts").hide();
    var selected_idMain = '{{$trainer_Data["parent_skill"] ? $trainer_Data["parent_skill"] : '' }}';
    if(selected_idMain)
    {
        selected_idMain = selected_idMain.charAt(0).toUpperCase() + selected_idMain.slice(1);
        $("#sub"+selected_idMain).show();
    }

    $("#healthCare").click(function() {
      $("#subHealthCare").show();
      $("#subFinance").hide();
      $("#subCyber").hide();
      $("#subAiMl").hide();
      $("#subIndustry").hide();
      $("#subLegal").hide();
      $("#subSofts").hide();
    });

    $("#finance").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").show();
      $("#subCyber").hide();
      $("#subAiMl").hide();
      $("#subIndustry").hide();
      $("#subLegal").hide();
      $("#subSofts").hide();
    });

    $("#cyber").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").hide();
      $("#subCyber").show();
      $("#subAiMl").hide();
      $("#subIndustry").hide();
      $("#subLegal").hide();
      $("#subSofts").hide();
    });

    $("#aiMl").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").hide();
      $("#subCyber").hide();
      $("#subAiMl").show();
      $("#subIndustry").hide();
      $("#subLegal").hide();
      $("#subSofts").hide();
    });


    $("#industry").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").hide();
      $("#subCyber").hide();
      $("#subAiMl").hide();
      $("#subIndustry").show();
      $("#subLegal").hide();
      $("#subSofts").hide();
    });

    $("#softSkill").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").hide();
      $("#subCyber").hide();
      $("#subAiMl").hide();
      $("#subIndustry").hide();
      $("#subLegal").hide();
      $("#subSofts").slideDown();
    });

    $("#legalSkill").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").hide();
      $("#subCyber").hide();
      $("#subAiMl").hide();
      $("#subIndustry").hide();
      $("#subLegal").slideDown();
      $("#subSofts").hide();
    });


    // Jquery Script for Model Skills Elements starts --------------------------------

    $("#msubHealthCare").hide();
    $("#msubFinance").hide();
    $("#msubCyber").hide();
    $("#msubAiMl").hide();
    $("#msubIndustry").hide();
    $("#msubLegal").hide();
    $("#msubSofts").hide();


    $("#mhealthCare").click(function() {
      $("#msubHealthCare").show();
      $("#msubFinance").hide();
      $("#msubCyber").hide();
      $("#msubAiMl").hide();
      $("#msubIndustry").hide();
      $("#msubLegal").hide();
      $("#msubSofts").hide();
    });

    $("#mfinance").click(function() {
      $("#msubHealthCare").hide();
      $("#msubFinance").show();
      $("#msubCyber").hide();
      $("#msubAiMl").hide();
      $("#msubIndustry").hide();
      $("#msubLegal").hide();
      $("#msubSofts").hide();
    });

    $("#mcyber").click(function() {
      $("#msubHealthCare").hide();
      $("#msubFinance").hide();
      $("#msubCyber").show();
      $("#msubAiMl").hide();
      $("#msubIndustry").hide();
      $("#msubLegal").hide();
      $("#msubSofts").hide();
    });

    $("#maiMl").click(function() {
      $("#msubHealthCare").hide();
      $("#msubFinance").hide();
      $("#msubCyber").hide();
      $("#msubAiMl").show();
      $("#msubIndustry").hide();
      $("#msubLegal").hide();
      $("#msubSofts").hide();
    });


    $("#mindustry").click(function() {
      $("#msubHealthCare").hide();
      $("#msubFinance").hide();
      $("#msubCyber").hide();
      $("#msubAiMl").hide();
      $("#msubIndustry").show();
      $("#msubLegal").hide();
      $("#msubSofts").hide();
    });

    $("#msoftSkill").click(function() {
      $("#msubHealthCare").hide();
      $("#msubFinance").hide();
      $("#msubCyber").hide();
      $("#msubAiMl").hide();
      $("#msubIndustry").hide();
      $("#msubLegal").hide();
      $("#msubSofts").slideDown();
    });

    $("#mlegalSkill").click(function() {
      $("#msubHealthCare").hide();
      $("#msubFinance").hide();
      $("#msubCyber").hide();
      $("#msubAiMl").hide();
      $("#msubIndustry").hide();
      $("#msubLegal").slideDown();
      $("#msubSofts").hide();
    });

    // Model skills script end here ---------------------------------------------------



    $("#workExp").hide();
    $("#ProfessionalButton").click(function() {
      $("#workExp").show();
    });
    $("#StudentButton").click(function() {
      $("#workExp").hide();
    });


    $(function() {
      $('.SkillitemsDiv span').click(function() {
        var value = $(this).text().trim();
        var input = $('#inputSkills');
        var inputVal = $('#inputSkills').val();
        if(!inputVal.includes(value))
        {
            input.val(input.val() + value + ',');
        }
        return false;
      });
    });

    $(function() {
      $('.ModelSkillitemsDiv span').click(function() {
        var value = $(this).text();
        var input = $('#editSkills');
        input.val(input.val() + value + ',');
        return false;
      });

      $('#createmoduledSave [name="total_seat_by_module"]').change(function() {
        var max_seat = $(this).val();
        $(this).closest("form").find('[name="maxParticipantPerModule"]').val(max_seat);
        $(this).closest("form").find('[name="maxParticipantPerModule"]').attr("max",max_seat); 
        $(this).closest("form").find('[name="maxParticipantPerModule"]').attr("min",1); 
      });

    });

    });
  
</script>