<!-- aspirant type navigation page -->
<style>
.navbar-nav .nav-link.activeNav,.rightsidemenu_list_css .activeNav
{
  background-color: #FC6717;
  color:#fff !important;
}
</style>
    <div class="navbar navbar-expand-lg navbar-light" style="background: #F9C900;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar3"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar3">
        
          <ul class="navbar-nav mr-auto">
            
        
        <li class="nav-item">
                  <!-- <a class="nav-link" href="{{route('aspirant_profile')}}">My Profile</a> -->
                  <a class="nav-link {{ Request::is('talent/aspirant/myprofile') ? 'activeNav' : '' }}" href="{{ url('talent/aspirant/myprofile') }}">My Profile</a>
              </li>  
<!-- 
<li class="nav-item dropdown">
  <a class="nav-link dropbtn">My Jobs</a>
  <div class="dropdown-content">
    <a href="{{route('aspirant_savedjob')}}">Saved Jobs</a>
    <a href="{{route('aspirant_appliedjob')}}">Applied Jobs</a>
    <a href="{{route('aspirant_interview')}}">Interview Scheduled</a>
    <a href="{{route('aspirant_rejected')}}">Rejected Jobs</a>
    <a href="{{route('aspirant_appliedjob')}}">Viewed Jobs</a>
    <a href="{{route('aspirant_shortlisted')}}">Shortlisted Jobs</a>
  </div>
</li> -->

<a class="nav-link dropbtn {{ Request::is('talent/aspirant/mytraining') ? 'activeNav' : '' }}"  href="{{ url('talent/aspirant/mytraining') }}">My Tests and My Trainings</a>
<a class="nav-link dropbtn {{ Request::is('talent/aspirant/dashboardtraining') ? 'activeNav' : '' }}" href="{{ url('talent/aspirant/dashboardtraining') }}">Dashboard</a>
<a class="nav-link dropbtn {{ Request::is('talent/aspirant/mybank/earned') ? 'activeNav' : '' }}" href="{{ url('talent/aspirant/mybank/earned') }}">My Bank</a>
<!-- <a class="nav-link dropbtn" href="{{ route('myBankAsp') }}">My Bank</a> -->
<a class="nav-link dropbtn {{ Request::is('talent/aspirant/settings') ? 'activeNav' : '' }}" href="{{ url('talent/aspirant/settings') }}">Setting</a>
@if(session()->get('userRole') == 9)
<a class="nav-link dropbtn {{ Request::is('admin/users') ? 'activeNav' : '' }}" href="{{ url('admin/users') }}">Users</a>
@endif
<!-- <li class="nav-item dropdown">
  <a class="nav-link dropbtn">Alert</a>
  <div class="dropdown-content">
    <a href="{{ url('talent/aspirant/message') }}">Messages</a>
    <a href="{{ url('talent/aspirant/notify') }}">Announcements</a>
    <a href="{{ url('talent/aspirant/notify') }}">Notifications</a>
  </div>
</li>
<a class="nav-link dropbtn {{ Request::is('talent/aspirant/mytraining') ? 'activeNav' : '' }}" href="{{ url('talent/aspirant/mytraining') }}">User Guide</a> -->



              
            
              
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
