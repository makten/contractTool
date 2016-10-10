<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">
    <section class="sidebar" style="margin-top: 20px;">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images{{Auth::user()->userprofile->avatar}}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info" style="padding: 5px; font-size: 15px;">
                <p>{{ Auth::user()->first_name. ' '.Auth::user()->last_name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        @endif


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" style="font-size: 15px; font-weight: 400; margin-top: 10px;">
            <li class="header">ADMIN PANEL</li>
            <li class="{{ (Request::is('dashboard') ? 'active' : '') }}">
                <a href="/dashboard">
                    <i class='material-icons pull-left'>list</i> &nbsp;<span>Overview</span>
                </a>
            </li>

            <li class="{{ (Request::is('dashboard') ? 'active' : '') }}">
                <a href="/admin/tokens">
                    <i class='material-icons pull-left'>lock</i> &nbsp;<span>Tokens</span>
                </a>
            </li>

            <li class="treeview {{ (Request::is('user/create') ? 'active' : '') }}{{ (Request::is('client/create') ? 'active' : '') }}{{ (Request::is('product/create') ? 'active' : '') }}">
                <a>
                    <i class="material-icons pull-left">group</i> <span> &nbsp; Manage users</span><i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ (Request::is('user/create') ? 'active' : '') }}">
                        <a href="/user/create">
                            <i class="material-icons pull-left">person</i> &nbsp;Add user
                        </a>
                    </li>
                    <li class="{{ (Request::is('client/create') ? 'active' : '') }}">
                        <a href="/team/create">
                            &nbsp;&nbsp;&nbsp;<i class="material-icons pull-left">person_add</i>
                            &nbsp;Team team member
                        </a>
                    </li>

                </ul>

            </li>

            <li class="{{ (Request::is('content') ? 'active' : '') }}">
                {{-- <a href="{{route('project.create')}}">
                    <i class='material-icons pull-left'>featured_play_list</i> <span>&nbsp; Create project</span>
                </a> --}}
            </li>

            <li class="{{ (Request::is('/discountmanager') ? 'active' : '') }}">
                <a href="/theme/create">
                    <i class='material-icons pull-left'>call_split</i> <span>&nbsp; Add theme</span>
                </a>
            </li>

            <li class="{{ (Request::is('/servicesmanager') ? 'active' : '') }}">
                <a href="/marketsegment/create">
                    <i class='fa fa-sitemap pull-left'></i> <span>Add marketsegment</span>
                </a>
            </li>
        </ul><!-- /.sidebar-menu -->


    </section>
    <!-- /.sidebar -->
</aside>
