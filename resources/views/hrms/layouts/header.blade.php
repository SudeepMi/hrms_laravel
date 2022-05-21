<header class="navbar navbar-fixed-top bg-system">
    <div class="navbar-logo-wrapper bg-system">
        <a class="navbar-logo-text" href="#">
            <b> O M S </b>
        </a>

        <span id="sidebar_left_toggle" class="ad ad-lines"></span>
    </div>
    <ul class="nav navbar-nav navbar-left">
        <li class="hidden-xs">
            <a class="navbar-fullscreen toggle-active" href="#">
                <span class="glyphicon glyphicon-fullscreen"></span>
            </a>
        </li>
    </ul>
    @php
        $notifications = \App\Models\Notification::where('recipients', Auth::user()->id)->limit(5)->get();
    @endphp
    <ul class="nav navbar-nav navbar-right">
        <li>
            @if (Auth::user())
            <li class="dropdown dropdown-fuse">
                <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-bell hidden-xs mr15"></span>
                </a>
                </a>
                
                    <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
                        @foreach ($notifications as $notification)
                       
                            <li class="list-group-item">
                                {{-- <a href="{{ route('notification.show', $notification->id) }}"> --}}
                                <a href="#" class="mx-2">
                                    <span class="fa fa-envelope mr2"></span>
                                    <span class="mx-2 d-block">{{ $notification->data }}</span><br/>
                                    <span class="mx-2 d-block ml5">{{ \Carbon\Carbon::createFromTimestamp(strtotime($notification->created_at))->diffForHumans(); }}</span>
                                </a>
                            </li>
                        @endforeach
                        <li class="dropdown-footer text-center">
                            <a href="{{ route('all-notifications') }}">
                            {{-- <a href="#"> --}}
                                View All Notifications</a>
                        </li>
                    </ul>
            </li>
            @endif
        </li>
        <li>
            @if(!\Auth::user()->isAd())
              
            @if (Auth::user()->checkedIn())
                <a class="dropdown-link" href="/checkout">
                    <span class="glyphicon glyphicon-transfer"></span>
                    <span class="hidden-xs">Check Out</span>
                </a>
            @else
            <a class="dropdown-link" href="/checkin">
                <span class="glyphicon glyphicon-user"></span>
                <span class="hidden-xs">Check In</span>
            </a>
            @endif
            @endif
        </li>
        <li>
            @if (Auth::user()->checkedIn())
                <a class="dropdown-link" href="#">
                    <span class="glyphicon glyphicon-eye-open"></span>
                    <span class="hidden-xs">{{ Auth::user()->lastCheckIn() }}</span>
                </a>
            @endif
        </li>
        <li class="dropdown dropdown-fuse">
            <div class="navbar-btn btn-group">
        <li class="dropdown dropdown-fuse">
            <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                <span class="hidden-xs"><name>{{\Auth::user()->name}}</name> </span>
                <span class="fa fa-caret-down hidden-xs mr15"></span>
                @if(\Auth::user()->employee->photo)
                    <img src="{{\Auth::user()->employee->photo}}" width="50px" height="50px" alt="avatar" class="mw55">
                @else
                <img src="{{ URL::asset('assets/img/avatars/profile_pic.png') }}" alt="avatar" class="mw55">
                    @endif
            </a>
            </a>
                <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
                    @if(\Route::getFacadeRoot()->current()->uri() != 'change-password')
                    <li class="dropdown-footer text-center">
                        <a href="/change-password" class="btn btn-primary btn-sm btn-bordered">
                            <span class="fa fa-lock pr5"></span> Change Password </a>
                    </li>
                    @endif
                    <li class="dropdown-footer text-center">
                        <a href="/logout" class="btn btn-primary btn-sm btn-bordered">
                            <span class="fa fa-power-off pr5"></span> Logout </a>
                    </li>
                </ul>
        </li>
    </ul>
</header>