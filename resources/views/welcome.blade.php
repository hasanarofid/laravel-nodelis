<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Example</title>
</head>
<body>
    <h1>WebSocket Example</h1>
    <div id="chat"></div>
    <input type="text" id="message" placeholder="Type your message...">
    <button onclick="sendMessage()">Send</button>

    <script>
        const ws = new WebSocket('ws://localhost:3000/ws');
        ws.onmessage = (event) => {
            const chatDiv = document.getElementById('chat');
            const messageDiv = document.createElement('div');
            messageDiv.textContent = event.data;
            chatDiv.appendChild(messageDiv);
        };

        function sendMessage() {
            const messageInput = document.getElementById('message');
            const message = messageInput.value;
            ws.send(message);
            messageInput.value = '';
        }
    </script>
</body>
</html>
