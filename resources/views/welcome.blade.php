<!DOCTYPE html>
<html>

	<meta property="og:title" content="HM BUILDERS & SUPPLIERS (PVT) LTD">
	<meta property="og:description" content="We Build Your Future">
	<meta property="og:image" content="{{asset('images/fav.png')}}">
	<meta property="og:url" content="https://builders.hmgroup.lk/">
	<title>HM BUILDERS & SUPPLIERS (PVT) LTD</title>
	<link rel="icon" type="image/png" href="images/fav.png">

    @php $page='home';  @endphp
    @include('header') 
	
	<section class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
				<div class="col-lg-6 ftco-animate">
					<div class="mt-5">
						<h1 class="mb-4">We Build <br>Great Projects</h1>
						<p><a href="#" class="btn btn-primary">Our Services</a> <a href="#" class="btn btn-white" data-toggle="modal" data-target="#exampleModalCenter">Request A Quote</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2">
		<div class="container">
			<div class="row no-gutters d-flex">
				<div class="col-lg-4 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-flex">
						<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer-1"></span></div>
						<div class="media-body pl-4">
							<h3 class="heading mb-3">Quality Construction</h3>
						</div>
					</div>      
				</div>
				<div class="col-lg-4 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services services-2 d-flex">
						<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-worker-1"></span></div>
						<div class="media-body pl-4">
							<h3 class="heading mb-3">Professional Liability</h3>
						</div>
					</div>      
				</div>
				<div class="col-lg-4 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-flex">
						<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer"></span></div>
						<div class="media-body pl-4">
							<h3 class="heading mb-3">Dedicated To Our Clients</h3>
						</div>
					</div>      
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section" id="about-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 d-flex align-items-stretch">
					<div class="about-wrap img w-100" style="background-image: url(images/about.jpg);">
						<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-crane"></span></div>
					</div>
				</div>
				<div class="col-md-6 py-5 pl-md-5">
					<div class="row justify-content-center mb-4 pt-md-4">
						<div class="col-md-12 heading-section ftco-animate">
							<span class="subheading">Welcome to</span>
							<h2 class="mb-4">HM Builders & Suppliers (PVT) LTd.</h2>
							<div class="d-flex about">
								<div class="icon"><span class="flaticon-hammer"></span></div>
								<h3>We're in this business since 2007 and We provide the best insdustrial services</h3>
							</div>
							<p>We all work tirelessly with a dream of building our own houses from our own earnings and living happily with our families, but most of us are not able to achieve this dream. Our prime objective is to build your dream house for you with your own earnings.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
		<div class="img image-overlay" style="background-image: url(images/about-3.jpg);"></div>
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-6 py-5 bg-secondary aside-stretch">
					<div class="heading-section heading-section-white p-4 pl-md-0 py-md-5 pr-md-5">
						<span class="subheading">HM Builders & Suppliers (PVT) LTd.</span>
						<h2 class="mb-4">Best Provider for Industrial Services</h2>
						<p>HM Builders (Pvt) Ltd is an experienced construction company in Puttalam city. We have extended our services all around the island. We make your place strong & long standing with qualified & experienced technicians along with high quality building materials.  Our prime values are; high quality service, affordability & trustworthiness. We have hundreds of workers who have long years of experience in building either your house or commercial buildings or factories. We have completed many government & private building construction projects all around the country</p>
					</div>
				</div>
				<div class="col-md-6 d-flex align-items-center">
					<div class="row">
						<div class="col-md-12 d-flex counter-wrap ftco-animate">
							<div class="block-18 bg-primary d-flex align-items-center justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-engineer"></span></div>
								<div class="text">
									<strong class="number" data-number="{{$projects}}">0</strong>
									<span>Project Completed</span>
								</div>
							</div>
						</div>
						<div class="col-md-12 d-flex counter-wrap ftco-animate">
							<div class="block-18 d-flex align-items-center justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-worker-1"></span></div>
								<div class="text">
									<strong class="number" data-number="100">0</strong>
									<span>Happy Customers</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

  <!-- Latest Projects
	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Our Global Work Industries</span>
					<h2 class="mb-4">Latest Projects</h2>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<div class="project">
						<a href="images/project-1.jpg" class="img image-popup d-flex align-items-center" style="background-image: url(images/project-1.jpg);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</section> -->

<!-- TESTIMONIALS

	<section class="ftco-section ftco-no-pt ftco-no-pb testimony-section img">
		<div class="overlay"></div>
		<div class="container">
			<div class="row ftco-animate justify-content-center">
				<div class="col-md-6 p-4 pl-md-0 py-md-5 pr-md-5 aside-stretch d-flex align-items-center">
					<div class="heading-section heading-section-white">
						<span class="subheading" style="color:#fff;">Read Testimonials</span>
						<h2 class="mb-4" style="font-size: 50px;">It's always a joy to hear that the work we do has positively reviews</h2>
					</div>
				</div>
				<div class="col-md-6 pl-md-5 py-4 py-md-5 aside-stretch-right">
					<div class="carousel-testimony owl-carousel ftco-owl">
						<div class="item">
							<div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
								<div class="user-img" style="background-image: url(images/person_1.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="fa fa-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean</p>
									<p class="name">Jeff Freshman</p>
									<span class="position">Guests</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
								<div class="user-img" style="background-image: url(images/person_2.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="fa fa-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean</p>
									<p class="name">Jeff Freshman</p>
									<span class="position">Guests</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
								<div class="user-img" style="background-image: url(images/person_3.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="fa fa-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean</p>
									<p class="name">Jeff Freshman</p>
									<span class="position">Guests</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
								<div class="user-img" style="background-image: url(images/person_1.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="fa fa-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean</p>
									<p class="name">Jeff Freshman</p>
									<span class="position">Guests</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
								<div class="user-img" style="background-image: url(images/person_3.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="fa fa-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean</p>
									<p class="name">Jeff Freshman</p>
									<span class="position">Guests</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<br>
	@include('footer') 
	</html>