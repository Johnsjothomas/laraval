<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Industreall</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link href="{{asset('Industreall/css/style.css')}}" type="text/css" rel="stylesheet" />
      <script src="https://use.fontawesome.com/7c54489b7a.js"></script>

   </head>
   <body>
   
     <div class="container">
        <div class="banner">
       <img src="{{asset('Industreall/images/banner.png')}}">
     </div>
    <div class="row">
      <div class="col-md-12">
        <div class="content">
        <h2>VISION</h2>
        <p>To become the single version of truth for the global energy and construction sector to trade in excess material, machinery and manpower. Industrèall is a unified marketplace to empower procurement directors, supply chain managers and hiring managers to buy/sell/rent/hire industrial goods, services and talent.</p>
        </div>
          <div class="content">
        <h2>PHILOSOPHY</h2>
        <p>We are a Sustainable marketplace to provide a green, reusable model for the industry, and thereby achieve the UN Sustainable Development goals. We strive to bring down waste and propel a global circular economy with gig talent.</p>
        </div>
          <div class="content">
        <h2>MISSION</h2>
        
        
        <p>To Introduce the concept of Cloud Warehouse for excess material and the concept of Talent Cloud for skill redistribution with high margin guarantee for Sellers and sourcing cost with time reduction for Buyers</p>
        </div>
          <div class="content">
 
        <p>We are really excited to provide the best in class Tech enabled Industreall product offerings through our platform:</p>
        </div>
        <div class="content-box">
          <div class="material">
            Material
          </div>
           <div class="talent">
            Talent
          </div>
        </div>
         <div class="content">
 
        <p>Looking forward to see you in our world class Industreall e-Marketplace.
Please <span class="click-here" onclick="$('#enquireModal').modal()">click here</span> to sign up to hear from us.</p>
        </div>
        <p class="text-center">Follow us on:</p>
        <div class="col-md-12 social-media">
          <a href="https://www.linkedin.com/company/industreall" class="fa fa-linkedin"></a>
          <a href="https://twitter.com/Industreall1" class="fa fa-twitter"></a>
          <a href="https://www.facebook.com/industreall/" class="fa fa-facebook"></a>
          <a href="https://www.instagram.com/industreall/" class="fa fa-instagram"></a>
          <a href="https://www.quora.com/profile/Industreall" class="fa fa-quora"></a>
        

        </div>
         </div>
    </div>
     </div>
   </body>

   <div class="modal fade loginAndRegister" id="enquireModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content loginAndRegContent">
      
        <button type="button" class="text-right close closePop" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="loginAndRegLeft enquireModalLeft">
        </div>
        <div class="loginAndRegForm">
          <h4 class="modal-title text-center" id="myModalLabel">Quick Enquiry</h4>
          <span id="success-msg" class="text-success"></span>
          <form>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Name:</label>
              <div class="col-sm-10">
               <input class="form-control" type="text" name="" id="name_enquiry" placeholder="Name">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
              <div class="col-sm-10">
               <input class="form-control" type="text" name="" id="email_enquiry" placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Mobile:</label>
              <div class="col-sm-10">
               <input class="form-control" type="text" name="" id="mobile_enquiry" placeholder="Mobile">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Message:</label>
              <div class="col-sm-10">
               <textarea class="form-control" type="text" name="" id="comments_enquiry" placeholder="Message"></textarea>
              </div>
            </div>

            
<div class="form-group">
           
            <div class="buttonFrame text-center">
              <input class="btn btn-success" type="button" value="Enquire Now" name="" onclick="submitEnquiry()" >
            </div>
        </div>
          </form>
        </div>
    </div>
  </div>
</div>


    <script type="text/javascript">

        $(document).ready(function () {
          $("#enquireModal").modal('show');
      });

function submitEnquiry(){

      var name=$("#name_enquiry").val();
      var email=$("#email_enquiry").val();
      var mobile=$("#mobile_enquiry").val();
      var comments=$("#comments_enquiry").val();

      if(name==''){
        $('#name_enquiry').focus();return false;
      }
      if(email==''){
        $('#email_enquiry').focus();return false;
      }
    


      $.ajax({
        method: "GET",
        url: "{{route('home.enquiry')}}",
        data: { name: name, email: email, mobile: mobile,comments: comments}
      })
      .done(function( msg ) {
          $("#success-msg").html('Thank you for getting in touch!');
          $(".enquiry-input").val('');
          setInterval(function(){ $("#success-msg").html('');}, 2000);
           $("#enquireModal").modal("toggle");
         
      });


      
    



    }
</script>


   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>