<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Smart Attendance with QR code</title>
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
			<span>V</span>ideo
			<span>L</span>ogin
			<span>F</span>orm</h1>
		<!-- //title -->
		<!-- content -->

		<div class="sub-main-w3">
			<form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
				<div class="form-style-agile">
					<label>
						<i class="fas fa-user"></i>Username</label>
					<input placeholder="Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="text" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
				<div class="form-style-agile">
					<label>
						<i class="fas fa-unlock-alt"></i>Password</label>
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
				<div class="footer-social">
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
				</div>
				<!-- //social icons -->
			</form>
		</div>
		<!-- //content -->

		<!-- copyright -->
		<div class="footer">
			<p>&copy; 2018 Video Login Form. All rights reserved | Design by
				<a href="http://w3layouts.com">W3layouts</a>
			</p>
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
