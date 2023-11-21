
    @php
    $url = \Route::current()->getName()
    @endphp
    <div class="">
        <div class="mb_15">
            @if(isset($status))
            <a href="{{route(Route::currentRouteName(),['individual',$status])}}" class="card-link @if($type=='individual') bold @endif heading1">Open for All</a>
            <a href="{{route(Route::currentRouteName(),['corporate',$status])}}" class="card-link @if($type=='corporate') bold @endif heading1">Corporate</a>
            @else
             <a href="{{route(Route::currentRouteName(),['individual'])}}" class="card-link @if($type=='individual') bold @endif heading1">Open for All</a>
            <a href="{{route(Route::currentRouteName(),['corporate'])}}" class="card-link @if($type=='corporate') bold @endif heading1">Corporate</a>
            @endif
        </div>



        <div class="row">
            <div class="col-12 mb_15">
                <span class=" pr-2">
                    <button class="bluebtn">Module Planner</button>
                </span>
                <span class=" ">
                    <button class="whitebtn">My Trainings</button>
                </span>
            </div>
<div class="col-12">
                <a href="{{url('/trainer/module/'.$type.'/create')}}" class="card-link">Create Modules</a>
                <a href="{{url('/trainer/module/'.$type.'/active')}}" class="card-link">Active Modules</a>
                <a href="{{url('/trainer/module/'.$type.'/closed')}}" class="card-link">Deleted and Paused Modules</a>
                <a href="{{url('/trainer/module/'.$type.'/completed')}}" class="card-link">Completed Modules</a>
</div>    
 </div>

    </div>

    
