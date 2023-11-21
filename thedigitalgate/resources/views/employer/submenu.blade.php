
    <div class="navbar navbar-expand-lg navbar-light" style="background: #F9C900;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar3"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar3">
        
          <ul class="navbar-nav mr-auto">
            @if(session('role')=='employer')
              <li class="nav-item active">
                  <a class="nav-link" href="{{url('/employer/update_profile')}}">Company Profile<span class="sr-only">(current)</span></a>
              </li>
              @if(Session::has('company_id'))
              <li class="nav-item">
              <div class="dropdown">
                 <a class="nav-link" href="{{url('/employer/users')}}">Manage Users</a>
                    </div>  
              </li>
              @endif
            @endif  
            @if(Session::has('company_id'))
              <li class="nav-item">
                  <a class="nav-link" href="{{url('/employer/jobs/create')}}">Manage Jobs</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="{{url('/employer/training/create')}}">Manage Trainings</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="{{url('/employer/aspirant')}}">Manage Aspirants</a>
              </li>

             
              <li class="nav-item">
                  <a class="nav-link" href="{{url('/employer/dashboard')}}">Dashboards</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">My bank</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/employer/settings')}}">Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/employer/alerts')}}">Alerts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/employer/message')}}">Messages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/employer/announcements')}}">Announcements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">User Guides</a>
              </li>
              @endif
              
              <!-- <li>
                <a class="nav-link" href="#" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">Search here</a>
              </li> -->
          </ul>
      </div>
  </div>
  <style>
     .navbar-nav .active>.nav-link{
        color: black;
        font-weight: bold;
      }
      .navbar-nav .nav-link{
        color: black !important;
        font-weight: 600;
      }
  </style>