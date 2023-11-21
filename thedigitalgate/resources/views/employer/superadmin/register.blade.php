
@include('talent.header')

<!--Phone input-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 side">
                <img src="{{ asset('talent/assets/img/frame_admin_register.svg') }}" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="/talent/joinus"> < Back </a>
                    </div>
                    <div class="col-sm-6">
                        <label> Already have an account? </label>
                        <a href="/talent/register" class="btn-sm btn-primary">Sign In</a> 
                    </div>
                </div>
                <div class="container-fluid" style="width: 80%;">
                    <h2 class="pt-5">Register</h2>
                    <label style="font-size: 18px;">For the purpose of Industry Regulation, your details are required.</label>
                    <div style="display: none;color:#AE3C3C">!This email address is already in use by another account.</div>
                    <div class="pl-0 pt-3">
                        <form>
                            <div class="form-group">
                                <label for="firstname">Company Name*</label>
                                <input class="form-control" id="firstname" placeholder="Bottle" required>
                              </div>
                              <div class="form-group">
                                <label for="lastname">Industry</label>
                                <select class="form-control">
                                  <option value="" disabled selected>Select Industry</option>
                                  <option value="Oil & construction">Oil & construction</option>
                                  <option value="Construction">Construction</option>
                                  <option value="Power & Utilities">Power & Utilities</option>
                                  <option value="Petrochemical">Petrochemical</option>
                                  <option value="Renewable Energy">Renewable Energy</option>
                                  <option value="Manufacturing & processing">Manufacturing & processing</option>
                                  <option value="Mining">Mining</option>
                                  <option value="Marine">Marine</option>
                                  <option value="Chemical">Chemical</option>
                                  <option value="Others">Others</option>
                                </select>
                              </div>
                              <div class="form-group">
                            <input class="form-control" id="others" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                              <label for="email">Your Job role</label>
                              <select class="form-control">
                                  <option value="" disabled selected>Select your Job role</option>
                                  <option value="Super Admin"> Super Admin</option>
                                  <option value="Hiring Team">Hiring Team</option>
                                  <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group  pb-5">
                            <input class="form-control" id="others" placeholder="Enter Details">
                            </div>
                            <button type="submit" id="btnSubmit" class="btn btn-primary" style="background: #15284C;width: 100%;">Done</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!--pageend-->
<script type="text/javascript">
  
    	      /*  location.href = "/talent/verifyotp";*/
       $('#myButton').on('submit', function(event){
       	    
        event.preventDefault();
         //disable the submit button
         $("#btnSubmit").attr("disabled", true);
         	var apiData={
						    "grant_type": "client_credentials"
						  };
         	var apiData1 ={
          					"First_Name": $('#name').val(),
          					"Mobile_Number":{
											    "code" : "91", 
											    "value" : $('#mobile').val()
											  },
        					"Email": $('#email').val(),
        					"Sector" : "Employee",
        					"User_Status":"REGISTERED"
        					
    					};
    					
    		var apiData2={
						   "username":$('#email').val(),
						   "password":$('#password').val()

						  };
    	
           console.log("into button click...........", apiData1);
            $.ajax({
                    type:"POST",
                    headers:{
								    "Accept": "application/json",
								    "Authorization": "Basic " + btoa('YNFOP29IWSI32CJWFE3D' + ":" + '170aedfc-f440-11ea-adc1-0242ac120002')
								  },
						
                    contentType: 'application/json',
                     url:"https://stg3.hooperlabs.com/capi/uaa/oauth/token",
                    data: JSON.stringify(apiData),
                    success : function(response) {
                    	console.log("success access_token.......", response.token_type);
                    	var token_type= 'Bearer ' ;
                    	var access_token=response.access_token;
                    	//Call Craete consumer api
			                $.ajax({
			                    type:"POST",
			                    headers:{
											    "Accept": "application/json",
											    "Authorization":  token_type+access_token,
											  },
									
			                    contentType: 'application/json',
			                     url:"https://stg3.hooperlabs.com/capi/crud/usr_type_9/create",
			                    data: JSON.stringify(apiData1),
			                    success : function(response) {
			                    	console.log("success Craete.......", response);
			                    	//Call register api
			                    	$.ajax({
			                    type:"POST",
			                    headers:{
											    "Accept": "application/json",
											    "Authorization":  token_type+access_token,
											  },
									
			                    contentType: 'application/json',
			                     url:"https://stg3.hooperlabs.com/capi/account/register ",
			                    data: JSON.stringify(apiData2),
			                    success : function(response) {
			                    	console.log("success Register.......", response);
			                    	//Redirect to login page
			                    	 location.href = "/talent/verifyotp";

			                    },
			                     error: function(e) {
			                            console.log('Error In Register AJAX...', e);
			                          },
			                });

			                    },
			                     error: function(e) {
			                            console.log('Error In craete AJAX...', e);
			                          },
			                });

                    },
                     error: function(e) {
                            console.log('Error In access_token AJAX...', e);
                          },
                });

    });

</script>
<style>
  label{
    color:#696F79 ;
  }
</style>