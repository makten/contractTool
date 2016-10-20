<div class="header">

            <div class="logo">
                <i class="fa fa-tachometer"></i>
                <span>Brand</span>
            </div>

            <a href="#" class="nav-trigger"><span></span></a>




            <div class="navmenu" id="myNavbar">

                <ul class="" style="margin-top: 10px;">

                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li class="active"><a href="#">Home</a></li>

                    <li>

                        <li class="dropdown" >

                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <img style="border: 2px solid lightgrey; padding: 2px; margin-right: 7px; height: 25px; width: 25px; border-radius: 50%; background: #E9E8E8;" src="/images/example.png" class="user-image" alt="User Image"/>

                                <span class="hidden-xs">Hafiz Abass</span>

                            </a>

                            <ul class="dropdown-menu" style="border-top-right-radius: 0;
                            border-top-left-radius: 0;
                            padding: 1px 0 0 0;
                            border-top-width: 0;
                            width: 280px;
                            position: absolute; 
                            right: 20px;
                            margin: 4px;
                            margin-top: 21px;                   
                            left: auto;">


                            <li class="user-header" style="height: 175px; padding: 10px; text-align: center;">
                                <center>
                                    <img src="/images/example.png" class="img-circle" alt="User Image"/ style="z-index: 5;
                                    height: 90px;
                                    width: 90px;
                                    border: 3px solid;
                                    border-color: transparent;
                                    border-color: rgba(255, 255, 255, 0.2);">
                                </center>



                                <p style="z-index: 5;
                                color: #fff;
                                color: rgba(255, 255, 255, 0.8);
                                font-size: 17px;
                                margin-top: 10px;">
                                Hafiz Abass               
                            </p>

                        </li>


                        <li class="user-body" style="border-bottom-right-radius: 4px;
                        border-bottom-left-radius: 4px;">


                        <!-- <div class="col-xs-4 text-center">
                            <a href="#">Mijn team</a>
                        </div>

                        <div class="col-xs-4 text-center pull-right">
                            <a href="/hello">Mijn activiteiten</a>
                        </div>


 -->
                    </li>


                    <li class="user-footer" style="display: list-item;
                    text-align: -webkit-match-parent; ">

                    <div class="pull-left">
                        <a href="/user/1/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>

                    <div class="pull-right">

                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                    </div>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        <!-- {{ csrf_field() }} -->
                        <?= csrf_field() ?>
                    </form>

                </li>
            </ul>
        </li>

    </li>

    <li class="hidden-xs">&nbsp;</li>

</ul>

</div>


</div>