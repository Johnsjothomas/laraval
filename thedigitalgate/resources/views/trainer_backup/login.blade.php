
@include('header')


<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 side">
                <img src="{{ asset('talent/trainer/assets/img/frame_login.svg') }}" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{ asset('talent/assets/img/logo2.svg') }}">
                    </div>
                    <div class="col-sm-6">
                        <label> Already have an account? </label>
                        <a href="/talent/register" class="btn-sm btn-primary">Sign In</a> 
                    </div>
                </div>
                <div class="container-fluid" style="width: 80%;">
                    <h2 class="pt-5 pb-5">Login</h2>
                    <div class="pt-5">
                        <form id="myButton1">
                            <div class="form-group">
                              <label style="display: none;color:#AE3C3C">!! Please check Email ID and password and try again.</label>
                            </div>
                            <div class="form-group">
                              <label for="email">Email*</label>
                              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                              <label for="password">Password*</label>
                              <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                            </div>
                            <div class="form-group text-right">
                                <a href="/talent/forgetpassword">Forgot Password?</a>
                            </div>
                            <button type="submit" id="btnSubmit1" class="btn btn-primary p-2" style="background: #15284C;width: 100%;">Login</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--pageend-->
<script type="text/javascript">
  
    	      /*  location.href = "/talent/verifyotp";*/
       $('#myButton1').on('submit', function(event){
       	    
	        event.preventDefault();
	         //disable the submit button
	         $("#btnSubmit1").attr("disabled", true);
	         	var apiData={
							    
								"grant_type":"password",
								"username":$('#email').val(),
								"password":$('#password').val(),

							  };
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
	                    	console.log("success access_token.......", response);
	                    	sessionStorage.setItem("access_token", response.access_token);
	                    	sessionStorage.setItem("type", response.token_type);
	                    	sessionStorage.setItem("user_id", response.account_id);


	                    	 location.href = "/talent/selectfrom";
	                    },
	                    error: function(e) {
				                            console.log('Error In Login AJAX...', e);
				                          }
	                    });
		});	
      
		

</script>			  