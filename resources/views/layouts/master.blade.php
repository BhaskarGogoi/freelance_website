<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Choose from best trained service professionals near you for all your needs - Home Services, Appliance & Electronic Repairs, Beauticians,Car wash, health & diet care professionals and many more.">
	<meta name="keywords" content="Freelance, Home Services, Jorhat, Hire Professionals">
	<meta http-equiv = "content-language" content = "en">
	<meta property="og:title" content="Serveanything" />
	<meta property="og:url" content="https://serveanything.in" />
	<meta property="og:image" content="../images/favicon.png" />
	<meta property="og:description" content="Choose from best trained service professionals near you for all your needs - Home Services, Appliance & Electronic Repairs, Beauticians,Car wash, health & diet care professionals , event managers, veterinarian and many more." />
	<meta property="og:site_name" content="Serveanything" />
	<link rel="icon" type="image/png" href="../images/favicon.png">
	<link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/style.v3.9.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
	<title>@yield('title')</title>
	
	<!-- Facebook Pixel Code -->
	
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '250308959644665'); 
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" src="https://www.facebook.com/tr?id=250308959644665&ev=PageView&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167223068-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-167223068-1');
	</script>
	<!--End Global site tag (gtag.js) - Google Analytics -->

  </head>
  <body>
	<section class="shadow-sm">
		<div class="container">
			<nav class="navigation">
				<div class="brand">
					<div class="brand-logo">
						<a href="/"><img src="../images/logo.png" alt="Brand Logo"></a>
					</div>
					<div class="brand-title">
						<a href="/">Serve Anything</a>
					</div>
				</div>
				<div style="margin-left: 500px;">
					<ul class="navigation-nav">
						<li class="nav-item">
							<a class="nav-link" href="/"><i class="fas fa-home nav__icon"></i> Home</a>
						</li>
						<a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Our Service
						</a>
						<div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
							<div class="inner-navigation">
								<a class="header-item">Home Services</a>
								<a class="dropdown-item" href="/select-packages/Car-Wash">Car Wash</a>
								<a class="dropdown-item" href="/select-packages/Laundry">Laundry</a>
								<a class="dropdown-item" href="/book/Carpenter">Carpenter</a>
								<a class="dropdown-item" href="/book/Painter">Painter</a>
							</div>
							<div class="inner-navigation">
								<a class="header-item">Technical Services</a>
								<a class="dropdown-item" href="/book/Electrician">Electrician</a>
								<a class="dropdown-item" href="/book/Plumber">Plumber</a>
								<a class="dropdown-item" href="/book-service/Home-Appliance-Repairer">Home Appliance Repair</a>
							</div>
							<div class="inner-navigation">
								<a class="header-item">Beauty Services</a>
								<a class="dropdown-item" href="/select-packages/Hair-Cut">Hair Cut</a>
								<a class="dropdown-item" href="/select-packages/Parlour-At-Home">Beauty Services</a>
							</div>
							<div class="inner-navigation">
								<a class="header-item">Transport Services</a>
								<a class="dropdown-item" href="/book/Driver">Driver</a>
								<a class="dropdown-item" href="/book-service/Taxi">Taxi</a>
								<a class="dropdown-item" href="/book-service/Carrier-Vehicle">Utility Vehicle</a>
							</div>
						</div>						
					</ul>
				</div>						
				<span class="open-menu">
					<a href="#" onclick="openSideMenu()">
					<svg width="25" height="25">
						<path d="M0,5 30,5" stroke="#333" stroke-width="3"/>
						<path d="M0,14 30,14" stroke="#333" stroke-width="3"/>
						<path d="M0,23 30,23" stroke="#333" stroke-width="3"/>
					</svg>
					</a>
				</span>
				<a href="/become-a-partner">
					<button class="become_a_partner">
						<i class="fas fa-male"></i> Become a Partner					
					</button>
				</a>
			</nav>
		</div>
		{{-- Side Menu --}}
		<div id="side-menu" class="side-navv">
		<a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>

		@if(!Auth::guest()) 	
			@if(Auth::User()->usertype == 'user')
				<a href="/my-account"><button class="btn btn-primary" style="width:100%;">My Account</button></a>
			@elseif(Auth::User()->usertype == 'admin')
				<a href="/admin-dashboard"><button class="btn btn-primary" style="width:100%;">Dashboard</button></a>
			@elseif(Auth::User()->usertype == 'client')
				<a href="/client-dashboard"><button class="btn btn-primary" style="width:100%;">My Account</button></a>
			@endif
		@else
			<a href="/login"><button class="btn btn-primary" style="width:100%;">Login</button></a>
			<a href="/register"><button class="btn btn-warning" style="width:100%;">Signup</button></a>
		@endif
		<a href="/">Home</a>
		<a href="/aboutus">About</a>
		<a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Services &#9660;</a>
			<div class="collapse multi-collapse navigation-dropdown-menu" id="multiCollapseExample1">
				<ul>
					<a href="/select-packages/Laundry"><li>Laundry</li></a>
					<a href="/select-packages/Salon-At-Home"><li>Salon At Home</li></a>
					<a href="/select-packages/Hair-Cut"><li>Hair Cut</li></a>
					<a href="/select-packages/Car-Wash"><li>Car Wash</li></a>
				</ul>
			</div>
		<br><br>
		@if(!Auth::guest())
			<a  href="{{ route('logout') }}"
				onclick="event.preventDefault();
				document.getElementById('logout-form').submit();" style="text-align:center;">
				<button class="logout"><i class="fas fa-power-off"></i> {{ __('Logout') }}</button>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		@endif
		</div>
		  <script>
			  function openSideMenu(){
				  document.getElementById('side-menu').style.visibility = "visible";
				  document.getElementById('side-menu').style.width = "250px";
				  $('body').addClass("fixedPosition");
			  }
			  function closeSideMenu(){
				  document.getElementById('side-menu').style.width = "0";
				  document.getElementById('side-menu').style.visibility = "hidden";
				  $('body').removeClass("fixedPosition");
			  }
		  </script>
		{{-- Side Menu --}}
	</section>
	<section>
		<nav class="bottom_nav">
			<a href="/" class="nav__link {{ '/' == request()->path() ? 'nav_link_active' : ''}}">
				<i class="fas fa-home nav__icon"></i>
				<span class="nav__text">Home</span>
			</a>
			<a href="/#services" class="nav__link">
				<i class="fas fa-list-ul nav__icon"></i>
				<span class="nav__text">All Services</span>
			</a>
			<a href="/bookings" class="nav__link {{ 'bookings' == request()->path() ? 'nav_link_active' : ''}}">
				<i class="fas fa-shopping-cart nav__icon"></i>
				<span class="nav__text">Bookings</span>
			</a>
			<a href="/my-account" class="nav__link {{ 'my-account' == request()->path() ? 'nav_link_active' : ''}}">
				<i class="fas fa-user nav__icon"></i>
				<span class="nav__text">Account</span>
			</a>
		</nav>
	</section>

    @yield('content')
	<section class="footer py-4 " id="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="footer-nav">
						<ul class="float-left">
							<li class="header">Partner</li>
							<li><a href="/become-a-partner">Become a partner</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="footer-nav">
						<ul class="float-left">
							<li class="header">About</li>
							<li><a href="/aboutus">About Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="footer-nav">
						<ul class="float-left">
							<li class="header">Policy</li>
							<li><a href="/terms-and-conditions">Terms & Conditions</a></li>
							<li><a href="/privacy-policy">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="footer-nav">
						<ul class="float-left">
							<li class="header">Contact Us</li>
							<li><a href="mailto:serveanything.in@gmail.com">serveanything.in@gmail.com</a></li>
							<li><a href="https://wa.me/917099309650"><i class="fab fa-whatsapp"></i> +91 70993 09650</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="footer-nav">
						<ul class="float-left">
							<li class="header">Other</li>
							<li><a href="/feedback">Feedback</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="social">
						<ul>
							<li class="facebook">
								<a href="https://www.facebook.com/serveanything-105906114383917/" target="_blank"><i class="fab fa-facebook"></i></a></li>
							</li>
							<li class="instagram">
								<a href="https://www.instagram.com/serveanything/" target="_blank"><i class="fab fa-instagram"></i></a></li>
							</li>
							<li class="youtube">
								<a href="https://www.youtube.com/channel/UCSptL6SaxwdK1TqY5CK6mkQ" target="_blank"><i class="fab fa-youtube"></i></a></li>
							</li>
						</ul>
					</div>
				</div>
			</div>
				<div class="bottom">
					ServeAnything.in &copy;2020 All rights reserved.<br><br><br><br>
				</div>			
		</div>		
	</section>77
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	@yield('script')
</body>
</html>