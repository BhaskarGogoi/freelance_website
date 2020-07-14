<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Choose from best trained service professionals near you for all your needs - Home Services, Appliance & Electronic Repairs, Beauticians,Car wash, health & diet care professionals , event managers, veterinarian and many more.">
	<meta name="keywords" content="Freelance, Home Services, Jorhat, Hire Professionals">
	<meta property="og:title" content="Choose Packages" />
	<meta property="og:image" content="../images/favicon.png" />
	<meta property="og:description" content="Choose from best trained service professionals near you for all your needs - Home Services, Appliance & Electronic Repairs, Beauticians,Car wash, health & diet care professionals , event managers, veterinarian and many more." />
	<meta property="og:site_name" content="Serveanything" />
	<link rel="icon" type="image/png" href="../images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/style.v3.5.css">
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
			<nav class="navigation nav justify-content-center">
				<h3 style="margin-top: 14px; font-weight: bold;">@yield('header-text')</h3>
			</nav>
		</div>
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
							<li class="twitter">
								<a href="#"><i class="fab fa-twitter"></i></a></li>
							</li>
						</ul>
					</div>
				</div>
			</div>
				<div class="bottom">
					ServeAnything.in &copy;2020 All rights reserved.<br><br><br><br>
				</div>			
		</div>		
	</section>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	@yield('script')
</body>
</html>