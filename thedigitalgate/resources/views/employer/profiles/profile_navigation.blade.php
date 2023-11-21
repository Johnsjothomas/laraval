       @php
    $url = \Route::current()->getName()
@endphp <div class="row">
          <div class=" p-2">
                <a href="{{url('/employer/aspirant')}}"><button class="btn whitebtn">Jobs</button></a>
            </div>
            <div class=" p-2">
                <a href="{{url('/employer/aspirant/internal')}}"><button class="btn whitebtn">Training</button></a>
            </div>
        </div>
        <div class="row">
          <div class=" p-2">
                <a href="{{url('/employer/aspirant')}}"><button class="btn @if($url=='search_applicants') bluebtn2 @else whitebtn2 @endif">Search Aspirants</button></a>
            </div>
              <div class=" p-2">
                <a href="{{url('/employer/aspirant/list')}}"><button class="btn @if($url=='aspirant_list') bluebtn2 @else whitebtn2 @endif">Applicant List</button></a>
            </div>
            <div class=" p-2">
                <a href="{{url('/employer/aspirant/saved')}}"><button class="btn @if($url=='saved_aspirants') bluebtn2 @else whitebtn2 @endif">Saved Aspirants</button></a>
            </div>
            <div class=" p-2">
                <a href="{{url('/employer/aspirant/interview')}}"><button class="btn @if($url=='interview_scheduled') bluebtn2 @else whitebtn2 @endif">Interview Scheduled</button></a>
            </div>
            <div class=" p-2">
                <a href="{{url('/employer/aspirant/shortlisted')}}"><button class="btn @if($url=='shortlisted_aspirants') bluebtn2 @else whitebtn2 @endif">Shortlisted Aspirant</button></a>
            </div>
            <div class=" p-2">
                <a href="{{url('/employer/aspirant/rejected')}}"><button class="btn @if($url=='create_training') bluebtn2 @else whitebtn2 @endif">Rejected Aspirants</button></a>
            </div>
        </div>
    