<?php use yii\widgets\Pjax;?>

<h1>Блок времени</h1>
<?php Pjax::begin()?>
<?= \yii\helpers\Html::a("Обновить время", ['pjax/multiple'], ['class' => 'btn btn-success']);?>
<h2>Текущее время: <?= $time?></h2>
<?php Pjax::end()?>


<h1>Блок хэша</h1>
<?php Pjax::begin()?>
<?= \yii\helpers\Html::a("Обновить хэш", ['pjax/multiple'], ['class' => 'btn btn-success']);?>
<h2>Текущее время: <?= $hash?></h2>
<?php Pjax::end()?>
