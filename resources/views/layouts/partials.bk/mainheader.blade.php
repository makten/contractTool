<!-- Main Header -->
<header class="main-header navbar-warning">

    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo hidden-xs" style="padding-bottom: 75px;">

        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>CT</b></span>

        <!-- logo for regular state and mobile devices -->        
        <span class="logo-lg "><b>Admin</b> <sup style="font-size: 10px;"> Contracten Tool</sup> </span>

    </a>


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

            <span class="sr-only"><i class="material-icons">swap_horiz</i></span>  

        </a>


        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Skin dropdown menu -->
                <li class="dropdown messages-menu">
                    @include('layouts.partials.skins')
                </li><!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">

                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="material-icons">notifications</i>

                        {{-- @if(count(Auth::user()->unreadNotifications)) --}}

                        {{-- <span class="pulse label ">{{ count(Auth::user()->unreadNotifications) }}</span> --}}

                        {{-- @endif --}}

                    </a>


                    <ul class="dropdown-menu">

                        <li class="header">

                            {{-- You have {{ Auth::user()->unreadNotifications->count() }} notifications --}}

                        </li>   

                        
                        <li>

                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">

                               {{--  @foreach(Auth::user()->unreadNotifications as $notification)

                                @include ('notifications.' . snake_case(class_basename($notification->type)))   

                                @endforeach --}}

                            </ul>

                        </li>

                        <li class="footer">

                            <a href="#">View all</a>

                        </li>

                    </ul>

                </li>


                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">

                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="material-icons">mail_outline</i>
                        {{--<span class="label label-success">4</span>--}}

                    </a>


                    <ul class="dropdown-menu">

                        <li class="header">
                            You have 4 messages
                        </li>


                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">

                                <li><!-- start message -->

                                    <a href="#">

                                        <div class="pull-left">
                                            <!-- User Image -->
                                            {{-- <img src="/images{{Auth::user()->userprofile->avatar}}" class="img-circle" alt="User Image"/> --}}

                                        </div>

                                        <!-- Message title and timestamp -->
                                        <h4>

                                            Nieuwe bericht van Hafiz Abass
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>

                                        </h4>

                                        <!-- The message -->
                                        <p>New message from hafiz Abass</p>

                                    </a>

                                </li><!-- end message -->


                            </ul><!-- /.menu -->

                        </li>

                        <li class="footer"><a href="#">See All Messages</a></li>

                    </ul>
                </li><!-- /.messages-menu -->



                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">

                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="material-icons">view_list</i>
                        {{-- <span class="label label-danger">9</span> --}}
                    </a>

                    <ul class="dropdown-menu">


                        <li class="header">
                            You have 9 tasks
                        </li>


                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">

                                <li><!-- Task item -->

                                    <a href="#">

                                        <!-- Task title and progress text -->
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">50%</small>
                                        </h3>

                                        <!-- The progress bar -->
                                        <div class="progress xs">

                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-aqua" 
                                            style="width: 50%"
                                            role="progressbar" 
                                            aria-valuenow="50" 
                                            aria-valuemin="0" 
                                            aria-valuemax="100"
                                            >

                                            <span class="sr-only">
                                                50% Complete
                                            </span>
                                        </div>

                                    </div>
                                </a>

                            </li><!-- end task item -->

                        </ul>

                    </li>


                    <li class="footer">
                        <a href="#">View all tasks</a>
                    </li>

                </ul>

            </li>


            {{-- @if (Auth::guest()) --}}

            <li>
                <a href="{{ url('/login') }}">Login</a>
            </li>

            <li>
                <a href="{{ url('/register') }}">Register</a>
            </li>


            {{-- @else --}}

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">

                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <!-- The user image in the navbar-->
                    {{-- <img src="/images{{Auth::user()->userprofile->avatar}}" class="user-image" alt="User Image"/> --}}
                    <img src="/images/example.png" class="user-image" alt="User Image"/>

                    <span class="hidden-xs">Hafiz Abass</span>

                </a>

                <ul class="dropdown-menu">

                    <!-- The user image in the menu -->
                    <li class="user-header">

                        {{-- <img src="/images{{Auth::user()->userprofile->avatar}}" class="img-circle" alt="User Image"/> --}}
                        <img src="/images/example.png" class="img-circle" alt="User Image"/>

                        <p>
                            Hafiz Abass
                            {{-- {{ Auth::user()->name }} --}}
                            {{-- <small>Member since {{Auth::user()->created_at}}</small> --}}
                        </p>

                    </li>

                    <!-- Menu Body -->
                    <li class="user-body">

                        <div class="col-xs-4 text-center">
                            <a href="#">Mijn proposities</a>
                        </div>

                        <div class="col-xs-4 text-center">
                            <a href="#">Mijn team</a>
                        </div>

                        <div class="col-xs-4 text-center">
                            <a href="/hello">Mijn activiteiten</a>
                        </div>

                    </li>


                    <!-- Menu Footer-->
                    <li class="user-footer">

                        <div class="pull-left">
       
                            {{-- <a href="/user/{{Auth::user()->id}}/profile" class="btn btn-default btn-flat">Profile</a> --}}
                            <a href="/user/1/profile" class="btn btn-default btn-flat">Profile</a>
                        </div>

                        <div class="pull-right">

                            <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                      </div>

                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>



                </li>
            </ul>
        </li>
        {{-- @endif --}}

        <!-- Control Sidebar Toggle Button -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="material-icons">settings</i></a>
        </li>
    </ul>
</div>
</nav>
</header>



