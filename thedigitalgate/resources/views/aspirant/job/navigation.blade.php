@php
    $url = \Route::current()->getName()
    @endphp
<div class="row">
        <div class="col-12 mb_15 employert-nav">
            <span class=" pr-2">
                <a href="{{route('aspirant_job')}}"><button class="@if($url == 'aspirant_job') bluebtn @else whitebtn @endif"></button></a>
            </span> <span class=" ">
                <a href="{{route('applied_training')}}"><button class="@if($url == 'applied_training') bluebtn @else whitebtn @endif">Applied Training Requests</button></a>
            </span> <span class=" ">
                <a href="{{route('training_request_negotiations')}}"><button class="@if($url == 'training_request_negotiations') bluebtn @else whitebtn @endif">Negotiation Schedule</button></a>
            </span> <span class=" ">
                <a href="{{route('create_module',['individual'])}}"><button class="whitebtn" >Create Training Module</button></a>
            </span> <span class=" ">
                <a href="{{route('employer_summary')}}"><button class="@if($url == 'employer_summary') bluebtn @else whitebtn @endif">Summary</button></a>
            </span>
        </div>
    </div>