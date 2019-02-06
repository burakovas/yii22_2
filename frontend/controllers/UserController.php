<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-19
 * Time: 07:43
 */

namespace frontend\controllers;
use common\models\tables\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex(){

        $userId = \Yii::$app->user->id;

        $cache = \Yii::$app->cache;
        $key = "user_tasklist" . $userId;

      /*  $query = Tasks::find()
            ->where(['responsible_id' => $userId]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('index_d', ['dataProvider' => $dataProvider]);
        */

        if(!$taskList = $cache->get($key)){
            $taskList = Tasks::find()
                ->where(['responsible_id' => $userId])
                ->all();
            $cache->set($key, $taskList,10);
        }


        return $this->render('index', ['taskList' => $taskList]);
    }
}