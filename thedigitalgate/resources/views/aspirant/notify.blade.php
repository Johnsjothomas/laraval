@include('header')
@include('aspirant.navigation')
@include('aspirant.submenu')
<style>
	.notificationheading{
		display:block;
		margin-bottom:15px;
	}
</style>
<div class="container p-5">
    <div class="row">
        <div class="col-md-12">
            <h4 class="pb-2">Notifications</h4>
            @if($notifications->count() > 0)
            @foreach($notifications as $noti)
            <div class="alert alert-dismissible fade show border-bottom">
                <strong>{{$noti->notification_text}} </strong> at {{$noti->created_date}}
                <form method="POST" action="{{ route('aspinoti') }}">
                @csrf
                    <input type="hidden" value="{{$noti->notification_id}}" name="notiid" />
                    <button type="submit" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </form>
            </div>
            @endforeach
            @else
                <div>No Data</div>
            @endif
            
            
            <!-- <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <strong class="notificationheading">A Better Place For Your Business</strong>
                <br />
                <p>An innovative online platform which connects the buyers in the Middle East and suppliers around the
                    world in Energy Industry.
                    Need a virtual advertising space online?
                    Post your Industrial needs with pictures on Businessplace MarketWall and get noticed by thousands of
                    suppliers around you. Forget traditional searching of products and services. Now do it live. We
                    provide you a real time updated search of from various manufacturers/ suppliers/ stockists in the
                    Energy Industry.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->

            <!-- <div class="alert alert-dismissible fade show border-bottom" role="alert">
                <strong>Notify me of upcoming sessions</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
        </div>
    </div>
</div>

@include('footer')