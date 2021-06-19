<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Smart Attendance with QR code :: page not found</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="{{ asset('asset/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/bootsrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome-free/css/all.min.css') }}">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Marck+Script&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext"
	    rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<div class="video-w3l" data-vide-bg="{{ asset('asset/video/1') }}">
		<!-- title -->
		<h1>
			<span>QR</span> code
			<span>S</span>smart
			<span>A</span>ttendance


        </h1>
		<!-- //title -->
		<!-- content -->
        <div class="sub-main-w3">

            @php
                $dashboard="";
                if (Auth::check() && Auth::user()->role=="staff") {
                    $dashboard = route('staffDashboard');
                }elseif (Auth::check() && Auth::user()->role=="student") {
                    $dashboard = route('studentDashboard');
                } else {
                    $dashboard = route('welcome');
                }
            @endphp



            @if (! Auth::check())
			<div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                 <h1 class="display-3 text-danger font-weight-bold">404</h1>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger text-center">
                    <p class="display-5">Oops! Something is wrong.</p>
                    <h3> The page you are looking for could not be found</h3>
                    <a href="{{ route('welcome') }}" class="text-center my-3 btn btn-success"> Home</a>
                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3"></div>
                </div>

            </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    <div class="text-center">
                                        <span class="fa fa-user display-3"></span>
                                        <h1 class="display-3 text-danger font-weight-bold">404</h1>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-danger text-center">
                                        <p class="display-5">Oops! Something is wrong.</p>
                                        <h3> The page you are looking for could not be found</h3>
                                    </div>
                                        <h1 class="my-2">{{ ucwords(Auth::user()->name) }}</h1>

                                    </div>

                                    <div class="row card-footer">
                                        <div class="col">
                                            <a class="btn btn-lg btn-warning float-left mx-2" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                        {{--  <div class="col">  --}}
                                            <a href="{{ $dashboard }}" class="btn btn-lg btn-dark float-right mx-2" style="color: #E91E63;">Dashboard</a>
                                        {{--  </div>  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            @endif
		</div>
		<!-- //content -->

		<!-- copyright -->
		<div class="footer">
			{{-- <p>&copy; 2018 Video Login Form. All rights reserved | Design by
				<a href="http://w3layouts.com">W3layouts</a>
			</p> --}}
		</div>
		<!-- //copyright -->
	</div>


	<!-- Jquery -->
	<script src="{{ asset('asset/bootsrap/jquery.js') }}"></script>
    <script src="{{ asset('asset/bootsrap/popper.js') }}"></script>
    <script src="{{ asset('asset/bootsrap/bootstrap.min.js') }}"></script>
	<!-- //Jquery -->

	<!-- Video js -->
	<script src="{{ asset('asset/js/jquery.vide.min.js') }}"></script>
	<!-- //Video js -->

</body>

</html>
