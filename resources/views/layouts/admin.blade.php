<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
  <div id="app">
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white">
      <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
          <a class="navbar-brand" href="#">
            <img src="/img/logo.png" class="navbar-brand-img" alt="...">
          </a>
          <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar-inner">
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active waves-effect" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                  <i class="fa fa-home text-primary"></i>
                  <span class="nav-link-text">Dashboards</span>
                </a>
                <div class="collapse show" id="navbar-dashboards">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="#" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Alternative</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="fa fa-copy text-orange"></i>
                  <span class="nav-link-text">Examples</span>
                </a>
                <div class="collapse" id="navbar-examples">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="#" class="nav-link">Pricing</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Lock</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Timeline</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Profile</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                  <i class="fa fa-leaf text-info"></i>
                  <span class="nav-link-text">Components</span>
                </a>
                <div class="collapse" id="navbar-components">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="#" class="nav-link">Buttons</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Cards</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Grid</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Notifications</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Icons</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Typography</a>
                    </li>
                    <li class="nav-item">
                      <a href="#navbar-multilevel" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">Multi level</a>
                      <div class="collapse show" id="navbar-multilevel" style="">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                            <a href="#!" class="nav-link ">Third level menu</a>
                          </li>
                          <li class="nav-item">
                            <a href="#!" class="nav-link ">Just another link</a>
                          </li>
                          <li class="nav-item">
                            <a href="#!" class="nav-link ">One last link</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading p-0 text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                <a class="nav-link" href="#" target="_blank">
                  <i class="fa fa-space-shuttle"></i>
                  <span class="nav-link-text">Getting started</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" target="_blank">
                  <i class="fa fa-palette"></i>
                  <span class="nav-link-text">Foundation</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Main content -->
    <div class="main-content">
      <!-- Topnav -->
      <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              

          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
              <li class="breadcrumb-item active" aria-current="page">Default</li>
            </ol>
          </nav>          

            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center ml-md-auto">
              <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle waves-effect waves-light text-center" style="font-size: 18px; line-height: 2em;">
                      <i class="fa fa-user"></i>
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                  </div>
                  <a href="#!" class="dropdown-item">
                    <i class="fa fa-user"></i>
                    <span>My profile</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="fa fa-cog"></i>
                    <span>Settings</span>
                  </a>
                  <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Header -->
      <div class="header bg-primary pb-6">
        <div class="container-fluid">

        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script src="{{ asset('js/js.cookie.js') }}"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
  @yield('js')
  
</body>
</html>
