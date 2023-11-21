<!-- mentor type navigation page -->
<style>
.navbar-nav .nav-link.activeNav,.rightsidemenu_list_css .activeNav
{
  background-color: #FC6717;
  color:#fff !important;
}
</style>
<div class="navbar navbar-expand-lg navbar-light" style="background: #F9C900;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar3">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link {{Request::is('trainer/myprofile') ? 'activeNav' : '' }}" href="{{ url('trainer/myprofile') }}">My Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::is('trainer/managemodules') ? 'activeNav' : '' }}" href="{{ url('trainer/managemodules') }}">Manage Modules<span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Manage Aspirant<span class="sr-only">(current)</span></a>
              </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Manage Trainings</a>
      </li> -->

      <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Manage Jobs</a>
              </li> -->

      <li class="nav-item">
        <a class="nav-link {{Request::is('trainer/aspirant/searchaspirant') || Request::routeIs('tmanageAspByID') ? 'activeNav' : '' }}" href="{{ url('trainer/aspirant/searchaspirant') }}">Manage Aspirants</a>
      </li>


      <li class="nav-item">
        <a class="nav-link {{Request::is('trainer/dashboardacc') ? 'activeNav' : '' }}" href="{{ url('trainer/dashboardacc') }}">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::is('trainer/mybank/earned') ? 'activeNav' : '' }}" href="{{ url('trainer/mybank/earned') }}">My Bank</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::is('trainer/settings') ? 'activeNav' : '' }}" href="{{ url('trainer/settings') }}">Settings</a>
      </li>
      @if(session()->get('userRole') == 9)
      <a class="nav-link dropbtn {{ Request::is('admin/users') ? 'activeNav' : '' }}" href="{{ url('admin/users') }}">Users</a>
      <a class="nav-link dropbtn {{ Request::is('admin/modules') ? 'activeNav' : '' }}" href="{{ url('admin/modules') }}">Modules</a>
      @endif
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropbtn">Alert</a>
        <div class="dropdown-content">
          <a href="{{ url('trainer/message') }}">Messages</a>
          <!-- <a href="#">Announcements</a> -->
          <a href="{{ url('trainer/notify') }}">Notifications</a>
        </div>
      </li> --}}
      {{--<li class="nav-item">
        <a class="nav-link" href="#">User Guide</a>
      </li>--}}

      <!-- <li>
                <a class="nav-link" href="#" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">Search here</a>
              </li> -->
    </ul>
  </div>
</div>
<style>
  .navbar-nav .active>.nav-link {
    color: black;
    font-weight: bold;
  }

  .navbar-nav .nav-link {
    color: black !important;
    font-weight: 600;
  }
</style>

<script>
  $(document).ready(function() {



    // $('#navbar3 a').click(function() {
    //   var $this = $(this);
    //   $this.siblings().removeClass();
    //   if ($this.hasClass('active')) {
    //     $this.removeClass('active').addClass('inactive')
    //   } else {
    //     $this.removeClass('inactive').addClass('active');
    //   }

    // })

  });
</script>