@include('header')
@include('trainer.navigation')
@include('trainer.submenu')

<div class="container pt-5 pb-5">

<div class="row">
  <div class="col-3 pt-5 pb-5">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Communication and Privacy</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Account</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
   
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      
      <h4>Account Settings</h4>
            <label>Industreall would show the recommendations based on your job preferences mentioned in your job profile. Editing it would also change your desired career profile</label>
            <h6>E-mail Address</h6>
            <label>Primary E-mail</label><br>
            <label>Khaleelforever@gmail.com</label>
            <h6>Phone Number</h6>
            <label>+123456789</label>
            <h6>Change Password</h6>
            <label>Change Password</label>
            <h4 class="pb-2">Subscription & Payments</h4>
            <h6>Upgrade </h6>
            <label>Upgrade your account </label>
            <h4 class="pb-2">Account Management</h4>
            <h6>Hibernate Account</h6>
            <label>Hibernate Account</label>
            <h6>Close Account</h6>
            <label>Close your account</label> 

      </div>

    </div>
  </div>
</div>

</div>

@include('footer')