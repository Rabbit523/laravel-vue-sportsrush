

<!doctype html>
<html lang="en">

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->


    <meta charset="utf-8">
    <title>Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A robust suite of app and landing page templates by Medium Rare">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500" rel="stylesheet">

    <link href="http://wingman.mediumra.re/assets/css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="http://wingman.mediumra.re/assets/css/entypo.css" rel="stylesheet" type="text/css" media="all" />
    <link href="http://wingman.mediumra.re/assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/country.js') }}"></script>

</head>

<body>

<div class="nav-container" >
    <div class="bg-dark navbar-dark" data-sticky="top">
        <div class="container-fluid" style="background : #4582EC !important;" >
            <nav class="navbar navbar-expand-lg "  style="background : #4582EC !important;" >
                <a class="navbar-brand" href="{{route('home.main')}}" style="margin-top: 0 !important;padding-top: 0 !important;padding-bottom: 0 !important;">
                    <img alt="Wingman" src="https://dev.sportsrush.ch/static/img/logoSR_mobile_min.0ae9361.png" width="200" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="icon-menu h4"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">

                    </ul>



                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link">CONTACT US</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('who')}}" class="nav-link">WHO WE ARE</a>
                        </li>
                    </ul>

                </div>
                <!--end nav collapse-->
            </nav>

        </div>
        @if(\Illuminate\Support\Facades\Auth::check())
        <div class="container-fluid" >

            <nav class="navbar navbar-expand-lg navbar-dark ">
                <a class="navbar-brand" href="{{route('profile.settings')}}">{{\Illuminate\Support\Facades\Auth::user()->first_name}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('account.dashboard')}}">
                                <i class="fa fa-dashboard"></i>   Dashboard
                            </a>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-users"></i>  Manage Teams
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('team.create')}}">Create Team</a>
                                <a class="dropdown-item" href="{{route('team.invitations')}}">View Invitations</a>
                                <a class="dropdown-item" href="{{route('team.joinable')}}">Join Teams</a>
                                <a class="dropdown-item" href="{{route('teams.own')}}">My Teams</a>
                                <a class="dropdown-item" href="{{route('team.joined')}}">Joined Teams</a>



                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-edit"></i>  Manage Events
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('event.create')}}">Create Events</a>
                                <a class="dropdown-item" href="{{route('event.invitations')}}">View Invitations</a>
                                <a class="dropdown-item" href="{{route('event.joinable')}}">Join Events</a>
                                <a class="dropdown-item" href="{{route('events.own')}}">My Events</a>

                                <a class="dropdown-item" href="{{route('events.joined')}}">Joined Events</a>



                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('team.chat')}}">
                                <i class="fa fa-comments"></i>  Messages
                            </a>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('profile.settings')}}">
                                <i class="fa fa-cog"></i>   Settings
                            </a>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('user.logout')}}">
                                <i class="fa fa-sign-out"></i>   Logout
                            </a>

                        </li>



                    </ul>

                </div>
            </nav>

        </div>
        @endif
        <!--end of container-->
    </div>
</div>


     @yield('content')

    <footer class="bg-gray text-light footer-long"  style="background : #4582EC !important;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <img alt="Image" src="https://dev.sportsrush.ch/static/img/logoSR_mobile_min.0ae9361.png" class="mb-4" width="150" />
                    <p class="text-muted">

                    </p>
                </div>
                <!--end of col-->
                <div class="col-12 col-md-9">
                    <div class="row no-gutters">
                        <div class="col-6 col-lg-3">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="pages-landing.html">About Us</a>
                                </li>
                                <li>
                                    <a href="pages-app.html">Contact Us</a>
                                </li>
                                <li>
                                    <a href="pages-inner.html">Who are we</a>
                                </li>
                            </ul>
                        </div>
                        <!--end of col-->

                    </div>
                    <!--end of row-->
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </footer>





    @yield('script')
</body>





</html>
