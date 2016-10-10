<aside class="main-sidebar">

    <section class="sidebar">

        <div class="logo">
            <i class="fa fa-tachometer"></i>
            <span>Brand</span>
        </div>

        <hr/ style="padding: 0px; height: 0px; margin: 0px;">

        <!-- Sidebar user panel (optional) -->
        {{-- @if (! Auth::guest()) --}}
        <div class="user-panel hidden-sm hidden-xs">
            <div class="pull-left image">
                <img src="/images/example.png" class="user-image" alt="User Image"/>
            </div>
            <div class="pull-left info" style="padding: 5px; font-size: 15px;">
                <p>Hafiz Abass</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        {{-- @endif --}}

        {{-- <nav> --}}



        <ul class="visible-xs">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">

                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <!-- The user image in the navbar-->
                    {{-- <img src="/images{{Auth::user()->userprofile->avatar}}" class="user-image" alt="User Image"/> --}}
                    <img src="/images/example.png" class="user-image" alt="User Image"/>

                    <span class="hidden-xs">Hafiz Abass</span>

                </a>

                <ul class="dropdown-menu" style="border-top-right-radius: 0;
                border-top-left-radius: 0;
                padding: 1px 0 0 0;
                border-top-width: 0;
                width: 280px;">

                <!-- The user image in the menu -->
                <li class="user-header" style="height: 175px;
                padding: 10px;
                text-align: center;">

                {{-- <img src="/images{{Auth::user()->userprofile->avatar}}" class="img-circle" alt="User Image"/> --}}
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
                {{-- {{ Auth::user()->name }} --}}
                {{-- <small>Member since {{Auth::user()->created_at}}</small> --}}
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
</ul>


<hr/>

<ul class="sidebar-menu" style="font-size: 15px; font-weight: 400; margin-top: 10px;">

    <li class="active">
        <a href="#">
            <span><i class="fa fa-user"></i></span>
            <span>Users</span>
        </a>
    </li>
    <li>
        <a href="#">

            <span><i class="fa fa-envelope"></i></span>
            <span>Messages</span>
        </a>
    </li>
    <li class="{{ (Request::is('content') ? 'active' : '') }}">
        <a href="#">
            <span><i class="fa fa-bar-chart"></i></span>
            <span>Analytics</span>
        </a>
    </li>
    <li>
        <a href="#">
            <span><i class="fa fa-credit-card-alt"></i></span>
            <span>Payments</span>
        </a>
    </li>
</ul>

</section>
</aside>

