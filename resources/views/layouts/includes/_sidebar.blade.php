<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/dashboard" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{auth()->user()->getAvatar()}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>User</h3>
                <ul class="nav side-menu">
                    <li><a href="/dashboard"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li><a href="/task"><i class="fa fa-tasks"></i> Task Management</a>
                    </li>
                    <li><a href="/discussion"><i class="fa fa-tag"> </i>Diskusi Group</a></li>
                    <li><a href="/profile"><i class="fa fa-user"></i> Profile </a>
                    </li>
                    <li><a href="{{route('calendar')}}"><i class="fa fa-calendar"></i> Calendar </a>
                    </li>
                    <li><a href="{{route('document')}}"><i class="fa fa-file"></i> Dokument </a>
                    </li>

                    <!-- <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                            <li><a href="fixed_footer.html">Fixed Footer</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <div class="menu_section">
                @if(auth()->user()->role == 'admin')
                <h3>Admin</h3>
                <ul class="nav side-menu">

                    <li><a href="/listuser"><i class="fa fa-table"></i> User Management</a>
                    </li>
                </ul>
                @endif
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>