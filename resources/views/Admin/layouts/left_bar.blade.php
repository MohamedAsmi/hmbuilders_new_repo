<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ url('/home') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('images/fav.png') }}" alt="" height="50">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/fav.png') }}" alt="" height="50">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{route('main')}}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('images/fav.png') }}" alt="" height="50">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/fav.png') }}" alt="" height="50">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title side-nav-item">{{Auth::user()->name}}</li>
            <li class="side-nav-item">
                <a href="{{route('home')}}" class="side-nav-link">
                    <i class="uil-dashboard"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('home')}}#website-statistics" class="side-nav-link">
                    <i class="uil-chart-growth"></i>
                    <span> Website Statistics </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('AddOurTeam')}}" class="side-nav-link">
                    <i class="uil-dashboard"></i>
                    <span> Add Members </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('AddService')}}" class="side-nav-link">
                    <i class="uil-dashboard"></i>
                    <span> Add Services </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('AddProjects')}}" class="side-nav-link">
                    <i class="uil-dashboard"></i>
                    <span> Add Projects </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('ListInquires')}}" class="side-nav-link">
                    <i class="uil-dashboard"></i>
                    <span> List Inquires </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('ListMessages')}}" class="side-nav-link">
                    <i class="uil-dashboard"></i>
                    <span> List Messages </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('AddPlans')}}" class="side-nav-link">
                    <i class="uil-dashboard"></i>
                    <span> Modern Plans </span>
                </a>
            </li>
            {{-- <li class="side-nav-item">
                <a href="{{route('ModernProjects')}}" class="side-nav-link">
                    <i class="uil-dashboard"></i>
                    <span> Modern Projects </span>
                </a>
            </li> --}}


        </ul>
        <div class="clearfix"></div>
    </div>
</div>
