<?php
use yii\helpers\Html;
use \yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-22
 * Time: 17:39
 */

    $form = ActiveForm::begin(['action' => Url::to(['task/addcomment', 'id' => $comment->task_id])]);?>

    <?= $form->field($comment, 'description')->textarea(['rows' => 6]) ?>
    <?php //echo $form->field($comment,'file_name')->fileInput();?>
    <?= Html::submitButton('Add Comment') ?>

    <?php ActiveForm::end(); ?>
<br>
    <?php
    //var_dump($comment);
    $form = ActiveForm::begin(['action' => Url::to(['file/index', 'id' => $comment->task_id])]);?>

    <?= Html::submitButton('attach file') ?>

    <?php ActiveForm::end(); ?>
