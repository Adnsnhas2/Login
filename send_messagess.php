<?php
$conn = mysqli_connect('localhost','root','','database');
if(!$conn){
	echo "Connection Failed: ".mysqli_error($conn);
	exit;
}

$sender_id = $_POST['sender_id']; // ID of the user sending the message
$receiver_id = $_POST['receiver_id']; // ID of the member receiving the message
$message = $_POST['message'];

$sql = "INSERT INTO chat_messages (sender_id, receiver_id, message) VALUES ($sender_id, $receiver_id, '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
