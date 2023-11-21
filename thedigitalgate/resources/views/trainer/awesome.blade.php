
@include('header');

<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 pt-5">
                <img src="{{ asset('talent/assets/img/frame_success.svg') }}" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row pb-5">
                    <div class="col-sm-6">
                        <a href="/talent/register" class="btn-sm btn-primary"> < Back </a>
                    </div>
                    <div class="col-sm-6">
                        <label> Already have an account? </label>
                        <a href="/talent/login" class="btn-sm btn-primary">Sign In</a> 
                    </div>
                </div>
                <div class="container-fluid pt-5" style="width: 80%;">
                    <h2 class="pt-5">Awesome</h2>
                    <label> Let’s get started with your profile</label>
                    <div class="pt-3">
                        
                            <button type="submit" id="btnSubmit" class="btn btn-primary p-2" style="background: #15284C;width: 80%;">Continue to Login </button>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--pageend-->
<script type="text/javascript">
	$( "#btnSubmit" ).click(function() {
	  location.href = "/talent/login";
	});
</script>