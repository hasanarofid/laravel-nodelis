<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketController extends Controller implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        Log::info("New WebSocket connection opened ({$conn->resourceId})");
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = count($this->clients) - 1;
        Log::info("Connection {$from->resourceId} sending message: {$msg}");

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // Kirim pesan ke semua klien, kecuali pengirimnya
                $client->send("User {$from->resourceId}: {$msg}");
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        Log::info("WebSocket connection closed ({$conn->resourceId})");
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        Log::error("An error occurred: {$e->getMessage()}");

        $conn->close();
    }
}
