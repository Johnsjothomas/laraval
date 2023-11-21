@include('header')
@include('aspirant.navigation')

<script type="text/javascript">
  console.log("type.....");
  var usr='usr_type_9';
  //get details api
  var type=sessionStorage.getItem("type");
  var access_token=sessionStorage.getItem("access_token");
  var user_id=sessionStorage.getItem("user_id");

console.log("type.....", access_token);
 

 /* if(type=='C')
    {
      $usr='usr_type_8';
    }
    else
    {
      $usr='usr_type_9';
    }*/
     var auth=type+access_token;
    $.ajax({
                      type:"GET",
                      headers:{
                      "Accept": "application/json",
                      "Authorization": auth
                    },
              
                      contentType: 'application/json',
                       url:'https://cors-anywhere.herokuapp.com/'+'https://stg3.hooperlabs.com/capi/crud/'+usr+'/read/'+user_id,
                      success : function(response) {
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
           <div class="mediumfont bold "> Build your profile </div>  <br>
           <div class="progress " style="height:10px">
          <div class="progress-bar" role="progressbar" style="width:85%;background-color: #1F1B45" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
            <span class="progress-bar-number"></span>
          </div>
        </div>
         <br><br>
<!--build your profile end--> 

<!--about you start--> 
           <div class=""> 
             <div class="mediumfont bold "> About you </div>  <br>
                 <div class="normalfont2">Write your profile summary </div>
                <input class="input11" type="text" name="" placeholders="Name" /> 
            </div> <br><br>
<!--about you end--> 

<!--add skills start-->          
           <div class="">
             <div class="mediumfont bold "> Add skills </div>    <br>
             <div class="normalfont2">Add skills to your profile </div>
             <input class="input2" type="text" name="" placeholders="Name" />   <br>
               <div class="row" >  <br>
                <div style="padding: 2%">
                    <span class="greenblock"> <i class="fa fa-bookmark" aria-hidden="true"></i> Leadership development</span>
                    <span class="greenblock"> <i class="fa fa-bookmark" aria-hidden="true"></i> Project Managment</span>
                    <span class="greenblock"> <i class="fa fa-bookmark" aria-hidden="true"></i> Team Managment</span>
                    <span class="greenblock"> <i class="fa fa-bookmark" aria-hidden="true"></i> Event Managment</span>
               </div> 
              </div>  <br>
                <div class="normalfont2">Suggested Skills to add </div>
                <div class="row" >  <br>
                <div style="padding: 2%">
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                    Project management</span>
                    <span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
                     Team Managment</span>
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                     Operations</span>
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                     Sales</span>
                     <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                    Event Managment</span>   <br><br>
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                    Finace Managment</span>
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                   Design</span>
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                    Marketing</span>
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                    Bussiness Development</span>
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                    Research</span> <br><br>
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                    information and Managment</span>
                    <span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
                    Software Testing</span>
                   
               </div> 
              </div> 
          </div>   <br>
<!--add skills end-->

<!--work experiance start--> 
<div class="">
             <div class="mediumfont bold "> Work Experience </div>    <br>
             <div class="normalfont2">Most Recent Job title*</div>
             <input class="input2" type="text" name="" placeholders="Name" />   <br> <br>
             <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pd0">
                 <div class="normalfont2">Employement Type*</div>
             <input class="input2" type="text" name="" placeholders="Name" />
              </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-right:0px;padding-left: 15px">
                 <div class="normalfont2">Most Recent Job title*</div>
                 <input class="input2" type="text" name="" placeholders="Name" />
              </div>
               </div>
              <br>
               <div class="normalfont2">Industry*</div>
              <input class="input2" type="text" name="" placeholders="Name" />  <br><br>
           
            <div class="row">
              <br>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 ">
                 <div class="normalfont2">Start*</div>
              <input type="text" class="from_m form-control" placeholder="Start" class="d form-control" name="from_m" >
            </div>
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                 <div class="normalfont2">End*</div>
                 <input type="text" class="to_m form-control" placeholder="End" class="d form-control" name="to_m" >
                </div>


            </div>  
            <br>
            <div class="row">
                <span class="graybackground2 p1"><input type="checkbox" checked>
                       Currently working</span>
            </div>  <br>
            <div class="row">
               <div class="normalfont2">Description*</div>
              <textarea class="input11" type="text" name="" placeholders="Name" ></textarea>
            </div>
             <br> <br>
            <center>
              <button class="white" style="background:#15284C;border-radius: 5px; padding:1%;"> Do you want to add more work experience</button>
            </center>
            
</div>
<!--work experiance end--> 
     <br> <br>
<!--Certification start--> 
<div class="">
             <div class="mediumfont bold "> Certifications</div>    <br>
              <div class="normalfont2">Name of the Certification</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br> <br>
               <div class="normalfont2">Expiry Date</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br> <br>
              <center>
              <button class="white" style="background:#15284C;border-radius: 5px; padding:1%;"> Do you want to add more Certification</button>
            </center>
</div>
<!--Certification end--> 
 <br> <br>
<!--project-->
<div class="">
             <div class="mediumfont bold "> Project</div>    <br>
              <div class="normalfont2">Name of the Project</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 ">
                  <div class="normalfont2">Start*</div>
               <input type="text" class="from_m form-control" placeholder="Start" class="d form-control" name="from_m" >
             </div>
          
             
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                  <div class="normalfont2">End*</div>
                  <input type="text" class="to_m form-control" placeholder="End" class="d form-control" name="to_m" >
                 </div>
              
            </div> <br><br> 
               <div class="normalfont2">Description*</div>  
              <textarea class="input11" type="text" name="" placeholders="Name" ></textarea>
               <br><br><br>
              <center>
              <button class="white" style="background:#15284C;border-radius: 5px; padding:1%;"> Do you want to add more Certification</button>
            </center>
</div>
                <br><br>
<!--resume-->
                  <div class="">
                    <div class="mediumfont bold "> Upload your Resume</div>  <br>
                    <center>

                      <div class="form-group inputDnD">
                        <input type="file" class="form-control-file text-primary" id="myFile" data-title="Drag & Drop your files here"
                        accept="application/msword, application/pdf">
                      </div>
                      <div class="p-2" style="color: #8692A6;">you can upload a word or pdf files </div>
                  </div>

<!--Education-->
 <br> <br>
<div class="">
             <div class="mediumfont bold "> Education</div>    <br>
              <div class="normalfont2">School or Collage/University*</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
              <div class="normalfont2">Degree*</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
              <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pd0 ">
                 <div class="normalfont2">Start date*</div>
              <input class="d form-control" id="childdob" type="date" name="childdob" data-date="09 August 2015" data-date-format="DD MMMM YYYY" value="09 August 2015">  
              </div>
            
             
            </div>  
               <br><br>
              <center>
                <button class="white" style="background:#15284C;border-radius: 5px; padding:1%;"> Do you want to add more Certification</button>
              </center>  <br><br>
</div>
<!--Additional info-->
<div class="">
               <div class="mediumfont bold "> Additional informaton</div>    <br>
  <div class="normalfont2">Enter your Date of Birth</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
  <div class="normalfont2">Gender</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
  <div class="normalfont2">Work Permi (Country)</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
  <div class="normalfont2">Languages</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="p-2 border border-secondary rounded"><input type="checkbox"> beginner</div></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="p-2 border border-secondary rounded"><input type="checkbox">  intermediate </div></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="p-2 border border-secondary rounded"><input type="checkbox"> advanced</div></div>
              </div>
                <br><br>
  <div class="normalfont2">Preferred location</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
  <div class="normalfont2">Industries</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
</div>

<div class="">
               <div class="mediumfont bold "> Earn Points*</div>    <br>
  <div class="normalfont2">Name</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
  <div class="normalfont2">Email</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
  <div class="normalfont2">Phone</div>
              <input class="input2" type="text" name="" placeholders="Name" />   <br><br>
              <center>
                <button onclick="window.location='/talent/myprofile'" class="white" style="background:#15284C;border-radius: 5px; padding:1%;">
              &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;Done&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
              </center>
</div>


       </div>
    </div>
  </div>
<br><br>

<!--IMAGE UPLOADER-->
<script>
  $(document).on("change", ".uploadProfileInput", function () {
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

    reader.onloadend = function () {
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
})    .on('changeDate', function(selected){
        startDate =  $(".from_y").val();
        $('.to_y').datepicker('setStartDate', startDate);
    }); 
;


$('.to_y').datepicker({
    	format: "yyyy",
    	autoclose: true,
   	  	minViewMode: "years"
});

$('.from_m').datepicker({
    	format: "dd MM yyyy",
    	autoclose: true,
   	  //	minViewMode: "months"
})    .on('changeDate', function(selected){
        startDate =  $(".from_m").val();
        $('.to_m').datepicker('setStartDate', startDate);
    }); 
;


$('.to_m').datepicker({
    	format: "dd MM yyyy",
    	autoclose: true,
   	  //	minViewMode: "months"
});
</script>

  @include('footer')