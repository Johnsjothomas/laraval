@include('header') @include('aspirant.navigation') @include('aspirant.submenu')
<style>
.jobhigh {
	display: inline-block;
	color: #434343;
font-size: 14px;
line-height: 24px;
}
.jobhigh b{
	font-size:18px;
	display: block;
	padding: 0px;
	
}

.faicon, .jobhighs img {
	font-size: 30px;
	vertical-align: top;
	margin-right: 15px;
	height:40px;
}
.jobhighs .normalfont1{
	margin-bottom:25px;
} 
span.m10{
	margin-left:0px;
	margin-right:10px;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 whitebackground p3">
				<br> <br>
				<div class="mediumfont1 bold">
					{{$job_details->fields->Job_Title}}, {{$job_details->fields->Posted_by_Company->fields->Company_Name??''}} <span class="normalfont3 right pointer" data-toggle="modal" data-target="#application_form" style="background-color: #15284C; color: white; border-radius: 9px; border: 0.5px solid rgba(158, 158, 158, 0.5); padding: 10px 35px 10px 35px; margin: 10px"> Apply</span>
					<span class="normalfont3 right pointer" style="background-color: white; color: #15284C; border-radius: 9px; border: 0.5px solid rgba(158, 158, 158, 0.5); padding: 10px 35px 10px 35px; margin: 10px"> Save</span>
				</div>
				<div class="normalfont1">Hyderabad,Telangana ,India</div>
				<br> <br>
				<div class="row jobhighs">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 normalfont1">
						<img class="img-fluid " src="/talent/assets/img/stipend.png"><span class="jobhigh"><b>Salary/Stipend offered</b>{{$job_details->fields->Remuneration_Amount}}</span>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 normalfont1">
						<img class="img-fluid " src="/talent/assets/img/date.png"><span class="jobhigh"><b>Start Date</b>from {{$job_details->fields->Start_Date}}</span>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 normalfont1">
						<img class="img-fluid " src="/talent/assets/img/gender.png"><span class="jobhigh"><b>Gender</b>{{$job_details->fields->Gender}}</span>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 normalfont1">
						<img class="img-fluid " src="/talent/assets/img/briefcase.png"><span class="jobhigh"><b>Type of employment</b>{{$job_details->fields->Employment_Type}}</span>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 normalfont1">
						<img class="img-fluid " src="/talent/assets/img/location.png"><span class="jobhigh"><b>Location</b></span>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 normalfont1">
						<img class="img-fluid " src="/talent/assets/img/compulsory.png"><span class="jobhigh"><b>Job Category</b>{{$job_details->fields->Job_Category}}</span>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 normalfont1">
						<img class="img-fluid " src="/talent/assets/img/compulsory.png"><span class="jobhigh"><b>Compulsary Training Required</b>{{$job_details->fields->Compulsory_Training_Required}}</span>
					</div>
				</div>
				<br> <br>
				<!--about us start-->
				<div class="col-12">
					<div class="border-bottom">
						<div class="border-bottom">
							<div class="row normalfont1 bold">About us</div>
							<br>
							<div class="row normalfont2 justify">
								{{$job_details->fields->Posted_by_Company->fields->Company_Profile}}<br>
								<span class="bold">See more</span>
							</div>
						</div>
						<!--about us end-->
						<br> <br>
						<!--Job Description start-->
						<div class="border-bottom">
							<div class="row normalfont1 bold">Job Description</div>
							<br>
							<div class="row normalfont2 justify">{{$job_details->fields->Job_Description}}</div>
						</div>
					</div>
					<!--Job Description end-->
					<br> <br>
					<!--Mandatory Skillset start-->
					<div class="border-bottom">
						<div class="row normalfont1 bold">Mandatory Skillset</div>
						<br>
						<div class="row">
							
							<span class="normalfont3 m10" style="display: inline-block; color: #15284C; border-radius: 5px; border: 1px solid #15284C; padding: 1%">{{$mandatory_fields}} </span> 
							
						</div>
					</div>
					<br> <br>
					<!--Mandatory Skillset end-->
					<!--Optional Skillset start-->
					<div class="border-bottom">
						<div class="row normalfont1 bold">Optional Skillset</div>
						<br>
						<div class="row">
							<span class="normalfont3 m10" style="display: inline-block; color: #15284C; border-radius: 5px; border: 1px solid #15284C; padding: 1%">{{$optional_skillsets}} </span>
						</div>
					</div>
					<br> <br>
					<!--Optional Skillset end-->
					<!--Total Experience start-->
					<div class="border-bottom">
						<div class="row normalfont1 bold">Total Experience</div>
						<br>
						<div class="row">
							<span class="normalfont3 m10" style="display: inline-block; color: #15284C; border-radius: 5px; border: 1px solid #15284C; padding: 1%">{{$job_details->fields->Total_Experience}} </span>
						</div>
					</div>
					<br> <br>
					<!--Total Experience end-->
					<!--Relevant Experience start-->
					<div class="border-bottom">
						<div class="row normalfont1 bold">Relevant Experience</div>
						<br>
						<div class="row">
							<span class="normalfont3 m10" style="display: inline-block; color: #15284C; border-radius: 5px; border: 1px solid #15284C; padding: 1%">{{$job_details->fields->Relevant_Experience}} </span>
						</div>
					</div>
					<br> <br>
					<!--Relevant Experience end-->
					<!--Educational Qualification start-->
					<div class="border-bottom">
						<div class="row normalfont1 bold">Educational Qualification</div>
						<br>
						<div class="row normalfont2 justify">{{$job_details->fields->Educational_Qualification}}</div>
					</div>
					<!--Educational Qualification end-->
					<br> <br>
					<!--Perks start-->
					<div class="border-bottom">
						<div class="row normalfont1 bold">Perks</div>
						<br>
						<div class="row normalfont2 justify">{{$job_details->fields->Perks}}</div>
					</div>
					<!--Perks end-->
					<br> <br>
					<!--Additional information start-->
					<!-- <div class="row normalfont1 bold">Additional information</div>
					<br>
					<div class="row normalfont2 justify">None</div> -->
					<!--Additional information end-->
					<br> <br>
					<center>
						<!-- <button class="white" onclick="window.location='/talent/job/submitaproposal'" style="background: #15284C; border-radius: 5px; padding: 1%;">Submit</button> -->
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="application_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				@if($job_details->fields->Employment_Type=='Gig')
					@include('aspirant.job.application_form_gig')
				@else
					@include('aspirant.job.application_form_fulltime')
				@endif
			</div>
		</div>
	</div>
</div>
@include('footer')
