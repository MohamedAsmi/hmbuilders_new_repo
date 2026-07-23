<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        @php $contacts = \App\Models\contact::where('status','0')->count() @endphp  
        @php $inquires = \App\Models\inquire::where('status','0')->count() @endphp  
      
       <li class="dropdown notification-list">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">{{$contacts + $inquires}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">{{$contacts + $inquires}} Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="{{route('ListInquires')}}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{$contacts }} Contact messages

              </a>
              <div class="dropdown-divider"></div>
              <a href="{{route('ListMessages')}}" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> {{ $inquires}} Inqire messages
            
              </a>
              <div class="dropdown-divider"></div>
           
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
               role="button" aria-haspopup="false"
               aria-expanded="false">
                                   
                <span>
                                        <span class="account-user-name">{{ Auth::user()->name }} </span>
                                        
                                    </span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
              <a href="{{route('change-password')}}"><div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Setting</h6>
              </div></a>
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                
                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
 
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
   
</div>
