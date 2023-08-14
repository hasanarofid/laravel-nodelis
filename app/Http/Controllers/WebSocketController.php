<?php

namespace App\Http\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketController extends Controller implements MessageComponentInterface
{
    public function onOpen(ConnectionInterface $conn)
    {
        // Logic when a new connection is opened
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Logic when a message is received
    }

    public function onClose(ConnectionInterface $conn)
    {
        // Logic when a connection is closed
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // Logic when an error occurs
    }
}
