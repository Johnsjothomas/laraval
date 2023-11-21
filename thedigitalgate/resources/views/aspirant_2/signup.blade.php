
@include('talent.header')
<script>
	$.ajax({
		url:"/get_user_info?uid=1",
		type: 'GET',
		dataType: 'JSON',
		success: function(res) {
            console.log("success", res);
           return ('response');
           
        },
            error: function(err) {
			console.log("Error");
			  return ('error');

		}
    });
    

{{$id}}

 </script>

<!--pagestart-->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
			<img src="assets/img/frame_signup.svg" width="100%">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 p-5">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<img src="{{ asset('talent/assets/img/logo2.svg') }}">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<label> Already have an account? </label>
					<a href="/talent/register" class="btn-sm btn-primary">Sign In</a> 
				</div>
			</div>
			<div class="container-fluid pt-5 pb-5" style="text-align: -webkit-center;width: 80%;">
				<h2 class="pt-5 pb-5">Sign up for Industreall Talent</h2>
				<div class="card p-3 mb-4 signupcard">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 text-right" style="align-self: center;">
							<img src="{{ asset('talent/assets/img/Manager.png') }}">
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 text-left" onclick="location.href ='/talent/register';">
							<h5>Student / Working professional</h5>
							<label>If you are an Intern or Professional looking for a career </label>
						</div>
					</div>
				</div>
				<div class="card p-3 mb-4 signupcard">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 text-right" style="align-self: center;">
							<img src="{{ asset('talent/assets/img/Businessman.png') }}">
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 text-left" onclick="location.href = '/talent/register';">
							<h5>{{repalceWithMentor('Trainer')}}</h5>
							<label>If you are a {{repalceWithMentor('Trainer')}} looking to offer real world experience</label>
						</div>
					</div>
				</div>
				<div class="card p-3 mb-4 signupcard">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 text-right" style="align-self: center;">
							<img src="{{ asset('talent/assets/img/People.png') }}">
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 text-left" onclick="location.href = '/talent/register';">
							<h5>Employer</h5>
							<label>If you are looking to hire passionate Freshers and hands on Aspirants</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--pageend-->