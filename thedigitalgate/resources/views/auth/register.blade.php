@include('header')

<style>
@media only screen and (max-width: 600px) {
  .signup-img-text-2-register {
    font-size: 19px;
    line-height: 25px;
  }
  .w_full_on_res {
		width: 100% !important;
	}
  .no_pad_rl_respo {
    padding-left: 15px !important;
    padding-right: 15px !important;
  }
}
</style>
<!--Phone input-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.5/js/intlTelInput.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.5/css/intlTelInput.css">
<!--pagestart-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 side">
      <img src="{{asset('talent/assets/img/RegisterPage.png')}}" width="100%">
      <div class="signup-img-text-2-register">
        <p>Register on The Digitalgate employability marketplace TODAY and embrace the future of work;</p><br>
        <p> get ready to unlock your career !</p>
      </div>
    </div>
    <div class="col-sm-6 p-5 no_pad_rl_respo">
      <div class="row">
        <div class="col-sm-6">
          <!-- <a href="/talent/joinus"> -->
          <a href="/signup" class="btn-sm btn-primary">
            < Back </a>
        </div>
        <div class="col-sm-6">
          <label> Already have an account? </label>
          <a href="{{route('login')}}" class="btn-sm btn-primary">Sign In</a>
        </div>
      </div>
      <div class="container-fluid w_full_on_res" style="width: 80%;">

        <div class="row">
          <h2 class="pt-5">Register</h2>
          <h6 style="color:#8692A6">For the purpose of Industry Regulation, your details are required</h6>
          <div style="display: none;color:#AE3C3C; width: 100%;">!This email address is already in use by another account.</div>
        </div>



        <div>
          @if (session('register_failed'))
          <div class="alert alert-danger" style="width: 100%;">
            {{ session('register_failed') }}
          </div>
          @endif
          <!-- <form method="POST" action="{{route('register_save')}}" class="submit-form"> -->
          <form method="POST" action="{{route('register_save')}}" class="submit-form">
            @csrf




            <div class="register_form">
              <div class="form-group">
                <label for="firstname">Your First Name*</label>
                <input type="text" id="first_name" required name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your first name">
                @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              </div>
              <div class="form-group">
                <label for="lastname">Your Last Name*</label>
                <input type="text" id="second_name" required name="second_name" value="{{ old('second_name') }}" class="form-control @error('second_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your last name">
                @error('second_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- <div class="form-group">
                              <label for="job_role">Job Role*</label>
                              <input type="text" required name="job_role" value="{{ old('job_role') }}" class="form-control @error('job_role') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Job role">
                           @error('job_role')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div> -->

              <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" id="email" required name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <div class="row">
                  {{-- <div class="col-sm-3">
                    <input type="number" id="mobile_code" required name="mobile_code" value="{{ old('mobile_code') }}" class="form-control @error('code') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Country Code">
                  </div> --}}
                  <input type="hidden" name="mobile_code" id="mobile_code" value="91">
                  <div class="col-sm-12">
                    <input type="tel" id="mobile" required name="mobile" value="{{ old('mobile') }}" class="form-control @error('mobile') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" >
                  </div>
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <p><input class="user_type_set" type="hidden" id="user_type" name="user_type" value="{{$user_type ?? old('user_type')}}"></p>


              <div class="form-group form-check">
                <label class="form-check-label" for="check"><input type="checkbox" class="form-check-input" id="check" required> I agree to the terms & conditions</label>
              </div>
              <button type="submit" id="btnSubmit" class="btn btn-primary" style="background: #15284C;width: 100%;">Register Account</button>


            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  label {
    color: #696F79;
  }
</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {
    let inputDataMobile = document.querySelector("#mobile");
    const instanceMobile = window.intlTelInput(inputDataMobile, {
        // allowDropdown: false,
        // autoInsertDialCode: true,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   fetch("https://ipapi.co/json")
        //     .then(function(res) { return res.json(); })
        //     .then(function(data) { callback(data.country_code); })
        //     .catch(function() { callback("us"); });
        // },
        // hiddenInput: "full_number",
        // initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        preferredCountries: ['in','us'],
        separateDialCode: true,
        // showFlags: false,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.5/js/utils.js"
      });
      inputDataMobile.addEventListener("countrychange",function() {
        const countryData = instanceMobile.getSelectedCountryData();

        $("#mobile_code").val(countryData.dialCode);
      });

    });
</script>