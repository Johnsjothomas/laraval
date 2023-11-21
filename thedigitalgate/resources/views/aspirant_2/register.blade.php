
@include('talent.header')

<!--Phone input-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{ asset('talent/assets/img/frame_register.svg') }}" width="100%">
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
                    <label>For the purpose of Industry Regulation, your details are required.</label>
                    <div style="display: none;color:#AE3C3C">!This email address is already in use by another account.</div>
                    <div class="p-3">
                        <form>
                            <div class="form-group">
                                <label for="firstname">Your First Name*</label>
                                <input class="form-control" id="firstname" placeholder="First Name" required>
                              </div>
                              <div class="form-group">
                                <label for="lastname">Your Last Name*</label>
                                <input class="form-control" id="lastname" placeholder="Last Name" required>
                              </div>
                            <div class="form-group">
                              <label for="email">Email*</label>
                              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Phone Number</label>
                                <input type="tel" class="form-control" id="mobile" placeholder="0123456789">
                              </div>
                              
                            <div class="form-group">
                              <label for="password">Create password*</label>
                              <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                            </div>
                            <div class="form-group form-check">
                              <input type="checkbox" id="check" required>
                              <label class="form-check-label" for="check">I agree to the terms & conditions</label>
                            </div>
                            <button type="submit" id="btnSubmit" class="btn btn-primary p-2" style="background: #15284C;width: 100%;">Register Account</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <script>
        $("input[type=tel]").intlTelInput({
          initialCountry: "in",
          geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "";
              callback(countryCode);
            });
          },
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js" // just for formatting/placeholders etc
        });
  </script> 
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