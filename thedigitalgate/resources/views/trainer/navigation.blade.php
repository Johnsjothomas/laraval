<!-- menotr navbar file -->
<section class="home-sec-1 product-view">
         <header class="header home-pad">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12 col-lg-12">
                     <div class="top-section-menu">
                        <div class="top-menu-left">
                           <!-- <p>+000 00000000</p> -->
                           <!-- <p><a href="mailto:info@thedigitalgate.co" style="color: #fff;">info@thedigitalgate.co</a></p> -->
                        </div>
                        <div class="top-menu-right">
                           <ul>
                              <!-- <li>Industreall</li>
                              <li>Material Cloud</li> -->
                              <!-- <li><a href="{{route('aboutus')}}" style="color:#fff">About Us</a></li> -->
                              <!-- <li><a href="{{route('contactus')}}" style="color:#fff">Careers</a></li> -->
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 one col-lg-2 third">
                     <div class="header-item-left">
                        <a href="/">
                           <div class="logo">
                              <!-- <img src="{{ asset('talent/assets\img\logo.svg') }}"> -->
                              <!-- <img src="{{ asset('talent/assets\img\logo3.png') }}" style='width:80%;margin-top:-30px'> -->
                              <img class="logo-signup" style="background: #cec7c7;height: 79px;margin-right: -11px;margin-top: -20px;" src="{{ asset('talent/assets/img/logoOnlyPNG2.png') }}">
                              <div class="logo-text text-light">
                                 <p>The</p>
                                 <span>DigitalGate</span>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-10 second col-lg-5">
                     <div class="left-white-portion">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="dropdown">
                                 <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                 
                                 </button>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Job</a>
                                    <a class="dropdown-item active" href="#">Training</a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 bdr-left">
                              <div class="form-group">
                                 <input type="text" class="form-control search_aspirant_by_navbar_jss" data-type="aspirant_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search Aspirant" >
                              </div>
                           </div>
                           <div class="col-md-3 bdr-left">
                              <div class="form-group position-relative">
                                 <input type="text" class="form-control search_aspirant_by_navbar_jss" data-type="location" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Location">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-2 second col-lg-2">
                     <h5 style="padding:0 !important;">Welcome, {{ session()->get('FirstName') }}</h5>
                     <span>{{ repalceWithMentorRole(session()->get('Role')) }}</span>
                  </div>
                  <div class="col-md-8 third col-lg-3 yellow-pd">
                     <div class="mob-menu">
                        <div class="profile-icon">
                           @php
                              $profileimg = \App\Models\trainer::where(['trainer_id' => Session('Trainer_ID')])->pluck('profile_pic');
                              $profileimg = @$profileimg ? $profileimg[0] : '';
                              if (Session('user_type') == 'usr_type_4') {
                                 $profileimg = \App\Models\aspirant::where(['aspirant_id' => Session('Aspirant_ID')])->pluck('profile_pic');
                                 $profileimg = @$profileimg ? $profileimg[0] : '';
                              }
                           @endphp

                           <img src="{{setProfilePic(@$profileimg)}}">
                        </div>
                        <button type="button" class=" dpr-menu btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu rightsidemenu_list_css" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item bdr-btm-a {{Request::is('trainer/message') ? 'activeNav' : '' }}" href="{{url('trainer/message')}}">Messages</a>
                           <a class="dropdown-item bdr-btm-a {{Request::is('trainer/aspirant/searchaspirant') ? 'activeNav' : '' }}" href="{{url('trainer/aspirant/searchaspirant')}}">Manage Aspirants</a>
                           <a class="dropdown-item bdr-btm-a {{Request::is('trainer/managemodules') ? 'activeNav' : '' }}" href="{{ url('trainer/managemodules') }}">Manage Modules</a>
                           <a class="dropdown-item bdr-btm-a" href="{{route('contactus')}}">Help</a>
                           <a class="dropdown-item bdr-btm-a {{Request::is('trainer/notify') ? 'activeNav' : '' }}" href="{{url('trainer/notify')}}">Notifications</a>
                           <a class="dropdown-item bdr-btm-a" href="{{route('blog')}}">Blog</a>
                           {{-- <a class="dropdown-item bdr-btm-a" href="#">Help</a> --}}
                           <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                     </div>
                     <div class="shopping-cart">
                        <a href=" {{ route('tmybank') }} ">
                           <img src="{{ asset('talent/assets\img\shopping-cart.png') }}">
                           <!-- <div class="shpping-bx-yellow">
                              4
                           </div> -->
                        </a>
                     </div>
                     <button class="seller-switch-ash d-none">
                        Switch to {{repalceWithMentor('Trainer')}}
                     </button>
                  </div>
               </div>
            </div>
         </header>
      </section>