<?php
include 'dbcon.php';

// Assuming the user is logged in and their ID is stored in the session
session_start();
$user_id = $_SESSION['user_id']; // The logged-in user's ID
$member_id = $_GET['member_id']; // The ID of the member the user is chatting with

// Fetch messages between the user and the member
$sql = "SELECT * FROM chat_messages WHERE (sender_id='$user_id' AND receiver_id='$member_id') 
        OR (sender_id='$member_id' AND receiver_id='$user_id') ORDER BY timestamp ASC";
$result = $conn->query($sql);

// Handle message submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];

    $sql = "INSERT INTO chat_messages (sender_id, receiver_id, message) VALUES ('$user_id', '$member_id', '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: chat.php?member_id=$member_id");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>