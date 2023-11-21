@include('header')
@include('aspirant.navigation')

@php
	$indusArr = array(
		"IT" => "IT",
		"Other" => "Other"
	);
@endphp

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/suggestags@1.27.0/css/amsify.suggestags.min.css">
<script src="https://cdn.jsdelivr.net/npm/suggestags@1.27.0/js/jquery.amsify.suggestags.min.js"></script>

<style>
html {
  scroll-behavior: smooth;
}
.clone_data_class + .clone_data_class {
	border-top: 5px solid #ccc;
	padding-top: 10px;
}
.delete_this_clone {
    color: #ff0000;
    font-size: 22px;
	cursor: pointer;
}
.greenblock.active {
    background-color: #FC6717;
}
.onchange_drop_common_other {
    margin-top: 5px;
}
.sticky-sidebar {
    position: -webkit-sticky;
    position: sticky;
    top: 0px;
    z-index: 1000;
}
</style>
<script type="text/javascript">
	console.log("type.....");
	var usr = 'usr_type_9';
	//get details api
	var type = sessionStorage.getItem("type");
	var access_token = sessionStorage.getItem("access_token");
	var user_id = sessionStorage.getItem("user_id");

	console.log("type.....", access_token);


	/* if(type=='C')
	   {
	     $usr='usr_type_8';
	   }
	   else
	   {
	     $usr='usr_type_9';
	   }*/
	var auth = type + access_token;
	$.ajax({
		type: "GET",
		headers: {
			"Accept": "application/json",
			"Authorization": auth
		},

		contentType: 'application/json',
		url: 'https://cors-anywhere.herokuapp.com/' + 'https://stg3.hooperlabs.com/capi/crud/' + usr + '/read/' + user_id,
		success: function(response) {
			console.log("success access_token.......", response);
			location.href = "/talent/selectfrom";
		},
		error: function(e) {
			console.log('Error In Login AJAX...', e);
		}
	});
</script>


<div class="">
	@include('aspirant.submenu')
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p3">
				<div class="graybackground sticky-sidebar">
					<center>
						<div class="profile-pic-wrapper pt-3">
							<div class="pic-holder">
								<!-- uploaded pic shown here -->
								<img id="profilePic" class="pic" src="{{setProfilePic($loggedInAUser[0]->profile_pic)}}">

								<label for="newProfilePhoto" class="upload-file-block">
									<div class="text-center">
										<div class="mb-2">
											<i class="fa fa-camera fa-2x"></i>
										</div>
									</div>
								</label>
								<Input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="display: none;" />
							</div>
						</div>

						<h3> {{session()->get('FirstName')}} </h3>

					</center>
					<center>
						<ul style="padding-inline-end: 40px;">
							<li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none;font-size:14px"> {{session()->get('Role')}}</li>
							<li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec-about">About you</a></li>
							<li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec-skills">Skills</a></li>
							<li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec-exp">Work Experience</a></li>
							<li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec-certi">Certification</a></li>
							<li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec-project">Project</a></li>
							<li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec-edu">Education</a></li>
							<li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none"><a href="#sec-resume">Resume</a></li>
							<li class="p5" style="list-style: none"><a href="#sec-addInfo">Additonal information</a></li>
							<br>

						</ul>
					</center>
				</div>
			</div>
			<!--Build your profile start-->

			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
				<br><br>
				<form action="{{route('aprodetailssave')}}" method="POST" id="apro_details_save">
					@csrf
					<div class="mediumfont bold "> Build your profile </div> <br>
					<div class="progress " style="height:10px">
						<div class="progress-bar" role="progressbar" style="width:85%;background-color: #1F1B45" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
							<span class="progress-bar-number"></span>
						</div>
					</div>
					<br><br>
					<!--build your profile end-->

					<!--about you start-->
					<div class="">
						<div class="mediumfont bold " id="sec-about"> About you </div> <br>
						<div class="normalfont2">Write your profile summary </div>
						<input class="input11" type="text" name="aboutYouName" value="{{$loggedInAUser[0]->about_you}}" placeholders="Name" />
					</div> <br><br>
					<!--about you end-->

					<!--add skills start-->
					<div class="">
						<div class="mediumfont bold " id="sec-skills"> Add skills </div> <br>
						<div class="normalfont2">Add skills to your profile </div>
						<input class="input2" type="text" id="inputSkills" name="skillsName" value="{{$loggedInAUser[0]->skills}}" placeholders="Name" readonly /> <br>
						<div class="row"> <br>
							<div style="padding: 2%">
								@php
								$greenBlockArray = array(
									"healthCare"	=> "Health Care",
									"finance"		=> "Finance",
									"cyber"			=> "Cyber Security",
									"aiMl"			=> "AI/ML/Web 3",
									"industry"		=> "Industrial",
									"legalSkill"	=> "Legal",
									"softSkill"		=> "Softskills"
								);
								@endphp
								@foreach ($greenBlockArray as $key => $item)
									<span class="greenblock parent_skill_js {{($key == $loggedInAUser[0]->parent_skill ? 'active' : '')}}" id="{{$key}}"> <i class="fa fa-bookmark" aria-hidden="true"></i> {{$item}}</span>
								@endforeach
								{{-- <span class="greenblock" id="healthCare"> <i class="fa fa-bookmark" aria-hidden="true"></i> Health Care</span>
								<span class="greenblock" id="finance"> <i class="fa fa-bookmark" aria-hidden="true"></i> Finance</span>
								<span class="greenblock" id="cyber"> <i class="fa fa-bookmark" aria-hidden="true"></i> Cyber Security</span>
								<span class="greenblock" id="aiMl"> <i class="fa fa-bookmark" aria-hidden="true"></i> AI/ML/Web 3</span>
								<span class="greenblock" id="industry"> <i class="fa fa-bookmark" aria-hidden="true"></i> Industrial</span>
								<span class="greenblock" id="legalSkill"> <i class="fa fa-bookmark" aria-hidden="true"></i> Legal</span>
								<span class="greenblock" id="softSkill"> <i class="fa fa-bookmark" aria-hidden="true"></i> Softskills</span> --}}
							</div>
						</div> <br>
						<div class="SkillitemsDiv">
							<div class="normalfont2">Suggested Skills to add </div>
							<div class="row" id="subHealthCare"> <br>
								<div style="padding: 2%">
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Nursing </span>&nbsp;
									<span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
										Welness</span>
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Medicine</span>
								</div>
							</div>

							<div class="row" id="subFinance"> <br>
								<div style="padding: 2%">
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Accounting </span>&nbsp;
									<span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
										Banking</span>
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Insurance</span>
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Trading & Investment</span>
								</div>
							</div>

							<div class="row" id="subCyber"> <br>
								<div style="padding: 2%">
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										GRC & Privacy</span>&nbsp;
									<span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
										Technology</span>
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Awareness</span>
								</div>
							</div>

							<div class="row" id="subAiMl"> <br>
								<div style="padding: 2%">
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										ML</span>&nbsp;
									<span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
										Metaverse</span>
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Blockchain</span>
								</div>
							</div>

							<div class="row" id="subIndustry"> <br>
								<div style="padding: 2%">
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										SCM </span>&nbsp;
									<span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
										Shopfloor</span>
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Industry 4.0</span>
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Construction</span>
								</div>
							</div>

							<div class="row" id="subLegalSkill"> <br>
								<div style="padding: 2%">
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Dispute Resolution </span>&nbsp;
									<span class="blueblock"><i class="fa fa-plus" aria-hidden="true"></i>
										Cyber Law </span>
								</div>
							</div>

							<div class="row" id="subSoftSkill"> <br>
								<div style="padding: 2%">
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Leadership </span>&nbsp;
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Business Communication </span>&nbsp;
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Report Writing </span>&nbsp;
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Stress Management </span>&nbsp;
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Time Management </span>&nbsp;
									<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
										Mental Health/Wellness </span>

									<!-- <div class="row" id="subSoftsSkill">
										<div style="padding: 2%"> -->
											<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
												Personality Development </span>&nbsp;
											<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
												Emotional Quotient </span>&nbsp;
											<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
												Presentation Skills </span>&nbsp;
											<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
												Customer Care/Excellence </span>&nbsp;
											<span class="blueblock"> <i class="fa fa-plus" aria-hidden="true"></i>
												Interpersonal Skills </span>&nbsp;
										<!-- </div>
									</div> -->
								</div>
							</div>
						</div>

					</div> <br>
					<!--add skills end-->

					<!--work experiance start-->

					<!-- The Buttons Added Avinash ----------------------------------------------------------->

					<div class="normalfont2">Aspirant Type</div>
							<select class='form-control' name="AspiTypeName" id="AspiTypeName">
								<option value="select">Select</option>
								<option <?php if ($loggedInAUser[0]->aspirant_type == "Professional") {
											echo "selected";
										} ?>>Professional</option>
								<option <?php if ($loggedInAUser[0]->aspirant_type == "Student") {
											echo "selected";
										} ?>>Student</option>
							</select><br>

					<div class="normalfont2">Click if you are a Professional / Student</div>
					<div class="pt-3 mb_15">


						<label style="border: 1px solid grey;" id="ProfessionalButton" for="industrial">
							<span type="button" onclick="$('.radiobtn').removeClass('bluebtn');$(this).toggleClass('bluebtn');$('#AspiTypeName').val('Professional')" class="radiobtn @if(isset($loggedInAUser[0]->aspirant_type) && $loggedInAUser[0]->aspirant_type=='Professional') bluebtn @endif mr-2"> Professional </span>
						</label>
						<input id="aspirantTypeProfessionalName" @if(isset($loggedInAUser[0]->aspirant_type) && $loggedInAUser[0]->aspirant_type=='Professional')checked="checked"@endif style="display: none" type="radio" id="industrial" name="aspirantTypeProfessionalName" value="Professional" onclick="changedata(this.value)">

						<input @if(isset($loggedInAUser[0]->aspirant_type) && $loggedInAUser[0]->aspirant_type=='Professional')checked="checked"@endif style="display: none" type="radio" id="industrial" name="aspirantTypeProfessionalName" value="Professional" onclick="changedata(this.value)">


						<label style="border: 1px solid grey;" id="StudentButton" for="softskill">
							<span type="button" onclick="$('.radiobtn').removeClass('bluebtn');$(this).toggleClass('bluebtn');$('#AspiTypeName').val('Student')" class="radiobtn @if(isset($loggedInAUser[0]->aspirant_type) && $loggedInAUser[0]->aspirant_type=='Student') bluebtn @endif"> Student </span>
						</label>

						<input @if(isset($loggedInAUser[0]->aspirant_type) && $loggedInAUser[0]->aspirant_type=='Student')checked="checked"@endif style="display: none" type="radio" id="softskill" name="aspirantTypeStudentName" value="Student" onclick="changedata(this.value)">


					</div>
					<!-- End The Buttons Added Avinash  ------------------------------------------------------>

					<div class="" id="workExp" @if(isset($loggedInAUser[0]->aspirant_type) && $loggedInAUser[0]->aspirant_type!='Professional') style="display: none;" @endif>
						<div class="mediumfont bold " id="sec-exp"> Work Experience </div> <br>
						<div class="clone_data_class_main">
							@php 
							$workExperienceArray = array();
							$workExperienceArray['recent_company'] = json_decode($loggedInAUser[0]->recent_company, true);
							$workExperienceArray['employment_type'] = json_decode($loggedInAUser[0]->employment_type, true);
							$workExperienceArray['job_title_designation'] = json_decode($loggedInAUser[0]->job_title_designation, true);
							$workExperienceArray['industry'] = json_decode($loggedInAUser[0]->industry, true);
							$workExperienceArray['job_end_date'] = json_decode($loggedInAUser[0]->job_end_date, true);
							$workExperienceArray['job_description'] = json_decode($loggedInAUser[0]->job_description, true);
							@endphp
							@if(!empty($workExperienceArray['recent_company']))
								@foreach($workExperienceArray['recent_company'] as $key => $rowData)

							<div class="clone_data_class"><i class="fa fa-trash delete_this_clone" aria-hidden="true"></i>
								<div class="normalfont2">Most Recent Company*</div>
								<input class="input2" type="text" name="recentCompName[]" value="{{$workExperienceArray['recent_company'][$key]}}" placeholders="Name" /> <br> <br>
								<div class="row">

									<div class="col-lg-6">
										<div class="normalfont2">Employement Type*</div>
										<input class="input2" type="text" value="{{$workExperienceArray['employment_type'][$key]}}" name="employTypeName[]" placeholders="Name" />
									</div>

									<div class="col-lg-6">
										<div class="normalfont2">Most Recent Job title*</div>
										<input class="input2" type="text" name="recentJobTitleName[]" value="{{$workExperienceArray['job_title_designation'][$key]}}" placeholders="Name" />
									</div>
								</div>
								<br>
								<div class="normalfont2">Industry*</div>
								<select class="form-control onchange_drop_common" name="industryName[]">
									@php
										$checkSelected = "";
									@endphp
									@foreach($indusArr as $indusArrKey => $indusArrRowData)
										@php
											if($indusArrRowData == $workExperienceArray['industry'][$key])
											{
												$checkSelected = "selected";
											}
										@endphp
										<option value="{{$indusArrRowData}}" {{(($indusArrRowData == $workExperienceArray['industry'][$key]) || ($indusArrRowData == "Other" && $checkSelected == '') ? 'selected' : '')}}>{{$indusArrRowData}}</option>
									@endforeach
								</select>

								<input class="input2 onchange_drop_common_other" type="text" style="{{$checkSelected != '' ? 'display: none;' : ''}}" name="industryNameOther[]" value="{{$checkSelected != '' ? '' : $workExperienceArray['industry'][$key]}}" {{$checkSelected != '' ? '' : 'required'}} placeholder="Industry" /> <br><br>

								<div class="row">
									<br>

									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<div class="normalfont2">End Date*</div>
										<input type="text" class="d form-control datepicker_common_element" autocomplete="off" value="{{($workExperienceArray['job_end_date'][$key] ? date("d-m-Y",strtotime($workExperienceArray['job_end_date'][$key])) : '')}}" placeholder="End" name="jobEndDateName[]">
									</div>


								</div>
								<br>

								<div class="normalfont2">Description*</div>
								<textarea class="input11" type="text" name="jobDescrpName[]" placeholders="Name">{{$workExperienceArray['job_description'][$key]}}</textarea>
								<br> <br>
							</div>
							@endforeach
							@endif
						</div>
						<center>
							<button type="button" class="white" onclick="addRow('work_experience')" style="background:#15284C;border-radius: 5px; padding:1%;"> Add </button>
						</center>

					</div>
					<!--work experiance end-->
					<br> <br>
					<!--Certification start-->
					<div class="">
						<div id="certificationWrapper">
							<div class="mediumfont bold " id="sec-certi"> Certifications</div> <br>
							<div class="clone_data_class_main">
								@php 
								$certificationsArray = array();
								$certificationsArray['certification_name'] = json_decode($loggedInAUser[0]->certification_name,true); 
								$certificationsArray['certification_expiry_date'] = json_decode($loggedInAUser[0]->certification_expiry_date,true);
								@endphp
								@if(!empty($certificationsArray['certification_name']))
									@foreach($certificationsArray['certification_name'] as $key => $rowData)
										<div class="clone_data_class">
											<i class="fa fa-trash delete_this_clone" aria-hidden="true"></i>
											<div class="normalfont2">Name of the Certification</div>
											<input class="input2" type="text" name="certificationName[]" value="{{$certificationsArray['certification_name'][$key]}}" placeholders="Name" required/> <br> <br>
											<div class="pt-3 mb_15">
												<div class="normalfont2">Expiry Year</div>
												<select class='form-control' name="certiExpiryYearName[]" required>
													<option value="">Select</option>
													<?php 
													for($i = 2022; $i <= 2031; $i++)
													{
														?>
														<option <?=($certificationsArray['certification_expiry_date'][$key] == $i ? 'selected' : '')?>><?=$i?></option>
														<?php 
													}
													?>
												</select>
											</div>
											<br>
										</div>
									@endforeach
								@endif
							</div>
						</div>

						<center>
							<button type="button" class="white" onclick="addRow('certificate')" style="background:#15284C;border-radius: 5px; padding:1%;"> Add </button>
						</center>
					</div>
					<!--Certification end-->
					<br> <br>
					<!--project-->
					<div class="" id="project_add">
						<div class="mediumfont bold " id="sec-project"> Project</div> <br>
						<div class="clone_data_class_main">
							@php 
							$projectArray = array();
							$projectArray['project_name'] = json_decode($loggedInAUser[0]->project_name, true);
							$projectArray['project_end_date'] = json_decode($loggedInAUser[0]->project_end_date, true);
							$projectArray['project_description'] = json_decode($loggedInAUser[0]->project_description, true);
							@endphp
							@if(!empty($projectArray['project_name']))
								@foreach($projectArray['project_name'] as $key => $rowData)

							<div class="clone_data_class"><i class="fa fa-trash delete_this_clone" aria-hidden="true"></i>
								<div class="normalfont2">Name of the Project</div>
								<input class="input2" type="text" name="projectName[]" value="{{$projectArray['project_name'][$key]}}" placeholders="Name" /> <br><br>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
										<div class="normalfont2">End Date*</div>
										<input type="text" class="d form-control datepicker_common_element" autocomplete="off" placeholder="End" name="projectEnddateName[]" value="{{($projectArray['project_end_date'][$key] ? date('d-m-Y',strtotime($projectArray['project_end_date'][$key])) : '')}}">
									</div>

								</div> <br>
								<div class="normalfont2">Description*</div>
								<textarea class="input11" type="text" name="projectDescName[]" placeholders="Name">{{$projectArray['project_description'][$key]}}</textarea>
								<br><br><br>
							</div>
							@endforeach
							@endif
						</div>
						<center>
							<button type="button" class="white" onclick="addRow('project')" style="background:#15284C;border-radius: 5px; padding:1%;"> Add</button>
						</center>
					</div>
					<br>

					<!--Education-->
					<br> <br>
					<div class="" id="education_add">
						<div class="mediumfont bold " id="sec-edu"> Education</div> <br>
						<div class="clone_data_class_main">
							@php 
							$educationArray = array();
							$educationArray['school_college_university'] = json_decode($loggedInAUser[0]->school_college_university, true);
							$educationArray['degree'] = json_decode($loggedInAUser[0]->degree, true);
							$educationArray['final_year_date'] = json_decode($loggedInAUser[0]->final_year_date, true);
							@endphp
							@if(!empty($educationArray['school_college_university']))
								@foreach($educationArray['school_college_university'] as $key => $rowData)

							<div class="clone_data_class"><i class="fa fa-trash delete_this_clone" aria-hidden="true"></i>
								<div class="normalfont2">School or Collage/University*</div>
								<input class="input2" type="text" name="schoolName[]" value="{{$educationArray['school_college_university'][$key]}}" placeholders="Name" required/> <br><br>

								<div class="normalfont2">Degree*</div>
								<select class="form-control onchange_drop_common" name="degreeName[]">
									@php
										$checkSelected = "";
									@endphp
									@foreach($indusArr as $indusArrKey => $indusArrRowData)
										@php
											if($indusArrRowData == $educationArray['degree'][$key])
											{
												$checkSelected = "selected";
											}
										@endphp
										<option value="{{$indusArrRowData}}" {{(($indusArrRowData == $educationArray['degree'][$key]) || ($indusArrRowData == "Other" && $checkSelected == '') ? 'selected' : '')}}>{{$indusArrRowData}}</option>
									@endforeach
								</select>
								
								<input class="input2 onchange_drop_common_other" type="text" style="{{$checkSelected != '' ? 'display: none;' : ''}}" name="degreeNameOther[]" value="{{$checkSelected != '' ? '' : $educationArray['degree'][$key]}}" {{$checkSelected != '' ? '' : 'required'}} placeholder="Degree*" /> <br><br>

								<div class="row">
									<div class="col-lg-3">
										<div class="normalfont2">End date*</div>
										<input class="d form-control datepicker_common_element" autocomplete="off" id="childdob" type="text" name="finalYearDateName[]" value="{{($educationArray['final_year_date'][$key] ? date('d-m-Y',strtotime($educationArray['final_year_date'][$key])) : '')}}" required>
									</div>
								</div>
								<br><br>
							</div>
							@endforeach
							@endif
						</div>
						<center>
							<button type="button" class="white" onclick="addRow('education')" style="background:#15284C;border-radius: 5px; padding:1%;"> Add </button>
						</center> <br><br>
					</div>

					<!--resume-->
					<div class="">
						<div class="mediumfont bold " id="sec-resume"> Upload your Resume</div> <br>
						<center>

							<div class="form-group inputDnD">
								<input type="file" class="form-control-file text-primary" id="myFile" name="myResume" data-title="{{($loggedInAUser[0]->resume_file_original_name ? basename($loggedInAUser[0]->resume_file_original_name) : 'Drag & Drop your files here')}}" accept="application/msword, application/pdf">

								<input type="hidden" name="oldResumeName" value="{{$loggedInAUser[0]->resume_path}}">
								
								<input type="hidden" name="oldResumeFileOriginalName" value="{{$loggedInAUser[0]->resume_file_original_name}}">
							</div>
							<div class="p-2" style="color: #8692A6;">you can upload a word or pdf files </div>
					</div>
					<br>

					<!--Additional info-->
					<div class="">
						<div class="mediumfont bold " id="sec-addInfo"> Additional information</div> <br>
						<div class="normalfont2">
							<div class="normalfont2">* Enter your Date of Birth</div>
							<input class="d form-control datepicker_common_element" autocomplete="off" id="childdob" type="text" name="dobName" value="{{(@$loggedInAUser[0]->dob && $loggedInAUser[0]->dob != '0000-00-00' ? date('d-m-Y',strtotime($loggedInAUser[0]->dob)) : '')}}">
						</div> <br>

						<div class="pt-3 mb_15">
							<div class="normalfont2">* Gender</div>
							<select class='form-control' name="genderName" required>
								<option value="">Select</option>
								<option <?php if ($loggedInAUser[0]->gender == "Male") {
											echo "selected";
										} ?>>Male</option>
								<option <?php if ($loggedInAUser[0]->gender == "Female") {
											echo "selected";
										} ?>>Female</option>
							</select>
						</div>

						<div class="pt-3 mb_15">
							<div class="normalfont2">* Work Permit (Country)</div>
							<select class='form-control' name="workPermitName">
								<option>Select</option>
								<option <?php if ($loggedInAUser[0]->work_permit == "India") {
											echo "selected";
										} ?>>India</option>
								<option <?php if ($loggedInAUser[0]->work_permit == "UAE") {
											echo "selected";
										} ?>>UAE</option>
								<option <?php if ($loggedInAUser[0]->work_permit == "England") {
											echo "selected";
										} ?>>England</option>
								<option <?php if ($loggedInAUser[0]->work_permit == "France") {
											echo "selected";
										} ?>>France</option>
								<option <?php if ($loggedInAUser[0]->work_permit == "Germany") {
											echo "selected";
										} ?>>Germany</option>
								<option <?php if ($loggedInAUser[0]->work_permit == "USA") {
											echo "selected";
										} ?>>USA</option>
								<option <?php if ($loggedInAUser[0]->work_permit == "Oman") {
											echo "selected";
										} ?>>Oman</option>
							</select>
						</div>

						<div class="pt-3 mb_15">
							<div class="normalfont2">Languages</div>
							<div class="row">
								<?php $language = ($loggedInAUser[0]->languages_known == "") ? [] : json_decode($loggedInAUser[0]->languages_known); ?>
								<div class="col graybackground2 m-2 text-center">
									<input type="checkbox" name="checkLanguageName[]" value="English" id="englishId" <?php if (in_array("English", $language)) {
																															echo "checked";
																														} ?>>
									<label for="englishId"> English</label>
								</div>
								<div class="col graybackground2 m-2 text-center">
									<input type="checkbox" name="checkLanguageName[]" value="Arabic" id="arabicID" <?php if (in_array("Arabic", $language)) {
																														echo "checked";
																													} ?>>
									<label for="arabicID"> Arabic</label>
								</div>
								<div class="col graybackground2 m-2 text-center">
									<input type="checkbox" name="checkLanguageName[]" value="French" id="frenchID" <?php if (in_array("French", $language)) {
																														echo "checked";
																													} ?>>
									<label for="frenchID"> French</label>
								</div>
								<div class="col graybackground2 m-2 text-center">
									<input type="checkbox" name="checkLanguageName[]" value="Spanish" id="spanishID" <?php if (in_array("Spanish", $language)) {
																															echo "checked";
																														} ?>>
									<label for="spanishID">Spanish</label>
								</div>
								<div class="col graybackground2 m-2 text-center">
									<input type="checkbox" name="checkLanguageName[]" value="Hindi" id="hindiID" <?php if (in_array("Hindi", $language)) {
																														echo "checked";
																													} ?>>
									<label for="hindiID"> Hindi</label>
								</div>
							</div>
						</div>

						<div class="pt-3 mb_15">
							<div class="normalfont2">Preferred location</div>
							<select class='form-control' name="preferLocationName">
								<option>Select</option>
								<option <?php if ($loggedInAUser[0]->preferred_location == "Work From Home") {
											echo "selected";
										} ?>>Work From Home</option>
								<option <?php if ($loggedInAUser[0]->preferred_location == "Anywhere") {
											echo "selected";
										} ?>>Anywhere</option>
								<option <?php if ($loggedInAUser[0]->preferred_location == "USA") {
											echo "selected";
										} ?>>USA</option>
								<option <?php if ($loggedInAUser[0]->preferred_location == "UAE") {
											echo "selected";
										} ?>>UAE</option>
								<option <?php if ($loggedInAUser[0]->preferred_location == "France") {
											echo "selected";
										} ?>>France</option>
								<option <?php if ($loggedInAUser[0]->preferred_location == "England") {
											echo "selected";
										} ?>>England</option>
								<option <?php if ($loggedInAUser[0]->preferred_location == "Germany") {
											echo "selected";
										} ?>>Germany</option>
								<option <?php if ($loggedInAUser[0]->preferred_location == "India") {
											echo "selected";
										} ?>>India</option>
							</select>
						</div>
						<br>
						<div class="normalfont2">Industries</div>
						{{--  --}}
						<select class="form-control onchange_drop_common" name="industriesName">
							@php
								$checkSelected = "";
							@endphp
							@foreach($indusArr as $indusArrKey => $indusArrRowData)
								@php
									if($indusArrRowData == $loggedInAUser[0]->industries)
									{
										$checkSelected = "selected";
									}
								@endphp
								<option value="{{$indusArrRowData}}" {{(($indusArrRowData == $loggedInAUser[0]->industries) || ($indusArrRowData == "Other" && $checkSelected == '') ? 'selected' : '')}}>{{$indusArrRowData}}</option>
							@endforeach
						</select>

						<input class="input2 onchange_drop_common_other" type="text" style="{{$checkSelected != '' ? 'display: none;' : ''}}" name="industriesNameOther" value="{{$checkSelected != '' ? '' : $loggedInAUser[0]->industries}}" placeholder="Industries" /> <br><br>
						{{--  --}}
					</div>

					<div class="">
						<center>
							<!-- <button onclick="window.location='talent/aspirant/myprofile'" class="white" style="background:#15284C;border-radius: 5px; padding:1%;">&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Done&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> -->
							<button type="submit" type="submit" class="white" style="background:#15284C;border-radius: 5px; padding:1%;">&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Done&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
							<br>
						</center>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<br><br>

<!--IMAGE UPLOADER-->
<script>
	$(document).on("change", ".uploadProfileInput", function() {
		var triggerInput = this;
		var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
		var holder = $(this).closest(".pic-holder");
		var wrapper = $(this).closest(".profile-pic-wrapper");
		$(wrapper).find('[role="alert"]').remove();
		var files = !!this.files ? this.files : [];
		if (!files.length || !window.FileReader) {
			return;
		}
		if (/^image/.test(files[0].type)) {
			// only image file
			if((files[0].size / 1048576) > 1.5)
			{
				$(triggerInput).val("");
				$(wrapper).append(
					'<div class="alert alert-danger d-inline-block p-2 small" role="alert">The profile pic must not be greater than 1.5MB.</div>'
				);
				setTimeout(() => {
					$(wrapper).find('[role="alert"]').remove();
				}, 5000);
				return;
			}
			var reader = new FileReader(); // instance of the FileReader
			reader.readAsDataURL(files[0]); // read the local file

			reader.onloadend = function() {
				const resultImg = this.result;

				$(holder).addClass("uploadInProgress");
				$(holder).find(".pic").attr("src", resultImg);
				$(holder).append(
					'<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
				);
				// first convert to blob
				fetch(resultImg)
				.then(res => res.blob())
				.then(function (profile_pic) {
					var data = new FormData();
					data.append('profile_pic', profile_pic);
					data.append('ext', files[0].name.split('.').pop());
					data.append('_token', '{{csrf_token()}}');
					$.ajax({
						url: "{{route('aproDetailsSaveProfilePic')}}",
						type: "POST",
						dataType: "json",
						data: data,
						contentType: false,
						processData: false,
						success: function(response)
						{
							$(holder).removeClass("uploadInProgress");
							$(holder).find(".upload-loader").remove();
							// If upload successful
							if (response.status) {
								$(wrapper).append(
									'<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
								);

								// Clear input after upload
								$(triggerInput).val("");

								setTimeout(() => {
									$(wrapper).find('[role="alert"]').remove();
								}, 3000);
							} else {
								$(holder).find(".pic").attr("src", currentImg);
								$(wrapper).append(
									'<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
								);

								// Clear input after upload
								$(triggerInput).val("");
								setTimeout(() => {
									$(wrapper).find('[role="alert"]').remove();
								}, 5000);
							}
						},
						error: function(err)
						{
							err = err.responseJSON ? err.responseJSON : {};
							//alert_msg(0, (err.message ? err.message : 'Something went wrong.'));

							// console.log("err", err);
							$(holder).find(".pic").attr("src", currentImg);
							$(triggerInput).val("");
							$(holder).removeClass("uploadInProgress");
							$(holder).find(".upload-loader").remove();
							$(wrapper).append(
								'<div class="alert alert-danger d-inline-block p-2 small" role="alert">'+(err.message ? err.message : 'Something went wrong.')+'</div>'
							);
							setTimeout(() => {
								$(wrapper).find('[role="alert"]').remove();
							}, 5000);
						}
					});
				});
			};
		} else {
			$(wrapper).append(
				'<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
			);
			setTimeout(() => {
				$(wrapper).find('[role="alert"]').remove();
			}, 5000);
		}
	});
</script>

<!--Datepicker-->
<script>
	$('.from_y').datepicker({
		format: "yyyy",
		autoclose: true,
		minViewMode: "years"
	}).on('changeDate', function(selected) {
		startDate = $(".from_y").val();
		$('.to_y').datepicker('setStartDate', startDate);
	});;


	$('.to_y').datepicker({
		format: "yyyy",
		autoclose: true,
		minViewMode: "years"
	});

	$('.from_m').datepicker({
		format: "dd MM yyyy",
		autoclose: true,
		//	minViewMode: "months"
	}).on('changeDate', function(selected) {
		startDate = $(".from_m").val();
		$('.to_m').datepicker('setStartDate', startDate);
	});;


	$('.to_m').datepicker({
		format: "dd MM yyyy",
		autoclose: true,
		//	minViewMode: "months"
	});


	function addRow(type) {

		if(type == 'certificate')
		{
			var html = '<div class="clone_data_class"><i class="fa fa-trash delete_this_clone" aria-hidden="true"></i><div class="normalfont2">Name of the Certification</div><input class="input2" type="text" name="certificationName[]" value="" placeholders="Name" required><br><br><div class="pt-3 mb_15"><div class="normalfont2">Expiry Year</div><select class="form-control" name="certiExpiryYearName[]" required><option value="">Select</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option><option>2026</option><option>2027</option><option>2028</option><option>2029</option><option>2030</option><option>2031</option></select></div><br></div>';

			$("#certificationWrapper .clone_data_class_main").append(html);
			// $('.datepicker_common_element1').datepicker("destroy");
			// $('.datepicker_common_element1').datepicker({
			// 	format: "dd-mm-yyyy",
			// 	autoclose: true,
			// });
		}
		else if(type == 'work_experience')
		{
			var html = '<div class="clone_data_class"><i class="fa fa-trash delete_this_clone" aria-hidden="true"></i>';
				html += '<div class="normalfont2">Most Recent Company*</div>';
				html += '<input class="input2" type="text" name="recentCompName[]" value="" placeholders="Name" /> <br> <br>';
				html += '<div class="row">';

					html += '<div class="col-lg-6">';
						html += '<div class="normalfont2">Employement Type*</div>';
						html += '<input class="input2" type="text" value="" name="employTypeName[]" placeholders="Name" />';
						html += '</div>';

						html += '<div class="col-lg-6">';
							html += '<div class="normalfont2">Most Recent Job title*</div>';
							html += '<input class="input2" type="text" name="recentJobTitleName[]" value="" placeholders="Name" />';
							html += '</div>';
							html += '</div>';
							html += '<br>';
							html += '<div class="normalfont2">Industry*</div>';
							html += '<select class="form-control onchange_drop_common" name="industryName[]">';
								@foreach($indusArr as $indusArrKey => $indusArrRowData)
									html += '<option value="{{$indusArrRowData}}">{{$indusArrRowData}}</option>';
								@endforeach
							html += '</select>';

							html += '<input class="input2 onchange_drop_common_other" type="text" style="display: none;" name="industryNameOther[]" value="" placeholder="Industry*" /> <br><br>';
							html += '<div class="row">';
								html += '<br>';
								html += '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
									html += '<div class="normalfont2">End Date*</div>';
									html += '<input type="text" class="d form-control datepicker_common_element1" autocomplete="off" value="" placeholder="End" name="jobEndDateName[]">';
								html += '</div>';
							html += '</div>';
						html += '<br>';
						html += '<div class="normalfont2">Description*</div>';
						html += '<textarea class="input11" type="text" name="jobDescrpName[]" placeholders="Name"></textarea>';
						html += '<br> <br>';
				html += '</div>';
			
			$("#workExp .clone_data_class_main").append(html);
			$('.datepicker_common_element1').datepicker("destroy");
			$('.datepicker_common_element1').datepicker({
				format: "dd-mm-yyyy",
				autoclose: true,
			});
		}
		else if(type == 'project')
		{
			var html = '<div class="clone_data_class"><i class="fa fa-trash delete_this_clone" aria-hidden="true"></i>';
				html += '<div class="normalfont2">Name of the Project</div>';
				html += '<input class="input2" type="text" name="projectName[]" value="" placeholders="Name" /> <br><br>';
				html += '<div class="row">';
					html += '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">';
						html += '<div class="normalfont2">End Date*</div>';
						html += '<input type="text" class="d form-control datepicker_common_element1" autocomplete="off" placeholder="End" name="projectEnddateName[]" value="">';
					html += '</div>';
				html += '</div> <br>';
				html += '<div class="normalfont2">Description*</div>';
				html += '<textarea class="input11" type="text" name="projectDescName[]" placeholders="Name"></textarea>';
				html += '<br><br><br>';
			html += '</div>';
			
			$("#project_add .clone_data_class_main").append(html);
			$('.datepicker_common_element1').datepicker("destroy");
			$('.datepicker_common_element1').datepicker({
				format: "dd-mm-yyyy",
				autoclose: true,
			});
		}
		else if(type == 'education')
		{
			var html = '<div class="clone_data_class"><i class="fa fa-trash delete_this_clone" aria-hidden="true"></i>';
					html += '<div class="normalfont2">School or Collage/University*</div>';
					html += '<input class="input2" type="text" name="schoolName[]" value="" placeholders="Name" required/> <br><br>';
					html += '<div class="normalfont2">Degree*</div>';
					html += '<select class="form-control onchange_drop_common" name="degreeName[]">';
						@foreach($indusArr as $indusArrKey => $indusArrRowData)
							html += '<option value="{{$indusArrRowData}}">{{$indusArrRowData}}</option>';
						@endforeach
					html += '</select>';
					
					html += '<input class="input2 onchange_drop_common_other" type="text" style="display: none;" name="degreeNameOther[]" value="" placeholder="Degree*" /> <br><br>';
					html += '<div class="row">';
						html += '<div class="col-lg-3">';
							html += '<div class="normalfont2">End date*</div>';
							html += '<input class="d form-control datepicker_common_element1" autocomplete="off" id="childdob" type="text" name="finalYearDateName[]" value="" required>';
							html += '</div>';
							html += '</div>';
							html += '<br><br>';
							html += '</div>';
			
			$("#education_add .clone_data_class_main").append(html);
			$('.datepicker_common_element1').datepicker("destroy");
			$('.datepicker_common_element1').datepicker({
				format: "dd-mm-yyyy",
				autoclose: true,
			});
		}
	}
	function changedata(val)
	{

	}

	function removeEditAccess() {
		$(".amsify-suggestags-area .amsify-suggestags-input").attr("readonly", "readonly");
		$(".amsify-suggestags-area .amsify-suggestags-input").attr("placeholder", "");
	}
	$(document).ready(function() {
		amsifySuggestags = new AmsifySuggestags($('#inputSkills'));
		amsifySuggestags._settings({
			printValues: false
		});
		amsifySuggestags._init();
		removeEditAccess();

		$("#subHealthCare").hide();
		$("#subFinance").hide();
		$("#subCyber").hide();
		$("#subAiMl").hide();
		$("#subIndustry").hide();
		$("#subLegalSkill").hide();
		$("#subSoftSkill").hide();
		var selected_idMain = '{{$loggedInAUser[0]->parent_skill ? $loggedInAUser[0]->parent_skill : ''}}';
		if(selected_idMain)
		{
			selected_idMain = selected_idMain.charAt(0).toUpperCase() + selected_idMain.slice(1);
			$("#sub"+selected_idMain).show();
		}


		$('.datepicker_common_element').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true,
		});

		$(".parent_skill_js").click(function(e) {
			
			if(!$(this).hasClass("active"))
			{
				$("#inputSkills").val("");
				amsifySuggestags.destroy();
				amsifySuggestags = new AmsifySuggestags($('#inputSkills'));
				amsifySuggestags._settings({
					printValues: false
				});
				amsifySuggestags._init();
				removeEditAccess();
				$(".parent_skill_js").removeClass("active");
				$(this).addClass("active");
			}

			var selected_id = $(this).attr("id");
			selected_id = selected_id.charAt(0).toUpperCase() + selected_id.slice(1);
			$(".SkillitemsDiv .row").slideUp();
			$(".SkillitemsDiv .row#sub"+selected_id).slideDown();
		});
		$("#ProfessionalButton").click(function() {
			$("#workExp").show();
		});
		$("#StudentButton").click(function() {
			$("#workExp").hide();
		});
		$(function() {
			$('.SkillitemsDiv span').click(function() {
				var value = $(this).text().trim();
				var input = $('#inputSkills');
				var inputVal = $('#inputSkills').val();
				if(!inputVal.includes(value))
				{
					amsifySuggestags.addTag(value);
					// input.val(input.val() + value + ',');
				}
				return false;
			});
			$('#AspiTypeName').change(function() {
				var value = $(this).val();
				if(value == 'Professional')
				{
					$("#ProfessionalButton span").trigger("click");
				}
				else if(value == 'Student')
				{
					$("#StudentButton span").trigger("click");
				}
			});
			$("body").on('change', '#myFile', function(e){
				e.preventDefault();
				var data_text = $(this).attr("data_text");
				if(!data_text || data_text == '')
				{
					data_text = 'Drag & Drop your files here';
				}
				if(e.target.files.length > 0)
				{
					for(i = 0; i < e.target.files.length; i++)
					{
						if(i == 0)
						{
							$(this).attr("data-title", e.target.files[0].name);
						}
						else
						{
							$(this).attr("data-title", $(this).attr("data-title") + ',' + e.target.files[i].name);
						}
					}
				}
				else
				{
					$(this).attr("data-title", data_text);
				}
			});
		});
		$("#apro_details_save").submit(function(e){
			e.preventDefault();
			
			var files = $(this).find('[name="myResume"]').prop('files');
			if(files.length > 0 && (files[0].size / 1048576) > 1.5)
			{
				alert_msg(0, "The resume must not be greater than 1.5MB...!");
				return;
			}
			// var blank_certification_year = 0;
			// var total_certification_block = $(this).find("[name='certiExpiryYearName[]'").length;
			// if(total_certification_block > 0)
			// {
			// 	$(this).find("[name='certiExpiryYearName[]'").each(function(){
			// 		var this_select_val = $(this).val();
			// 		if(this_select_val == "")
			// 		{
			// 			blank_certification_year++;
			// 			console.log("blank_certification_year",blank_certification_year)
			// 		}
			// 		console.log("inside",this_select_val);
			// 	});
			// }
			// console.log("blank_certification_year",blank_certification_year)
			// if(blank_certification_year > 0)
			// {
			// 	alert_msg(0, 'Please Fill Certification Expiry Year..!!');
			// 	return false;
			// }
			
			jQuery(".loder").show();
			var data = new FormData(this);

			let parent_skillData = $(".parent_skill_js.active").attr("id");
			if(!parent_skillData)
			{
				parent_skillData = '';
			}
			data.append("parent_skill", parent_skillData);
			var $this = $(this);
			$.ajax({
				url: "{{route('aprodetailssave')}}",
				type: "POST",
				dataType: "json",
				data: data,
				contentType: false,
				processData: false,
				success: function(response)
				{
					if(response.status)
					{
						alert_msg(1, response.msg);
						// $this[0].reset();
						setTimeout(function(){
							window.location.href = "{{route('Aspimyprofile')}}";
						}, 2000);
					}
					else
					{
						alert_msg(0, response.msg);
					}
					jQuery(".loder").hide();
				},
				error: function(err)
				{
					jQuery(".loder").hide();
					err = err.responseJSON ? err.responseJSON : {};
					alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
				}
			});
		});
		$("body").on("click", ".delete_this_clone", function(e){
			e.preventDefault();
			$(this).closest(".clone_data_class").remove();
		});
		$("body").on("change", '#apro_details_save .onchange_drop_common', function(e){
			e.preventDefault();
			if($(this).val() == 'Other')
			{
				$(this).next(".onchange_drop_common_other").slideDown();
				$(this).next(".onchange_drop_common_other").prop("required", true);
			}
			else
			{
				$(this).next(".onchange_drop_common_other").slideUp();
				$(this).next(".onchange_drop_common_other").prop("required", false);
			}
		});
	});
</script>

@include('footer')