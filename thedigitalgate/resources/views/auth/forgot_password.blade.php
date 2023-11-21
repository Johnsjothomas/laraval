@extends('layouts.auth')

@section('content')


@include('header')
<?php $ut = session()->get('user_type'); ?>
<!--pagestart-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 side">
            <img src=" {{ asset('talent/assets/img/verifyEmailPage.png') }}" width="100%">
            <div class="signup-img-text-2-edit">
              Train yourself to enhance your skills with industry's best minds
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
                    <a href="{{route('login')}}">Signin</a>
                </div>

            </div>
            
                
                {{-- @if (session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
                @endif --}}

                <div class="pt-5">
                <form method="POST" action="/forgot_password">
            @csrf
            <div class="create-account-box">
               <h2>Reset Password</h2>
               <p>Enter your email to recieve the password reset link</p>

               @if (session('failed'))
                          <div class="alert alert-danger">
                            {{ session('failed') }}
                          </div>
                        @endif

                         @if (session('success'))
                          <div class="alert alert-success">
                            {{ session('success') }}
                          </div>
                        @endif


               
               <div class="top-mrgn">
                  <div class="row">
                    
                     
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Reset as *</label>
                           <select name="user_type" class="form-control">
                            <option value="3">Mentor</option>
                            <option value="4">Aspirant</option>
                            <option value="1" disabled style="background-color: #cccccc;">Employer</option>
                            <option value="2" disabled style="background-color: #cccccc;">Employer Team</option>
                        </select>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Email</label>
                           <input name="email" required type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                           @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                        <div class="col-md-12 bottom-create-section">
                            <button type="submit" class="btn btn-primary" style="background: #15284C;width: 100%; color:white;">Submit </button>
                        </div>
                        <!-- Minified CSS and JS -->
                       
                     </div>
                  </div>
               </div>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--pageend-->


<script>

</script>

      <section class="content">
         <div class="container">
           <div class="width-80">
          <div class="row">

          <div class="col-md-7">
            
           
            </div>
              </div>
         </div>
         </div>
      </section>

    @endsection