@extends('layouts.auth')

@section('content')

      <section class="content">
         <div class="container">
           <div class="width-80">
          <div class="row">
           
              
            
        
          <div class="col-md-5 signup-img">
            <img src="{{asset('Seller/images/signup-left-bg.png')}}">
            <div class="signup-img-text-1">
              <img class="logo-signup" src="{{asset('Seller/images/material-logo.png')}}">
              <div class="logo-text">
                <p>Material</p>
                <span>Industrèall</span>
              </div>
            </div>
            <div class="signup-img-text-2">
              We are Introducing the concept of Cloud Warehouse for excess material to this market place. 
            </div>
             <div class="signup-img-text-3">
              We use of AI for UN SDG equitable redistribution.
            </div>
           
          </div>
          <div class="col-md-7">
            
            <form method="POST" action="/reset_password">
            @csrf

            <div class="create-account-box">
            <h2>Change Password</h2>
               <p>Please enter you new password</p>
            

               @if (session('failed'))
                          <div class="invalid-feedback">
                            {{ session('failed') }}
                          </div>
                        @endif

                         @if (session('success'))
                          <div class="alert alert-success">
                            {{ session('success') }}
                          </div>
                        @endif


               
               <div class="">
                  <div class="row">
                    
                      
                     


                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Password</label>
                           <input name="password" required type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your password">
                           @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                        <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Confirm Password</label>
                           <input name="password_confirmation" required type="password" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm your password">
                           @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                      <input type="hidden" name="email" value="{{$_GET['email']}}"/>

                        
                        <div class="col-md-12 bottom-create-section">
                           
  <button type="submit" class="btn-blue-btm">Submit </button>
                        </div>
                        <!-- Minified CSS and JS -->
                       
                     </div>
                  </div>
               </div>
        </form>
            </div>
              </div>
         </div>
         </div>
      </section>

    @endsection