<?php
namespace frontend\controllers;

use common\models\tables\Tasks;
use yii\web\Controller;


class DbController extends Controller
{
    public function actionIndex(){

      /*  \Yii::$app->db->createCommand("
            INSERT INTO test (title, content) VALUES 
            ('456', '567')
            ")->execute();
      */

        $res = \Yii::$app->db->createCommand("
            SELECT * from test WHERE id= :id
            ")->bindValue("id",1)
            ->queryOne();

        //queryColumn ... сразу в массив
        //
            var_dump($res);


    }

    public function actionAr(){
       /* $model = new Tasks();
        $model->name = "new Task";
        $model->description = "dfdsf";
        $model->date = date("Y-m-d");
        $model->responsible_id = 2;
        $model->save(); */

       /* $model = Tasks::findOne(2);
       var_dump($model); */


    }

    public function actionFind(){
      /*$tasks = Tasks::find();
        var_dump($tasks);*/

      $tasks = new Tasks();
      var_dump($tasks->user);

    }
}
