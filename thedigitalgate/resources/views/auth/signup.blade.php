
@include('header')

<style>
@media only screen and (max-width: 600px) {
	.signup-img-text-2-edit {
		font-size: 15px;
		line-height: 2;
	}
	.w_full_on_res {
		width: 100% !important;
	}
}
</style>
<!--pagestart-->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 side">
			<img src="{{asset('talent/assets/img/SignupSideImage.png')}}" width="100%">
			<div class="signup-img-text-2-edit">
				Our Philosophy of making every graduate employable and prepared for the future of work includes
				<ul class="signup-img-text-3" style="bottom: -164px;">
					<li>self assessment</li>
					<li>upskill training</li>
					<li>immersive lab</li>
					<li>practical internships</li>
				</ul>
            </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 p-1">
			<!-- <div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<img style="background: grey;width: 155px;" src="{{asset('talent/assets/img/logo3.png')}}">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<label> Already have an account? </label>
					<a href="{{route('login')}}">Sign In</a> 
				</div> -->



				<div class="container-fluid mt-5" style="width: 80%;">
            <div class="row">
            <div class="col-sm-6">
				<div class="row">
					<div class="col d-flex">
						<a href="{{url('/')}}">
							<img class="logo-signup" style="background: #cec7c7;height: 79px;margin-right: -11px;margin-top: -20px;" src="{{ asset('talent/assets/img/logoOnly.jpg') }}">
						
							<div class="logo-text">
								<p>The</p>
								<span>DigitalGate</span>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
<label> Already have an account? </label>
                    <a href="{{route('login')}}" class="btn-sm btn-primary d-block" style="width:max-content;">Sign In</a>
                </div>

			<form id="signup_form" action="{{route('register')}}" method="post">
				@csrf
			<div class="container-fluid pt-5 pb-5 w_full_on_res" style="text-align: -webkit-center;width: 80%;">
				<h2 class="pt-5 pb-5">Sign for The DigitalGate</h2>

				<label for="r1">
				<div class="card p-3 mb-4 signupcard" data-id="usr_type_4">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 text-right" style="align-self: center;">
							<img src="{{asset('talent/assets/img/Manager.png')}}">
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 text-left">
						<div style="font-size: 16px; font-weight: bold;">Aspirant</div>
							<label  style="font-size: 14px">I am a student or graduate looking for an Internship or Job</label>
						</div>
					</div>
				</div>
				</label>

				<label for="trainer">
				<div class="card p-3 mb-4 signupcard" data-id="usr_type_3">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 text-right" style="align-self: center;">
							<img src="{{asset('talent/assets/img/Businessman.png')}}">
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 text-left">
							<div style="font-size: 16px; font-weight: bold;">{{repalceWithMentor('Trainer')}}</div>
							<label style="font-size: 14px">I am a {{repalceWithMentor('Trainer')}} and  I offer training and tests</label>
						</div>
					</div>
				</div>
				</label>
				
		
				<div class="card p-3 mb-4 signupcard" data-id="usr_type_1" style="background: #ddd;cursor: not-allowed;pointer-events: none;">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 text-right" style="align-self: center;">
							<img src="{{asset('talent/assets/img/People.png')}}">
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 text-left">
							<div style="font-size: 16px; font-weight: bold;">Employer</div>
							<label style="font-size: 14px;">I am a recruiter looking to hire passionate aspirants or graduates</label>
						</div>
					</div>
				</div>

				
			</div>

			<p><input class="user_type_set" type="hidden" id="user_type" name="user_type"></p>
           


		</form>



		</div>
	</div>
</div>
<script src="{{asset('talent/employer/assets/js/script.js')}}"></script>