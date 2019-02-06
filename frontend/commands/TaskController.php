<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-26
 * Time: 15:12
 */

namespace app\commands;


use app\models\tables\Tasks;
use yii\console\Controller;

class TaskController extends Controller
{
    public function actionDeadline(){

        /** @var Tasks[] $tasks */
        $tasks = Tasks::find()
            ->where('DATEDIFF(NOW(), tasks.date ) <= 1')
            ->with('responsible')
            ->all();

        foreach ($tasks as $task) {
            \Yii::$app->mailer->compose()
                ->setTo($task->responsible->email)
                ->setFrom('admin@test.ru')
                ->setSubject("Task Deadline!")
                ->setTextBody(" You time is over !!")
                ->send();
        }
    }
}