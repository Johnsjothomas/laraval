@include('header')

<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 pt-5">
                <img src="{{asset('talent/assets/img/frame_success.svg')}}" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row pb-5">
                    <div class="col-sm-6">
                        <!-- <a href="/talent/register"> < Back </a> -->
                        <a href="/register" class="btn-sm btn-primary"> < Back </a>
                    </div>
                    <div class="col-sm-6">
                        <label> Already have an account? </label>
                        <a href="{{route('login')}}" class="btn-sm btn-primary">Sign In</a> 
                    </div>
                </div>
                <div class="container-fluid" style="width: 80%;padding-top:30%">
                    <div style="font-size: 40px;" class="pt-5">Awesome</div>
                    <label style="font-size: 18px;"> Welcome to the DigitalGate Talent Cloud</label>
                    <div class="pt-3">
                        
                      @if (session('register_success'))
                      <div class="alert alert-success">
                        {{ session('register_success') }}
                      </div>
                      @endif
                      <a href="{{route('verify_email')}}">
                        <button type="submit" class="btn btn-primary" style="background: #15284C;width: 80%;font-size:16px">Verify E-Mail and Update Password</button>
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--pageend-->
<script type="text/javascript">
	// $( "#btnSubmit" ).click(function() {
	//   location.href = "/talent/login";
	// });
</script>
<style>
  label{
    color:#696F79 ;
  }
</style>