
@include('header');


<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{ asset('talent/assets/img/frame_forgot.svg') }}" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="/talent/register"> < Back </a>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                <div class="container-fluid" style="width: 80%;">
                    <h2 class="pt-5 pb-5">Forgot password</h2>
                    <div class="pt-5">
                        <form id="myButton">
                            <div class="form-group">
                              <label for="email">Email*</label>
                              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <button id="btnSubmit" type="submit" class="btn btn-primary p-2" style="background: #15284C;width: 100%;">Reset password</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--pageend-->
<script type="text/javascript">
	 $('#myButton').on('submit', function(event){
       	    
        event.preventDefault();
         //disable the submit button
         $("#btnSubmit").attr("disabled", true);
           location.href = "/talent/forgetpassword2";
     });
</script>