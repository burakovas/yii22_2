<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-19
 * Time: 08:10
 */



echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function($model){
        return \app\widgets\MyWidget::widget([
            'id' => $model->id,
            'name' => $model->name,
            'date' => $model->date,
            'description' => $model->description,
        ]);
    },
]);
