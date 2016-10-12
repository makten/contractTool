<header class="header navbar-warning">
    
    
    <nav class="navbar navbar-static-top" role="navigation">

        <div class="logo">
            <i class="fa fa-tachometer"></i>
            <span>Brand</span>
        </div>

        <!-- Sidebar toggle button-->       

        <a href="#" class="nav-trigger">
            <span></span>
        </a>

    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu" style="margin-right: 40px; float: right;">

                <ul class="nav navbar-nav" style="float: right;">
                    <li class="dropdown messages-menu">
                        @include('layouts.partials.skins')
                    </li><!-- /.messages-menu -->
                </ul>

    <ul class="hidden-xs" style="float: right;">

                
    <!-- User Account Menu -->
    <li class="dropdown user user-menu">

                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <!-- The user image in the navbar-->
                        {{-- <img src="/images{{Auth::user()->userprofile->avatar}}" class="user-image" alt="User Image"/> --}}
                        <img style="border: 2px solid lightgrey; padding: 2px;" src="/images/example.png" class="user-image" alt="User Image"/>

                        <span class="hidden-xs">Hafiz Abass</span>

                    </a>

       <ul class="dropdown-menu" style="border-top-right-radius: 0;
                    border-top-left-radius: 0;
                    padding: 1px 0 0 0;
                    border-top-width: 0;
                    width: 280px;">

                    <!-- The user image in the menu -->
        <li class="user-header" style="height: 175px; padding: 10px; text-align: center;">
                    
                    <img src="/images/example.png" class="img-circle" alt="User Image"/ style="z-index: 5;
                    height: 90px;
                    width: 90px;
                    border: 3px solid;
                    border-color: transparent;
                    border-color: rgba(255, 255, 255, 0.2);">

                    <p style="z-index: 5;
                    color: #fff;
                    color: rgba(255, 255, 255, 0.8);
                    font-size: 17px;
                    margin-top: 10px;">
                    Hafiz Abass               
                </p>

        </li>

            <!-- Menu Body -->
        <li class="user-body" style="border-bottom-right-radius: 4px;
            border-bottom-left-radius: 4px;">

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


    </ul>

    </div>          

     
</nav>

</header>