@include('header')
<?php $ut = session()->get('user_type'); ?>
<!--pagestart-->
<style>
.eye_icon_for_pass_css
{
    position:absolute;
    z-index: 9;
    right:10px;
    top: 8px;
    font-size: 19px;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 side">
            <img src=" {{ asset('talent/assets/img/LoginPage.png') }}" width="100%">
            <div class="signup-img-text-2-edit">
                Unlock your potential and be ready for the future of work 
            </div>
        </div>
        <div class="col-sm-6 p-1">
            <!-- <div class="signup-img-text-1">
              <img class="logo-signup side" style="    background: #cec7c7;height: 79px;margin-right: -11px;margin-top: -20px;" src="{{ asset('talent/assets/img/logoOnly.jpg') }}">
              <div class="logo-text">
                <p>The</p>
                <span>DigitalGate</span>
              </div>
            </div>
            
                    <label> Don't have an account? </label>
                    <a href="{{route('register')}}">Sign Up</a> -->
                
            
            <div class="container-fluid mt-5" style="width: 80%;">
            <div class="row">
            <div class="col-sm-6">
            <div class="row">
                
                    <div class="col d-flex">
                        <a href="{{url('/')}}">
                            <img class="logo-signup" style="background: #cec7c7;height: 79px;margin-right: -11px;margin-top: -20px;" src="{{ asset('talent/assets/img/logoOnly.jpg') }}">
                            
                            <div class="logo-text">
                                <p>The</p>
                                <span>DigitalGate</span>
                            </div>
                        </a>
                    </div>
                
            </div>
            
</div>
<div class="col-sm-6">
<label> Don't have an account? </label>
                    <a href="{{route('register')}}">Sign Up</a>
                </div>

            
                <!-- <div class="col-sm-6">
                    <img style="background: #cec7c7; height: 66%;" src="{{ asset('talent/assets/img/logo4.png') }}">
                </div>
                
                
                <div class="col-sm-6">
                    <label> Don't have an account? </label>
                    <a href="{{route('register')}}">Sign Up</a>
                </div> -->
            </div>
            
                <h2 class="pt-5 pb-2">Login</h2>
                <label style="font-size: 18px;">For the purpose of industry regulation, your details are required.</label>
                
                <div class="pt-5">
                    @if (session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Login as *</label>
                            <select name="user_type" class="form-control">
                                <option value="usr_type_3" <?php if($ut == 'usr_type_3'){ echo 'selected'; } ?>>{{repalceWithMentor('Trainer')}}</option>
                                <option value="usr_type_4" <?php if($ut == 'usr_type_4'){ echo 'selected'; } ?>>Aspirant</option>
                                <option value="usr_type_1" disabled style="background-color: #cccccc;" <?php if($ut == 'usr_type_1'){ echo 'selected'; } ?>>Employer</option>
                                <option value="usr_type_2" disabled style="background-color: #cccccc;" <?php if($ut == 'usr_type_2'){ echo 'selected'; } ?>>Employer Team</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input name="email" required type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password*</label>
                            <div style="position:relative">
                                <input name="password" required type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror password_input_jss" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your password">
                                <i class="fa fa-eye-slash eye_icon_for_pass_css eye_icon_for_pass_jss"></i>
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{route('forgot_password')}}">Forgot Password?</a>
                        </div>
                        <button type="submit" id="btnSubmit1" class="btn btn-primary" style="background: #15284C;width: 100%;">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--pageend-->


<script>

  //   $(document).ready(function() {
  //   //function will be called on button click having id btnsave
  //   $("#btnSubmit").click(function() {
  //     $.ajax({
  //       type: "POST", //HTTP POST Method  
  //       contentType: "application/json",
  //       url: "http://192.168.43.186:5000/api/Trainer_login", // Controller/View   
  //       data: JSON.stringify({
  //         first_name: $("#first_name").val(),
  //         second_name: $("#second_name").val(),
  //         email: $("#email").val(),
  //         mobile_code: $("#mobile_code").val(),
  //         mobile: $("#mobile").val()
  //       })
  //     }).then((res) => {
  //       if (res['status Code'] == '200') {
  //         Swal.fire(
  //           'Successful!',
  //           res['message'],
  //           'success'
  //         );
  //         // window.location.replace('aspirant/awesome');
  //       }else{
  //         Swal.fire(
  //           'ERROR!',
  //           res['Message'],
  //           'error'
  //         )
  //       }
  //     });
  //   });
  // });
  $("body").on("click", ".eye_icon_for_pass_jss", function(e){
    e.preventDefault();
    if($(this).hasClass("fa-eye-slash"))
    {
        $(this).addClass("fa-eye");
        $(this).removeClass("fa-eye-slash");
        $(this).closest("div").find(".password_input_jss").attr("type","text");
    }
    else
    {
        $(this).addClass("fa-eye-slash");
        $(this).removeClass("fa-eye"); 
        $(this).closest("div").find(".password_input_jss").attr("type","password");
    }
  });
  
</script>