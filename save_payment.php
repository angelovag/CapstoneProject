<?php

// Start the session
session_start();

$servername = "capstone.project";
$username = "root";
$password = "";
$dbname = "capstone";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve payment details from the AJAX request
$requestData = json_decode(file_get_contents("php://input"), true);

// Check if the 'details' key exists in the $requestData array
if (isset($requestData['payment_status'])) {

    // Get the user_id from the session
    $user_id = $_SESSION['id'];

    // Fetch booking information for the user
    $fetchBookingQuery = "SELECT * FROM bookings WHERE user_id = ? ORDER BY id DESC LIMIT 1";
    $stmt = $conn->prepare($fetchBookingQuery);

    // Check for errors in preparing the statement
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("i", $user_id);

    // Execute the statement
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $booking = $result->fetch_assoc();

            $bookingDate = $booking['date'];
            $bookingTime = $booking['time'];

            // Close the first statement before reusing the variable
            $stmt->close();

            // Prepare and execute SQL statement to insert payment details into the database
            $stmtPayment = $conn->prepare("INSERT INTO payment_details 
                            (payment_id, payer_id, payment_status, currency_code, value, payer_given_name, payer_surname, payer_email, user_id, booking_date, booking_time) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Check for errors in preparing the statement
            if (!$stmtPayment) {
                die("Prepare failed: " . $conn->error);
            }

            // Bind parameters
            $stmtPayment->bind_param("sssssssssss", 
                $requestData['paymentID'], 
                $requestData['payerID'], 
                $requestData['payment_status'], 
                $requestData['currency_code'], 
                $requestData['value'], 
                $requestData['payer_given_name'], 
                $requestData['payer_surname'], 
                $requestData['payer_email'],
                $user_id,
                $bookingDate,
                $bookingTime);

            // Execute the statement
            if ($stmtPayment->execute()) {
                echo "Payment details inserted successfully.";
            } else {
                // Handle errors in executing the statement
                echo "Error inserting payment details: " . $stmtPayment->error;
            }

            // Close the second statement
            $stmtPayment->close();
        } else {
            // Handle the case where no booking is found
            echo "No bookings found for the user.";
        }
    } else {
        // Handle the case where the execute statement for fetching booking fails
        die("Execute failed: " . $stmt->error);
    }

    // Close the connection
    $conn->close();

    // Redirect to the desired page
    // header("Location: save_payment.php");
    // exit(); // Ensure that subsequent code is not executed after the header redirect
} else {
    echo "Error: 'payment_status' key is not present in the request data. Dumping request data:";
    echo '<pre>';
    var_export($requestData);
    echo '</pre>';
}
?>
