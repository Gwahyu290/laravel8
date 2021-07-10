
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Samchick </title>
    <meta name="description" content="Sufee Samchick - HTML5 Samchick Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('home')}}">{{ Auth::user()->name }}

                </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    @if (auth()->user()->level=="Admin")
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-address-card"></i>Menu Manajer</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="{{url('user')}}">Profil Karyawan</a></li>
                            <li><i class="fa fa-bookmark"></i><a href="{{url('cabang')}}">Data Wilayah</a></li>
                            <li><i class="fa fa-user"></i><a href="{{url('accakun')}}">Verifikasi Karyawan</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Tugas Harian</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-instagram"></i><a href="{{url('instagram')}}">Tugas Instagram</a></li>
                            <li><i class="menu-icon fa fa-facebook-f"></i><a href="{{url('facebook')}}">Tugas Share Facebook</a></li>
                            <li><i class="menu-icon fa fa-google"></i><a href="{{url('googlemap')}}">Tugas Google Maps</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Tugas Mingguan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file"></i><a href="{{url('artikel')}}">Tugas Artikel</a></li>
                            <li><i class="menu-icon fa fa-whatsapp"></i><a href="{{url('whatsapp')}}">Tugas Share WhatsApp</a></li>
                            <li><i class="menu-icon fa fa-file"></i><a href="{{url('pamflet')}}">Tugas Share Pamflet</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bell"></i>Menu Nilai</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-bar-chart"></i><a href="{{url('nilaiharian')}}">Penilaian Harian</a></li>
                            <li><i class="fa fa-bar-chart"></i><a href="{{url('nilaimingguan')}}">Penilaian Mingguan</a></li>
                            <li><i class="fa fa-bar-chart"></i><a href="{{url('nilaibulanan')}}">Total Nilai Bulanan</a></li>
                            <li><i class="fa fa-bar-chart"></i><a href="{{url('ofthemoon')}}">Karyawan Terbaik</a></li>
                        </ul>
                    </li>
                    @endif
                    @if (auth()->user()->level=="Karyawan")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-address-card"></i>Menu Karyawan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="{{url('userk')}}">Profil Karyawan</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Tugas Harian</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-instagram"></i><a href="{{url('instagramk')}}">Tugas Instagram</a></li>
                            <li><i class="menu-icon fa fa-facebook-f"></i><a href="{{url('facebookk')}}">Tugas Share Facebook</a></li>
                            <li><i class="menu-icon fa fa-google"></i><a href="{{url('googlemapk')}}">Tugas Google Maps</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Tugas Mingguan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file"></i><a href="{{url('artikelk')}}">Tugas Artikel</a></li>
                            <li><i class="menu-icon fa fa-whatsapp"></i><a href="{{url('whatsappk')}}">Tugas Share WhatsApp</a></li>
                            <li><i class="menu-icon fa fa-file"></i><a href="{{url('pamfletk')}}">Tugas Share Pamflet</a></li>
                        </ul>
                    </li>
                    @endif

                   <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </a>
            </div>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        @yield('breadcrumbs')
        @yield('content')
       
         
    <!-- Right Panel -->


    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('style/assets/js/main.js')}}"></script>


</body>
</html>
