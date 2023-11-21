@include('header')
@include('aspirant.navigation')
@include('aspirant.submenu')
<!-- aspirant profile viewpage -->
<style>
.normalfont2 {
    font-weight: bold;
}
</style>
<div class="container-fluid">
  <div class="row" style="background: #E5E5E5;">
    <div class="container justify-content-center align-center pt-5">
      <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png">
      <div class="row" style=" position: relative; top: -70px;">
        <div class="col-sm-3">
          <div class="profile-pic-wrapper pt-3">
            <div class="pic-holder">
              <!-- uploaded pic shown here -->
              <img id="profilePic" class="pic" src="{{setProfilePic($loggedInUserAspi[0]->profile_pic)}}">
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="top: 74px;">
          <h3>{{session()->get('FirstName')}}</h3>
          <h6>{{repalceWithMentorRole(session()->get('Role'))}}</h6>
      </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row justify-content-center align-center">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p-3">
          <div class="p-2" style="    background-color: white;">
          <div class="mediumfont">{{$loggedInUserAspi[0]->first_name}}<i class="fa fa-check-circle" aria-hidden="true" style="color: green;"></i>
              <a href="{{route('aprodetails')}}" class="bluebtn btn-sm pl-3 pr-3" style="float:right; text-align:center;">Edit</a>
            </div>  
          <br>
            <!-- <div class="mediumfont">{{$loggedInUserAspi[0]->first_name}}</div><br> -->
            <div class="border-bottom"></div>
            <br>
            <div class="mediumfont1">About me</div><br>
            <div class="normalfont2 bluefontcolor border-bottom ">{{$loggedInUserAspi[0]->about_you}}</div><br>
            <div class="mediumfont1">Skills</div><br>
            <div class="border-bottom ">

              <span class="normalfont3 m10" style="color:#15284C;border-radius:5px;border: 1px solid #15284C;padding:2%;display:block;">{{trim($loggedInUserAspi[0]->skills,",")}}</span>
            </div>
            <div class="border-bottom "><br>
              <div class="mediumfont1">Additional information</div><br>
              <div class="normalfont2 p3">D.O.B: <span class="dob normalfont3">  {{dateFormatFromAny($loggedInUserAspi[0]->dob, "d-m-Y")}}</span></div>
              <div class="normalfont2 p3">Gender: <span class="dob normalfont3">{{$loggedInUserAspi[0]->gender}}</span></div>
              <div class="normalfont2 p3">Work Permit:<span class="dob normalfont3"> {{$loggedInUserAspi[0]->work_permit}} </span></div>
              {{-- <div class="normalfont2 p3">Marital status: <span class="dob normalfont3"> </span></div> --}}

              @php
                $languages_known = @$loggedInUserAspi[0]->languages_known ? implode(', ',json_decode($loggedInUserAspi[0]->languages_known, true)) : '';
              @endphp

              <div class="normalfont2 p3">Languages: <span class="dob normalfont3">{{$languages_known}}</span></div>
              <div class="normalfont2 p3">Preferred location: <span class="dob normalfont3"> {{$loggedInUserAspi[0]->preferred_location}}</span></div>
              <div class="normalfont2 p3">Industries: <span class="dob normalfont3">{{$loggedInUserAspi[0]->industries}}</span></div>
            </div>
            <div>
              <br><br><br>
              <span class="normalfont3 m10 right" style="display: inline-block;color:#15284C;border-radius:5px;border: 1px solid #15284C;padding:2%"> <a href="{{setResumeUrl($loggedInUserAspi[0]->resume_path)}}" download>Download my Resume</a></span>
              <br><br><br>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 p-3">
          <div style="    background-color: white;">
            <br><br>
            <div class="work p5 border-bottom">
              <div class="mediumfont1">Work experience</div><br>
              @php 
							$workExperienceArray = array();
							$workExperienceArray['recent_company'] = json_decode($loggedInUserAspi[0]->recent_company, true);
							$workExperienceArray['employment_type'] = json_decode($loggedInUserAspi[0]->employment_type, true);
							$workExperienceArray['job_title_designation'] = json_decode($loggedInUserAspi[0]->job_title_designation, true);
							$workExperienceArray['industry'] = json_decode($loggedInUserAspi[0]->industry, true);
							$workExperienceArray['job_end_date'] = json_decode($loggedInUserAspi[0]->job_end_date, true);
							$workExperienceArray['job_description'] = json_decode($loggedInUserAspi[0]->job_description, true);
							@endphp
							@if(!empty($workExperienceArray['recent_company']))
								@foreach($workExperienceArray['recent_company'] as $key => $rowData)
                  <div class="row border-bottom">
                    <br>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                      <center>
                        <!-- <img class="img-responsive " src="{{ asset('talent/assets/img/experiencelogo.png') }}" /> -->
                        <div class="normalfont3"><i class="fa fa-briefcase" aria-hidden="true" style="font-size: 36px;"></i></div>
                      </center>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                      <div class="">
                        <div class="normalfont1 bold"> {{$workExperienceArray['recent_company'][$key]}} </div>
                        <div class="dob normalfont3"> {{$workExperienceArray['job_end_date'][$key]}} </div><br>
                        <div class=" normalfont3">-  {{$workExperienceArray['employment_type'][$key]}} <br>
                          - {{$workExperienceArray['job_title_designation'][$key]}} <br>
                          - {{$workExperienceArray['industry'][$key]}} <br>
                          - {{$workExperienceArray['job_description'][$key]}}
                          {{-- …<span class="skybluefont">See more</span> --}}
                        </div>
                        <br><br>

                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
              {{-- <div class="row">
                <br>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                  <center>
                    <img class="img-responsive " src="{{ asset('talent/assets/img/experiencelogo.png') }}" />
                  </center>

                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                  <div class="">
                    <div class="normalfont1">Design inter Book mark</div>
                    <div class="dob normalfont3">Jan 2017 - May 2018 Goa,india </div><br>
                    <div class=" normalfont3">- Used Root Cause Analysis (RCA), 8D’s, resolution effectiveness tracking, and various other diagnostic techniques to identify issues that could potentially affect the quality of mechanical and electrical components of Tesla’s Models X and S vehicles. <br>
                      - Located and rectified issues that effected the reliability of specified systems through hands-on and 3D CAD reverse engineering in order to implement long-term corrective actions.
                      <span class="skybluefont">See more</span>
                    </div>
                    <br>

                  </div>
                </div>
              </div> --}}
            </div>
            <div class="certificate p5 border-bottom">
              <div class="mediumfont1">Certifications</div><br>
              @php 
								$certificationsArray = array();
								$certificationsArray['certification_name'] = json_decode($loggedInUserAspi[0]->certification_name,true); 
								$certificationsArray['certification_expiry_date'] = json_decode($loggedInUserAspi[0]->certification_expiry_date,true);
								@endphp
								@if(!empty($certificationsArray['certification_name']))
									@foreach($certificationsArray['certification_name'] as $key => $rowData)
                  @if($certificationsArray['certification_name'][$key] != "" && $certificationsArray['certification_expiry_date'][$key] != "" && $certificationsArray['certification_expiry_date'][$key] != "select")
                    <div class="row border-bottom">
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <center>
                          <!-- <div class="normalfont3" style="background-color: darkblue;padding:2%;color:white;height:50px;width:50px;"></div> -->
                          <div class="normalfont3"><i class="fa fa-certificate" aria-hidden="true" style="font-size: 36px;color: gold;"></i></div>
                        </center>
                      </div>
                     
                      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <div class="">
                          <div class="normalfont1">{{$certificationsArray['certification_name'][$key]}}</div>
                          <div class="normalfont2 bold"><span class="dob normalfont3">Expired On {{$certificationsArray['certification_expiry_date'][$key]}}</span></div><br>
                          {{-- <div class=" normalfont3" style="color:#6A6A6A">Credential ID DASDAWERCxcv325465a
                            <br><br>
                          </div> --}}
                        </div>
                      </div>
                      
                    </div>
                    <br>
                    @endif
                  @endforeach
                @endif
              {{-- <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                  <center>
                    <div class="normalfont3" style="background-color: darkblue;padding:2%;color:white;height:50px;width:50px;"></div>
                  </center>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                  <div class="">
                    <div class="normalfont1">Design Thinking </div>
                    <div class="normalfont2 bold">IADF <span class="dob normalfont3">Issued Jan 2020</span></div><br>
                    <div class=" normalfont3" style="color:#6A6A6A">Credential ID DASDAWERCxcv325465a
                      <br><br>
                    </div>
                  </div>
                </div>
              </div> --}}
            </div>
            <div class="Education p5 border-bottom">
              <div class="mediumfont1">Education</div><br>
              @php 
							$educationArray = array();
							$educationArray['school_college_university'] = json_decode($loggedInUserAspi[0]->school_college_university, true);
							$educationArray['degree'] = json_decode($loggedInUserAspi[0]->degree, true);
							$educationArray['final_year_date'] = json_decode($loggedInUserAspi[0]->final_year_date, true);
							@endphp
							@if(!empty($educationArray['school_college_university']))
								@foreach($educationArray['school_college_university'] as $key => $rowData)
                @if($educationArray['school_college_university'][$key] != "" && $educationArray['final_year_date'][$key] != "")
                  <div class="row border-bottom">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                      <center>
                        <!-- <div class="normalfont3" style="background-color: darkblue;padding:2%;color:white;height:50px;width:50px;"></div> -->
                        <div class="normalfont3"><i class="fa fa-book" aria-hidden="true" style="font-size: 36px;"></i></div>
                      </center>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                      <div class="">
                        <div class="normalfont1">{{$educationArray['school_college_university'][$key]}}</div>
                        <div class="normalfont2 bold">{{$educationArray['degree'][$key]}} <br><span class="dob normalfont3">Final year - {{$educationArray['final_year_date'][$key]}}</span></div><br>

                      </div>
                    </div>
                  </div>
                  <br>
                  @endif
                @endforeach
              @endif
              {{-- <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                  <center>
                    <div class="normalfont3" style="background-color: darkblue;padding:2%;color:white;height:50px;width:50px;"></div>
                  </center>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                  <div class="">
                    <div class="normalfont1">Manipal institue of technology</div>
                    <div class="normalfont2 bold">Bachelors of Technology, computure science engineering<br><span class="dob normalfont3">2016-2020</span></div><br>

                  </div>
                </div>
              </div> --}}
            </div>
            <div class="Projects p5">
              <div class="mediumfont1">Projects</div><br>
              @php 
							$projectArray = array();
							$projectArray['project_name'] = json_decode($loggedInUserAspi[0]->project_name, true);
							$projectArray['project_end_date'] = json_decode($loggedInUserAspi[0]->project_end_date, true);
							$projectArray['project_description'] = json_decode($loggedInUserAspi[0]->project_description, true);
							@endphp
							@if(!empty($projectArray['project_name']))
								@foreach($projectArray['project_name'] as $key => $rowData)
                  <div class="row border-bottom">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                      <center>
                        <!-- <div class="normalfont3" style="background-color: darkblue;padding:2%;color:white;height:50px;width:50px;"></div> -->
                        <div class="normalfont3"><i class="fa fa-cogs" aria-hidden="true" style="font-size: 36px;"></i></div>
                      </center>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                      <div class="">
                        {{-- <span class="normalfont3 m10 right" style="display: inline-block;color:#15284C;border-radius:5px;border: 1px solid #15284C;padding:2%">Download the project Document</span> --}}
                        <div class="normalfont1">{{$projectArray['project_name'][$key]}}</div>
                        <div class="normalfont2 bold"><span class="dob normalfont3">{{$projectArray['project_end_date'][$key]}}</span></div>
                        <div class="normalfont2"> {{$projectArray['project_description'][$key]}} 
                          {{-- <span class="skybluefont">See more</span> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                @endforeach
              @endif
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('footer')