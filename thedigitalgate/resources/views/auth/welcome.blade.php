
@include('header');

<!--pagestart-->
<div class="container-fluid pt-5 text-center">
<img src="{{ asset('talent/assets/img/logo2.svg') }}">
    <h2 class="pt-5">Welcome!!</h2>
    <h6 style="color:#8692A6">A world of industry aspirants are a click away to work for you.</h6>
    <img class="pt-4" src="{{ asset('talent/assets/img/welcome.svg') }}">
    <div class="pt-3">  
            <a href="{{route('update_profile')}}"><button type="submit" id="btnSubmit" class="btn btn-primary" style="background: #15284C;width: 30%;">Create your Company Profile</button> </a>
    </div>
</div>

