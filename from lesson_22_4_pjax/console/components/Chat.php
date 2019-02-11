<?php
namespace console\components;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use \common\models\tables\Chat as ChatTable;

class Chat implements MessageComponentInterface
{

    protected $clients = [];

    /**
     * Chat constructor.
     */
    public function __construct()
    {
  //      $this->clients = new \SplObjectStorage();
        echo "server started\n";
    }


    function onOpen(ConnectionInterface $conn)
    {
        $queryString = $conn->httpRequest->getUri()->getQuery();
        $channel = explode("=", $queryString)[1];

        try {
            $this->clients[$channel][$conn->resourceId] = $conn;
            //var_dump($this->clients);
        } catch (\Exception $e) {
            $e->getMessage();
        }
        echo "New connection : {$conn->resourceId}\n";
    }

    function onClose(ConnectionInterface $conn)
    {
       // $this->clients($conn);
        echo "user {$conn->resourceId} disconect!";
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "\nconn {$conn->resourceId} closed with error\n";
        $conn->close();
        //$this->clients->detach($conn);
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        echo "$msg";
        $data = json_decode($msg, true);
        $channel = $data['channel'];
        try {
            (new ChatTable($data))->save();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

        foreach ($this->clients[$channel] as $client){
                $client->send($data['message']);
        }
    }


}