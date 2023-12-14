<?php
// pet-details-users.php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit;
}

// Initialize MySQLi connection
$mysqli = new mysqli("capstone.project", "root", "", "capstone");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch user ID from session
$user_id = $_SESSION['id'];

// Fetch booking information for the user
$fetchBookingQuery = "SELECT * FROM bookings WHERE user_id = ? ORDER BY id DESC LIMIT 1";
$stmt = $mysqli->prepare($fetchBookingQuery);
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

    	<!-- Select2 CSS -->
		<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="css/custom.css">

	</head>		
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
			<header class="header login-header-info">
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
<!-- 						<div class="menu-header">
							<a href="index.html" class="menu-logo">
								<img src="img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div> -->
						<ul class="main-nav">
<!-- 							<li>
								<a href="faq.html">FAQ</a>
							</li>
							<li>
								<a href="login-email.html">Login</a>
							</li> -->

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
					</div>		 
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="doctor-content">
				<div class="container">

					<!-- Patient -->
<!-- 					<div class="row">
						<div class="col-md-12">
							<div class="back-link">
								<a href="booking.html"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
							</div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-lg-8 col-md-12">
							<div class="paitent-header">
								<h4 class="paitent-title">Pet Details</h4>
							</div>

							<!-- Add this section to display error messages -->
							<div id="error-message">
							    <?php
							        // Check if there is an error parameter in the URL
							        if (isset($_GET['error'])) {
							            $error_message = urldecode($_GET['error']);
							            echo "<p style='color: red;'>Error: $error_message</p>";
							        }
							    ?>
							</div>

							<div class="paitent-appointment">
								<form action="process-pet-details.php" method="post">
									<div class="forms-block">
										<label class="form-group-title">Appointment for</label>
										<label class="custom_radio me-4">
											<input type="radio" id="dog" name="appointment_for" value="dog" checked>
											<span class="checkmark"></span> Dog
										</label>
										<label class="custom_radio">
											<input type="radio" id="cat" name="appointment_for" value="cat">
											<span class="checkmark"></span> Cat
										</label>
									</div>

									<div class="forms-block">
										<label class="form-group-title">What's your pet's breed?</label>
										<input type="text" class="form-control" id="pet_breed" name="pet_breed">
									</div>

									<div class="forms-block">
										<label class="form-group-title">What's your pet's name?</label>
										<input type="text" class="form-control" id="pet_name" name="pet_name">
									</div>

									<div class="forms-block">
										<label class="form-group-title">What's your pet's gender?</label>
										<label class="custom_radio me-4">
											<input type="radio" id="male" name="pet_gender" value="male" checked>
											<span class="checkmark"></span> Male
										</label>
										<label class="custom_radio">
											<input type="radio" id="female" name="pet_gender" value="female">
											<span class="checkmark"></span> Female
										</label>
									</div>

									<div class="forms-block">
										<label class="form-group-title">What's your pet's age?</label>
										<input type="text" class="form-control" id="pet_age" name="pet_age">
									</div>

									<div class="forms-block">
										<label class="form-group-title">Has your pet been spayed/neutered?</label>
										<label class="custom_radio me-4" for="spayed_yes">
											<input type="radio" id="spayed_yes" name="spayed_neutered" value="yes" checked>
											<span class="checkmark"></span> Yes
										</label>
										<label class="custom_radio" for="spayed_no">
											<input type="radio" id="spayed_no" name="spayed_neutered" value="no">
											<span class="checkmark"></span> No
										</label>
									</div>

									<div class="forms-block mb-0">
										<div class="booking-btn">
											<button type="submit" class="btn btn-primary prime-btn justify-content-center align-items-center">
												Next <i class="feather-arrow-right-circle"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-md-12">
							<div class="booking-header">
								<h4 class="booking-title">Booking Summary</h4>
							</div>

							<div class="card booking-card">
								<div class="card-body booking-card-body booking-list-body">
									<div class="booking-list">
										<div class="booking-date-list">
											<ul>
												<li>Booking Date: <span><?php echo $bookingDate; ?></span></li>
												<li>Booking Time: <span><?php echo $bookingTime; ?></span></li>
											</ul>
										</div>
<!-- 										<div class="booking-doctor-right">
											<p>
												<a href="booking.html">Edit</a>
											</p>
										</div> -->
									</div>
								</div>
							</div>
							<div class="card booking-card">
								<div class="card-body booking-card-body">
									<div class="booking-doctor-details">
										<div class="booking-device">
											<div class="booking-device-img">
												<img src="img/icons/device-message.svg" alt="device-message-image">
											</div>
											<div class="booking-doctor-info">
												<h3>We can help you</h3>
												<p class="device-text">Call us +1 234 567 8912 (or) chat with our customer support team pawpoint@example.com</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Patient -->

				</div>
			</div>		
			<!-- /Page Content -->

			<!-- Cursor -->
			<div class="mouse-cursor cursor-outer"></div>
			<div class="mouse-cursor cursor-inner"></div>
			<!-- /Cursor -->	

		</div>		
		<!-- /Main Wrapper -->
	
		<!-- jQuery -->
		<script src="js/jquery-3.7.0.min.js"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="js/feather.min.js"></script>

		<!-- Select2 JS -->
		<script src="plugins/select2/js/select2.min.js"></script>

		<!-- Custom JS -->
		<script src="js/script.js"></script>
	
	</body>
</html>