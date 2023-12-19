<?php

// Include the configuration file
include("config.php");

// Start the session
session_start();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming $selectedDate and $selectedTime are provided by the client
$selectedDate = $_POST['selectedDate'];
$selectedTime = $_POST['selectedTime'];

// Validate form data
$errors = array();

if (empty($selectedDate) || empty($selectedTime)) {
        $errors[] = "Please select a date and time.";
    }

    // Check for other validations and add to $errors array if needed

    if (!empty($errors)) {
        // Redirect back to the form with an error message
        $error_message = urlencode(implode("<br>", $errors));
        header("Location: booking-users.php?error=$error_message");
        exit();
    }


// Check if the selected slot is available
$checkAvailabilityQuery = "SELECT * FROM bookings WHERE date = ? AND time = ?";
$stmt = $conn->prepare($checkAvailabilityQuery);
$stmt->bind_param("ss", $selectedDate, $selectedTime);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // The slot is already booked
    echo "Slot not available";
} else {
    $user_id = $_SESSION['id'];

    // var_dump($_SESSION['id']);
    // die;

    // Insert the booking
    $insertBookingQuery = "INSERT INTO bookings (user_id, date, time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertBookingQuery);
    $stmt->bind_param("iss", $user_id, $selectedDate, $selectedTime);
    $stmt->execute();
    
    // Redirect to another page upon successful booking
    header("Location: pet-details-users.php");
    exit();
}

$stmt->close();
$mysqli->close();
?>