@include('header')
@include('aspirant.navigation')

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
  @include('aspirant.submenu');

  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p3">
      <div class="graybackground">
        <center>
          <div class="profile-pic-wrapper pt-3">
            <div class="pic-holder">
              <!-- uploaded pic shown here -->
              <img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150">

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

          <h3> Kahleel </h3>

        </center>
        <center>
          <ul style="padding-inline-end: 40px;">
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none;font-size:14px"> Enter your designation</li>
            <li class="p5  bold" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">About you</li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Skills</li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Work Experience</li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Certification</li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Project</li>
            <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Resume</li>
            <li class="p5" style="list-style: none">Additonal information</li>
            <br>

          </ul>
        </center>
      </div>
    </div>
    <!--Build your profile start-->
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pd24">
      <br><br>
      <div class="mediumfont bold "> Build your profile </div> <br>
      <div class="progress " style="height:10px">
        <div class="progress-bar" role="progressbar" style="width:85%;background-color: #1F1B45" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
          <span class="progress-bar-number"></span>
        </div>
      </div>
      <br><br>
      <!--build your profile end-->

      <!--about you start-->
      <div class="">
        <div class="mediumfont bold ">  you </div> <br>
        <div class="normalfont2">Write your profile summary </div>
        <input class="input11" type="text" name="" placeholders="Name" />
      </div> <br><br>
      <!--about you end-->

      <!--add skills start-->
      <div class="">
        <div class="mediumfont bold "> Add skills </div> <br>
        <div class="normalfont2">Add skills to your profile </div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br>
        <div class="row"> <br>
          <div style="padding: 2%">
            <span class="greenblock" id="healthCare"> <i class="fa fa-bookmark" aria-hidden="true"></i> Health Care</span>
            <span class="greenblock" id="finance"> <i class="fa fa-bookmark" aria-hidden="true"></i> Finance</span>
            <span class="greenblock" id="cyber"> <i class="fa fa-bookmark" aria-hidden="true"></i> Cyber Security</span>
            <span class="greenblock" id="aiMl"> <i class="fa fa-bookmark" aria-hidden="true"></i> AI/ML/Web 3</span>
            <span class="greenblock" id="industry"> <i class="fa fa-bookmark" aria-hidden="true"></i> Industrial</span>
            <span class="greenblock" id="softSkill"> <i class="fa fa-bookmark" aria-hidden="true"></i> Softskills</span>
          </div>
        </div> <br>
        <div class="normalfont2">Suggested Skills to add </div>
        <div class="row" id="subHealthCare"> <br>
          <div style="padding: 2%">
            <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
              Nursing </span>&nbsp;
            <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
              Welness</span>
            <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
              Medicine</span>
          </div>
        </div>

        <div class="row" id="subFinance"> <br>
          <div style="padding: 2%">
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
          <div style="padding: 2%">
            <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
              GRC & Privacy</span>&nbsp;
            <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
              Technology</span>
            <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
              Awareness</span>
          </div>
        </div>

        <div class="row" id="subAiMl"> <br>
          <div style="padding: 2%">
            <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
              ML</span>&nbsp;
            <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
              Metaverse</span>
            <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
              Blockchain</span>
          </div>
        </div>

        <div class="row" id="subIndustry"> <br>
          <div style="padding: 2%">
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

        <div class="row" id="subSofts"> <br>
          <div style="padding: 2%">
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
              <div style="padding: 2%">
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
      </div> <br>
      <!--add skills end-->

      <!--work experiance start-->

      <!-- <div class="row">
        <span class="graybackground2 p1"><input type="checkbox" checked>
          Currently working</span>
      </div> <br> -->

      <!-- The Buttons Added Avinash ----------------------------------------------------------->
      <div class="pt-3 mb_15">
        <label id="ProfessionalButton" for="industrial"><span type="button" onclick="$('.radiobtn').removeClass('bluebtn');$(this).toggleClass('bluebtn') " class="radiobtn @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Industrial Trainer') bluebtn @endif mr-2"> Professional </span></label>

        <input @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Industrial Trainer')checked="checked"@endif style="display: none" type="radio" id="industrial" name="trainer_type" value="Industrial Trainer" onclick="changedata(this.value)">



        <label id="StudentButton" for="softskill"><span type="button" onclick="$('.radiobtn').removeClass('bluebtn');$(this).toggleClass('bluebtn') " class="radiobtn @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Soft Skills Trainer') bluebtn @endif"> Student </span></label>

        <input @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Soft Skills Trainer')checked="checked"@endif style="display: none" type="radio" id="softskill" name="trainer_type" value="Soft Skills Trainer" onclick="changedata(this.value)">
      </div>
      <!-- End The Buttons Added Avinash  ------------------------------------------------------>

      <div class="" id="workExp">
        <div class="mediumfont bold "> Work Experience </div> <br>
        <div class="normalfont2">Most Recent Company*</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br> <br>
        <div class="row">
          <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pd0"> -->
          <div class="col-lg-6">
            <div class="normalfont2">Employement Type*</div>
            <input class="input2" type="text" name="" placeholders="Name" />
          </div>
          <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-right:0px;padding-left: 15px"> -->
          <div class="col-lg-6">
            <div class="normalfont2">Most Recent Job title*</div>
            <input class="input2" type="text" name="" placeholders="Name" />
          </div>
        </div>
        <br>
        <div class="normalfont2">Industry*</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br><br>

        <div class="row">
          <br>
          <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 ">
                 <div class="normalfont2">Start*</div>
              <input type="text" class="from_m form-control" placeholder="Start" class="d form-control" name="from_m" >
            </div> -->

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="normalfont2">End Date*</div>
            <input type="text" class="to_m form-control" placeholder="End" class="d form-control" name="to_m">
          </div>


        </div>
        <br>

        <div class="normalfont2">Description*</div>
        <textarea class="input11" type="text" name="" placeholders="Name"></textarea>
        <br> <br>
        <center>
          <button class="white" style="background:#15284C;border-radius: 5px; padding:1%;"> Add </button>
        </center>

      </div>
      <!--work experiance end-->
      <br> <br>
      <!--Certification start-->
      <div class="">
        <div class="mediumfont bold "> Certifications</div> <br>
        <div class="normalfont2">Name of the Certification</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br> <br>
        <!-- <div class="normalfont2">Expiry Year</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br> <br> -->

        <div class="pt-3 mb_15">
          <div class="normalfont2">Expiry Year</div>
          <select class='form-control'>
            <option value="select">Select</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2025">2026</option>
            <option value="2025">2027</option>
            <option value="2025">2028</option>
          </select>
        </div>
        <br>

        <div id="certificationWrapper"></div>

        <center>
          <button class="white" onclick="addCertificateRow()" style="background:#15284C;border-radius: 5px; padding:1%;"> Add </button>
        </center>
      </div>
      <!--Certification end-->
      <br> <br>
      <!--project-->
      <div class="">
        <div class="mediumfont bold "> Project</div> <br>
        <div class="normalfont2">Name of the Project</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br><br>
        <div class="row">
          <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 ">
                  <div class="normalfont2">Start*</div>
               <input type="text" class="from_m form-control" placeholder="Start" class="d form-control" name="from_m" >
             </div> -->


          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
            <div class="normalfont2">End Date*</div>
            <input type="text" class="to_m form-control" placeholder="End" class="d form-control" name="to_m">
          </div>

        </div> <br>
        <div class="normalfont2">Description*</div>
        <textarea class="input11" type="text" name="" placeholders="Name"></textarea>
        <br><br><br>
        <center>
          <button class="white" style="background:#15284C;border-radius: 5px; padding:1%;"> Add</button>
        </center>
      </div>
      <br>

      <!--Education-->
      <br> <br>
      <div class="">
        <div class="mediumfont bold "> Education</div> <br>
        <div class="normalfont2">School or Collage/University*</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br><br>
        <div class="normalfont2">Degree*</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br><br>
        <div class="row">
          <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pd0 "> -->
          <div class="col-lg-3">
            <div class="normalfont2">End date*</div>
            <input class="d form-control" id="childdob" type="date" name="childdob" data-date="09 August 2015" data-date-format="DD MMMM YYYY" value="09 August 2015">
          </div>


        </div>
        <br><br>
        <center>
          <button class="white" style="background:#15284C;border-radius: 5px; padding:1%;"> Add </button>
        </center> <br><br>
      </div>

      <!--resume-->
      <div class="">
        <div class="mediumfont bold "> Upload your Resume</div> <br>
        <center>

          <div class="form-group inputDnD">
            <input type="file" class="form-control-file text-primary" id="myFile" data-title="Drag & Drop your files here" accept="application/msword, application/pdf">
          </div>
          <div class="p-2" style="color: #8692A6;">you can upload a word or pdf files </div>
      </div>
      <br>

      <!--Additional info-->
      <div class="">
        <div class="mediumfont bold "> Additional information</div> <br>
        <!-- <div class="normalfont2">Enter your Date of Birth</div>
        <input class="input2" type="text" name="" placeholders="Name" required /> <br><br> -->
        <div class="normalfont2">
          <div class="normalfont2">* Enter your Date of Birth</div>
          <input class="d form-control" id="childdob" type="date" name="childdob" data-date="09 August 2015" data-date-format="DD MMMM YYYY" value="09 August 2015">
        </div> <br>

        <!-- <div class="normalfont2">Gender</div>
        <input class="input2" type="text" name="" placeholders="Name" required/> <br><br> -->

        <div class="pt-3 mb_15">
          <div class="normalfont2">* Gender</div>
          <select class='form-control'>
            <option value="male">Select</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>

        <!-- <div class="normalfont2">Work Permit (Country)</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br><br> -->

        <div class="pt-3 mb_15">
          <div class="normalfont2">* Work Permit (Country)</div>
          <select class='form-control'>
            <option value="male">Select</option>
            <option value="male">India</option>
            <option value="female">UAE</option>
            <option value="neutral">England</option>
            <option value="neutral">France</option>
            <option value="neutral">Germany</option>
            <option value="neutral">USA</option>
          </select>
        </div>


        <!-- <div class="normalfont2">Languages</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br><br> -->

        <div class="pt-3 mb_15">
          <div class="normalfont2">Languages</div>
          <select class='form-control'>
            <option value="male">Select</option>
            <option value="male">English</option>
            <option value="female">Arabic</option>
            <option value="neutral">French</option>
            <option value="neutral">Spanish</option>
            <option value="neutral">Hindi</option>
          </select>
        </div>


        <!-- <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="p-2 border border-secondary rounded"><input type="checkbox"> beginner</div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="p-2 border border-secondary rounded"><input type="checkbox"> intermediate </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="p-2 border border-secondary rounded"><input type="checkbox"> advanced</div>
          </div>
        </div>
         -->

        <!-- <div class="normalfont2">Preferred location</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br><br> -->
        <div class="pt-3 mb_15">
          <div class="normalfont2">Preferred location</div>
          <select class='form-control'>
            <option value="male">Select</option>
            <option value="male">Work From Home</option>
            <option value="female">Anywhere</option>
            <option value="neutral">List Of Countries</option>
          </select>
        </div>
        <br>

        <div class="normalfont2">Industries</div>
        <input class="input2" type="text" name="" placeholders="Name" /> <br><br>
      </div>

      <div class="">
        <!-- <div class="mediumfont bold "> Earn Points*</div>    <br>
  <div class="normalfont2">Name</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
  <div class="normalfont2">Email</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
  <div class="normalfont2">Phone</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br> -->
        <center>
          <button onclick="window.location='talent/aspirant_2/myprofile'" class="white" style="background:#15284C;border-radius: 5px; padding:1%;">
            &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Done&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            <!-- <a href="" class="white" style="background:#15284C;border-radius: 5px; padding:1%;">
            &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Done&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> -->
        </center>
      </div>


    </div>
  </div>
</div>
<br><br>

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
      // only image file
      var reader = new FileReader(); // instance of the FileReader
      reader.readAsDataURL(files[0]); // read the local file

      reader.onloadend = function() {
        $(holder).addClass("uploadInProgress");
        $(holder).find(".pic").attr("src", this.result);
        $(holder).append(
          '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
        );

        // Dummy timeout; call API or AJAX below
        setTimeout(() => {
          $(holder).removeClass("uploadInProgress");
          $(holder).find(".upload-loader").remove();
          // If upload successful
          if (Math.random() < 0.9) {
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
            }, 3000);
          }
        }, 1500);
      };
    } else {
      $(wrapper).append(
        '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
      );
      setTimeout(() => {
        $(wrapper).find('role="alert"').remove();
      }, 3000);
    }
  });
</script>

<!--Datepicker-->
<script>
  $('.from_y').datepicker({
    format: "yyyy",
    autoclose: true,
    minViewMode: "years"
  }).on('changeDate', function(selected) {
    startDate = $(".from_y").val();
    $('.to_y').datepicker('setStartDate', startDate);
  });;


  $('.to_y').datepicker({
    format: "yyyy",
    autoclose: true,
    minViewMode: "years"
  });

  $('.from_m').datepicker({
    format: "dd MM yyyy",
    autoclose: true,
    //	minViewMode: "months"
  }).on('changeDate', function(selected) {
    startDate = $(".from_m").val();
    $('.to_m').datepicker('setStartDate', startDate);
  });;


  $('.to_m').datepicker({
    format: "dd MM yyyy",
    autoclose: true,
    //	minViewMode: "months"
  });


  function addCertificateRow() {
    var html = '<div class="normalfont2 mt-2">* Name of the Certification</div><input class="input2" type="text" value="" name="certificate_name[]" placeholders="Name" />   <br> <br><div class="col-12"><div class="row"><br><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 form-group"><div class="normalfont2">Expiry</div><input type="date" id="" value="" placeholder="Expiry" class="d form-control" name="cert_expiry_date[]" ></div></div>  </div><div class="normalfont2">Description</div><textarea class="input11" type="text" name="cert_description[]" placeholders="Description*" ></textarea><input type="hidden" name="certificate_id[]" value="">';

    $("#certificationWrapper").append(html);
  }


  $(document).ready(function() {
    $("#subHealthCare").hide();
    $("#subFinance").hide();
    $("#subCyber").hide();
    $("#subAiMl").hide();
    $("#subIndustry").hide();
    $("#subSofts").hide();

    $("#healthCare").click(function() {
      $("#subHealthCare").show();
      $("#subFinance").hide();
      $("#subCyber").hide();
      $("#subAiMl").hide();
      $("#subIndustry").hide();
      $("#subSofts").hide();
    });

    $("#finance").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").show();
      $("#subCyber").hide();
      $("#subAiMl").hide();
      $("#subIndustry").hide();
      $("#subSofts").hide();
    });

    $("#cyber").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").hide();
      $("#subCyber").show();
      $("#subAiMl").hide();
      $("#subIndustry").hide();
      $("#subSofts").hide();
    });

    $("#aiMl").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").hide();
      $("#subCyber").hide();
      $("#subAiMl").show();
      $("#subIndustry").hide();
      $("#subSofts").hide();
    });


    $("#industry").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").hide();
      $("#subCyber").hide();
      $("#subAiMl").hide();
      $("#subIndustry").show();
      $("#subSofts").hide();
    });

    $("#softSkill").click(function() {
      $("#subHealthCare").hide();
      $("#subFinance").hide();
      $("#subCyber").hide();
      $("#subAiMl").hide();
      $("#subIndustry").hide();
      $("#subSofts").show();
    });

    $("#workExp").hide();
    $("#ProfessionalButton").click(function() {
      $("#workExp").show();
    });
    $("#StudentButton").click(function() {
      $("#workExp").hide();
    });

  });
</script>

@include('footer')