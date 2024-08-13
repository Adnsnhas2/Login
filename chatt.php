<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Same styles as before */
        .chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .chat-window {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 300px;
            height: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-window header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 18px;
        }

        .chat-window .messages {
            padding: 10px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .chat-window footer {
            padding: 10px;
            background-color: #f1f1f1;
            display: flex;
        }

        .chat-window footer input {
            flex-grow: 1;
            padding: 5px;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .chat-window footer button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            margin-left: 5px;
            border-radius: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Chat icon -->
    <div class="chat-icon" onclick="toggleChatWindow()">
        <i class="fas fa-comments"></i>
        <span id="notification" style="display:none; color:red; font-weight:bold;">●</span>
    </div>

    <!-- Chat window -->
    <div class="chat-window" id="chatWindow">
        <header>Chat</header>
        <div class="messages" id="chatMessages">
            <!-- Messages will be loaded here via JavaScript -->
        </div>
        <footer>
            <input type="text" id="chatInput" placeholder="Type a message...">
            <button onclick="sendMessage()">Send</button>
        </footer>
    </div>

    <script>
        let senderId = 5; // Example sender ID (user)
        let receiverId = 1; // Example receiver ID (member)

        function toggleChatWindow() {
            var chatWindow = document.getElementById('chatWindow');
            var notification = document.getElementById('notification');
            if (chatWindow.style.display === 'none' || chatWindow.style.display === '') {
                chatWindow.style.display = 'flex';
                notification.style.display = 'none'; // Hide notification when chat window is opened
                loadMessages();
            } else {
                chatWindow.style.display = 'none';
            }
        }

        function loadMessages() {
            var messagesDiv = document.getElementById('chatMessages');
            fetch(`fetch_messagess.php?sender_id=${senderId}&receiver_id=${receiverId}`)
                .then(response => response.json())
                .then(data => {
                    let messagesHtml = '';
                    data.forEach(msg => {
                        messagesHtml += `<p><strong>${msg.sender_id == senderId ? 'You' : 'Member'}:</strong> ${msg.message}</p>`;
                    });
                    messagesDiv.innerHTML = messagesHtml;
                })
                .catch(error => console.error('Error fetching messages:', error));
        }

        function sendMessage() {
            var input = document.getElementById('chatInput');
            var message = input.value;
            if (message.trim() !== '') {
                fetch('send_messagess.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `sender_id=${senderId}&receiver_id=${receiverId}&message=${encodeURIComponent(message)}`
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data); // For debugging
                    loadMessages(); // Reload messages after sending
                    input.value = ''; // Clear the input field
                })
                .catch(error => console.error('Error sending message:', error));
            }
        }

        // Polling to check for new messages (every 5 seconds)
        setInterval(() => {
            fetch(`fetch_messagess.php?sender_id=${senderId}&receiver_id=${receiverId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        // Check if there are new messages
                        let lastMessage = data[data.length - 1];
                        if (lastMessage.sender_id != senderId) {
                            document.getElementById('notification').style.display = 'inline'; // Show notification
                        }
                    }
                })
                .catch(error => console.error('Error checking for new messages:', error));
        }, 5000);
    </script>

</body>
</html>
