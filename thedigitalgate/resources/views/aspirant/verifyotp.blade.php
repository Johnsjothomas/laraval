
@include('talent.header')


<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{ asset('talent/assets/img/frame_verification.svg') }}" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="#"> < Back </a>
                    </div>
                    <div class="col-sm-6">
                        <label> Already have an account? </label>
                        <a href="/talent/register" class="btn-sm btn-primary">Sign In</a> 
                    </div>
                </div>
                <div class="container-fluid" style="width: 80%;">
                    <h2 class="pt-5">Verify E-mail </h2>
                    <label>To verify your email, we have sent you one-time 
                        password (OTP) to your email</label>
                    <div class="p-3">
                        <form id="myButton">
                            <div class="form-group">
                                <label for="otp">Enter OTP</label>
                                <input class="form-control" id="otp" placeholder="Enter OTP" required>
								<p id="p01" style="color: red"></p>
                              </div>
                            <button type="submit" id="btnSubmit" class="btn btn-primary p-2" style="background: #15284C;width: 100%;">Continue</button>
                            <div  class="text-center pt-3">
                            <a href="#">Resend</a></div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--pageend-->
<!--pageend-->
<script type="text/javascript">
  
    	      /*  location.href = "/talent/verifyotp";*/
       $('#myButton').on('submit', function(event){
       	 event.preventDefault();
         //disable the submit button
         var message;
		  message = document.getElementById("p01");
		  message.innerHTML = "";
         $("#btnSubmit").attr("disabled", true);
         $otp= $('#otp').val();
          try { 
		    if($otp == 1111) {
		    	console.log("Into if block");
				    location.href = "/talent/awesome";
		    	
		    } 
		     else {
				  	throw "OTP not valid !";
				  }
		   
		  }
		  catch(err) {
		    message.innerHTML = "Input " + err;
		  }
		 
       });
 </script>