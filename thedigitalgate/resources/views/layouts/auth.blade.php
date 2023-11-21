<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>thedigitalgate</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
       <link href="{{asset('Seller/css/style.css')}}" type="text/css" rel="stylesheet" />
       <link href="{{asset('Seller/css/custom.css')}}" type="text/css" rel="stylesheet" />
      <script src="https://use.fontawesome.com/7c54489b7a.js"></script>
      <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-book" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="{{asset('Seller/css/owl.carousel.min.css')}}">

      <link rel="stylesheet" href="{{asset('css/jquery.Jcrop.css')}}">
      
      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
         <script src="https://accounts.google.com/gsi/client" async defer></script>

   </head>
   <body>
     
      
       <section class="content">
            @yield('content')
      </section>




     
   </body>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
   <script src="{{asset('Seller/js/owl.carousel.js')}}"></script>
  
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