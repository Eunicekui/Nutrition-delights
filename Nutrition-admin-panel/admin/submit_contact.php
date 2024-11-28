<?php
// Start the session (if needed, for example, to track user sessions)
session_start();

// Include the database configuration
include 'config.php';  // Adjust the path to your config.php file if needed

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['Message'];

    // Validate the form data (ensure all fields are filled)
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit();
    }

    // Prepare the SQL query to insert the contact message into the database
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the query
    if ($stmt->execute()) {
        // Success: redirect to contact.html with a success message
        header("Location: ../contact.html?success=true");  // Redirect to contact.html
        exit(); // Make sure no further code is executed after redirection
    } else {
        // Failure: redirect to contact.html with an error message
        header("Location: ../contact.html?error=true"); // Redirect with error message
        exit(); // Ensure no further code is executed after redirection
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
