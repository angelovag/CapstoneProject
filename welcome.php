<?php
// welcome.php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="zxx">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">

		<title>PawPoint</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/new_favicon.png" type="image/x-icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="css/feather.css">

    	<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">

		<!-- Animation CSS -->
		<link rel="stylesheet" href="css/aos.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="css/custom.css">

	</head>		
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper home-twelve">
					
			<!-- Header -->
			<header class="header header-fixed header-fourteen header-twelve">
				<div class="container">
					<nav class="navbar navbar-expand-lg header-nav">
						<div class="navbar-header">
							<a id="mobile_btn" href="javascript:void(0);">
								<span class="bar-icon">
									<span></span>
									<span></span>
									<span></span>
								</span>
							</a>
							<a href="welcome.php" class="navbar-brand logo">
								<img src="img/new_logo.png" class="img-fluid" alt="Logo">
							</a>
						</div>
						<div class="main-menu-wrapper">
<!-- 							<div class="menu-header">
								<a href="index.html" class="menu-logo">
									<img src="img/logo.png" class="img-fluid" alt="Logo">
								</a>
								<a id="menu_close" class="menu-close" href="javascript:void(0);">
									<i class="fas fa-times"></i>
								</a>
							</div> -->

							<ul class="main-nav">
								<li>
									<a href="welcome.php">Home</a>
								</li>

								<li>
									<a href="how-it-works-users.php">How it works?</a>
								</li>

								<li>
									<a href="booking-users.php">Start a consult</a>
								</li>

<!-- 								<li>
									<a href="contact-us.php">Contact us</a>
								</li>		 -->						
							</ul>
						</div>
						<ul class="nav header-navbar-rht">

							<!-- User Menu -->
							<li class="nav-item dropdown has-arrow logged-item">
								<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
									<span class="user-img">
										<img class="rounded-circle" src="img/patients/patient.jpg" width="31" alt="Darren Elder">
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="user-header">
										<div class="avatar avatar-sm">
											<img src="img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
										</div>
										<div class="user-text">
											<h6><?php echo $_SESSION['email']; ?></h6>
											<p class="text-muted mb-0">Patient</p>
										</div>
									</div>
									<a class="dropdown-item" href="patient-dashboard.php">Dashboard</a>
									<a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div>
							</li>
							<!-- /User Menu -->

						</ul>
					</nav>
				</div>
			</header>
			<!-- /Header -->		

			<!-- Home Banner -->
			<section class="banner-section-fourteen banner-section-twelve">
				<div class="banner-section-twelve-bg">
					<img src="img/bg/home-12-banner-bg-1.png" alt="design-image">
					<img src="img/bg/home-12-banner-bg-2.png" alt="design-image">
				</div>
				<div class="container">
					<div class="row">
						
						<div class="col-lg-6">
							<div class="banner-img banner-img-twelve aos" data-aos="fade-up">
								<img src="img/bg/home-12-banner-1.png" class="img-fluid" alt="dog-image">
								<img src="img/bg/home-12-banner-2.png" class="img-fluid" alt="cat-image">
								<div class="banner-banner-img-twelve-bg">
									<img src="img/bg/dot-1.png" alt="dot-icon">
									<img src="img/bg/dot-2.png" alt="dot-icon">
									<img src="img/bg/ring-1.png" alt="ring-icon">
									<img src="img/bg/ring-2.png" alt="ring-icon">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="banner-content banner-content-fourteen aos" data-aos="fade-up">
								<h1>We take care <span>of Your Pets</span></h1>
								<p>Take advantage of the convenience of online consultations with a veterinarian! Gain access to professional advice, treatment guidelines, second opinions, and answers to all your pet-related questions from the comfort of your home.</p>
								<div class="banner-btns-fourteen "> 
									<a href="booking-users.php" class="btn btn-primary me-2">Start a Consult</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Home Banner -->

			<!-- services Section -->
			<section class="services-section-fourteen">
				<div class="floating-bg">
					<img src="img/bg/big-paw.png" alt="paw-image" >
					<img src="img/bg/small-paw.png" alt="paw-image" >
				</div>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 aos" data-aos="fade-up">
							<div class="section-header-fourteen service-inner-fourteen">
								<div class="service-inner-fourteen">
									<div class="service-inner-fourteen-two">
										<h3>OUR SERVICES</h3>
									</div>
								</div>
								<h2>What can we do?</h2>
							</div>							
						</div>						
					</div>
					<div class="row row-gap justify-content-center">
						<div class="col-lg-3 col-md-4 col-sm-12 d-flex">
							<div class="our-services-list w-100">
								<div class="service-icon">
									<img src="img/icons/injection.svg" alt="injection-icon">
								</div>
								<h4>Vaccination</h4>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-12 d-flex">
							<div class="our-services-list w-100">
								<div class="service-icon">
									<img src="img/icons/bottel.svg" alt="bottel-icon">
								</div>
								<h4>Pet Medicine</h4>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-12 d-flex">
							<div class="our-services-list w-100">
								<div class="service-icon">
									<img src="img/icons/bath-tub.svg" alt="pet-grooming-icon">
								</div>
								<h4>Pet Grooming</h4>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-12 d-flex">
							<div class="our-services-list w-100">
								<div class="service-icon">
									<img src="img/icons/pet-doctor.svg" alt="stethoscope-icon">
								</div>
								<h4>Pet Care</h4>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /services Section -->

			<!-- Feedback -->
			<section class="clients-section-fourteen">
				<div class="floating-bg">
					<img src="img/bg/two-paw.png" alt="paw-image" >
				</div>
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<div class="client-inner-main">
								<img src="img/bg/home-12-testimonial.png" alt="image" class="img-fluid">
							</div>
						</div>
						<div class="col-lg-7 col-md-12">
							<div class="section-header-fourteen service-inner-fourteen">
								<div class="service-inner-fourteen">
									<div class="service-inner-fourteen-two">
										<h3>OUR TEAM</h3>
									</div>
								</div>
								<h2>Dr. Ruby Perrin</h2>
								<p>DOCTOR OF VETERINARY MEDICINE</p>
							</div>
							<div class="owl-carousel feedback-slider-fourteen owl-theme aos" data-aos="fade-up">
								<div class="card feedback-card">
									<div class="card-body feedback-card-body">
										<div class="feedback-inner-main">
									
											<p><b>Expertise and Specializations:</b></p>
											<li>Small Animal Care: Treating dogs, cats, and small mammals with a focus on preventive medicine and early disease detection.</li>
											<li>Surgical Proficiency: Performing various surgical procedures, including spaying/neutering, tumor removal, and orthopedic surgeries.</li>
											<li>Emergency Medicine: Handling critical cases and providing prompt and effective emergency care to stabilize and save animal lives.</li>
											<li>Dentistry: Promoting oral health through comprehensive dental exams, cleanings, and extractions when necessary.</li>
											
										</div>
									</div>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Feedback -->

			<!-- Choose us -->
			<section class="choose-us-fourteen">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="section-header-fourteen text-center">
								<div class="service-inner-fourteen justify-content-center">
									<div class="service-inner-fourteen-two">
										<h3>WHY US</h3>
									</div>
								</div>
								<h2>Why choose us?</h2>
								<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p> -->
							</div>
						</div>
					</div>
					<div class="row">
					
						<div class="col-lg-6">
							<div class="choose-us-right-main">
								<img src="img/bg/home-12-why-us.png" alt="image" class="img-fluid">
								
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="why-us-content">
								<div class="us-faq aos" data-aos="fade-up" data-aos-delay="200">
									<div class="accordion" id="accordionExample">
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingOne">
											<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Convenience
											</button>
											</h2>
											<div id="collapseOne" class="accordion-collapse collapse shade show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<h6>Online vet services allow pet owners to seek professional advice without leaving their homes. This is particularly useful for individuals with busy schedules or limited mobility.</h6>
											</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingTwo">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Accessibility
											</button>
											</h2>
											<div id="collapseTwo" class="accordion-collapse collapse shade" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<h6>Online consultations make veterinary expertise accessible to people in remote or rural areas where traditional veterinary clinics might be scarce.</h6>
											</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingThree">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												Time-saving
											</button>
											</h2>
											<div id="collapseThree" class="accordion-collapse collapse shade" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<h6>Online consultations can save time for both pet owners and veterinarians. Appointments can be scheduled more flexibly, and waiting times are often reduced.</h6>
											</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingFour">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
													Comfort for Pets
												</button>
											</h2>
											<div id="collapseFour" class="accordion-collapse collapse shade" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<h6>Pets can be stressed in unfamiliar environments like veterinary clinics. Online consultations allow them to receive care in their familiar and comfortable surroundings.</h6>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingFive">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
													Cost-Effective
												</button>
											</h2>
											<div id="collapseFive" class="accordion-collapse collapse shade" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<h6>Online consultations might be more cost-effective for routine check-ups or minor concerns compared to in-person visits, especially when travel costs are taken into account.</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Choose us -->

			<!-- Footer -->
			<footer class="footer footer-one footer-fourteen footer-twelve">
				<div class="footer-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4">
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<a href="welcome.php"><img src="img/new_logo.png" alt="logo"></a>
									</div>
									<div class="footer-about-content">
										<p>Take advantage of the convenience of online consultations with a veterinarian! Gain access to professional advice, treatment guidelines, second opinions, and answers to all your pet-related questions from the comfort of your home</p>
									</div>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="row">
									<div class="col-lg-3 col-md-4">
										<div class="footer-widget footer-menu">
											<h2 class="footer-title">Company</h2>
											<ul>
												<li><a href="welcome.php">Home</a></li>
												<li><a href="how-it-works-users.php">How it works?</a></li>
												<li><a href="booking-users.php">Consult</a></li>
												<!-- <li><a href="contact-us.php">Contact us</a></li> -->
											</ul>
										</div>
									</div>

									<div class="col-lg-6 col-md-4">
										<div class="footer-widget footer-contact">
											<h2 class="footer-title">Contact Us</h2>
											<div class="footer-contact-info">
												<div class="footer-address">
													<p><i class="feather-map-pin"></i> 3556 Beech Street, USA</p>
												</div>
												<div class="footer-address">
													<p><i class="feather-phone-call"></i> +1 123 456 7891</p>
												</div>
												<div class="footer-address mb-0">
													<p><i class="feather-mail"></i> pawpoint@example.com</p>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
							<div class="col-lg-4 col-md-7">
								<div class="footer-widget">
									<div class="social-icon">
										<ul>
											<li>
												<a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i> </a>
											</li>
											<li>
												<a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
											</li>
											<li>
												<a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i> </a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					<div class="container">
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0"> Copyright © 2023 All Rights Reserved</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
<!-- 									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="privacy-policy.html">Privacy Policy</a></li>
											<li><a href="terms-condition.html">Terms and Conditions</a></li>
											<li><a href="login.html">Login & Register</a></li>
										</ul>
									</div> -->
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->					
					</div>
				</div>
			</footer>
			<!-- /Footer -->

			<!-- Cursor -->
			<div class="mouse-cursor cursor-outer"></div>
			<div class="mouse-cursor cursor-inner"></div>
			<!-- /Cursor -->	
		
		</div>		
		<!-- /Main Wrapper -->

		<!-- ScrollToTop -->
		<div class="progress-wrap active-progress">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
			</svg>
		</div>
		<!-- /ScrollToTop -->
	
		<!-- jQuery -->
		<script src="js/jquery-3.7.0.min.js"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="js/feather.min.js"></script>

		<!-- Datepicker JS -->
		<script src="js/moment.min.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>

		<!-- Owl Carousel JS -->
		<script src="js/owl.carousel.min.js"></script>

		<!-- Slick JS -->
		<script src="js/slick.js"></script>

		<!-- Animation JS -->
		<script src="js/aos.js"></script>

		<!-- Counter JS -->
		<!-- <script src="js/counter.js"></script> -->

		<!-- BacktoTop JS -->
		<script src="js/backToTop.js"></script>

		<!-- Custom JS -->
		<script src="js/script.js"></script>
	
	</body>
</html>