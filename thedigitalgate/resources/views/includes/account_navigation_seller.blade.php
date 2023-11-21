
  <a @if(\Request::route()->getName() =='dashboard') class="active" @endif href="{{route('dashboard')}}" >Dashboard</a>
  <a @if(\Request::route()->getName() =='personal') class="active" @endif href="{{route('personal')}}">Account Info</a>
  <a @if(\Request::route()->getName() =='products') class="active" @endif href="{{route('products')}}">Manage Listings</a>

  <a @if(\Request::route()->getName() =='negotiation') class="active" @endif href="{{route('negotiations')}}">Transactions</a>
  <a @if(\Request::route()->getName() =='announcements') class="active" @endif href="{{route('announcements')}}">Announcements</a>
  <a @if(\Request::route()->getName() =='alerts') class="active" @endif href="{{route('alerts')}}">Alerts</a>
  <a @if(\Request::route()->getName() =='messages') class="active" @endif href="{{route('messages')}}">Messages</a>
  <a @if(\Request::route()->getName() =='settings') class="active" @endif href="{{route('settings')}}">Settings</a>
  <a @if(\Request::route()->getName() =='contactus_seller') class="active" @endif href="{{route('contactus_seller')}}">Contact us</a>
  <a @if(\Request::route()->getName() =='userguides') class="active" @endif href="{{route('userguides')}}">User Guides</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
