<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-10
 * Time: 17:43
 */
namespace console\controllers;

use console\components\Chat;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;


class WsController extends \yii\console\Controller
{

    public function actionRun(){

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                ),
                8081
            )
        );
        $server->run();
    }

}

