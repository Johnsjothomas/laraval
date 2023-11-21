<section class="home-sec-1 product-view">
         <header class="header home-pad">
            <div class="container-fluid" style="padding:0 50px">
               <div class="row">
                  <div class="col-md-12 col-lg-12">
                     <div class="top-section-menu">
                        <div class="top-menu-left">
                           <p>+000 00000000</p>
                           <p>info@ndustreall.com</p>
                        </div>
                        <div class="top-menu-right">
                           <ul>
                              <li>Industreall</li>
                              <li>Material Cloud</li>
                              <li>About Us</li>
                              <li>Careers</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 one col-lg-2 third">
                     <div class="header-item-left">
                        <a href="#">
                           <div class="logo">
                              <img src="{{ asset('talent/assets\img\logo.svg') }}">
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-12 second col-lg-7">
                     <div class="left-white-portion">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="dropdown">
                                 <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                 Aspirants
                                 </button>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item active" href="#">Aspirants</a>
                                    <a class="dropdown-item " href="#">{{repalceWithMentor('Trainers')}}</a>
                                    <a class="dropdown-item" href="#">Jobs</a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 bdr-left">
                              <div class="form-group">
                                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search, products, Categories">
                              </div>
                           </div>
                           <div class="col-md-3 bdr-left">
                              <div class="form-group position-relative">
                                 <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Location">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8 third col-lg-3 yellow-pd">
                     <div class="mob-menu">
                        <div class="profile-icon">
                           <img src="{{ asset('talent/assets\img\slider-img-1.jpg') }}">
                        </div>
                        <button type="button" class=" dpr-menu btn btn-primary dropdown-toggle p-1" data-toggle="dropdown">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item bdr-btm-a" href="{{url('employer/messages')}}">Messages</a>
                           <a class="dropdown-item bdr-btm-a" href="{{url('employer/alerts')}}">Alerts</a>
                           <a class="dropdown-item bdr-btm-a" href="{{url('employer/jobs')}}">Manage Jobs</a>
                           <a class="dropdown-item bdr-btm-a" href="{{url('employer/training')}}">Manage Training</a>
                           <a class="dropdown-item bdr-btm-a" href="{{url('employer/profile')}}">Manage Aspirant</a>
                           <a class="dropdown-item bdr-btm-a" href="{{url('employer/settings')}}">Settings</a>
                           <a class="dropdown-item bdr-btm-a" href="#">Help</a>
                           <a class="dropdown-item" onclick="$('#logout').submit();">Logout</a>
                        </div>
                     </div>
                     <div class="shopping-cart">
                        <img src="{{ asset('talent/assets\img\shopping-cart.png') }}">
                        <div class="shpping-bx-yellow">
                           4
                        </div>
                     </div>
                     <button class="seller-switch-ash p-2 mt-1">
                     Switch to {{repalceWithMentor('Trainer')}}
                     </button>
                  </div>
               </div>
            </div>
         </header>
      </section>