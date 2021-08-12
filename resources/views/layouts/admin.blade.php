<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
    <link href="/assets/css/bundle.css" rel="stylesheet" />
    <link href="/assets/css/default/style.min.css" rel="stylesheet" />
    <link href="/assets/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="/assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
{{-- <body class="sidebar-mini" style="height: auto;">
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/choose-course') }}" class="nav-link">Change Course</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ config('languages')[App::getLocale()] }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach (config('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                        @endif
                    @endforeach
                    </div>
                </li>
                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <p>
                            <i class="nav-icon fa fa-power-off"></i>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light">Membership</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                        <a href="#" class="d-block">{{ App\Models\Course::where('id', Session::get('course_id'))->first()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('home' , ['course_id' => $course_id]) }}" class="nav-link">
                                <i class="nav-icon fa fa-chalkboard"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>
                                    Management
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{-- @can('manage_users') --}}
                                  {{--   <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link">
                                            <i class="fa fa-bomb nav-icon"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('permission.index') }}" class="nav-link">
                                            <i class="fa fa-bomb nav-icon"></i>
                                            <p>Permissions</p>
                                        </a>
                                    </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}" class="nav-link">
                                        <i class="fa fa-users-cog nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('plans.index') }}" class="nav-link">
                                        <i class="fa fa-users-cog nav-icon"></i>
                                        <p>Plans</p>
                                    </a>
                                </li>
                                {{-- @endcan --}}
                           {{--  </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.profile') }}" class="nav-link">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('courses.index') }}" class="nav-link">
                            <i class="fa fa-bell nav-icon"></i>
                            <p>Courses</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/members') }}" class="nav-link">
                            <i class="fa fa-image nav-icon"></i>
                            <p>Students</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                            <i class="fa fa-lock nav-icon"></i>
                            <p>Email</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 399px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('pageName')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @include('partials.alert')
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <div id="sidebar-overlay"></div>
    </div>
    <!-- ./wrapper -->

</body> --}}
<!-- begin #header -->
<div id="header" class="header">
	<!-- begin navbar-header -->
	<div class="navbar-header">
		<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Color</b> Admin</a>
		<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

			<button type="button" class="navbar-toggle p-0 m-r-5" data-toggle="collapse" data-target="#top-navbar">
				<span class="fa-stack fa-lg text-inverse m-t-2">
					<i class="far fa-square fa-stack-2x"></i>
					<i class="fa fa-cog fa-stack-1x"></i>
				</span>
			</button>

	</div>
	<!-- end navbar-header -->
	
	
	<!-- begin header-nav -->
	<ul class="navbar-nav navbar-right">
		<li >
			<form class="navbar-form">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Enter keyword" />
					<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</li>
		<li class="dropdown">
			<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
				<i class="fa fa-bell"></i>
				<span class="label">5</span>
			</a>
			<ul class="dropdown-menu media-list dropdown-menu-right">
				<li class="dropdown-header">NOTIFICATIONS (5)</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<i class="fa fa-bug media-object bg-silver-darker"></i>
						</div>
						<div class="media-body">
							<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
							<div class="text-muted f-s-11">3 minutes ago</div>
						</div>
					</a>
				</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<img src="/assets/img/user/user-1.jpg" class="media-object" alt="" />
							<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
						</div>
						<div class="media-body">
							<h6 class="media-heading">John Smith</h6>
							<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
							<div class="text-muted f-s-11">25 minutes ago</div>
						</div>
					</a>
				</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<img src="/assets/img/user/user-2.jpg" class="media-object" alt="" />
							<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
						</div>
						<div class="media-body">
							<h6 class="media-heading">Olivia</h6>
							<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
							<div class="text-muted f-s-11">35 minutes ago</div>
						</div>
					</a>
				</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<i class="fa fa-plus media-object bg-silver-darker"></i>
						</div>
						<div class="media-body">
							<h6 class="media-heading"> New User Registered</h6>
							<div class="text-muted f-s-11">1 hour ago</div>
						</div>
					</a>
				</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<i class="fa fa-envelope media-object bg-silver-darker"></i>
							<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
						</div>
						<div class="media-body">
							<h6 class="media-heading"> New Email From John</h6>
							<div class="text-muted f-s-11">2 hour ago</div>
						</div>
					</a>
				</li>
				<li class="dropdown-footer text-center">
					<a href="javascript:;">View more</a>
				</li>
			</ul>
		</li>
		<li class="dropdown navbar-language">
			<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
				<span class="flag-icon flag-icon-us" title="us"></span>
				<span class="name">EN</span> <b class="caret"></b>
			</a>
			<ul class="dropdown-menu p-b-0">
				<li class="arrow"></li>
				<li><a href="javascript:;"><span class="flag-icon flag-icon-us" title="us"></span> English</a></li>
				<li><a href="javascript:;"><span class="flag-icon flag-icon-cn" title="cn"></span> Chinese</a></li>
				<li><a href="javascript:;"><span class="flag-icon flag-icon-jp" title="jp"></span> Japanese</a></li>
				<li><a href="javascript:;"><span class="flag-icon flag-icon-be" title="be"></span> Belgium</a></li>
				<li class="divider m-b-0"></li>
				<li class="text-center"><a href="javascript:;">more options</a></li>
			</ul>
		</li>

		<li class="dropdown navbar-user">
			<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
				<img src="/assets/img/user/user-13.jpg" alt="" /> 
				<span class="d-none d-md-inline">Adam Schwartz</span> <b class="caret"></b>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="javascript:;" class="dropdown-item">Edit Profile</a>
				<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
				<a href="javascript:;" class="dropdown-item">Calendar</a>
				<a href="javascript:;" class="dropdown-item">Setting</a>
				<div class="dropdown-divider"></div>
				<a href="javascript:;" class="dropdown-item">Log Out</a>
			</div>
		</li>
	</ul>
	<!-- end header navigation right -->
</div>
<!-- end #header -->

</html>