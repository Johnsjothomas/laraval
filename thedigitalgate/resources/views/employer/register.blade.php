
@include('header')

<!--Phone input-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 side">
                <img src="assets/img/frame_register.svg" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="/talent/joinus"> < Back </a>
                    </div>
                    <div class="col-sm-6">
                        <label> Already have an account? </label>
                        <a href="{{route('login_employer')}}" class="btn-sm btn-primary">Sign In</a> 
                    </div>
                </div>
                <div class="container-fluid" style="width: 80%;">
                    <h2 class="pt-5">Register</h2>
                    <label style="color:#8692A6">For the purpose of Industry Regulation, your details are required</label>
                    <div style="display: none;color:#AE3C3C">!This email address is already in use by another account.</div>
                    <div class="p-3">
                        <form method="POST" action="/register" class="submit-form">
            @csrf
                            <div class="form-group">
                                <label for="firstname">Your First Name*</label>
                                <input type="text" required name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your first name">
                           @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                
                              </div>
                              <div class="form-group">
                                <label for="lastname">Your Last Name*</label>
                                <input type="text" required name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your last name">
                           @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                              </div>

                              <div class="form-group">
                              <label for="job_role">Job Role*</label>
                              <input type="text" required name="job_role" value="{{ old('job_role') }}" class="form-control @error('job_role') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Job role">
                           @error('job_role')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                              <label for="email">Email*</label>
                              <input type="email" required name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                           @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                 <input type="number" required name="mobile" value="{{ old('mobile') }}" class="form-control @error('mobile') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile">
                           @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                              </div>
                              
                          
                            <div class="form-group form-check">
                              <input type="checkbox" class="form-check-input" id="check" required>
                              <label class="form-check-label" for="check">I agree to the terms & conditions</label>
                            </div>
                            <button type="submit" id="btnSubmit" class="btn btn-primary" style="background: #15284C;width: 100%;">Register Account</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
<style>
  label{
    color:#696F79 ;
  }
</style>