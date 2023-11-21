@include('header')
@include('trainer.navigation')
@include('trainer.submenu')
<style>
.delivery_exp_table_css .input2 
{
  margin: 2px;
} 
</style>
<div class="row p-3" style="background: #E5E5E5;">
        

    <div class="container justify-content-center align-center pt-5">
        <img class="img-fluid " style="width:100%" src = "{{ asset('talent/assets/img/myprofile.png') }}" />
        <div class="row" style=" position: relative; top: -70px; left: 45px; ">
        <div class="col-sm-2">
          <div class="profile-pic-wrapper pt-3">
            <div class="pic-holder">
              <!-- uploaded pic shown here -->
              <img id="profilePic" class="pic" src="{{setProfilePic($loggedInUser[0]->profile_pic)}}">
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="top: 74px;">
          <h3>{{session()->get('FirstName')}}</h3>
          <h6>{{repalceWithMentorRole(session()->get('Role'))}}</h6>
      </div>
    </div>
    </div>
    <div class="row justify-content-center align-center">
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p-3">
        <div class="p-3" style="background-color: white;">
         <div class="mediumfont">{{$loggedInUser[0]->first_name}}<i class="fa fa-check-circle" aria-hidden="true" style="color: green;"></i></div>
         <a href="{{route('tprofile')}}" class="bluebtn btn-sm pl-3 pr-3" style="float:right; text-align:center;">Edit</a>
         @php
             $ParentSkillArray = array(
                "healthCare"	=> "Health Care",
                "finance"		=> "Finance",
                "cyber"			=> "Cyber Security",
                "aiMl"			=> "AI/ML/Web 3",
                "industry"		=> "Industrial",
                "legalSkill"	=> "Legal",
                "softSkill"		=> "Softskills"
              );
         @endphp
         <div class="normalfont2 border-bottom"> {{(@$loggedInUser[0]->parent_skill ? 'I ‘m an '.@$ParentSkillArray[$loggedInUser[0]->parent_skill].' '.repalceWithMentor('Trainer') : '')}}</div>
         <br>
         <div class="mediumfont1">About me</div>
         <div class="normalfont2 bluefontcolor border-bottom ">{{$loggedInUser[0]->about_you}}</div><br>
         <br>
         <div class="mediumfont2">Total number of relevant training delivery experience in year</div><br>
         <div class="border-bottom">
        <?php $modulear = json_decode($loggedInUser[0]->modules);?>
        <?php $moduleDeliver = json_decode($loggedInUser[0]->companies_deliver_at);?>
        <?php $no_of_session_name = json_decode($loggedInUser[0]->no_of_session_name);?>
            @if($no_of_session_name != [""])
            <table class="table table-bordered delivery_exp_table_css">
            <tr style="color: #15284C;background: #F6F6F6;">
              <th>Name of the Modules</th>
              <th>Name of the companies delivered at</th>
              <th>Total number of sessions delivered per module</th>
            </tr>
            <tr>
              <td>
              @if ($modulear)
                @foreach($modulear as $index_m => $mod)
                  @if($mod != "" || (@$moduleDeliver[$index_m] && $moduleDeliver[$index_m] != "") || (@$no_of_session_name[$index_m] && $no_of_session_name[$index_m] != ""))
                    <input class="input2" readonly type="text" name="modulesName[]" placeholders="Module Name" style="text-align:center;" value="{{$mod}}"/>
                  @endif
                @endforeach
              @endif
              </td>
              <td>
              @if ($moduleDeliver)
                @foreach($moduleDeliver as $index_m => $delivery)
                  @if($delivery != "" || (@$modulear[$index_m] && $modulear[$index_m] != "") || (@$no_of_session_name[$index_m] && $no_of_session_name[$index_m] != ""))
                    <input class="input2" style="text-align:center;" readonly type="text" name="modulesName[]" placeholders="Module Name" value="{{$delivery}}"/>
                  @endif
                @endforeach
              @endif 
              </td>
              <td>
              @if ($no_of_session_name)
                @foreach($no_of_session_name as $index_m => $exper)
                  @if($exper != "" || (@$modulear[$index_m] && $modulear[$index_m] != "") || (@$moduleDeliver[$index_m] && $moduleDeliver[$index_m] != ""))
                    <input class="input2" style="text-align:center;" readonly type="text" name="modulesName[]" placeholders="Module Name" value="{{$exper}}"/>
                  @endif
                @endforeach
              @endif
              </td>
            </tr>
          </table>
            @else
            <span class="normalfont3 m10 tags">Fill the Relevant Experience</span>
            @endif
         </div><br>
         <div class="mediumfont2">Total number of industrty/consultancy experience in years</div><br>
         <div class="border-bottom">
        <span class="text-center normalfont3 m10 tags1">{{$loggedInUser[0]->total_experience}}</span>
         </div><br>
         <div class="mediumfont1">Specialization</div><br>
          <div class="border-bottom">
          <?php $specialization = json_decode($loggedInUser[0]->specialization) ?>
          @if($specialization)
            @foreach($specialization as $special)
            @if($specialization != [""])
            <span class="normalfont3 m10 tags" name="specialization[]">{{$special}}</span>
            @else
            <span class="normalfont3 m10 tags">Fill the Specialization</span>
            @endif
            @endforeach
          @endif
          </div>
          <div class="mediumfont1">Skills</div><br>
          <div class="border-bottom">
         <span class="normalfont3 m10 tags">{{trim($loggedInUser[0]->skills, ',')}}</span>
          </div>
          <div class="mediumfont1">Preferred online platform</div><br>
          <div class="border-bottom">
         <?php $preferedOnlinePlatform = json_decode($loggedInUser[0]->preferred_online_platform) ?>
          @if($preferedOnlinePlatform)
            @foreach($preferedOnlinePlatform as $prefonlinePlat)
              @if($preferedOnlinePlatform != [""])
              <span class="normalfont3 m10 tags" name="prefonlineplatform[]">{{$prefonlinePlat}}</span>
              @else
              <span class="normalfont3 m10 tags">Fill the Preferred Locations</span>
              @endif
            @endforeach
          @endif
          </div>
          <div class="mediumfont1">Gamification tools</div><br>
          <div class="border-bottom">
         <?php $gamificationTool = json_decode($loggedInUser[0]->gamification_tool) ?>
        @if($gamificationTool)
         @foreach($gamificationTool as $gametools)
            @if($gamificationTool != [""])
            <span class="normalfont3 m10 tags" name="gametools[]">{{$gametools}}</span>
            @else
            <span class="normalfont3 m10 tags">Fill the Tools</span>
            @endif
            @endforeach
        @endif
          </div>
          <div class="border-bottom "><br>
             <div class="mediumfont1">Additional information</div><br>
             <div class="normalfont2 p3">D.O.B <span class="dob normalfont3">  -  </span><span>{{$loggedInUser[0]->dob}}</span></div>
             <div class="normalfont2 p3">Gender <span class="dob normalfont3">  -  </span><span>{{$loggedInUser[0]->gender}}</span></div>
             {{-- <div class="normalfont2 p3">Work Permit<span class="dob normalfont3">  -  </span>
             @if($loggedInUser[0]->country_code == "971")
              <span>UAE</span></div>
              @else
              <span>Something Wrong</span></div>
             @endif --}}
             <!-- <div class="normalfont2 p3">Marital status <span class="dob normalfont3"> </span></div> -->
             <div class="normalfont2 p3">languages 
             <?php $languagesKnown = json_decode($loggedInUser[0]->languages_known) ?>
            @if($languagesKnown)
              @foreach($languagesKnown as $languagess)
              @if($languagesKnown != [""])
              <span class="normalfont3 m10 tags" name="languagess[]">{{$languagess}}</span>
              @else
              <span class="normalfont3 m10 tags">Fill the Languages</span>
              @endif
              @endforeach
            @endif
            </div>
             <!-- <div class="normalfont2 p3">Preferred location <span class="dob normalfont3"> </span></div> -->
             <!-- <div class="normalfont2 p3">Industries <span class="dob normalfont3"></span></div> -->
          </div>
          {{-- <div class="flex justify-content-center align-center ">
            <br>
            <span class="normalfont3 m10 tags"><a href="#">View My Intro Video</a></span>
             <br><br>
          </div> --}}
          </div>
          </div>
       <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 p-3">
        <div class="" style="background-color: white;">
           <br><br>
        <div class="work p5 border-bottom">
         <div class="mediumfont1">Top Three Moudles that I have trained on</div><br>
         <div class="row border-bottom">
         <?php $modulles = json_decode($loggedInUser[0]->modules);
         ?>
         @if($modulles)
          @foreach($modulles as $keym=> $modls)
            @if($preferedOnlinePlatform != [""])
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <center>
                  <img class="img-responsive "  src = "{{ asset('talent/assets/img/experiencelogo.png') }}" />
              </center>
             
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
              <div class="">
                <div class="normalfont1 bold">{{ $modls }}</div>
                <?php $key = array_search($modls, $no_of_session_name) ?>
                <?php $modulles = json_decode($loggedInUser[0]->modules) ?>
                <div class="dob normalfont3" name="exper[]">Total Sessions Deliver - {{$no_of_session_name[$keym]}} </div><br>
              <!-- <div class=" normalfont3">Static Text - Creative and Strategic direction for Fake Crow: A Product Design Studio in Los Angeles, crafting digital solutions for forward thinking companies, entrepreneurs & agencies, focusing on Product, Strategy, UX and UI Design. <a href="#"><span class="skybluefont">See more</span></a></div> -->
                <br><br>
                <br><br>
              </div>
            </div>
            @else
            <span class="normalfont3 m10 tags">Fill the Modules</span>
            @endif
          @endforeach
        @endif 
         
        </div>
        <div class="certificate p5 border-bottom">
         <div class="mediumfont1">Certifications</div><br>
            @php 
            $certificationsArray = array();
            $certificationsArray['certification_name'] = json_decode($loggedInUser[0]->certification_name,true); 
            $certificationsArray['certification_expiry_date'] = json_decode($loggedInUser[0]->certification_expiry_date,true);
            $certificationsArray['certification_description'] = json_decode($loggedInUser[0]->certification_description,true);
            @endphp
            @if(!empty($certificationsArray['certification_name']))
              @foreach($certificationsArray['certification_name'] as $key => $rowData)
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
                        <div class=" normalfont3" style="color:#6A6A6A">{{$certificationsArray['certification_description'][$key]}}
                        <br><br>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
              @endforeach
            @endif
            
        
          
        <br>
       
       </div>
       <div class="Education p5 border-bottom">
               <div class="mediumfont1">Education</div><br>
               @php
                $educationData = array();
                $educationData['school_college_university'] = check_json($loggedInUser[0]->school_college_university);
                $educationData['degree'] = check_json($loggedInUser[0]->degree);
                $educationData['final_year_date'] = check_json($loggedInUser[0]->final_year_date);
              @endphp
              @if (@$educationData['school_college_university'])
                @foreach ($educationData['school_college_university'] as $key => $item)
                <div class="row border-bottom">
                  
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <center>
                          <div class="normalfont3"><i class="fa fa-book" aria-hidden="true" style="font-size: 36px;"></i></div>
                        </center>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <div class="">
                            <div class="normalfont1">{{@$educationData['school_college_university'][$key]}}</div>
                        <div class="normalfont2 bold">{{@$educationData['degree'][$key]}} <br>
                          <span class="dob normalfont3">{{@$educationData['final_year_date'][$key]}}</span></div><br>
                        
                      </div>
                    </div> 
                </div>
                <br>
                @endforeach
              @endif
              <!-- <div class="row">
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
              </div> -->
      </div>
       <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
  </div>

</div>
<br><br><br><br>
  @include('footer')