@include('talent.header')
@include('talent.employer.navigation')

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
    @include('talent.employer.submenu')

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
             <h6> Team Managment Tool </h6>
           
               </center>
             <center>
                       <ul style="padding-inline-end: 40px;">
               <li class="p5  bold" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Company Details</li>
               <br>

             </ul>
             </center>
           </div>
       </div>
<!--Build your profile start--> 
       <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pd24">
        <br><br>
        <div class="row">
          <div class="col-9 pb-5">
           <div class="mediumfont bold "> Overview </div></div>
           <div class="col-3">
             <button class="bluebtn">Continue</button>
           </div>
        </div>
             <div class="card">
               <div class="card-body form-group">
                      <label>Website*</label>
                      <input type="text" class="form-control" placeholder="Enter your Website link">
                      <label>Company Profile</label>
                      <textarea type="text" class="form-control" placeholder="Enter your Website link"></textarea>
                      <label> Company Registration Number*</label>
                      <input type="text" class="form-control" placeholder="Enter your Website link">
                      <label>VAT details*</label>
                      <input type="text" class="form-control" placeholder="Enter your Website link">
                      <label>Company Size</label>
                      <input type="text" class="form-control" placeholder="Enter your Website link">
                      <label>Type</label>
                      <input type="text" class="form-control" placeholder="Enter your Website link">
                      <label>Location</label>
                      <div class="row">
                        <div class="col-9">
                      <label>Corporate Headquarters
                      1 Apple Park Way, Cupertino, California 95014, US</label></div>
                      <div class="col-3">
                        <button class="whitebtn">Confirm</button>
                      </div></div>
                      <div class="card">MAP</div>
               </div>
             </div>
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
  $('#from_y').datepicker({
    	format: "yyyy",
    	autoclose: true,
   	  	minViewMode: "years"
})    .on('changeDate', function(selected){
        startDate =  $("#from_y").val();
        $('#to_y').datepicker('setStartDate', startDate);
    }); 
;


$('#to_y').datepicker({
    	format: "yyyy",
    	autoclose: true,
   	  	minViewMode: "years"
});

$('#from_m').datepicker({
    	format: "dd MM yyyy",
    	autoclose: true,
   	  //	minViewMode: "months"
})    .on('changeDate', function(selected){
        startDate =  $("#from_m").val();
        $('#to_m').datepicker('setStartDate', startDate);
    }); 
;


$('#to_m').datepicker({
    	format: "dd MM yyyy",
    	autoclose: true,
   	  //	minViewMode: "months"
});
</script>
<style>
  label{
    color:#696F79 ;
    padding-top: 2%;
    padding-left: 0px;
  }
</style>
  @include('talent.footer')