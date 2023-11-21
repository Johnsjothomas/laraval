<!DOCTYPE html>
<html lang="en">
@php

$Path = ucfirst(Request::segment(1));
$Route = Request::segment(1);

if(Request::segment(2)=='catalogue' || Request::segment(2)=='product' || Request::route()->getName()=='preview'){
  $Path='Buyer';
}
@endphp
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Industreall</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
       <link href="{{asset(''.$Path.'/css/style.css')}}" type="text/css" rel="stylesheet" />
       <link href="{{asset(''.$Path.'/css/custom.css')}}" type="text/css" rel="stylesheet" />
      <script src="https://use.fontawesome.com/7c54489b7a.js"></script>
      <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-book" rel="stylesheet" type="text/css" />
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.css'>
      <link rel="stylesheet" href="{{asset(''.$Path.'/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/jquery.Jcrop.css')}}">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   </head>
   <body>
      <section class="home-sec-1 product-view">
         <header class="header {{(Request::segment(2)=='catalogue')?'home-pad':''}}">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-lg-12">
                     <div class="top-section-menu">
                        <div class="top-menu-left">
                           <p>info@industreall.com</p>
                        </div>
                        <div class="top-menu-right">
                           <ul>
                               <a href="{{route(''.$Route.'')}}"><li>Home</li></a>
                               <!-- <a href="{{url('/talent/home')}}"><li>Talent</li> </a>  -->
                               <a href="{{route('aboutus')}}"><li>About Us</li></a>
                              
                                <div class="mob-menu">
                                 <div class="profile-icon">
                                    @if(empty(Session('register_id')) || !Storage::exists('public/images/'.session('profile_image')))
                                       <img src="{{asset('Seller/images/user.png')}}">
                                    @else
                                       <img src="{{asset('storage/images/')}}/{{session('profile_image')}}">
                                    @endif
                                  </div> 
                                   @include('includes.menu_'.$Route)
                                 </div>
                             
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 one col-lg-2 third col-6">
                     <div class="header-item-left">
                            <a href="{{route(''.$Route.'')}}">
                           <div class="logo">
                           <img src="{{asset(''.$Path.'/images/material-logo.png')}}">

                        </div>
                        <div class="logo-text">
                           <p>Material</p><span>Industrèall</span>
                        </div>
                     </a>
                     </div>
                  </div>
                  <div class="col-md-12 second col-lg-8">
                     <div class="left-white-portion">

                        <form method="get" action="{{route('catalogue_'.$Route)}}" style="margin-bottom:0px">
                        <div class="row">
                           <div class="col-md-3">
                              <select name="listing_type[]" class="form-control listing-type-top">
                                 <option value="">All</option>
                                 <option value="New">New</option>
                                  <option value="Used">Used</option>
                                   <option value="Excess">Excess</option>
                              </select>
                           </div>
                           <div class="col-md-5 bdr-left">
                              <div class="form-group">
                                 <input type="text" value="{{isset($_GET['keyword'])?$_GET['keyword']:''}}" name="keyword" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search, Products, Brands">
                              </div>
                           </div>
                           <div class="col-md-4 bdr-left">
                              <div class="form-group position-relative pr-5 pt-1">
                                 <select id="origin_country" required name="country[]" class="js-states form-control" id="exampleFormControlSelect1">
                                  <option value="">Country</option>
                                    @php
                                      $countries = \Cache::get('countries');
                                    @endphp
                                    @foreach($countries as $key=>$val)
                                    <option value="{{$val->id??''}}">{{$val->fields->Name??''}}</option>
                                    @endforeach
                                 </select>
                                 <label for="search-submit" style="display:block;margin-bottom:0"><div class="search-icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                 </div></label>
                                 <input id="search-submit" type="submit" style="display:none;">
                              </div>
                           </div>
                        </div>
                     </form>

                     </div>
                  </div>

                  @if(!empty(Session('register_id')))
                  <div class="col-md-8 third col-lg-2 yellow-pd col-6">

                    <form method="post" action="{{route('logout')}}" id="logout">
                          @csrf
                    </form>
                    <form method="post" action="{{route('switch_user')}}" id="switch_user">
                          @csrf
                          <input type="hidden" name="role" value="{{Session::get('role')}}">
                    </form>

                       @if($Route=='buyer')
                     <a href="{{route('cart')}}">
                     <div class="shopping-cart">
                        <img src="{{asset('Buyer/images/shopping-cart.png')}}">
                        <div class="shpping-bx-yellow cart-total">
                           {{Session('cart')}}
                        </div>
                     </div>
                     </a>
                     @endif
                     <button class="seller-switch-ash d-none">
                      @php
                      if($Route=='buyer'){
                        $session='seller_active';
                      }else{
                        $session='buyer_active';
                      }
                      @endphp

                     
                      @if(Session($session)==1)  
                        Switch to {{($Route=='buyer')?'Seller':'Buyer'}}
                      @else
                        Activate {{($Route=='buyer')?'Seller':'Buyer'}} 
                      @endif
                     
                     </button>
                  </div>
                  @endif
               </div>
            </div>

             @if(Request::segment(2)!='catalogue')
            <div class="top-wide-ash-dash-brd ">
               <div class="container">
                <div class="topnav" id="myTopnav">
                 
                    @if(!empty(Session('register_id')))
                    @include('includes.account_navigation_'.$Route)
                   
                  @endif
                </div>
               </div>
            </div>
             @endif

         </header>
      </section>
      
       <section class="content">
            @yield('content')
      </section>




      <footer class="footer grad2">
         <div class="container">
            <p>At Industreall, we provide a single version of truth for the global Energy & Construction business to trade in excess material, machinery & manpower. Industreall is a unified marketplace to empower procurement, SCM and hiring managers to buy/sell/rent/hire industrial goods, services and talent. We believe this adoption of a “circular economy”, will pave the way to a green, reusable model for the industry, and will adhere to the United Nations Sustainable Development Goals (UN SDG).
            </p>
            <div class="row">
               <div class="col-md-2 col-lg-2">
       <ul>
        <a href="{{route(''.$Route.'')}}"><li>Home</li></a>
        <a href="{{route('aboutus')}}"><li>About</li></a>
       </ul>
               </div>
               <div class="col-md-3 col-lg-3">
          <ul>
        <a href="{{route('sustainability')}}"><li>Sustainability</li></a>
        <li>Testimonials</li>
       </ul>
               </div>
               <div class="col-md-3 col-lg-3 footer-logo">
         <img src="{{asset(''.$Path.'/images/footer-logo.png')}}">
               </div>
               <div class="col-md-2 col-lg-2">
            <ul>
        <a href="{{route('privacy_policy')}}"><li>Privacy Policy</li></a>
        <a href="{{route('termsofuse')}}"><li>Terms of use</li></a>
       </ul>
               </div>
               <div class="col-md-2 col-lg-2">
             <ul>
        <li>Blogs</li>
        <a href="{{route('contactus')}}"><li>Contact us</li></a>
       </ul>
               </div>
               <div class="copy-right">
                  © Industreall, Inc. 2021. 
               </div>
            </div>
         </div>
      </footer>
   </body>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="{{asset(''.$Path.'/js/owl.carousel.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.js'></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

   <script src="{{asset('js/jquery.Jcrop.min.js')}}"></script>
   <script src="{{asset('js/jquery.SimpleCropper.js')}}"></script>



    @yield('footer-scripts')
   <script>
      $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
          items: 4,
          loop: true,
          margin: 10,
          autoplay: true,
          autoplayTimeout: 1000,
          autoplayHoverPause: true,
           responsiveClass: true,
          responsive: {
            0: {
              items: 1,
              nav: true
            },
            600: {
              items: 3,
              nav: false
            },
            1000: {
              items: 4,
              nav: true,
              loop: false,
              margin: 20
            }
          }
      
        });
        $('.play').on('click', function() {
          owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function() {
          owl.trigger('stop.owl.autoplay')
        })

        $('#origin_country').select2({
            placeholder: "Location",
            createTag: function (tag) {

                  // Check if the option is already there
                  var found = false;
                  $("#origin_country option").each(function() {
                      if ($.trim(tag.term).toUpperCase() === $.trim($(this).text()).toUpperCase()) {
                          found = true;
                      }
                  });
                  // Show the suggestion only if a match was not found
                  
              }
            });


        $('.origin_country').select2({
            placeholder: "Location",
            ajax: {
                url: "{{route('get_countries')}}",
                data: function (params) {
                  var query = {
                    search: params.term,
                    page: params.page || 1
                  }
                  return query;
                },
                processResults: function (data,params) {
                  params.page = params.page || 1;
                  return {
                    results: $.map(data.countries, function (item) {
                      return {
                        text: item.fields.Name,
                        id: item.fields.Name,
                                      }
                      }),
                      pagination: {more: (params.page * 50) < data.total_count }
                    }
                },
                dataType: 'json'
              }
            });
      
      })
   </script>
   <script>
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }

  $( ".btn-progress" ).click(function( event ) {

      $(this).html("Please Wait...");
      //$(".btn-progress").attr("");
});

  $( ".seller-switch-ash" ).click(function( event ) {

      $("#switch_user").submit();
});

$( ".user-settings" ).click(function() {

      var role = $(this).data('role');

      if(role=='buyer_active'){
      var value = ($("#buyer_active").val()== '1')? '0' : '1';
      $('#buyer_active').val(value);
      }else{
        var value = ($("#seller_active").val()== '1')? '0' : '1';
      $('#seller_active').val(value);
      }
      $("#user_settings").submit();
});



   </script>
   <script type="text/javascript">
      $( document ).ready(function() {
      
      $(".slider-wrap")
      .append('<span class="prevButton"><i class="fa fa-chevron-circle-left"></i></span>')
      .prepend('<span class="nextButton"><i class="fa fa-chevron-circle-right"></i></span>');
      
      
      $(".nextButton").click(function() {
      $('.slide').first().appendTo('.slider-wrap');
      });
      
      $(".prevButton").click(function() {
      $('.slide').last().prependTo('.slider-wrap');
      });
      
      });

      
   </script>
</html>