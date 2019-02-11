<?php
namespace frontend\widgets;

use common\models\tables\Tasks;
use yii\base\Widget;

class TaskPreview extends Widget
{
    public $model;

    public function run()
    {
        if(is_a($this->model, Tasks::class)){
            return $this->render('task_preview', ['model' => $this->model]);
        }
        throw new \Exception("Невозможно отобразить модель!!");
    }
}