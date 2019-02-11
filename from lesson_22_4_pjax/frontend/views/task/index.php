<?
\frontend\assets\TaskAsset::register($this);
echo \yii\widgets\ListView::widget([
     'dataProvider' => $dataProvider,
     'itemView' => function($model){
         return \frontend\widgets\TaskPreview::widget(['model' => $model]);
     },
     'summary' => false,
     'options' => [
         'class' => 'preview-container'
     ]
 ]);
