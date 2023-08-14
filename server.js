const express = require('express');
const expressWs = require('express-ws');

const app = express();
expressWs(app);

app.ws('/ws', (ws, req) => {
   console.log('WebSocket connection established');

   ws.on('message', (msg) => {
      console.log(`Received message: ${msg}`);
      // Implement your WebSocket logic here
   });

   ws.on('close', () => {
      console.log('WebSocket connection closed');
   });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
   console.log(`WebSocket Server is listening on port ${PORT}`);
});
