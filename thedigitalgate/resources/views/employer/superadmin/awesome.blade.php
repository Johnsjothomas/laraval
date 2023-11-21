
@include('talent.header');

<!--pagestart-->
<div class="container-fluid pt-2 text-center">
<img src="{{ asset('talent/assets/img/logo2.svg') }}">
    <div style="font-size: 48px;font-weight:bold" class="pt-5">Awesome!!</div>
    <div style="font-size: 18px">You have completed registration. Please log in and complete your company profile.</div>
    <img class="pt-4" src="{{ asset('talent/assets/img/frame_success2.svg') }}">
    <div class="pt-3">  
            <button type="submit" id="btnSubmit" class="btn btn-primary" style="background: #15284C;width: 30%;">Create your Company Profile</button> 
    </div>
</div>

<!--pageend-->
<script type="text/javascript">
	$( "#btnSubmit" ).click(function() {
	  location.href = "/talent/login";
	});
</script>