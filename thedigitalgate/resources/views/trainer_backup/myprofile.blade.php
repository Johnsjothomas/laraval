@include('header')
@include('trainer.navigation')
@include('trainer.submenu')
<div class="row" style="background: #E5E5E5;">
        

    <div class="container justify-content-center align-center pt-5">
        <img class="img-fluid " style="width:100%" src = "{{ asset('talent/assets/img/myprofile.png') }}" />
        <div class="row" style=" position: relative; top: -70px; left: 45px; ">
        <div class="col-sm-2">
        <div class="profile-pic-wrapper pt-3">
                <div class="pic-holder">
                  <!-- uploaded pic shown here -->
                  <img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150">

                  <label for="newProfilePhoto" class="upload-file-block">
                    <div class="text-center">
                      <div class="mb-2">
                        <i class="fa fa-camera fa-2x"></i>
                      </div>
                    </div>
                  </label>
                  <input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="display: none;">
                </div>
              </div>
        </div>
    </div>
    </div>
    <div class="row justify-content-center align-center">
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p-3">
        <div class="p-3" style="background-color: white;">
         <div class="mediumfont">Khaleel<i class="fa fa-check-circle" aria-hidden="true" style="color: green;"></i></div>
         <div class="normalfont2 border-bottom">I ‘m an Industrial {{repalceWithMentor('Trainer')}}</div>
         <br>
         <div class="mediumfont1">About me</div>
         <div class="normalfont2 bluefontcolor border-bottom ">Hey everyone, I’m Khaleel a UI, UX Designer currently interning at a company called Bottle. I also work as a freelance UI, UX designer. It’s been just 8 months since I started UI and UX designing. I am very Curious and Passionate when it comes to Design</div><br>
         <br>
         <div class="mediumfont2">Total number of relevant training delivery experience in year</div><br>
         <div class="border-bottom">
        <span class="text-center normalfont3 m10 tags1">5 Years</span>
         </div><br>
         <div class="mediumfont2">Total number of industrty/consultancy experience in years</div><br>
         <div class="border-bottom">
        <span class="text-center normalfont3 m10 tags1">5 Years</span>
         </div><br>
         <div class="mediumfont1">Specialization</div><br>
          <div class="border-bottom">
         <span class="normalfont3 m10 tags">Design research</span>
         <span class="normalfont3 m10 tags">UX Design</span>
         <span class="normalfont3 m10 tags">Advance prototypeing</span>
          </div>
          <div class="mediumfont1">Skills</div><br>
          <div class="border-bottom">
         <span class="normalfont3 m10 tags">Design research</span>
         <span class="normalfont3 m10 tags">UX Design</span>
         <span class="normalfont3 m10 tags">Advance prototypeing</span>
          </div>
          <div class="mediumfont1">Preferred online platform</div><br>
          <div class="border-bottom">
         <span class="normalfont3 m10 tags">Zoom</span>
          </div>
          <div class="mediumfont1">Gamification tools</div><br>
          <div class="border-bottom">
         <span class="normalfont3 m10 tags">Zoom</span>
          </div>
          <div class="border-bottom "><br>
             <div class="mediumfont1">Additional information</div><br>
             <div class="normalfont2 p3">D.O.B <span class="dob normalfont3">17/11/20 </span></div>
             <div class="normalfont2 p3">Gender <span class="dob normalfont3">Male </span></div>
             <div class="normalfont2 p3">Work Permit<span class="dob normalfont3">Male </span></div>
             <div class="normalfont2 p3">Marital status <span class="dob normalfont3"> </span></div>
             <div class="normalfont2 p3">languages <span class="dob normalfont3"></span></div>
             <div class="normalfont2 p3">Preferred location <span class="dob normalfont3"> </span></div>
             <div class="normalfont2 p3">Industries <span class="dob normalfont3"></span></div>
          </div>
          <div class="flex justify-content-center align-center ">
            <br>
            <span class="normalfont3 m10 tags">View My Intro Video</span>
             <br><br>
          </div>
          </div>
          </div>
       <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 p-3">
        <div class="" style="background-color: white;">
           <br><br>
        <div class="work p5 border-bottom">
         <div class="mediumfont1">Top Three Moudles that I have trained on</div><br>
         <div class="row border-bottom">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <center>
                  <img class="img-responsive "  src = "{{ asset('talent/assets/img/experiencelogo.png') }}" />
              </center>
             
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
              <div class="">
                   <div class="normalfont1 bold">Creative Director at Foxpin</div>
              <div class="dob normalfont3">Currently working Goa,india </div><br>
              <div class=" normalfont3">Creative and Strategic direction for Fake Crow: A Product Design Studio in Los Angeles, crafting digital solutions for forward thinking companies, entrepreneurs & agencies, focusing on Product, Strategy, UX and UI Design. <span class="skybluefont">See more</span></div>
                <br><br>

              </div>
            </div>
         </div>
         <div class="row border-bottom">
          <br>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <center>
                  <img class="img-responsive "  src = "{{ asset('talent/assets/img/experiencelogo.png') }}" />
              </center>
             
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
              <div class="">
                   <div class="normalfont1 bold">Design Head at Circle chat</div> 
              <div class="dob normalfont3">Jan 2019 - May 2021 Goa,india </div><br>
              <div class=" normalfont3">- Designed, produced, and validated components related to retail display of Apple’s electronic products using FEA, physical tensile testing, 3D printing, and CNC machining.  <br>
              - Owned and oversaw major cost-saving component of overarching system from idea conception through design validation and early fabrication stages while frequently leading conference calls with China-based suppliers and vendors.
…
see more <span class="skybluefont">See more</span></div>
                <br><br>

              </div>
            </div>
         </div>
         <div class="row">
          <br>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <center>
                  <img class="img-responsive "  src = "{{ asset('talent/assets/img/experiencelogo.png') }}" />
              </center>
             
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
              <div class="">
                   <div class="normalfont1">Design inter Book mark</div>
              <div class="dob normalfont3">Jan 2017 - May 2018 Goa,india </div><br>
              <div class=" normalfont3">- Used Root Cause Analysis (RCA), 8D’s, resolution effectiveness tracking, and various other diagnostic techniques to identify issues that could potentially affect the quality of mechanical and electrical components of Tesla’s Models X and S vehicles.  <br>
              - Located and rectified issues that effected the reliability of specified systems through hands-on and 3D CAD reverse engineering in order to implement long-term corrective actions.
                <span class="skybluefont">See more</span></div>
                <br>

              </div>
            </div>
         </div>
        </div>
        <div class="certificate p5 border-bottom">
         <div class="mediumfont1">Certifications</div><br>
         <div class="row border-bottom">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <center>
                   <div class="normalfont3" style="background-color: darkblue;padding:2%;color:white;height:50px;width:50px;"></div>
                </center>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div class="">
                     <div class="normalfont1">Brand identity and strategy</div>
                <div class="normalfont2 bold">Coursera <span class="dob normalfont3">Issued Jan 2020</span></div>
                <div class=" normalfont3" style="color:#6A6A6A">Credential ID DASDAWERCxcv325465a
                  <br><br>
                </div>
              </div>
         </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <center>
                 <div class="normalfont3" style="background-color: darkblue;padding:2%;color:white;height:50px;width:50px;"></div>
              </center>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
              <div class="">
                   <div class="normalfont1">Design Thinking </div>
              <div class="normalfont2 bold">IADF  <span class="dob normalfont3">Issued Jan 2020</span></div>
              <div class=" normalfont3" style="color:#6A6A6A">Credential ID DASDAWERCxcv325465a
                <br><br>
              </div>
            </div>
         </div>
        </div>
       </div>
       <div class="Education p5 border-bottom">
               <div class="mediumfont1">Education</div><br>
               <div class="row border-bottom">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                      <center>
                         <div class="normalfont3" style="background-color: darkblue;padding:2%;color:white;height:50px;width:50px;"></div>
                      </center>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                      <div class="">
                           <div class="normalfont1">Californiay state university long beach</div>
                      <div class="normalfont2 bold">Masters of Technology, Design thinking and research <br><span class="dob normalfont3">2021-2023</span></div><br>
                      
                    </div>
                  </div>
              </div>
               <br>
              <div class="row">
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
              </div>
      </div>
       <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
  </div>

</div>
<br><br><br><br>
  @include('footer')