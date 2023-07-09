<?php

namespace App\Http\Controllers\WebSocket;

use App\Http\Controllers\Controller;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Models\User;
use App\Models\Children;
use App\Models\Location;

class WebSocketController implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "Nuevo cliente conectado: {$conn->resourceId}\n";

        // Enviar un mensaje al cliente cuando se conecta
        $conn->send("¡Bienvenido! Te has conectado exitosamente al servidor WebSocket.");
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        echo "Mensaje recibido: " . $msg . "\n";

        // Opcional: Mostrar contenido completo del mensaje
        var_dump($msg);

        // Resto de la lógica del método onMessage
        foreach ($this->clients as $client) {
            if ($client !== $from) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Cliente desconectado: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Error en el controller Socket: {$e->getMessage()}\n";
        $conn->close();
    }
}
