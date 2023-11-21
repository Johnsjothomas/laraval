
@include('header')

<style>
.eye_icon_for_pass_css {
    position:absolute;
    z-index: 9;
    right:10px;
    top: 8px;
    font-size: 19px;
}
</style>
<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{asset('talent/assets/img/frame_verification.svg')}}" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- <a href="#" class="btn-sm btn-primary"> < Back </a> -->
                    </div>
                    <div class="col-sm-6">
                        <label> Already have an account? </label>
                        <a href="{{route('login')}}" class="btn-sm btn-primary">Sign In</a> 
                    </div>
                </div>
                <div class="container-fluid">
                    <h2 class="pt-5">New password </h2>

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



                    <div class=" pl-0 pt-3">
                        <form method="POST" action="/new_password" class="submit-form">
            @csrf
                            <div class="form-group">
                                <label for="password">Password</label>
                              <div  style="position:relative">
                                <input name="password" required type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror password_input_jss" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your password">
                                <i class="fa fa-eye-slash eye_icon_for_pass_css eye_icon_for_pass_jss"></i>
                              </div>
                           <span style="font-size:10px;color:#6d6666;text-decoration: none">Password must be alphanumeric</span><br>
                           <span style="font-size:10px;color:#6d6666;text-decoration: none">Minimum 8 characters</span>
                           @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                              </div>

                              <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <div style="position:relative">
                                 <input name="password_confirmation" required type="password" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror password_input_jss" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm your password">
                                 <i class="fa fa-eye-slash eye_icon_for_pass_css eye_icon_for_pass_jss"></i>
                              </div>
                           @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                              </div>
                              <input type="hidden" name="user" value="{{ (@session()->get('register_email') ? session()->get('register_email') : (@$_REQUEST['useremail'] ? base64_decode($_REQUEST['useremail']) : '')) }}" />
                              <input type="hidden" name="user_type" value="{{ (@session()->get('user_type') ? session()->get('user_type') : (@$_REQUEST['user'] ? base64_decode($_REQUEST['user']) : '')) }}"/>
                            <button type="submit" id="btnSubmit" class="btn btn-primary" style="background: #15284C;width: 100%;">Submit</button>
                            
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--pageend-->
<!--pageend-->
<script>
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