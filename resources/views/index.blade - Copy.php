@extends('layouts.master')

@section('title')
	Serve Anything
@endsection

@section('content')
<section class="banner">
	<div class="banner-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2>One stop for all your Home service requirements.</h2>
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
			</div>
		</div>
	</div>
</section>
<section class="promo_video">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 promo-text">
				<h1>How it works?</h1>
				<p>See our explaination video for more info here.</p>
			</div>
			<div class="col-sm-6">
				<script src="https://fast.wistia.com/embed/medias/im80ijtzd1.jsonp" async></script>
				<script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
				<div class="wistia_responsive_padding" style="padding:56.39% 0 0 0;position:relative;">
					<div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
						<div class="wistia_embed wistia_async_im80ijtzd1 videoFoam=true" style="height:100%;position:relative;width:100%">
							<div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;">
								<img src="https://fast.wistia.com/embed/medias/im80ijtzd1/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" 
									alt="" aria-hidden="true" 
									onload="this.parentNode.style.opacity=1;" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="p-4" id="services">
	<div class="container">
		<div class="heading-text">
			Our Services
		</div>
		<div class="sub-heading-text">
			Home Services
		</div>
		<div class="row">
			<div class="col col-sm-3">
				<div class="category-card">
					<a href="/book/Electrician">
						<div class="category-icon">
							<img src="../images/icons/electrician.png">
						</div>
						<div class="category-title">Electrician</div>
					</a>
				</div>				
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<a href="/book/plumber">
						<div class="category-icon">
							<img src="../images/icons/plumber.png">
						</div>
						<div class="category-title">Plumber</div>
					</a>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/car-wash.png">
					</div>
					<div class="category-title">Car Wash</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/laundry.png">
					</div>
					<div class="category-title">Laundry</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/maid.png">
					</div>
					<div class="category-title">Maid</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/carpenter.png">
					</div>
					<div class="category-title">Carpenter</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/painter.png">
					</div>
					<div class="category-title">Painter</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/hair-cut.png">
					</div>
					<div class="category-title">Hair Cut</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/utility-vehicle.png">
					</div>
					<div class="category-title">Utility Vehicle</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/makeup.png">
					</div>
					<div class="category-title">Home Beauty Services</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/appliance-repair.png">
					</div>
					<div class="category-title">Electronic Appliance Repair</div>
				</div>					
			</div>
		</div>
		<div class="sub-heading-text">
			<br><br>
			Freelance Services
		</div>
		<div class="row">
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/photographer.png">
					</div>
					<div class="category-title">Photographer</div>
				</div>				
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/graphic-designer.png">
					</div>
					<div class="category-title">Graphic Designer</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/web-developer.png">
					</div>
					<div class="category-title">Web Developer</div>
				</div>					
			</div>
			<div class="col col-sm-3">
				<div class="category-card">
					<div class="category-icon">
						<img src="../images/icons/sketch-artist.png">
					</div>
					<div class="category-title">Sketch Artist</div>
				</div>					
			</div>
		</div>
	</div>
</section>
<section class="p-4" style="background-image: linear-gradient(-20deg, #f794a4 0%, #fdd6bd 100%);">
	<div class="container">
		<div class="heading-text">
			Why choose us?
		</div>
		<div class="row">
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/high-quality3.png">
					</div>
					<div class="choose-us-title">High quality <br>work assurance</div>
				</div>					
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/quick-response2.png">
					</div>
					<div class="choose-us-title">Quick Response</div>
				</div>				
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/high-quality2.png">
					</div>
					<div class="choose-us-title">High quality trained <br>professionals</div>
				</div>					
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/professional-support2.png">
					</div>
					<div class="choose-us-title">Professional Support</div>
				</div>					
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/easy-payment2.png">
					</div>
					<div class="choose-us-title">Easy Payment Options</div>
				</div>					
			</div>
			<div class="col col-sm-4">
				<div class="choose-us-card">
					<div class="choose-us-icon">
						<img src="../images/icons/re-work2.png">
					</div>
					<div class="choose-us-title">Re-work assurance on<br>selected services</div>
				</div>					
			</div>		
		</div>
	</div>
</section>
<section class="advantages">
	<div class="container py-4 px-4">
		<div class="row">
			<div class="col-sm-12">
				<h4>Advantages of becomming our partner</h4>
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
								<p class="card-text">Get rewards on the basis of your perfomance.</p>
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