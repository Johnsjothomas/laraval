<!DOCTYPE html>
<html lang="en">
@php

@endphp
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Industreall</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
       <link href="{{asset('Seller/css/style.css')}}" type="text/css" rel="stylesheet" />
       <link href="{{asset('Seller/css/custom.css')}}" type="text/css" rel="stylesheet" />
      <script src="{{asset('js/7c54489b7a.js')}}"></script>
      <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-book" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="{{asset('Seller/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/jquery.Jcrop.css')}}">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

   </head>
   <body>
      <section class="home-sec-1 product-view">
         <header class="header">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-lg-12">
                     <div class="top-section-menu">
                        <div class="top-menu-left">
                          <a href="{{url('/')}}">
                           <div class="logo">
                           <img src="{{asset('Seller/images/industreall.svg')}}">

                        </div>
                     </a>
                        </div>
                        <div class="top-menu-right">
                           <ul>
                               
                               <a href="{{url('/buyer')}}"><li>Materials</li> </a> 
                               
                              <!--  <a href="{{url('/talent/home')}}"><li>Talent</li> </a>  -->
                              <a href="{{route('aboutus')}}"><li>About Us</li></a>
                              
                                <!--  -->
                             
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 one col-lg-2 third col-6">
                     <div class="header-item-left">
                            
                     </div>
                  </div>
                  
                 
               </div>
            </div>
            <div class="top-wide-ash-dash-brd">
               <div class="container">
                <div class="topnav" id="myTopnav">
                 
                </div>
               </div>
            </div>
            
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
        <a href="{{url('/')}}"><li>Home</li></a>
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
         <img src="{{asset('Seller/images/footer-logo.png')}}">
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
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
   <script src="{{asset('Seller/js/owl.carousel.js')}}"></script>

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
      $( ".submit-form" ).submit(function( event ) {

  $(".btn-progress").html("Please Wait...");
});
   </script>
</html>