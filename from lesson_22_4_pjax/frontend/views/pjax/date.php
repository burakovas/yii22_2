<?php use yii\widgets\Pjax;?>


<?php Pjax::begin(['enablePushState' => false])?>
<?= \yii\helpers\Html::a("Часы", ['pjax/hours'], ['class' => 'btn btn-success']);?>
<?= \yii\helpers\Html::a("Минуты", ['pjax/minutes'], ['class' => 'btn btn-warning']);?>
<h2>Текущее время: <?= $time?></h2>
<?php Pjax::end()?>