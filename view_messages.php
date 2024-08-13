<?php
include 'dbcon.php';

$member_id = 1;  // The ID of the member viewing their messages

$sql = "SELECT * FROM chat_messages WHERE receiver_id='$member_id' ORDER BY timestamp DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Messages</title>
</head>
<body>
    <h1>Your Messages</h1>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>" . $row['timestamp'] . ":</strong> " . $row['message'] . "</p>";
        }
    } else {
        echo "No messages found.";
    }
    ?>

    <a href="send_message.php">Send a new message</a>
</body>
</html>

<?php
$conn->close();
?>
