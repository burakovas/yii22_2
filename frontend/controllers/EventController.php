<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-12
 * Time: 19:06
 */

namespace frontend\controllers;


use common\models\tables\Tasks;
use yii\web\Controller;

class EventController extends Controller
{
    public function EventIndex(){
        $model = new Tasks();
        $model->on(Tasks::EVENT_AFTER_UPDATE, function(){
            echo "Записано!!!";
        });
        $model->run();
    }
}