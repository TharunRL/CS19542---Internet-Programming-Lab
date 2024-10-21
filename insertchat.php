<?php
session_start(); // Start the session to access session variables

// Database configuration
$servername = "localhost"; // Change as needed
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "chathat"; // Your database name

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


// Check if the form is submitted
    // Get the message and receiver ID from the form
    $message = $_POST['msg'];
    $receiverId = $_POST['receiverid'];// Assuming you pass the receiver ID through the hidden input

    // Get the sender ID from the session (make sure you set this during login)
    $senderId = $_SESSION['userid']; // Replace with the correct session variable for the logged-in user ID
    // Validate inputs
    if (!empty($message) && $receiverId > 0 && $senderId) {
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO chats (senderid, receiverid, chat, time) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iis", $senderId, $receiverId, $message); // "iis" means: integer, integer, string

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect back to the chat page or display a success message
            header("Location : home.php"); // Redirect to chat page with success message
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();

    }

// Close the database connection
$conn->close();
?>
