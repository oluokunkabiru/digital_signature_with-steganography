<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Digital Signature</title>
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
	{{-- <link href="//fonts.googleapis.com/css?family=Marck+Script&amp;subset=cyrillic,latin-ext" rel="stylesheet"> --}}
	{{-- <link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" --}}
	    {{--  rel="stylesheet">  --}}
	<!-- //web-fonts -->
</head>

<body style="background-image: url({{ asset('asset/Digital-signature-banner-digital-signature.png') }}); background-repeat:repeat;">
	<div class="video-w3l" data-vide="{{ asset('asset/vide1') }}">
		<!-- title -->
		<h1>
			<span>AES Cryptography,</span>
			<span>PVDSteganography</span>
			 <span>Digital</span>Signature


        </h1>
		<!-- //title -->
		<!-- content -->
        <div class="sub-main-w3" style="background-image: url('{{ asset('asset/Digital-signature-with-eidas-electronic-signature-digital-signature.png') }}'); background-position:center; background-repeat:no-repeat">

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


			<form method="POST" action="{{ route('login') }}">
                @if (session('password'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>OOPS! </strong> {{ session('password') }}
                    </div>
                 @endif

                {{ csrf_field() }}
				<div class="form-style-agile">
					<label>
						<i class="fas fa-user">Email</i></label>
					<input placeholder="Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
				<div class="form-style-agile">
					<label>
						<i class="fas fa-unlock-alt">Password</i></label>
					<input placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
				<!-- switch -->
				<div class="checkout-w3l">
					<div class="demo5">
						<div class="switch demo3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<label>
								<i></i>
							</label>
						</div>
					</div>
					{{-- <a href="#">Remember Me</a> --}}

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
				</div>
				<!-- //switch -->
				<input type="submit" value="Log In">
				<!-- social icons -->
				{{-- <div class="footer-social">
					<h2>Or Login With</h2>
					<ul>
						<li>
							<a href="#">
								<i class="fab fa-facebook-f icon_facebook"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-twitter icon_twitter"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-dribbble icon_dribbble"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-google-plus-g icon_g_plus"></i>
							</a>
						</li>
					</ul>
				</div> --}}
				<!-- //social icons -->
			</form>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card-cark">
                                <div class="card-header">
                                    <div class="text-center">
                                        <span class="fa fa-user display-3"></span>
                                    </div>

                                    <h1 class="my-4">{{ ucwords(Auth::user()->name) }}</h1>

                                    <div class="row">
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
	<script src="{{ asset('asset/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('asset/bootsrap/popper.js') }}"></script>
    <script src="{{ asset('asset/bootsrap/bootstrap.min.js') }}"></script>
	<!-- //Jquery -->

	<!-- Video js -->
	<script src="{{ asset('asset/js/jquery.vide.min.js') }}"></script>
	<!-- //Video js -->

</body>

</html>
