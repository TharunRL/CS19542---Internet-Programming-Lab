<?php
// Start session to store user info after sign up
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chathat";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the username already exists
$sql = $conn->prepare("SELECT id FROM user WHERE username = ?");
$sql->bind_param("s", $username); // "s" indicates the type is a string
$sql->execute();
$sql->store_result();

if ($sql->num_rows > 0) {
    // Username already exists
    echo "Username already taken. Please choose a different one.";
} else {
    // Username is available; proceed with inserting the new user

    // Insert the new user into the database
    $insert_sql = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $insert_sql->bind_param("ss", $username, $password);

    if ($insert_sql->execute()) {
        // Registration successful; set session variables and redirect to home.html
        $_SESSION['userid'] = $insert_sql->insert_id; // Get the last inserted ID
        $_SESSION['username'] = $username;
        
        // Redirect to home.html
        header("Location: home.php");
        exit(); // Make sure to call exit after header to stop further script execution
    } else {
        // Error inserting user
        echo "Error: " . $conn->error;
    }

    // Close the insert statement
    $insert_sql->close();
}

// Close the prepared statement and connection
$sql->close();
$conn->close();
?>
