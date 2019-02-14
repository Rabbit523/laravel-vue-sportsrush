

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://mdbootstrap.com/previews/templates/admin-dashboard/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="https://mdbootstrap.com/previews/templates/admin-dashboard/css/mdb.min.css">

    <!-- Your custom styles (optional) -->
    <style>

    </style>
</head>

<body class="fixed-sn white-skin">

<!--Main Navigation-->
<header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
        <ul class="custom-scrollbar">
            <!-- Logo -->
            <li class="logo-sn waves-effect">
                <div class="text-center">
                    <a href="#" class="pl-0">Admin</a>
                </div>
            </li>
            <!--/. Logo -->

            <!--Search Form-->
            <li>
                <form class="search-form" role="search">
                    <div class="form-group md-form mt-0 pt-1 waves-light">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
            </li>
            <!--/.Search Form-->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <!-- <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-tachometer"></i> Dashboards<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="../dashboards/v-1.html" class="waves-effect">Version 1</a>
                                </li>
                                <li><a href="../dashboards/v-2.html" class="waves-effect">Version 2</a>
                                </li>
                                <li><a href="../dashboards/v-3.html" class="waves-effect">Version 3</a>
                                </li>
                                <li><a href="../dashboards/v-4.html" class="waves-effect">Version 4</a>
                                </li>
                                <li><a href="../dashboards/v-5.html" class="waves-effect">Version 5</a>
                                </li>
                                <li><a href="../dashboards/v-6.html" class="waves-effect">Version 6</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                    <!-- Simple link -->
                    <li><a href="{{route('admin.users.manage')}}" class="collapsible-header waves-effect"><i class="fa fa-cog"></i> Manage Users</a></li>

                    <li><a href="{{route('admin.users.create')}}" class="collapsible-header waves-effect"><i class="fa fa-plus"></i> Create User</a></li>

                    <li><a href="{{route('admin.teams.manage')}}" class="collapsible-header waves-effect"><i class="fa fa-cog"></i> Manage Teams</a></li>

                    <li><a href="{{route('admin.create.team')}}" class="collapsible-header waves-effect"><i class="fa fa-plus"></i> Create Team</a></li>

                    <li><a href="{{route('admin.events.manage')}}" class="collapsible-header waves-effect"><i class="fa fa-cog"></i> Manage Events</a></li>

                    <li><a href="{{route('admin.event.create')}}" class="collapsible-header waves-effect"><i class="fa fa-plus"></i> Create Event</a></li>


                    <li><a href="{{route('admin.cms.manage')}}" class="collapsible-header waves-effect"><i class="fa fa-edit"></i> Content Management system</a></li>

                    <li><a href="{{route('admin.slides.manage')}}" class="collapsible-header waves-effect"><i class="fa fa-refresh"></i> Manage Slides</a></li>



                    <li><a href="{{route('user.logout')}}" class="collapsible-header waves-effect"><i class="fa fa-sign-out"></i> Sign out</a></li>










                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fa fa-bars"></i></a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
            <p>Dashboard</p>
        </div>

        <!--Navbar links-->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile</span></a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{route('user.logout')}}">Log Out</a>
                    <a class="dropdown-item" href="{{route('admin.user.profile',['user_id'=> \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()])}}">My account</a>
                </div>
            </li>

        </ul>
        <!--/Navbar links-->
    </nav>
    <!-- /.Navbar -->

    <!-- Fixed button -->
    <!-- Fixed button -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main>

    <div class="container-fluid">

           <div class="row">

               {{\App\Http\Controllers\PagesHandler::notification()}}

           </div>

           @yield('content')

    </div>

</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer pt-0 mt-5 rgba-stylish-light">

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2018 Copyright: <a href=""> Sportsrush</a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->


<!-- SCRIPTS -->
<!-- JQuery -->
<script src="https://mdbootstrap.com/previews/templates/admin-dashboard/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://mdbootstrap.com/previews/templates/admin-dashboard/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://mdbootstrap.com/previews/templates/admin-dashboard/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://mdbootstrap.com/previews/templates/admin-dashboard/js/mdb.min.js"></script>
<!--Initializations-->
<script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    Ps.initialize(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script type="text/javascript" src="{{asset('js/country.js')}}">
</script>
<!-- Charts -->

</body>

</html>
