
@include('header')


<!--pagestart-->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 side">
			<img src="assets/img/frame_signup.svg" width="100%">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 p-5">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<img src="assets/img/logo2.svg">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<label> Already have an account? </label>
					<a href="{{route('login')}}" class="btn-sm btn-primary">Sign In</a> 
				</div>
			</div>

			<form id="signup_form" action="{{route('register')}}">
				@csrf
			<div class="container-fluid pt-5 pb-5" style="text-align: -webkit-center;width: 80%;">
				<h2 class="pt-5 pb-5">Sign up for Industreall Talent</h2>
				<div class="card p-3 mb-4 signupcard">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 text-right" style="align-self: center;">
							<img src="{{asset('talent/assets/img/Manager.png')}}">
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 text-left">
						<div style="font-size: 16px; font-weight: bold;">Aspirant</div>
							<label  style="font-size: 14px">If you are an Intern or Professional looking for a career </label>
						</div>
					</div>
				</div>
				<div class="card p-3 mb-4 signupcard">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 text-right" style="align-self: center;">
							<img src="{{asset('talent/assets/img/Businessman.png')}}">
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 text-left">
							<div style="font-size: 16px; font-weight: bold;">{{repalceWithMentor('Trainer')}}</div>
							<label style="font-size: 14px">If you are a {{repalceWithMentor('Trainer')}} looking to offer real world experience</label>
						</div>
					</div>
				</div>
				
				<div class="card p-3 mb-4 signupcard">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 text-right" style="align-self: center;">
							<img src="{{asset('talent/assets/img/People.png')}}">
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 text-left">
							<div style="font-size: 16px; font-weight: bold;">Employer</div>
							<label style="font-size: 14px">If you are looking to hire passionate Freshers and hands on Aspirants</label>
						</div>
					</div>
				</div>
				
			</div>

			<input class="user_type_set" type="radio" value="usr_type_1" id="employer" name="user_type" style="display:none">
            <input class="user_type_set" type="radio" value="usr_type_3" id="trainer" name="user_type" style="display:none">
            <input class="user_type_set" type="radio" value="usr_type_4" id="aspirant" name="user_type" style="display:none">

		</form>



		</div>
	</div>
</div>
<!--pageend-->
<style>
  label{
    color:#696F79 ;
  }
</style>