

                        <button type="button" class=" dpr-menu btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(606px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">

                              @if(!empty(Session('register_id')))
                                    <a class="dropdown-item" href="{{route('messages_buyer')}}">Messages</a>
                                    <a class="dropdown-item bdr-btm-a" href="{{route('alerts_buyer')}}">Alerts</a>
                                    <a class="dropdown-item" href="{{route('negotiation_buyer')}}">Transactions</a>
                                    <a class="dropdown-item bdr-btm-a" href="{{route('wishlist')}}">Wishlists</a>
                                    <a class="dropdown-item" href="{{route('dashboard_buyer')}}">Account</a>
                                    <a class="dropdown-item" href="#">Help</a>
                                    <a class="dropdown-item" onclick="$('#logout').submit();" href="#">Logout</a>
                              @else
                                    <a class="dropdown-item bdr-btm-a" href="{{route('login')}}">Login</a>
                                    <a class="dropdown-item" href="{{route('register')}}">Sign Up</a>
                              @endif
                        </div>