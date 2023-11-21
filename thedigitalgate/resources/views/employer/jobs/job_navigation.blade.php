
    @php
    $url = \Route::current()->getName()
    @endphp
    <div class="">
        <div class="row">
            <div class=" p-2">
                <a href="{{url('/employer/jobs/create')}}"><button class="btn @if($url=='create_job') bluebtn2 @else whitebtn2 @endif">Create Job</button></a>
            </div>
            <div class=" p-2">
                <a href="{{url('/employer/jobs/active')}}"><button class="btn @if(isset($status) && $status=='active') bluebtn2 @else whitebtn2 @endif">Active Jobs </button></a>
            </div>
            <div class=" p-2">
                <a href="{{url('/employer/jobs/closed')}}"><button class="btn @if(isset($status) && $status=='closed') bluebtn2 @else whitebtn2 @endif">Closed/Deleted/Paused Jobs</button></a>
            </div>
        </div>
    </div>
    
