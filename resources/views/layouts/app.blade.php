<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;1,100;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark m-0">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            <span class="menu-collapsed">DMT</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">   
                <li class="nav-item dropdown d-sm-block d-md-none">
                    <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                        <a class="dropdown-item" href="#">Dashboard</a>
                        <a class="dropdown-item" href="#">Profile</a>
                    </div>
                </li>
      
            </ul>
        </div>
    </nav>
    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>MAIN MENU</small>
                </li>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <span class="menu-collapsed d-flex justify-content-between align-items-center">
                        HRD
                        <i class="material-icons" style="font-size:20px">people_alt</i>
                    </span>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="/department" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between">
                            Departement
                            <i class="material-icons" style="font-size:18px">domain</i>
                        </span>
                    </a>
                    <a href="/jabatan" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between align-items-center">
                            Jabatan
                            <i class="material-icons" style="font-size:18px">work</i>
                        </span>
                    </a>
                    <a href="/pegawai" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between align-items-center">
                            Pegawai
                            <i class="material-icons" style="font-size:18px">perm_contact_calendar</i>
                        </span>
                    </a>
                </div>
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        <span class="menu-collapsed">Gudang</span>
                        <i class="material-icons" style="font-size:20px">store</i>
                    </div>
                </a>
                <div id='submenu2' class="collapse sidebar-submenu">
                    <a href="/barang" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between align-items-center">
                            Daftar Barang
                            <i class="material-icons" style="font-size:20px">weekend</i>
                        </span>
                    </a>
                    <a href="/barang/mutasi" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between align-items-center">
                            Mutasi
                            <i class="material-icons" style="font-size:20px">swap_vert</i>
                        </span>
                    </a>
                    <a href="/barang/stok_akhir" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between align-items-center">
                            Stok Barang
                            <i class="material-icons" style="font-size:20px">archive</i>
                        </span>
                    </a>
                </div>            
            </ul>
        </div> <!-- End Sidebar -->
    <!-- MAIN -->
        <div class="col-md p-0 m-0">
            <main class="py-4 p-0 m-0">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
