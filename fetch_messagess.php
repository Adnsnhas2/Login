<?php
$conn = mysqli_connect('localhost','root','','database');
if(!$conn){
	echo "Connection Failed: ".mysqli_error($conn);
	exit;
}


$sender_id = $_GET['sender_id']; // ID of the user sending the message
$receiver_id = $_GET['receiver_id']; // ID of the member receiving the message

$sql = "SELECT sender_id, receiver_id, message, timestamp FROM chat_messages WHERE (sender_id = $sender_id AND receiver_id = $receiver_id) OR (sender_id = $receiver_id AND receiver_id = $sender_id) ORDER BY timestamp ASC";
$result = $conn->query($sql);

$messages = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$conn->close();

echo json_encode($messages);
?>
