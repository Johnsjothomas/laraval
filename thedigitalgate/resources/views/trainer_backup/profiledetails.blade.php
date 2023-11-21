@include('header')
@include('trainer.navigation')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/suggestags@1.27.0/css/amsify.suggestags.min.css">
<script src="https://cdn.jsdelivr.net/npm/suggestags@1.27.0/js/jquery.amsify.suggestags.min.js"></script>



<style>
html {
  scroll-behavior: smooth;
}
.clone_data_class + .clone_data_class {
  border-top: 5px solid #ccc;
  padding-top: 10px;
}
.delete_this_clone, .delete_this_tr {
    color: #ff0000;
    font-size: 22px;
  cursor: pointer;
}
.greenblock.active {
    background-color: #FC6717;
}
.table thead th {
    text-align: center;
}
.blueblock
{
  margin-right: 4px;
}
.capitilize_text_css
{
  text-transform: capitalize;
}
.sticky-sidebar {
    position: -webkit-sticky;
    position: sticky;
    top: 0px;
    z-index: 1000;
}
</style>

<script type="text/javascript">
  console.log("type.....");
  var usr = 'usr_type_9';
  //get details api
  var type = sessionStorage.getItem("type");
  var access_token = sessionStorage.getItem("access_token");
  var user_id = sessionStorage.getItem("user_id");
  
  console.log("type.....", access_token);
  
  /* if(type=='C')
  {
    $usr='usr_type_8';
  }
     else
     {
       $usr='usr_type_9';
      }*/
      var auth = type + access_token;
  $.ajax({
    type: "GET",
    headers: {
      "Accept": "application/json",
      "Authorization": auth
    },
    
    contentType: 'application/json',
    url: 'https://cors-anywhere.herokuapp.com/' + 'https://stg3.hooperlabs.com/capi/crud/' + usr + '/read/' + user_id,
    success: function(response) {
      console.log("success access_token.......", response);
      location.href = "/talent/selectfrom";
    },
    error: function(e) {
      console.log('Error In Login AJAX...', e);
    }
  });
</script>


<div class="">
  @include('trainer.submenu')
  
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
      <!-- sidebar code -->
      <div class="sticky-sidebar">
        <div class="row">
          <div class="col">
      <div class="graybackground">
        <center>
          <div class="profile-pic-wrapper pt-3">
            <div class="pic-holder center">
              <!-- uploaded pic shown here -->
              <img id="profilePic" class="pic" src="{{setProfilePic($loggedInUser[0]->profile_pic)}}">

              <label for="newProfilePhoto" class="upload-file-block">
                <div class="text-center">
                  <div class="mb-2">
                    <i class="fa fa-camera fa-2x"></i>
                  </div>
                </div>
              </label>
              <Input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="display: none;" />
            </div>
          </div>

          <h3>{{session()->get('FirstName')}}</h3>

        </center>
        <center>
          <ul style="padding-inline-end: 40px;">
            <li class="p1" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none;font-size:14px"> <a href="#sec_designation">Enter your designation</a></li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec_about_us">About you</a></li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec_skills">Skills</a></li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec_work_exp">Work Experience</a></li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#EducationDiv">Education</a></li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec_certificate">Certification</a></li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a  href="#AnyAdditionalSpecialization">Additonal information</a></li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec_language">Languages</a></li>
            <li class="p5" style="list-style: none"><a href="#sec_resume">Resume</a></li>
            <br>

          </ul>
        </center>
      </div>
    </div>
  </div>
      </div>
      <!-- sidebar code end -->


      </div>
      <div class="col-md-10">
        <!-- Profile Details code   -->
        

        <div class="ml-5 mr-5">
      <form action="{{route('tprofilesave')}}" method="POST" id="trainer_details_save">
        @csrf
        <br><br>
        <div class="mediumfont bold " id="sec_designation"> Your profile </div> <br>
        <div class="progress " style="height:10px">
          <div class="progress-bar" role="progressbar" style="width:85%;background-color: #1F1B45" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
            <span class="progress-bar-number"></span>
          </div>
        </div>
        <br><br>
        <!--build your profile end-->

        <div class="mb_15">
          <div class="mediumfont bold heading1"> Salutation</div>
          <!-- <textarea class="input11" type="text" name="designation" placeholders="Enter your designation" >{{ old('designation',(isset($data->Designation))? $data->Designation : '')}}</textarea>
              @error('designation')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror -->
          <select class="input11" name="salutationName">
            <option value="">Select Salutation</option>
            <option <?php if ($loggedInUser[0]->salutation == "Mr.") {
              echo "selected";
                    } ?> value="Mr.">Mr.</option>
            <option <?php if ($loggedInUser[0]->salutation == "Ms.") {
              echo "selected";
                    } ?> value="Ms.">Ms.</option>
            <option <?php if ($loggedInUser[0]->salutation == "Dr.") {
                      echo "selected";
                    } ?> value="Dr.">Dr.</option>
            <option <?php if ($loggedInUser[0]->salutation == "Eng.") {
                      echo "selected";
                    } ?> value="Eng.">Eng.</option>
          </select>
          
        </div>
        
        <!--about you start-->
        <div class="">
          <div class="mediumfont bold " id="sec_about_us"> About you </div> <br>
          <div class="normalfont2">Write your profile summary </div>
          <textarea class="input11" type="text" name="aboutYouName" placeholders="Name">{{$loggedInUser[0]->about_you}}</textarea>
        </div> <br><br>
        <!--about you end-->
        <div>
          <div class="normalfont2">Designation / Profile Description</div>
          <input class="input2" type="text" name="profileDescName" placeholders="Name" value="{{$loggedInUser[0]->role}}" />
        </div><br>
        <!--add skills start-->
        <div class="">
          <div class="mediumfont bold " id="sec_skills"> Add skills </div> <br>
          <div class="normalfont2">Add skills to your profile </div>
          <!-- <textarea class="input2" type="text" name="inputSkils" id="inputSkills" placeholders="Name" >{{$loggedInUser[0]->skills}}</textarea> -->
          <input class="input2" type="text" name="inputSkilsName" id="inputSkills" placeholders="Name" value="{{$loggedInUser[0]->skills}}" readonly /> <br>
          <div class="row"> <br>
          <div class="col-lg-12" style="display: flex; flex-direction: row; flex-wrap: wrap;">
            @php
                $greenBlockArray = array(
                  "healthCare"	=> "Health Care",
                  "finance"		=> "Finance",
                  "cyber"			=> "Cyber Security",
                  "aiMl"			=> "AI/ML/Web 3",
                  "industry"		=> "Industrial",
                  "legalSkill"	=> "Legal",
                  "softSkill"		=> "Soft skills"
                );
            @endphp
            @foreach ($greenBlockArray as $key => $item)
              <span class="greenblock parent_skill_js {{($key == $loggedInUser[0]->parent_skill ? 'active' : '')}}" id="{{$key}}" data-name="{{$item}}"> <i class="fa fa-bookmark" aria-hidden="true"></i> {{$item}}</span>
            @endforeach
            {{-- <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="healthCare"> <i class="fa fa-bookmark" aria-hidden="true"></i> Health Care</span>
            <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="finance"> <i class="fa fa-bookmark" aria-hidden="true"></i> Finance</span>
            <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="cyber"> <i class="fa fa-bookmark" aria-hidden="true"></i> Cyber Security</span>
            <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="aiMl"> <i class="fa fa-bookmark" aria-hidden="true"></i> AI/ML/Web 3</span>
            <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="industry"> <i class="fa fa-bookmark" aria-hidden="true"></i> Industrial</span>
            <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="legalSkill"> <i class="fa fa-bookmark" aria-hidden="true"></i> Legal</span>
              <span class="greenblock" style="margin: 10px 10px 3px 0px; border-radius: 5px;" id="softSkill"> <i class="fa fa-bookmark" aria-hidden="true"></i> Softskills</span> --}}
            </div>
          </div> <br>
          <div class="normalfont2">Suggested Skills to add </div>
          <div class="SkillitemsDiv">
            <div class="row helthcareItems" id="subHealthCare"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-en    flex-wrap: wrap; ">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                Nursing </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                Welness</span>
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Medicine</span>
              </div>
            </div>
            
            <div class="row" id="subFinance"> <br>
            <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Accounting </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                Banking</span>
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Insurance</span>
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Trading & Investment</span>
              </div>
            </div>

            <div class="row" id="subCyber"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  GRC & Privacy</span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                Technology</span>
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Awareness</span>
              </div>
            </div>
            
            <div class="row" id="subAiMl"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                  ML</span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                Metaverse</span>
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                Blockchain</span>
              </div>
            </div>
            
            <div class="row" id="subIndustry"> <br>
            <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                SCM </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                Shopfloor</span>
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                Industry 4.0</span>
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                Construction</span>
              </div>
            </div>

            <div class="row" id="subLegalSkill"> <br>
              <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;">
                <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                Dispute Resolution </span>&nbsp;
                <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                  Cyber Law </span>
              </div>
            </div>

            <div class="row" id="subSoftSkill"> <br>
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
                
                {{-- <div class="row" id="subSofts">
                  <div style="padding: 2%; display: flex;align-content: space-between;justify-content: flex-start;align-items: flex-end;flex-wrap: wrap;"> --}}
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
                  {{-- </div>
                </div> --}}
              </div>
            </div>
          </div>

        </div> <br>
        <!--add skills end-->
        
        <!--add skills start-->
        <div class="">
          <div class="normalfont2">Linkedin*</div>
          <input class="input2" type="text" name="linkedinURLName" placeholders="Enter your Linkedin URL" value="{{$loggedInUser[0]->linkedin_url}}" required /> <br><br>
          <div class="row pt-3"> <br>
          <?php //pre($loggedInUser[0]->parent_skill);?>
          @if($loggedInUser[0]->trainer_type == 'Technical')
            {{-- <button type="button" class="bluebtn mr-2">I’m a Technical {{repalceWithMentor('Trainer')}}</button> --}}
          @else
          {{-- <span class="bluebtn imsoftskilltrain" {{@$loggedInUser[0]->parent_skill != 'softSkill' ? 'style=display:none;' : ''}}>I’m a Soft Skills {{repalceWithMentor('Trainer')}}</span> --}}
          @endif
          <span class="bluebtn capitilize_text_css skillactive_type_show_jss" >I’m a <span> {{@$greenBlockArray[$loggedInUser[0]->parent_skill]}}</span>  {{repalceWithMentor('Trainer')}}</span>
        </div> <br>
        <div class="mediumfont bold" id="sec_work_exp">Top three modules that you have trained on<sup>*</sup><span style="font-size: 19px;">(must fill this)</span></div><br>
        @php
          $modulear = json_decode($loggedInUser[0]->modules);
          $moduleDeliver = json_decode($loggedInUser[0]->companies_deliver_at);
          $noOfSessionName = json_decode($loggedInUser[0]->no_of_session_name);
        @endphp
       
          <table class="table table-bordered" id="top_three_mod">
            <thead>
              <tr style="color: #15284C;background: #F6F6F6;">
                <th>Name of the Modules</th>
                <th>Name of the companies delivered at</th>
                <th>Total number of sessions delivered per module</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if ($modulear)
                @foreach($modulear as $key => $mod)
                  <tr>
                    <td>
                      <input class="input2" type="text" name="modulesName[]" placeholders="Module Name" value="{{$mod}}" required/>
                    </td>
                    <td>
                      <input class="input2" type="text" name="companiesDeliverName[]" placeholders="Companies Deliver at" value="{{@$moduleDeliver[$key]}}" required />
                    </td>
                    <td>
                      <input class="input2" type="number" name="noOfSessionName[]" placeholders="No. of Sessions Deliver" value="{{@$noOfSessionName[$key]}}" required />
                    </td>
                    <td>
                      <i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>
                    </td>
                  </tr>
                @endforeach
              @else
              @for($modulear_start = 0; $modulear_start < 3; $modulear_start++)
                  <tr>
                    <td>
                      <input class="input2" type="text" name="modulesName[]" placeholders="Module Name"  required />
                    </td>
                    <td>
                      <input class="input2" type="text" name="companiesDeliverName[]" placeholders="Companies Deliver at" required />
                    </td>
                    <td>
                      <input class="input2" type="number" name="noOfSessionName[]" placeholders="No. of Sessions Deliver" required />
                    </td>
                    <td>
                      <i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>
                    </td>
                  </tr>
                @endfor
              @endif
            </tbody>
          </table>
          <div class="text-center">
            <button onclick="addModuleRow()" type="button" class="bluebtn pl-4 pr-4">Add</button>
          </div>
          <br><br>

          {{-- <div class="normalfont2">Details of other modules/topics you would like to deliver (4-20)</div>
            @php
              $modulearr = json_decode($loggedInUser[0]->details_other_module);
            @endphp
          @foreach($modulearr as $ma)
          <input class="input2" type="text" value="{{$ma}}" name="other_modules[]" style="margin:5px;" placeholders="Enter your details" />
          @endforeach
          <div id="otherModuleWrapper">
            </div>
          <div class="text-center">
          <button onclick="addOtherModuleRow()" type="button" class="bluebtn pl-4 pr-4">Add</button></div>
          <br><br> --}}

          <div class="normalfont2">Total number of relevant training delivery experience in years</div>
          <input class="input2" type="number" name="totalRelExperienceName" placeholders="Enter your details" value="{{$loggedInUser[0]->relevant_module_experience}}" /> <br><br>
          <div class="normalfont2">Total years of work experience</div>
          <input class="input2" type="number" name="totalEaxperienceName" placeholders="Enter your details" value="{{$loggedInUser[0]->total_experience}}" />
          <br><br>
          <div class="normalfont2">Preferred online platform</div>
          <?php $onlineplatformarr = ($loggedInUser[0]->preferred_online_platform == "") ? [] : json_decode($loggedInUser[0]->preferred_online_platform); ?>
          <div class="row">
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="checkPreferPlatformName[]" value="zoom" id="zooms" <?php if (in_array("zoom",$onlineplatformarr)) { echo "checked"; } ?>>
              <label for="zooms"> Zoom</label>
            </div>
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="checkPreferPlatformName[]" value="teams" id="teamss" <?php if (in_array("teams",$onlineplatformarr)) { echo "checked"; } ?>>
              <label for="teamss"> Teams</label>
            </div>
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="checkPreferPlatformName[]" value="skype" id="skyps" <?php if (in_array("skype",$onlineplatformarr)) { echo "checked"; } ?>>
              <label for="skyps"> Skype</label>
            </div>
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="checkPreferPlatformName[]" value="level3" id="level3s" <?php if (in_array("level3",$onlineplatformarr)) { echo "checked"; } ?>>
              <label for="level3s">Level 3</label>
              <?php if ($loggedInUser[0]->preferred_online_platform == "level3") {echo "checked";} ?>
            </div>
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="checkPreferPlatformName[]" value="gmeet" id="gmeets" <?php if (in_array("gmeet",$onlineplatformarr)) { echo "checked"; } ?>>
              <label for="gmeets"> G meets</label>
            </div>
          </div>
          <br><br>
          <div class="normalfont2">Current equipment used for online training</div>
          <?php $equipment = ($loggedInUser[0]->equipment_for_training == "") ? [] : json_decode($loggedInUser[0]->equipment_for_training); ?>
          <div class="row">
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="equipName[]" value="laptop" id="laptops" <?php if (in_array("laptop",$equipment)) { echo "checked"; } ?>>
              <label for="laptops"> Laptop</label>
            </div>
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="equipName[]" value="camera" id="cameras" <?php if (in_array("camera",$equipment)) { echo "checked"; } ?>>
              <label for="cameras"> Camera</label>
            </div>
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="equipName[]" value="lightning" id="lightnings" <?php if (in_array("lightning",$equipment)) { echo "checked"; } ?>>
              <label for="lightnings"> Lighting</label>
            </div>
          </div>
          <br><br>
          <div class="normalfont2">Gamification tools used</div>
          <?php $gamitools = ($loggedInUser[0]->gamification_tool == "") ? [] : json_decode($loggedInUser[0]->gamification_tool); ?>
          <div class="row">
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="gamificationName[]" value="kahoot" <?php if (in_array("kahoot",$gamitools)) { echo "checked"; } ?>>
              <label> Kahoot</label>
            </div>
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="gamificationName[]" value="accelium" <?php if (in_array("accelium",$gamitools)) { echo "checked"; } ?>>
              <label> accelium</label>
            </div>
            <div class="col graybackground2 m-2 text-center">
              <input type="checkbox" name="gamificationName[]" value="other" <?php if (in_array("other",$gamitools)) { echo "checked"; } ?>>
              <label> other</label>
            </div>
          </div>
        </div> <br>
        <!--add skills end-->
        

        <!--work experiance start-->
        <div class="">
          <div>
            <div class="mediumfont bold"> Any additional Specialization <sup>*</sup></div> <br>
            <table class="table table-bordered" id="specializationWrapper">
              <thead>
                <tr style="color: #15284C;background: #F6F6F6;">
                  <th>Add your specialization</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $specialization = json_decode($loggedInUser[0]->specialization);
                @endphp
                @if ($specialization)
                  @foreach($specialization as $maa)
                  <tr>
                    <td>
                      <input class="input2" type="text" value="{{$maa}}" name="specialization[]" placeholders="Name" />
                    </td>
                    <td>
                      <i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>
                    </td>
                  </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
          <div class="text-center">
            <button onclick="addSpecializationRow()" type="button" class="bluebtn pl-4 pr-4">Add</button>
          </div>

          <div class="mediumfont bold pt-2" id="EducationDiv"> Education <sup>*</sup></div> <br>
          @php
            $educationData = array();
            $educationData['school_college_university'] = check_json($loggedInUser[0]->school_college_university);
            $educationData['degree'] = check_json($loggedInUser[0]->degree);
            $educationData['final_year_date'] = check_json($loggedInUser[0]->final_year_date);
          @endphp
          <table class="table table-bordered" id="education_table">
            <thead>
              <tr style="color: #15284C;background: #F6F6F6;">
                <th>School or College/University*</th>
                <th>Degree*</th>
                <th>Final Year*</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @if (@$educationData['school_college_university'])
                  @foreach ($educationData['school_college_university'] as $key => $item)
                    <tr>
                      <td>
                        <input class="input2" type="text" name="schoolName[]" placeholders="Enter School or Collage/University" value="{{@$educationData['school_college_university'][$key]}}" required />
                      </td>
                      <td>
                        <input class="input2" type="text" name="degreeName[]" placeholders="Enter Degree" value="{{@$educationData['degree'][$key]}}" required />
                      </td>
                      <td>
                        <input type="date" id="from_mm" name="finalYearName[]" placeholder="Final Year Date" class="d form-control input2" value="{{@$educationData['final_year_date'][$key]}}" required />
                      </td>
                      <td>
                        <i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
          </table>
          <div class="text-center">
            <button onclick="addEducationRow()" type="button" class="bluebtn pl-4 pr-4">Add</button>
          </div>
          {{-- <br>
          <div class="normalfont2">School or College/University*</div>
          <input class="input2" type="text" name="schoolName" placeholders="Enter School or Collage/University" value="{{$loggedInUser[0]->school_college_university}}" /> <br><br>
          <div class="normalfont2">Degree*</div>
          <input class="input2" type="text" name="degreeName" placeholders="Enter Degree" value="{{$loggedInUser[0]->degree}}" /> <br><br>
          <!-- <div class="normalfont2">Specialization*</div>
          <input class="input2" type="text" name="specialName" placeholders="Enter Specialization" value="{{$loggedInUser[0]->specialization}}" /> <br><br> -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 ">
              <div class="normalfont2">Final Year*</div>
              <input type="date" id="from_mm" placeholder="Final Year Date" class="d form-control" name="finalYearName" value="{{$loggedInUser[0]->final_year_date}}">
            </div>

            <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
              <div class="normalfont2">End*</div>
              <input type="text" id="to_m" placeholder="End" class="d form-control" name="to_m">
            </div> -->
          <br> --}}
          

        </div>
        <!--work experiance end-->
        <br> <br>
        <!--Certification start-->
        @php
          $CertName = json_decode($loggedInUser[0]->certification_name);
          $Certdesc = json_decode($loggedInUser[0]->certification_description);
          $CertExpireDate = json_decode($loggedInUser[0]->certification_expiry_date);
        @endphp
        <div id="certification">
          <div class="mediumfont bold " id="sec_certificate"> Certifications</div> <br>
          <table class="table table-bordered" id="certificationWrapper">
            <thead>
              <tr style="color: #15284C;background: #F6F6F6;">
                <th>Name of the Certification</th>
                <th>Certification Expriry Date</th>
                <th>Certification Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if (@$CertName)
                @foreach($CertName as $key => $cernm)
                <tr>
                  <td>
                    <input class="input2" type="text" name="certificationName[]" placeholders="Module Name" value="{{$cernm}}" />
                  </td>
                  <td>
                    <input class="input2" type="date" name="certiExpiryDateName[]" placeholders="Companies Deliver at" value="{{@$CertExpireDate[$key]}}" />
                  </td>
                  <td>
                    <input class="input2" type="text" name="certiDescName[]" placeholders="No. of Sessions Deliver" value="{{@$Certdesc[$key]}}" />
                  </td>
                  <td>
                    <i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="text-center">
              <button onclick="addCertificationRow()" type="button" class="bluebtn pl-4 pr-4">Add</button>
          </div>
          <!--Certification end-->
          <br> <br>
          <div class="" id="AnyAdditionalSpecialization">
            <div class="mediumfont bold "> Additional information</div> <br>
            <div class="normalfont2">Enter your Date of Birth</div>
            <input class="input2" type="date" name="dobName" placeholders="DD/MM/YYYY" value="{{$loggedInUser[0]->dob}}"/> <br><br>
            <div class="normalfont2">Gender</div>
            <!-- <input class="input2" type="text" name="genderName" placeholders="Select your Gender" value="{{$loggedInUser[0]->gender}}"/> <br><br> -->


            <div class="mb_15">
            <select class="input11" name="genderName">
              <option value="">Select Gender</option>
              <option <?php if ($loggedInUser[0]->gender == "Male") {
                        echo "selected";
                      } ?> value="Male">Male</option>
              <option <?php if ($loggedInUser[0]->gender == "Female") {
                        echo "selected";
                      } ?> value="Female">Female</option>
              <option <?php if ($loggedInUser[0]->gender == "Other") {
                        echo "selected";
                      } ?> value="Other">Other</option>
            </select>

          </div>
          {{--  --}}
          <div>
            <div class="mediumfont bold" id="sec_language"> Languages</div> <br>
            <table class="table table-bordered" id="LanguagesWrapper">
              <thead>
                <tr style="color: #15284C;background: #F6F6F6;">
                  <th>Languages known</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $languages_known = json_decode($loggedInUser[0]->languages_known)
                @endphp
                @if (@$languages_known)
                  @foreach($languages_known as $la)
                  <tr>
                    <td>
                      <input class="input2" type="text" name="languageName[]" placeholders="Enter Languages" value="{{$la}}"/>
                    </td>
                    <td>
                      <i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>
                    </td>
                  </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        {{--  --}}
          <div class="text-center">
              <button onclick="AddLanguageRow()" type="button" class="bluebtn pl-4 pr-4">Add</button>
			    </div></br>

          {{-- <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="p-2 border border-secondary rounded">
                <input type="radio" name="trainerLevelName" value="beginner" id="beginners" @php if ($loggedInUser[0]->trainer_level == "beginner") { echo "checked"; } @endphp> <label for="beginners">Beginner</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="p-2 border border-secondary rounded">
                <input type="radio" name="trainerLevelName" value="intermediate" id="intermediates" @php if ($loggedInUser[0]->trainer_level == "intermediate") { echo "checked"; } @endphp> <label for="intermediates">Intermediate</label> 
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="p-2 border border-secondary rounded">
                <input type="radio" name="trainerLevelName" value="advanced" id="advanceds" @php if ($loggedInUser[0]->trainer_level == "advanced") { echo "checked"; } @endphp> <label for="advanceds">Advanced</label>
              </div>
            </div>
          </div>
          <br><br> --}}
        </div>

        <div class="">
          <div class="mediumfont bold " id="sec_resume"> Upload your Resume</div> <br>
          <center>

            <div class="form-group inputDnD">
              <input type="file" class="form-control-file text-primary" id="myFile" name="myResume" data-title="{{(@$loggedInUser[0]->resume_file_original_name ? basename($loggedInUser[0]->resume_file_original_name) : 'Drag & Drop your files here')}}"  accept="application/msword, application/pdf">

              <input type="hidden" name="oldResumeName" value="{{@$loggedInUser[0]->resume_path}}">
								
							<input type="hidden" name="oldResumeFileOriginalName" value="{{@$loggedInUser[0]->resume_file_original_name}}">

            </div><br><br>
            <div class="text-center">
              <button class="bluebtn pl-4 pr-4" type="submit" name="saveTdetails">Done</button>
            </div>
        </div>
      </form>
    </div>
        <!-- Profile Details code end -->
      </div>
    </div>
  </div>
  
</div>
<br><br>


<script>

function addSpecializationRow()
{
  var html = '<tr>';
    html += '<td>';
      html += '<input class="input2" type="text" value="" name="specialization[]" placeholders="Name" />';
    html += '</td>';
    html += '<td>';
      html += '<i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>';
    html += '</td>';
  html += '</tr>';
  $("#specializationWrapper tbody").append(html);
}
function addEducationRow()
{
  var html = '<tr>';
    html += '<td>';
      html += '<input class="input2" type="text" name="schoolName[]" placeholders="Enter School or Collage/University" value="" required />';
    html += '</td>';
    html += '<td>';
      html += '<input class="input2" type="text" name="degreeName[]" placeholders="Enter Degree" value="" required />';
    html += '</td>';
    html += '<td>';
      html += '<input type="date" id="from_mm" name="finalYearName[]" placeholder="Final Year Date" class="d form-control input2" value="" required />';
    html += '</td>';
    html += '<td>';
      html += '<i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>';
    html += '</td>';
  html += '</tr>';
  $("#education_table tbody").append(html);
}
// function addOtherModuleRow()
// {
//   var html = '<br><input class="input2" type="text" name="other_modules[]" style="margin:5px;" placeholders="Enter your details" />';
//   $("#otherModuleWrapper").append(html);
// }
function AddLanguageRow()
{
  var html = '<tr>';
    html += '<td>';
      html += '<input class="input2" type="text" name="languageName[]" placeholders="Enter Languages" value="" />';
    html += '</td>';
    html += '<td>';
      html += '<i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>';
    html += '</td>';
  html += '</tr>';
  $("#LanguagesWrapper tbody").append(html);
}
function addModuleRow()
{
  var html = '<tr>';
    html += '<td>';
      html += '<input class="input2" type="text" name="modulesName[]" placeholders="Module Name" value="" required />';
    html += '</td>';
    html += '<td>';
      html += '<input class="input2" type="text" name="companiesDeliverName[]" placeholders="Companies Deliver at" value="" required />';
    html += '</td>';
    html += '<td>';
      html += '<input class="input2" type="number" name="noOfSessionName[]" placeholders="No. of Sessions Deliver" value="" required />';
    html += '</td>';
    html += '<td>';
      html += '<i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>';
    html += '</td>';
  html += '</tr>';
  $("#top_three_mod tbody").append(html);
}

function addCertificationRow()
{
  var html = '<tr>';
    html += '<td>';
      html += '<input class="input2" type="text" name="certificationName[]" placeholders="Module Name" value="" />';
    html += '</td>';
    html += '<td>';
      html += '<input class="input2" type="date" name="certiExpiryDateName[]" placeholders="Companies Deliver at" value="" />';
    html += '</td>';
    html += '<td>';
      html += '<input class="input2" type="text" name="certiDescName[]" placeholders="No. of Sessions Deliver" value="" />';
    html += '</td>';
    html += '<td>';
      html += '<i class="fa fa-trash delete_this_tr" aria-hidden="true"></i>';
    html += '</td>';
  html += '</tr>';
  $("#certificationWrapper tbody").append(html);
}

</script>


<!--IMAGE UPLOADER-->
<script>
  $(document).on("change", ".uploadProfileInput", function() {
    var triggerInput = this;
    var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
    var holder = $(this).closest(".pic-holder");
    var wrapper = $(this).closest(".profile-pic-wrapper");
    $(wrapper).find('[role="alert"]').remove();
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) {
      return;
    }
    if (/^image/.test(files[0].type)) {

      if((files[0].size / 1048576) > 1.5)
      {
        $(triggerInput).val("");
				$(wrapper).append(
					'<div class="alert alert-danger d-inline-block p-2 small" role="alert">The profile pic must not be greater than 1.5MB.</div>'
				);
				setTimeout(() => {
					$(wrapper).find('[role="alert"]').remove();
				}, 5000);
				return;

        // $(triggerInput).val("");
        // alert_msg(0, "The profile pic must not be greater than 1.5MB.");
        // return;
      }

      // only image file
      var reader = new FileReader(); // instance of the FileReader
      reader.readAsDataURL(files[0]); // read the local file

      reader.onloadend = function() {
        const resultImg = this.result;
        $(holder).addClass("uploadInProgress");
        $(holder).find(".pic").attr("src", resultImg);
        $(holder).append(
          '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
        );

        // Dummy timeout; call API or AJAX below
        fetch(resultImg)
        .then(res => res.blob())
        .then(function (profile_pic) {
          var data = new FormData();
          data.append('profile_pic', profile_pic);
          data.append('ext', files[0].name.split('.').pop());
          data.append('_token', '{{csrf_token()}}');
          $.ajax({
            url: "{{route('trainerDetailsSaveProfilePic')}}",
            type: "POST",
            dataType: "json",
            data: data,
            contentType: false,
            processData: false,
            success: function(response)
            {
              $(holder).removeClass("uploadInProgress");
              $(holder).find(".upload-loader").remove();
              // If upload successful
              if (response.status) {
                $(wrapper).append(
                  '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
                );

                // Clear input after upload
                $(triggerInput).val("");

                setTimeout(() => {
                  $(wrapper).find('[role="alert"]').remove();
                }, 3000);
              } else {
                $(holder).find(".pic").attr("src", currentImg);
                $(wrapper).append(
                  '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
                );

                // Clear input after upload
                $(triggerInput).val("");
                setTimeout(() => {
                  $(wrapper).find('[role="alert"]').remove();
                }, 5000);
              }
            },
            error: function(err)
						{
							err = err.responseJSON ? err.responseJSON : {};
							//alert_msg(0, (err.message ? err.message : 'Something went wrong.'));

							// console.log("err", err);
							$(holder).find(".pic").attr("src", currentImg);
							$(triggerInput).val("");
							$(holder).removeClass("uploadInProgress");
							$(holder).find(".upload-loader").remove();
							$(wrapper).append(
								'<div class="alert alert-danger d-inline-block p-2 small" role="alert">'+(err.message ? err.message : 'Something went wrong.')+'</div>'
							);
							setTimeout(() => {
								$(wrapper).find('[role="alert"]').remove();
							}, 5000);
						}
          });
        });
      };
    } else {
      $(wrapper).append(
        '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
      );
      setTimeout(() => {
        $(wrapper).find('[role="alert"]').remove();
      }, 5000);
    }
  });
</script>

<!--Datepicker-->
<script>
  $('#from_y').datepicker({
    format: "yyyy",
    autoclose: true,
    minViewMode: "years"
  }).on('changeDate', function(selected) {
    startDate = $("#from_y").val();
    $('#to_y').datepicker('setStartDate', startDate);
  });;


  $('#to_y').datepicker({
    format: "yyyy",
    autoclose: true,
    minViewMode: "years"
  });

  $('#from_m').datepicker({
    format: "dd MM yyyy",
    autoclose: true,
    //	minViewMode: "months"
  }).on('changeDate', function(selected) {
    startDate = $("#from_m").val();
    $('#to_m').datepicker('setStartDate', startDate);
  });;


  $('#to_m').datepicker({
    format: "dd MM yyyy",
    autoclose: true,
    //	minViewMode: "months"
  });

  function removeEditAccess() {
    $(".amsify-suggestags-area .amsify-suggestags-input").attr("readonly", "readonly");
    $(".amsify-suggestags-area .amsify-suggestags-input").attr("placeholder", "");
  }
  $(document).ready(function() {
    var amsifySuggestags = new AmsifySuggestags($('#inputSkills'));
    amsifySuggestags._settings({
      printValues: false
    });
    amsifySuggestags._init();
    removeEditAccess();

    $("#subHealthCare").hide();
    $("#subFinance").hide();
    $("#subCyber").hide();
    $("#subAiMl").hide();
    $("#subIndustry").hide();
    $("#subLegalSkill").hide();
    $("#subSoftSkill").hide();

    var selected_idMain = '{{$loggedInUser[0]->parent_skill ? $loggedInUser[0]->parent_skill : ''}}';
		if(selected_idMain)
		{
			selected_idMain = selected_idMain.charAt(0).toUpperCase() + selected_idMain.slice(1);
			$("#sub"+selected_idMain).show();
		}

    $('.datepicker_common_element').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true,
		});

		$(".parent_skill_js").click(function(e) {
			
			if(!$(this).hasClass("active"))
			{
				$("#inputSkills").val("");

        amsifySuggestags.destroy();
        amsifySuggestags = new AmsifySuggestags($('#inputSkills'));
        amsifySuggestags._settings({
          printValues: false
        });
        amsifySuggestags._init();
        removeEditAccess();

				$(".parent_skill_js").removeClass("active");
				$(this).addClass("active");
			}

			var selected_idOld = $(this).attr("id");
			var selected_skill_name = $(this).attr("data-name");
			var selected_id = selected_idOld.charAt(0).toUpperCase() + selected_idOld.slice(1);
      // if(selected_idOld == 'softSkill')
      // {
      //   $(".imsoftskilltrain").slideDown();
      // }
      // else
      // {
      //   $(".imsoftskilltrain").slideUp();
      // }
      $(".skillactive_type_show_jss span").text(selected_skill_name);
			$(".SkillitemsDiv .row").slideUp();
			$(".SkillitemsDiv .row#sub"+selected_id).slideDown();
		});
    
    $("#workExp").hide();
    $("#ProfessionalButton").click(function() {
      $("#workExp").show();
    });
    $("#StudentButton").click(function() {
      $("#workExp").hide();
    });
    $('.SkillitemsDiv span').click(function() {
      var value = $(this).text().trim();
      var input = $('#inputSkills');
      var inputVal = $('#inputSkills').val();
      if(!inputVal.includes(value))
      {
        amsifySuggestags.addTag(value);
        // input.val(input.val() + value + ',');
      }
      return false;
    });
    $("body").on("click", ".delete_this_clone", function(e){
			e.preventDefault();
			$(this).closest(".clone_data_class").remove();
		});
    $("body").on("click", ".delete_this_tr", function(e){
			e.preventDefault();
			$(this).closest("tr").remove();
		});
    $("body").on('change', '#myFile', function(e){
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
    $("#trainer_details_save").submit(function(e){
			e.preventDefault();

      var files = $(this).find('[name="myResume"]').prop('files');
      if(files.length > 0 && (files[0].size / 1048576) > 1.5)
      {
          alert_msg(0, "The resume must not be greater than 1.5MB...!");
          return;
      }

      //Specialization section validation start
      var total_spcialization_count = $(this).find("input[name='specialization[]'").length;
      var specialization_eroor = 0;
      if(total_spcialization_count > 0)
      {
        $(this).find("input[name='specialization[]']").each(function(){
          var value = $(this).val();
          if(value == "")
          {
            specialization_eroor++;
          }
        });
        if(parseInt(total_spcialization_count) != parseInt(specialization_eroor))
        {
          specialization_eroor = 0;
        }
      }
      else
      {
        specialization_eroor++;
      }
      if(specialization_eroor > 0)
      {
        alert_msg(0, 'Please add 1 or more Specialization..!!');
        window.location.hash = "#specializationWrapper";
        return false;
      }
      // Specialization section validation end

      //education section validation start
      var total_schoolName_count = $(this).find("input[name='schoolName[]'").length;
      var specialization_eroor = 0;
      if(total_schoolName_count == 0)
      {
        alert_msg(0, 'Please add 1 or more Education Details..!!');
        //window.location.hash = "#education_table";
        navigationFn.goToSection('#education_table');
        return false;
      }
      // education section validation end


      jQuery(".loder").show();
      var data = new FormData(this);

      let parent_skillData = $(".parent_skill_js.active").attr("id");
			if(!parent_skillData)
			{
				parent_skillData = '';
			}
			data.append("parent_skill", parent_skillData);
			var $this = $(this);

			$.ajax({
				url: "{{route('tprofilesave')}}",
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
							window.location.href = "{{route('tmyprofile')}}";
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
  });

  var navigationFn = {
      goToSection: function(id) {
          $('html, body').animate({
              scrollTop: $(id).offset().top
          }, 0);
      }
  }

</script>

@include('footer')