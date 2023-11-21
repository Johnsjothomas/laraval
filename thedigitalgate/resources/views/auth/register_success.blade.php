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
              Our main goal is the Reusability of the material and better SCM practice. 
            </div>
             <div class="signup-img-text-3">
              We consistently develop and provide our customers with the technology, and services that generate new value.
            </div>
           
          </div>
          <div class="col-md-7">
            
          
            <div class="create-account-box mrgn-150">
             
               <div class="row">
               
               </div>
             
               <div class="top-mrgn text-center">
                  <div class="row">
                     <div class="col-md-12">
                     <div class="create-account-box">
              <div class="top-tick">
                <i class="fa fa-check green-tick-top" aria-hidden="true"></i>
              </div>
                
                
               <div class="verify-head text-center">Awesome</div>
               <p class="verify-head-text">You are done with creation of your user profile, Now lets get started.</p>
             
             
                  <div class="row">
                  
                     
             
                    
                     <div class="col-md-12 text-center">
                      @if($role==1)
                        <a href="{{route('seller')}}"> <button type="button" class="btn-blue-btm">Continue </button></a>
                       @else
                        <a href="{{route('buyer')}}"> <button type="button" class="btn-blue-btm">Continue </button></a>
                      @endif
                </div>
                       
               
                  </div>
               </div>
            </div>
                     </div>
                  
                   
              
              
                  </div>
               </div>
            </div>
            </div>
              </div>
         </div>
         </div>
      </section>

    @endsection