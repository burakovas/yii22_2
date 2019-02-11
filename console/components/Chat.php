<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-10
 * Time: 18:04
 */
namespace console\components;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;

    /**
     * Chat constructor.
     * @param $clients
     */
    public function __construct()
    {
        $this->clients = new \SplObjectStorage();
        echo "Server started! \n";
    }


    function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection : {$conn->resourceId}\n";
    }

    function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "user : {$conn->resourceId} disconnected! \n";
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Error  : {$conn->resourceId} ! \n";
        $conn->close();
        $this->clients->detach($conn);
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        echo "{$from->resourceId} : {$msg}\n";
        foreach ($this->clients as $client) {
            $client->send($msg);
        }
    }


}