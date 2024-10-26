<?php
session_start(); // Start the session to access session variables

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chathat";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the message and receiver ID from the form
    $message = isset($_POST['msg']) ? $_POST['msg'] : '';
    $receiverid = isset($_POST['receiverid']) ? (int)$_POST['receiverid'] : 0;

    // Get the sender ID from the session (assuming the user is logged in)
    $senderId = $_SESSION['userid']; // Replace with correct session variable

    // Validate inputs
    if (!empty($message) && $receiverid > 0 && $senderId) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO chats (senderid, receiverid, chat, time) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iis", $senderId, $receiverid, $message); // "iis" means integer, integer, string

        // Execute the statement
        if ($stmt->execute()) {
            // Return success response
            echo json_encode(['status' => 'success', 'message' => 'Chat message inserted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to insert chat message']);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
}

// Close the database connection
$conn->close();
?>
