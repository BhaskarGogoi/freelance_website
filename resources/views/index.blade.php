@extends('layouts.master')

@section('title')
	Serve Anything | Home services at your doorstep
@endsection

@section('content')
<script type = "text/javascript">
	$('.banner-content').carousel({
  		interval: 100
	})
</script>
<section class="banner">
	<div class="banner-content">		
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="../images/slide/electrician.jpg" alt="Electrician Slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="../images/slide/hair-cut.jpg" alt="Hair Cut">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="../images/slide/3.png" alt="Salon at Home">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			</div>
		<div>
						{{-- <div class="select-box">
							<div class="options-container">							
								<div class="option">
									<input type="radio" class="radio" id="automobiles" name="category">
									<label for="automobiles">Automobiles</label>
								</div>
								<div class="option">								
									<input type="radio" class="radio" id="gutu" name="category">
									<label for="gutu">Guntull</label>
								</div>
								<div class="option">
									<input type="radio" class="radio" id="mutu" name="category">
									<label for="mutu">ifuwe</label>
								</div>
								<div class="option">								
									<input type="radio" class="radio" id="gutu" name="category">
									<label for="gutu">Guntull</label>
								</div>
								<div class="option">
									<input type="radio" class="radio" id="mutu" name="category">
									<label for="mutu">ifuwe</label>
								</div>
								<div class="option">								
									<input type="radio" class="radio" id="gutu" name="category">
									<label for="gutu">Guntull</label>
								</div>
								<div class="option">
									<input type="radio" class="radio" id="mutu" name="category">
									<label for="mutu">ifuwe</label>
								</div>
							</div>
							<div class="selected">
								<span>Selected</span>
							</div>				
						</div> --}}
					
		</div>
	</div>
</section>
{{-- <section class="launched-now">
	<div class="container mt-4 mb-4">
		<div class="heading-text">
			Launched Now
		</div>
		<div class="row">
			<div class="col-6 col-lg-3">
				<a href="/book/Electrician">
				<div class="card" style="width: 100%;">
					<img class="card-img-top" src="../images/now-launched0.jpg" alt="Electrician">
					<div class="card-body">
					  <h5 class="card-title">Electrician</h5>
					</div>
				</div>
				</a>
			</div>
			<div class="col-6 col-lg-3">
				<a href="/select-packages/Laundry">
				<div class="card" style="width: 100%;">
					<img class="card-img-top" src="../images/now-launched1.jpg" alt="Laundry">
					<div class="card-body">
					  <h5 class="card-title">Laundry</h5>
					</div>
				</div>
				</a>
			</div>
			<div class="col-6 col-lg-3">
				<a href="/select-packages/Hair-Cut">
				<div class="card" style="width: 100%;">
					<img class="card-img-top" src="../images/now-launched2.jpg" alt="Hair Cut">
					<div class="card-body">
					  <h5 class="card-title">Hair Cut</h5>
					</div>
				</div>
				</a>
			</div>
			<div class="col-6 col-lg-3">
				<a href="/select-packages/Car-Wash">
				<div class="card" style="width: 100%;">
					<img class="card-img-top" src="../images/now-launched3.jpg" alt="Car Wash">
					<div class="card-body">
					  <h5 class="card-title">Car Wash</h5>
					</div>
				</div>
				</a>
			</div>
			<div class="col-6 col-lg-3">
				<a href="/select-packages/Parlour-At-Home">
				<div class="card" style="width: 100%;">
					<img class="card-img-top" src="../images/now-launched4.jpg" alt="Salon At Home">
					<div class="card-body">
					  <h5 class="card-title">Parlour At Home</h5>
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>
</section> --}}
<section class="p-4" id="services">
	<div class="container">
		<div class="heading-text">
			<h1>Our Services On Demand</h1>
		</div>
		<div class="sub-heading-text">
			Home Services
		</div>
		<div class="row">
			<div class="col col-3">
				<div class="category-card">
					<a href="/select-packages/Car-Wash">
						<div class="category-icon">
							<img src="../images/icons/car-wash.png" alt="Car Wash"><br>
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Car Wash</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/select-packages/Laundry">
						<div class="category-icon">
							<img src="../images/icons/laundry.png" alt="Laundry">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Laundry</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/book/Carpenter">
						<div class="category-icon">
							<img src="../images/icons/carpenter.png" alt="Carpenter">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Carpenter</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/book/Painter">
						<div class="category-icon">
							<img src="../images/icons/painter.png" alt="Painter">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Painter</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/coming-soon/Maid">
						<div class="category-icon">
							<img src="../images/icons/maid.png" alt="Maid">
						</div>
						<div class="category-title">Maid</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/coming-soon/Cleaner">
						<div class="category-icon">
							<img src="../images/icons/cleaner.png" alt="cleaner">
						</div>
						<div class="category-title">Cleaner</div>
					</a>
				</div>					
			</div>
		</div>
		<div class="sub-heading-text">
			<br><br>
			Technical Home Services
		</div>
		<div class="row">
			<div class="col col-3">
				<div class="category-card">
					<a href="/book/Electrician">
						<div class="category-icon">
							<img src="../images/icons/electrician.png" alt="Electrician">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Electrician</div>
					</a>
				</div>				
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/book/Plumber">
						<div class="category-icon">
							<img src="../images/icons/plumber.png" alt="Plumber">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Plumber</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/book-service/Home-Appliance-Repairer">
						<div class="category-icon">
							<img src="../images/icons/appliance-repair.png" alt="Appliance Repair">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Home Appliance Repairer</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/coming-soon/Home-Appliance-Repairer">
						<div class="category-icon">
							<img src="../images/icons/motorpump.png" alt="Motor Pump Repair">
						</div>
						<div class="category-title">Motor Pump Repair</div>
					</a>
				</div>					
			</div>
		</div>
		<div class="sub-heading-text">
			<br><br>
			Beauty Home Services
		</div>
		<div class="row">
			<div class="col col-3">
				<div class="category-card">
					<a href="/select-packages/Hair-Cut">
						<div class="category-icon">
							<img src="../images/icons/hair-cut.png" alt="Hair Cut">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Hair Cut</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/select-packages/Parlour-At-Home">
						<div class="category-icon">
							<img src="../images/icons/beautician.png" alt="Salon At Home">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Parlour At Home</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/coming-soon/Makeup-Artist">
						<div class="category-icon">
							<img src="../images/icons/makeup.png" alt="Makeup Artist">
						</div>
						<div class="category-title">Makeup Artist</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/coming-soon/Mehendi-Artist">
						<div class="category-icon">
							<img src="../images/icons/mehendi.png" alt="Mehendi Artist">
						</div>
						<div class="category-title">Mehendi Artist</div>
					</a>
				</div>					
			</div>
		</div>
		<div class="sub-heading-text">
			<br><br>
			Health Care Services
		</div>
		<div class="row">
			<div class="col col-4">
				<div class="category-card">
					<a href="/coming-soon/Nutritionist">
						<div class="category-icon">
							<img src="../images/icons/nutritionist.png" alt="Nutritionist">
						</div>
						<div class="category-title">Nutritionist</div>
					</a>
				</div>				
			</div>
			<div class="col col-4">
				<div class="category-card">
					<a href="/coming-soon/Physio-Therapy">
						<div class="category-icon">
							<img src="../images/icons/physiotherapy.png" alt="Physio Therapy">
						</div>
						<div class="category-title">Physio Therapy</div>
					</a>
				</div>					
			</div>
			<div class="col col-4">
				<div class="category-card">
					<a href="/coming-soon/Veterinarian">
						<div class="category-icon">
							<img src="../images/icons/veterinarian.png" alt="Veterinarian">
						</div>
						<div class="category-title">Veterinarian</div>
					</a>
				</div>					
			</div>
		</div>
		<div class="sub-heading-text">
			<br><br>
			Transport Service
		</div>
		<div class="row">
			<div class="col col-4">
				<div class="category-card">
					<a href="/book/Driver">
						<div class="category-icon">
							<img src="../images/icons/driver.png" alt="Driver">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Driver</div>
					</a>
				</div>				
			</div>
			<div class="col col-4">
				<div class="category-card">
					<a href="/book-service/Taxi">
						<div class="category-icon">
							<img src="../images/icons/taxi.png" alt="Taxi Service">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Taxi Service</div>
					</a>
				</div>				
			</div>
			<div class="col col-4">
				<div class="category-card">
					<a href="/book-service/Carrier-Vehicle">
						<div class="category-icon">
							<img src="../images/icons/utility-vehicle.png" alt="Carrier Vehicle">
							<span class="cat-icon-badge">New</span>
						</div>
						<div class="category-title">Carrier Vehicle</div>
					</a>
				</div>					
			</div>
		</div>
		<div class="sub-heading-text">
			<br><br>
			Freelance Services
		</div>
		<div class="row">
			<div class="col col-3">
				<div class="category-card">
					<a href="/select-freelance-profile/GraphicDesigner">
						<div class="category-icon">
							<img src="../images/icons/graphic-designer.png" alt="Graphic Designer">
						</div>
						<div class="category-title">Graphic Designer</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/coming-soon/web-developer">
						<div class="category-icon">
							<img src="../images/icons/web-developer.png" alt="Web Developer">
						</div>
						<div class="category-title">Web Developer</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/coming-soon/DataEntry">
						<div class="category-icon">
							<img src="../images/icons/data-entry.png" alt="Data Entry">
						</div>
						<div class="category-title">Data Entry</div>
					</a>
				</div>					
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/freelance-services/Photographer">
						<div class="category-icon">
							<img src="../images/icons/photographer.png" alt="Photographer">
						</div>
						<div class="category-title">Photographer</div>
					</a>
				</div>				
			</div>
			<div class="col col-3">
				<div class="category-card">
					<a href="/coming-soon/Sketch-Artist">
						<div class="category-icon">
							<img src="../images/icons/sketch-artist.png" alt="Sketch Artist">
						</div>
						<div class="category-title">Sketch Artist</div>
					</a>
				</div>					
			</div>
			
						
		</div>
		
		
		<div class="sub-heading-text">
			<br><br>
			Event Services
		</div>
		<div class="row" style="text-align:center;">
			<div class="col col-6">
				<div class="category-card">
					<a href="/coming-soon/Event-Manager">
						<div class="category-icon">
							<img src="../images/icons/event-manager.png" alt="Event Manager">
						</div>
						<div class="category-title">Event Manager</div>
					</a>
				</div>				
			</div>
			<div class="col col-6">
				<div class="category-card">
					<a href="/coming-soon/Catering-Service">
						<div class="category-icon">
							<img src="../images/icons/catering.png" alt="Catering Service">
						</div>
						<div class="category-title">Catering Service</div>
					</a>
				</div>					
			</div>
		</div>
	</div>
</section>
<section class="p-4 choose-us-pc" style="background-image: linear-gradient(-20deg, #f794a4 0%, #fdd6bd 100%);">
	<div class="container">
		<div class="heading-text">
			Why choose us?
		</div>
		<div class="row">
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/high-quality3.png" alt="Work assurance">
					</div>
					<div class="choose-us-title">High quality <br>work assurance</div>
				</div>					
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/quick-response2.png" alt="Quick Response">
					</div>
					<div class="choose-us-title">Quick Response</div>
				</div>				
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/high-quality2.png" alt="Trained Professionals">
					</div>
					<div class="choose-us-title">High quality trained <br>professionals</div>
				</div>					
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/professional-support2.png" alt="Professional Support">
					</div>
					<div class="choose-us-title">Professional Support</div>
				</div>					
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/easy-payment2.png" alt="Easy Payment">
					</div>
					<div class="choose-us-title">Easy Payment Options</div>
				</div>					
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/re-work2.png" alt="Re-work assurance">
					</div>
					<div class="choose-us-title">Re-work assurance on<br>selected services</div>
				</div>					
			</div>		
		</div>
	</div>
</section>
<section class="p-4 choose-us-m" style="background-image: linear-gradient(-20deg, #f794a4 0%, #fdd6bd 100%);">
	<div class="container">
		<div class="heading-text">
			Why choose us?
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div style="width: 100%; border: 1px solid transparent;">
					<p class="choose-us-mobile">
						<img src="../images/icons/high-quality3.png" alt="High Quality Work">
						<b>High quality work assurance</b>
					</p>
				</div>					
			</div><br><br><br>
			<div class="col-sm-12">
				<div style="width: 100%; border: 1px solid transparent;">
					<p class="choose-us-mobile">
						<img src="../images/icons/quick-response2.png" alt="Quick Response">
						<b>Quick Response</b>
					</p>
				</div>				
			</div><br><br><br>
			<div class="col-sm-12">
				<div style="width: 100%; border: 1px solid transparent;">
					<p class="choose-us-mobile">
						<img src="../images/icons/high-quality2.png" alt="Trained Professionals">
						<b>High quality trained professionals</b>
					</p>
				</div>					
			</div><br><br><br>
			<div class="col-sm-12">
				<div style="width: 100%; border: 1px solid transparent;">
					<p class="choose-us-mobile">
						<img src="../images/icons/professional-support2.png" alt="Professional Support">
						<b>Professional Support</b>
					</p>
				</div>					
			</div><br><br><br>
			<div class="col-sm-12">
				<div style="width: 100%; border: 1px solid transparent;">
					<p class="choose-us-mobile">
						<img src="../images/icons/easy-payment2.png" alt="Easy Payment">
						<b>Easy Payment Options</b>
					</p>
				</div>					
			</div><br><br><br>
			<div class="col-sm-12">
				<div style="width: 100%; border: 1px solid transparent;">
					<p class="choose-us-mobile">
						<img src="../images/icons/re-work2.png" alt="Re-wrok assurance">
						<b>Re-work assurance on selected services</b>
					</p>
				</div>					
			</div><br><br>	
		</div>
	</div>
</section>
<section class="advantages">
	<div class="container py-4 px-4">
		<div class="row">
			<div class="col-sm-12">
				<h2>ADVANTAGES OF BECOMING OUR PARTNER</h2>
				<div class="row">
					<div class="col-sm-12">
						<div class="card adv_points" style="width: 100%;">
							<div class="card-body">
								<p class="card-text">Work on your own terms.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="card adv_points" style="width: 100%;">
							<div class="card-body">
								<p class="card-text">Flexibility : You choose when you want to work and how much.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="card adv_points" style="width: 100%;">
							<div class="card-body">
								<p class="card-text">Easy to connect with customers.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="card adv_points" style="width: 100%;">
							<div class="card-body">
								<p class="card-text">Get rewards on the basis of your performance.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="card adv_points" style="width: 100%;">
							<div class="card-body">
								<p class="card-text">Grow your business : get new customers looking for service professionals like you.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="card adv_points" style="width: 100%;">
							<div class="card-body">
								<p class="card-text">Partner support to solve queries.</p>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
</section>

@endsection