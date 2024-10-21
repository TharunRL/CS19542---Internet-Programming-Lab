<?php
// Start a session to keep track of the user's login status
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

// Prepare SQL query to prevent SQL injection
$sql = $conn->prepare("SELECT id, password FROM user WHERE username = ?");
$sql->bind_param("s", $username); // "s" indicates the type is a string
$sql->execute();
$sql->store_result();

// Check if the username exists
if ($sql->num_rows > 0) {
    $sql->bind_result($id, $stored_password);
    $sql->fetch();

    // Since the passwords are stored in plain text, compare directly
    if ($password === $stored_password) {
        // Correct credentials; set session variables and redirect to home.html
        $_SESSION['userid'] = $id;
        $_SESSION['username'] = $username;
        
        // Redirect to home.html
        header("Location: home.php");
        exit(); // Make sure to call exit after header to stop further script execution
    } else {
        // Password does not match
        echo "Invalid password.";
    }
} else {
    // Username does not exist
    echo "Invalid username.";
}

// Close the prepared statement and connection
$sql->close();
$conn->close();
?>
