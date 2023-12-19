<?php

// Include the configuration file
include("config.php");

// Start the session
session_start();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user_id is set in the session
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM payment_details WHERE user_id = ? ORDER BY id DESC LIMIT 1";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $user_data = $result->fetch_assoc();
    } else {
        die("Execute failed: " . $stmt->error);
    }

    $stmt->close();
} else {
    // Redirect or handle the case when user_id is not set in the session
    header("Location: login.html");
    exit();
}

?>

<!DOCTYPE html> 
<html lang="en">
	<head>

		<meta charset="utf-8">
		<title>Pawpoint</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		
		<!-- Favicons -->
		<link href="img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="css/feather.css">

		<!-- Apex Css -->
		<link rel="stylesheet" href="plugins/apex/apexcharts.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="css/custom.css">
	
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
							<h2 class="breadcrumb-title">Dashboard</h2>
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
									<li class="breadcrumb-item" aria-current="page">Dashboard</li>
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
						
						<!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="img/patients/patient.jpg" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><?php echo $_SESSION['email']; ?></h3>
<!-- 											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
											</div> -->
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="patient-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="profile-settings.html">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="change-password.html">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="logout.php">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" data-bs-toggle="tab">Appointments</a>
											</li>
<!-- 											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-bs-toggle="tab">Prescriptions</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_medical_records" data-bs-toggle="tab"><span class="med-records">Medical Records</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_billing" data-bs-toggle="tab">Billing</a>
											</li> -->
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<?php if (isset($_SESSION['id'])): ?>
        										<?php if ($result->num_rows > 0): ?>
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Amount</th>
																	<th>Status</th>
																	<th>Payment ID</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="img/doctors/doctor-thumb-01.jpg" alt="User Image">
																			</a>
																			<a>Dr. Ruby Perrin <span>Doctor of veterinary medicine</span></a>
																		</h2>
																	</td>
																	<td><?php echo $user_data['booking_date']; ?><span class="d-block text-info"><?php echo $user_data['booking_time']; ?></span></td>
																	<td><?php echo $user_data['value']; ?></td>
																	<td><span class="badge rounded-pill bg-success-light"><?php echo $user_data['payment_status']; ?></span></td>
																	<td><?php echo $user_data['payment_id']; ?></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<?php else: ?>
												<p>No appointment data available.</p>
        									<?php endif; ?>
    											<?php else: ?>
        										<p>User not logged in or invalid user ID.</p>
    										<?php endif; ?>
										</div>
										<!-- /Appointment Tab -->
										  
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
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
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
<!-- 									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="privacy-policy.html">Privacy Policy</a></li>
											<li><a href="terms-condition.html">Terms and Conditions</a></li>
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
		   
		</div>
		<!-- /Main Wrapper -->


	  
		<!-- jQuery -->
		<script src="js/jquery-3.7.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="js/bootstrap.bundle.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

        <!-- Apex JS -->
		<script src="plugins/apex/apexcharts.min.js"></script>
		
		<!-- Custom JS -->
		<script src="js/script.js"></script>
		
	</body>
</html>