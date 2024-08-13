<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_id = 5;
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO chat_messages (sender_id, receiver_id, message) VALUES ('$sender_id', '$receiver_id', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>