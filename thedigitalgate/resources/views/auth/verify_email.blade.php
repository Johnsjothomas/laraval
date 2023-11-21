@extends('layouts.auth')

@section('content')
    <section class="content">
         <div class="container-fluid">
         <div class="row">
            <div class="col-sm-6">
                <img src="{{ asset('talent/assets/img/frame_verification.svg') }}" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="/register" class="btn-sm btn-primary"> < Back </a>
                    </div>
                    <div class="col-sm-6">
                        <label> Already have an account? </label>
                        <a href="/login" class="btn-sm btn-primary">Sign In</a> 
                    </div>
                </div>
                <div class="container-fluid" style="width: 80%;">
                    <h2 class="pt-5">Verify E-mail </h2>
                    <label>To verify your email, we have sent you one-time 
                        password (OTP) to your email</label>
                    <div class="p-3">
                        <form  method="POST" action="{{route('verify_email')}}" class="submit-form">
                        @csrf
                            <!-- <div class="form-group">
                                <label for="otp">Enter OTP</label>
                                <input class="form-control" id="otp" placeholder="Enter OTP" required>
								<p id="p01" style="color: red"></p>
                              </div> -->
                           @error('verify_otp')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror

                            @if (session('failed'))
                              <!-- <div class="invalid-feedback"> -->
                              <div class="alert alert-danger">
                                 {{ session('failed') }}
                              </div>
                           @endif
        
                           @if (session('success'))
                           <!-- <div class="valid-feedback"> -->
                              <div class="alert alert-success">
                              <i class="fa fa-check green-tick" aria-hidden="true"></i>
                              {{ session('success') }}
                           </div> 
                           @endif

                           <div class="form-group">
                              <label class="font-size-18px" for="exampleInputEmail1">Enter OTP</label>
                              <input type="text" name="verify_otp" class="form-control @error('verify_otp') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter OTP" >
                           </div>

                           <button type="submit" name="submit" id="btnSubmit" value="verify" class="btn btn-primary p-2" style="background: #15284C;width: 100%;">Continue</button>
                            <div  class="text-center pt-3">
                            <a href="#">Resend</a></div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
          <!-- <form method="POST" action="/verify_email"> -->
          {{-- <form method="POST" action="{{route('verify_email')}}" class="submit-form">
            @csrf
            <div class="create-account-box">
               <h2 class="verify-head">Verify email address</h2>
               <p class="verify-head-text">To verify your email, we’ve sent a one time password(OTP) to your email</p>
             
               <div class="top-mrgn">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="font-size-18px" for="exampleInputEmail1">Enter OTP</label>
                           <input type="text" name="verify_otp" class="form-control @error('verify_otp') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" >
                           @error('verify_otp')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
         
                        @if (session('failed'))
                          <!-- <div class="invalid-feedback"> -->
                          <div class="alert alert-danger">
                            {{ session('failed') }}
                          </div>
                        @endif
        
                         @if (session('success'))
                          <!-- <div class="valid-feedback"> -->
                           <div class="alert alert-success">
                            <i class="fa fa-check green-tick" aria-hidden="true"></i>
                            {{ session('success') }}
                          </div> 
                         @endif


                        </div>
                     </div>
                     
             
                    
                     <div class="col-md-12 text-center">
                        <button type="submit" name="submit" value="verify" class="btn btn-primary btn-blue-btm">Continue </button>
                        <button type="submit" class="resend-otp btn btn-primary" name="submit" value="resend">Resend OTP</button>
                     </div>
                  </div>
               </div>
            </div>
            </form>--}}
         </div>
      </section>
@endsection