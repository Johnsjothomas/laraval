@include('header')
@include('navigationindex')
{{-- @extends('layouts.app') --}}
<style>
.btn-dashboard-get-in {
    font-size: 16px;
}
</style>
   <section class="dashboard-account-section ">
         <div class="container mb-5">
            <div class="row">
               <div class="col-md-12 dashboard-first-h2">
                        <h2>Contact us</h2>
               </div>

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
            </div>
         </div>

      </section>
      <section class="dashboard-contact-us">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <form method="post">
                @csrf
                <div class="form-group">
                  <input type="text" required name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
               </div>
               <div class="form-group">
                  <input type="email" required name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
               </div>
                <div class="form-group">
                  <input type="text" required name="subject" value="{{old('subject')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Subject">
                  @error('subject')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
               </div>
               <div class="form-group">
                  <textarea name="message" required class="form-control-1" rows="10" id="comment" placeholder="Write your message here">{{old('message')}}</textarea>
                  @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
               </div>
               <div class="col-md-12">   
                  <div class="col-md-12 dashboard-contact-bottom">
                    <button type="submit" class="btn-dashboard-contact">Submit</button>
                  </div>
                  <!-- Minified CSS and JS -->
                </div>
              </form>
            </div>
            <div class="col-md-6 get-in-touch-text mb-5">
              <h2>Get in touch</h2>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <button type="button" class="btn-dashboard-get-in">chatbothani@thedigitalgate.co</button>
                </div>
                 <div class="col-md-12 col-lg-6">
                  <button type="button" class="btn-dashboard-get-in">+971 56 3170 700</button>
                </div>
                 <div class="col-md-12 col-lg-6">
                  <button type="button" class="btn-dashboard-get-in">+968 9210 2843</button>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-sm-6">
                  <p><b>United Arab Emirates</b><br>
                      Smart Management Technologies FZCO,<br>
                      Dubai Digital Park, Office #A5,<br>
                      Dubai Silicon Oasis, Dubai, UAE
                  </p>
                </div>
                <div class="col-sm-6">
                  <p><b>India</b><br>
                    Mythri The Town, Block B, Flat 507,<br> 
                    Shaili Garden, Yapral,<br> 
                    Hyderabad, India
                  </p>
                </div>
                <div class="col-sm-6">
                  <p><b>Oman</b><br>
                    3rd floor, Bait Al Reem building,<br> 
                    Al khuwaiyr,<br> 
                    Muscat, Oman
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@include('footer')