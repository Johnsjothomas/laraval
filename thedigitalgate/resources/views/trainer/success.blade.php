@include('header')
@include('trainer.navigation')
@include('trainer.submenu')
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-md-6 pt-5">
            <div class="panel panel-default pt-5">
            <h4>Congratulations!</h4>
            <h6>you have successfully created your lesson</h6></div>
            <div class="panel panel-default pt-5">
            <h4>Teaching English</h4>
            <h6>https://www.behance.net/live/replays/creative-fields/48/Illustration</h6></div>
            <div class="panel panel-default pt-5">
            <h4>Share to</h4>
            <h6>Sharing your lesson on social media right now will increse bookings</h6></div>
            <div>
                <ul class="success_social_icons">
                    <li><a href="#"><img src="{{asset('talent/assets/img/fb.png')}}" width="24"></a></li>
                    <li><a href="#"><img src="{{asset('talent/assets/img/twiter.png')}}" width="24"></a></li>
                    <li><a href="#"><img src="{{asset('talent/assets/img/insta.png')}}" width="24"></a></li>
                    <li><a href="#"><img src="{{asset('talent/assets/img/linkedin.png')}}" width="24"></a></li>
                    <li><a href="#"><img src="{{asset('talent/assets/img/google.png')}}" width="24"></a></li>
                    <li><a href="#"><img src="{{asset('talent/assets/img/youtube.png')}}" width="24"></a></li>
                </ul>
            </div>

            <div class="panel panel-default pt-5">
            <a href="#" class="btn bluebtn">Click to view your Module</a></div>
        </div>
        <div class="col-md-6">
            <img src="assets/img/tech_life_communication.png">
        </div>
    </div>
</div>
@include('footer')

                        