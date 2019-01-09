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
		<link href="{{ asset('css/flags.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/main.css') }}" rel="stylesheet">
		<link href="{{ asset('css/'. (session("locale")=="kh"? "kh" : "en") .'-style.css') }}" rel="stylesheet">
		@yield('css')
</head>
<body>
	<div id="app">
		<!-- Sidenav -->
		<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white">
			<div class="scrollbar-inner">
				<!-- Brand -->
				<div class="sidenav-header d-flex align-items-center border-bottom">
					<a class="navbar-brand" href="{{route('admin.dashboard')}}">
						<div class="roboto_l">&lt;BSS/&gt;</div>
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
								<a class="nav-link waves-effect {{ @$m=='dashboard' ? 'active':'' }}" href="{{route('admin.dashboard')}}">
									<i class="fa fa-home text-primary"></i>
									<span class="nav-link-text">{{ __('components.dashboard') }}</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link waves-effect {{ @$m=='sales' ? 'active':'' }}" href="{{route('admin.sales.index')}}">
									<i class="fa fa-cube text-orange"></i>
									<span class="nav-link-text">{{ __('components.sales') }}</span>
								</a>
							</li>
						</ul>
						<!-- Divider -->
						<hr class="my-3">
						<!-- Heading -->
						<h6 class="navbar-heading p-0 text-muted">{{ __('components.navDevide') }}</h6>
						<!-- Navigation -->
						<ul class="navbar-nav mb-md-3">
							<li class="nav-item">
								<a class="nav-link {{ $m == 'manage_users' ? 'active' : '' }}" href="#navbar-users" data-toggle="collapse" role="button" aria-expanded="{{$m =='manage_users'?'true':'false'}}" aria-controls="navbar-users">
									<i class="fa fa-users text-info"></i>
									<span class="nav-link-text">{{ __('components.manage_users') }}</span>
								</a>
								<div class="collapse {{$m =='manage_users'?'show':''}}" id="navbar-users">
									<ul class="nav nav-sm flex-column">
										<li class="nav-item">
											<a href="{{route('admin.users.index')}}" class="nav-link {{$sm =='users'?'active':''}}">{{ __('components.users') }}</a>
										</li>
										<li class="nav-item">
											<a href="{{route('admin.roles.index')}}" class="nav-link"></i>{{ __('components.user_roles') }}</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<!-- Main content -->
		<div class="main-content">
			<!-- Topnav -->
			<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary pb-1 pt-1">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						
						<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
							<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
								{!! @$breadcrumb !!}
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
								<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
									<div class="media align-items-center">
										<span class="waves-effect waves-lightbadge btn-sm">
											<span class="btn-inner--icon"><img src="/img/blank.gif" alt="Khmer" class="flag flag-{{ session('locale') == 'en' || session('locale') == '' ? 'us' : session('locale') }}"></span>
										</span>
									</div>
								</a>
								<div class="dropdown-menu rounded-0" style=" min-width: 0 !important;">
									<a href="{{route('locale','kh')}}" class="dropdown-item pl-2 pr-2">
										<img src="/img/blank.gif" alt="Khmer" class="flag flag-kh">
										<span>{{ __('components.kh') }}</span>
									</a>
									<a href="{{route('locale','en')}}" class="dropdown-item pl-2 pr-2">
										<img src="/img/blank.gif" alt="English" class="flag flag-us">
										<span>{{ __('components.en') }}</span>
									</a>
									<a href="{{route('locale','th')}}" class="dropdown-item pl-2 pr-2">
										<img src="/img/blank.gif" alt="Thai" class="flag flag-th">
										<span>{{ __('components.th') }}</span>
									</a>
									<a href="{{route('locale','cn')}}" class="dropdown-item pl-2 pr-2">
										<img src="/img/blank.gif" alt="Chinese" class="flag flag-cn">
										<span>{{ __('components.cn') }}</span>
									</a>
									<a href="{{route('locale','vn')}}" class="dropdown-item pl-2 pr-2">
										<img src="/img/blank.gif" alt="Veitnam" class="flag flag-vn">
										<span>{{ __('components.vn') }}</span>
									</a>
								</div>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="media align-items-center">
										<span class="avatar avatar-sm rounded-circle waves-effect waves-light text-center" style="font-size: 18px; line-height: 2em;">
											<i class="fa fa-user"></i>
										</span>
										<div class="media-body ml-2 d-none d-lg-block">
											<span class="mb-0 text-sm">{{ Auth::user()->name }}</span>
										</div>
									</div>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="dropdown-header noti-title">
										<h6 class="text-overflow m-0">{{ __('components.welcome') }}</h6>
									</div>
									<a href="#!" class="dropdown-item">
										<i class="fa fa-user"></i>
										<span class="{{ session('locale') == 'kh' ? 'khmerkoulen' : '' }}">{{ __('components.my_account') }}</span>
									</a>
									<div class="dropdown-divider"></div>

									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
											<i class="fa fa-sign-out-alt text-red"></i>
											<span>{{ __('components.logout') }}</span>
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			
			<div class="container-fluid">
				<!-- Page content -->
				@yield('content')
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script src="{{ asset('js/js.cookie.js') }}"></script>
	<script src="{{ asset('js/admin.js') }}" defer></script>
	<script src="{{ asset('js/javascript.js') }}" defer></script>
	@yield('js')
	
</body>
</html>
