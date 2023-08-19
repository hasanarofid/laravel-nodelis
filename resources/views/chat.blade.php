<!DOCTYPE html>
<html>
<head>
    <title>WebSocket Chat</title>
</head>
<body>
    <h1>WebSocket Chat</h1>
    <div id="chat"></div>
    <input type="text" id="message" placeholder="Type a message...">
    <button id="send">Send</button>
    <script>
        const ws = new WebSocket('ws://localhost:8000/ws');
        ws.onmessage = event => {
            const chatDiv = document.getElementById('chat');
            const messageDiv = document.createElement('div');
            messageDiv.textContent = event.data;
            chatDiv.appendChild(messageDiv);
        };
        const sendButton = document.getElementById('send');
        sendButton.addEventListener('click', () => {
            const messageInput = document.getElementById('message');
            const message = messageInput.value;
            ws.send(message);
            messageInput.value = '';
        });
    </script>
</body>
</html>
