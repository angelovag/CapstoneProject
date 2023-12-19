<?php

// Include the configuration file
include("config.php");

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $appointment_for = $_POST["appointment_for"];
    $pet_breed = $_POST["pet_breed"];
    $pet_name = $_POST["pet_name"];
    $pet_gender = $_POST["pet_gender"];
    $pet_age = $_POST["pet_age"];
    $spayed_neutered = $_POST["spayed_neutered"];

    // Validate form data
    $errors = array();

    if (empty($appointment_for) || empty($pet_breed) || empty($pet_name) || empty($pet_gender) || empty($pet_age) || empty($spayed_neutered)) {
        $errors[] = "All fields are required.";
    }

    // Check for other validations and add to $errors array if needed

    if (!empty($errors)) {
        // Redirect back to the form with an error message
        $error_message = urlencode(implode("<br>", $errors));
        header("Location: pet-details-users.php?error=$error_message");
        exit();
    }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the user_id from the session
    $user_id = $_SESSION['id'];

    $sql = "INSERT INTO `pet-details` (user_id, appointment_for, pet_breed, pet_name, pet_gender, pet_age, spayed_neutered) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check for errors in the prepare statement
    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("issssis", $user_id, $appointment_for, $pet_breed, $pet_name, $pet_gender, $pet_age, $spayed_neutered);

    // Execute the statement
    $result = $stmt->execute();

    // Redirect to another page upon successful booking
    header("Location: checkout.php");
    exit();

    // Check for errors in the execute statement
    if (!$result) {
        die("Error in execute statement: " . $stmt->error);
    }

    // Close the connection
    $stmt->close();
    $conn->close();

}
?>
