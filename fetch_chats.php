<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chathat";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

// Assuming you want to fetch chats for a specific user
$userId = $_SESSION['userid'];

// Fetch chats where the user is either the sender or receiver
$sql = "SELECT 
    chats.*,
    sender.username AS username
FROM 
    chats
JOIN 
    user AS sender ON chats.senderid = sender.id
WHERE 
    chats.senderid = ? OR chats.receiverid = ?
ORDER BY 
    chats.time ASC;
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $userId, $userId);
$stmt->execute();
$result = $stmt->get_result();

// Fetch all chat messages
$chats = [];
while ($row = $result->fetch_assoc()) {
    $chats[] = $row;
}

$stmt->close();
$conn->close();

// Return the chat messages in JSON format
header('Content-Type: application/json');
echo json_encode($chats);
?>
