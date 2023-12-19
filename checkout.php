<?php

// Include the configuration file
include("config.php");

// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit;
}

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Fetch user ID from session
$user_id = $_SESSION['id'];

// Fetch booking information for the user
$fetchBookingQuery = "SELECT * FROM bookings WHERE user_id = ? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($fetchBookingQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Assuming there is only one booking per user
if ($result->num_rows > 0) {
    $booking = $result->fetch_assoc();

    $bookingDate = $booking['date'];
    $bookingTime = $booking['time'];
}

?>

<!DOCTYPE html> 
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<title>PawPoint</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		
		<!-- Favicons -->
		<link href="img/new_favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="css/feather.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- <link rel="stylesheet" href="css/style.css"> -->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header header-custom header-fixed header-one">
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

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar-two">
				<div class="container">
					<div class="row align-items-center inner-banner">
						<div class="col-md-12 col-12 text-center">
							<h2 class="breadcrumb-title">Checkout</h2>
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
									<li class="breadcrumb-item" aria-current="page">Checkout</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form action="booking-success.html">
									
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="mb-3 card-label">
														<label class="mb-2">First Name</label>
														<input class="form-control" type="text">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="mb-3 card-label">
														<label class="mb-2">Last Name</label>
														<input class="form-control" type="text">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="mb-3 card-label">
														<label class="mb-2">Email</label>
														<input class="form-control" type="email">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="mb-3 card-label">
														<label class="mb-2">Phone</label>
														<input class="form-control" type="text">
													</div>
												</div>
											</div>
											<!-- <div class="exist-customer">Existing Customer? <a href="login.html">Click here to login</a></div> -->
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<h4 class="card-title">Payment Method</h4>
											
											<!-- Credit Card Payment -->
	<!-- 										<div class="payment-list">
												<label class="payment-radio credit-card-option">
													<input type="radio" name="radio" checked>
													<span class="checkmark"></span>
													Credit card
												</label>
												<div class="row">
													<div class="col-md-6">
														<div class="mb-3 card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 card-label">
															<label for="card_number">Card Number</label>
															<input class="form-control" id="card_number" placeholder="1234 5678 9876 5432" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3 card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control" id="expiry_month" placeholder="MM" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3 card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control" id="expiry_year" placeholder="YY" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3 card-label">
															<label for="cvv">CVV</label>
															<input class="form-control" id="cvv" type="text">
														</div>
													</div>
												</div>
											</div> -->
											<!-- /Credit Card Payment -->

											<!-- Paypal Payment -->
											<div class="payment-list">
												<div id="paypal-payment-button" style="width: 120px;"></div>
											</div>
											<!-- /Paypal Payment -->
											
											<!-- Submit Section -->
<!-- 											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
											</div> -->
											<!-- /Submit Section -->
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">									
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<li>Date :<span> <?php echo $bookingDate; ?></span></li>
												<li>Time :<span> <?php echo $bookingTime; ?></span></li>
											</ul>
											<ul class="booking-fee">
												<li>Consulting Fee <span>$30</span></li>
												<li>Estimated Tax <span>$2.66</span></li>
												<!-- <li>Video Call <span>$32.66</span></li> -->
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">$32.66</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer footer-one">
				<div class="footer-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4">
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<a href="welcome.php"><img src="img/new_logo.png" alt="logo"></a>
									</div>
									<div class="footer-about-content">
										<p>Take advantage of the convenience of online consultations with a veterinarian! Gain access to professional advice, treatment guidelines, second opinions, and answers to all your pet-related questions from the comfort of your home.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
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
													<p><i class="feather-phone-call"></i> +1 234 567 8912</p>
												</div>
												<div class="footer-address mb-0">
													<p><i class="feather-mail"></i> pawpoint@example.com</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-7">
								<div class="footer-widget">
									<div class="social-icon">
										<ul>
											<li>
												<a href="#" target="https://www.facebook.com"><i class="fab fa-facebook"></i> </a>
											</li>
											<li>
												<a href="#" target="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
											</li>
											<li>
												<a href="#" target="https://www.twitter.com"><i class="fab fa-twitter"></i> </a>
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
								<!-- <div class="col-md-6 col-lg-6"> -->
								
									<!-- Copyright Menu -->
<!-- 									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="privacy-policy.html">Privacy Policy</a></li>
											<li><a href="terms-condition.html">Terms and Conditions</a></li>
										</ul>
									</div> -->
									<!-- /Copyright Menu -->
									
								<!-- </div> -->
							</div>
						</div>
						<!-- /Copyright -->					
					</div>
				</div>
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="js/jquery-3.7.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="js/bootstrap.bundle.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="js/script.js"></script>

    	<script src="https://www.paypal.com/sdk/js?client-id=AT9Pe9ifgcL_Biq9IKRjW8NDY9Fucrey8GgZobdPaUXbwxbSGFlY9lRgjFVG-G9kLGPkMMiOm14H6Lyz&disable-funding=credit,card"></script>
   		<script src="js/index.js"></script>
		
	</body>
</html>