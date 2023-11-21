@php
    $url = \Route::current()->getName()
@endphp

        <div class="row">
            
          <div class=" p-2">
                <a href="{{route('create_training')}}"><button class="btn @if($url=='create_training') bluebtn2 @else whitebtn2 @endif">Create Training Request</button></a>
            </div>
              <div class=" p-2">
                <a href="{{route('training_planner')}}"><button class="btn @if($url=='training_planner') bluebtn2 @else whitebtn2 @endif">Training Planner</button></a>
            </div>
            <div class=" p-2">
                <a href="{{url('/employer/training/scheduled')}}"><button class="btn @if($url=='trainer_schedule') bluebtn2 @else whitebtn2 @endif">Training Schedule</button></a>
            </div>
        </div>

        <div class="row">
          <div class=" p-2">
                <a href="{{url('employer/training/scheduled')}}">Internal</a>
            </div>
            <span class="seperator"></span>
            <div class=" p-2">
                <a href="{{url('employer/training/scheduled')}}">Aspirant</a>
            </div>
        </div>
    