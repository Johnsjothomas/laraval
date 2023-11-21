@include('header')
@include('navigation')
<section class="container-fluid p-0">
        <div class="row ">
            <div class="col-sm-6 " style=" align-self: center;">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6">
                        <div>
                        <h1 style="font-size: 45px; font-weight: bold; font-family: sans-serif; color: #04043C;">
                        Join industry’s “talent marketplace” and solve your </h1>
                        <li>Up-Skilling challenges </li>
                        <li>Employability challenges</li>
                        <li>Training curation challenges</li>
                        <h4>#makeengineeringfun
                        #Gigs&Internship
                        #TalentAcquistion
                        #ReadyL&D
                        </h4>
                            <hr style="height: 4px; background:#04043C;">
                    </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            <div class="col-sm-6 p-0">
                <img src="{{ asset('talent/assets/img/frame_home.svg ') }}" width="100%">
            </div>
        </div>
    </section>
    <section class="container-fluid">
        <div class="row text-center pt-4 pb-4">
            <div class="col-sm-3">
                <label class="labelo">100</label><br>
                <label class="labelt">interns/freshers</label>
            </div>
            <div class="col-sm-3">
                <label class="labelo">256</label><br>
                <label class="labelt">Industrial Aspirants</label>
            </div>
            <div class="col-sm-3">
                <label class="labelo">50</label><br>
                <label class="labelt">Featured  Jobs</label>
            </div>
            <div class="col-sm-3">
                <label class="labelo">126</label><br>
                <label class="labelt">Expert  {{repalceWithMentor('Trainers')}}</label>
            </div>
        </div>
    </section>
    <section>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('talent/assets/img/caro1.svg ') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('talent/assets/img/caro2.svg ') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('talent/assets/img/caro3.svg ') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('talent/assets/img/caro4.svg ') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('talent/assets/img/caro5.svg ') }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </section>
    <!-- <section class="container-fluid" style="background: #FC6717;">
        <div class="row p-5">
            <div class="col-sm-6 pt-5">
                <img src="{{ asset('talent/assets/img/section1.svg  ') }}" width="100%">
            </div>
            <div class="col-sm-6 pt-5">
                <div><label class="labelw">Value exchange at<br>it’s best</label></div>
                <div>
                <label style="font-weight: 500;font-size: 25px;color: white;">
                    you are a part of the Rebel <br> Alliance and a traitor!<br>Take her away! </label>
                </div>
                <div class="row" style="font-size: 25px; font-weight: 500;">
                    <div class="col-sm-6"><b>50</b> Client views</div>
                    <div class="col-sm-6"><b>250+</b> Client views</div></div>
            </div>
        </div>
    </section> -->
    <section class="container-fluid">
    <div class="row p-5">
        <div class="col-sm-6 pl-5">
            <label style="font-weight: 600;font-size: 50px;">Expand your career oppurtunities</label>
            <p style="font-weight: 500;font-size: 25px;">
            We help in making your Industrial learning skillful through our internship and educational programmes and also give you a better opportunity in your desired job prospect. For succeeding in a competing soceity, one not only requires
an impressive skill-set and in depth knowledge but also proper guidance and credible industrial experience which we offer at an affordable fee. Top-notch expert {{repalceWithMentor('trainers')}} equipped with the best resource materials and training capabilities are here to transform your future and help you achieve your ideal resume.
            </p>
            <div><div class="btn yellowbtn">Register</div></div>
        </div>
        <div class="col-sm-6 text-right" style="align-self: center;"><img src="{{asset('talent/assets/img/section2.svg')}}" width="100%"></div>
    </div>
    </section>
    <section class="p-5">
        <img src="{{ asset('talent/assets/img/tab_aspirant.svg ') }}" width="100%">
    </section>
    <section style="background: #04043C;">
        <video autoplay muted loop width="100%">
        <source src="{{ asset('talent/assets/vid/TC_r2.mp4 ') }}" type="video/mp4">
        Your browser does not support the video tag.
        </video>
    </section>
    <!-- <section class="">
            <div class="row">
               <div class="col-lg-6 col-md-12 col-12 p-0">
                   <div class="col-12 p-5"style="background:#F9C900">
                       <h1 class="text-left">
                       Placements in top companies
                       </h1>
                   </div>
                  <div class="col-12" >
                  <img src="assets/img/brand_logos.svg">
                  </div>
                  <div class="col-12">
                       <h5 class="text-left">
                       “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem bibendum elit, neque, facilisis vitae purus diam et.Aliquet iaculis duis lectus porttitor viverra consectetur id mattis rhoncus. Risus quis nunc nibh donec imperdiet.”
                       </h5>
                   </div>
               </div>
               <div class="col-lg-6 col-md-12 col-12 pd-0">
                  <div class="text-left p-5" style="background:#04043C">
                        <h1 style="color:#F9C900">50+</h1>
                        <h2 class="pb-5" style="color:white">Active Projects</h2>
                        <h1 style="color:#F9C900">50+</h1>
                        <h2 class="pb-5" style="color:white">Training sessions</h2>
                        <h1 style="color:#F9C900">50+</h1>
                        <h2 class="pb-5" style="color:white">GIGs</h2>
                  </div>
               </div>
            </div>
      </section> -->
      <div class="">
         <div class="row">
            <div class="col-lg-6 col-md-12 col-12 pt-5 text-center" style="background: #FEC7E0;">
              
                  <img src="{{asset('talent/assets/img/mobile.svg')}}" width="40%">
               
            </div>
            <div class="col-lg-6 col-md-12 col-12 p-5">
                  <div class=" text-left p-5">
                     <h2 class="pt-5">Testimonials 
                     </h2>
                     <label>Only platform where I could select candidates and force them to complete a training with a {{repalceWithMentor('trainer')}} of our choice.</label>
                     <label>I restarted my training career after resigning from a high pressure MNC shop floor shift pressure job, I am happy teaching and learning industry 4.0 skills</label>
                     <label>As a fresher my intention was to land an “Action Learning” internship, with a real feel chance to touch machines and learn manufacturing processes, planning and factory floor.</label>
                  </div>
               <div class="">
                  <div class="text-center">
                     <h2>Follow us on</h2>
                     <ul class="rows">
                        <li><img src="{{asset('talent/assets/img/social-media-tw.png')}}"></li>
                        <li><img src="{{asset('talent/assets/img/social-media-fa.png')}}"></li>
                        <li><img src="{{asset('talent/assets/img/social-media-in.png')}}"></li>
                        <!-- <li><img src="assets/img/social-media-insta.png"></li> -->
                        <li><img src="{{asset('talent/assets/img/social-media-qr.png')}}"></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @include('footer')