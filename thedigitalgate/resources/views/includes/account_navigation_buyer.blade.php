
  <a @if(\Request::route()->getName() =='dashboard_buyer') class="active" @endif href="{{route('dashboard_buyer')}}" >Dashboard</a>
  <a @if(\Request::route()->getName() =='personal_buyer') class="active" @endif href="{{route('personal_buyer')}}">Account Info</a>
  <a @if(\Request::route()->getName() =='wishlist') class="active" @endif href="{{route('wishlist')}}">Wish List</a>
<!--   <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> --> 



  <a @if(\Request::route()->getName() =='negotiation_buyer') class="active" @endif href="{{route('negotiation_buyer')}}">Transactions</a>
  <a @if(\Request::route()->getName() =='announcements_buyer') class="active" @endif href="{{route('announcements_buyer')}}">Announcements</a>
  <a @if(\Request::route()->getName() =='alerts_buyer') class="active" @endif href="{{route('alerts_buyer')}}">Alerts</a>
  <a @if(\Request::route()->getName() =='messages_buyer') class="active" @endif href="{{route('messages_buyer')}}">Messages</a>
  <a @if(\Request::route()->getName() =='settings_buyer') class="active" @endif href="{{route('settings_buyer')}}">Settings</a>
  <a @if(\Request::route()->getName() =='contactus_buyer') class="active" @endif href="{{route('contactus_buyer')}}">Contact us</a>
  <a @if(\Request::route()->getName() =='userguides_buyer') class="active" @endif href="{{route('userguides_buyer')}}">User Guides</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
