
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('style2/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('style2/assets/img/favicon.png')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title> @yield('title') Samchick Mobile</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('style2/assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('style2/assets/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('style2/assets/css/paper-dashboard.css')}}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('style2/assets/css/demo.css')}}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('style2/assets/css/themify-icons.css')}}" rel="stylesheet">

</head>
<body>
@yield('content')
@yield('wrapper')
<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Admin
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{url('profil')}}">
                        <p>Profil Karyawan</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p>Tugas Harian</p>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('instagramk')}}">Tugas Instagram</a></li>
                        <li><a href="{{url('facebookk')}}">Tugas Facebook</a></li>
                        <li><a href="{{url('googlemapk')}}">Tugas GoogleMaps</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p>Tugas Mingguan</p>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('artikelk')}}">Tugas Artikel</a></li>
                        <li><a href="{{url('whatsappk')}}">Tugas WhatsApp</a></li>
                        <li><a href="{{url('pamfletk')}}">Tugas Pamflet</a></li>
                    </ul>
                </li>
                <li>
                    <a href="user.html">
                        <p>Karyawan Terbaik (admin)</p>
                    </a>
                </li>
            </ul>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Samchick</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                
                    </ul>

                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        Home Admin
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('style2/assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
	<script src="{{asset('style2/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ asset('style2/assets/js/bootstrap-checkbox-radio.js')}}"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('style2/assets/js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('style2/assets/js/bootstrap-notify.js')}}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{ asset('style2/assets/js/paper-dashboard.js')}}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{ asset('style2/assets/js/demo.js')}}"></script>


</html>
