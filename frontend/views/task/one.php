<?php

use \yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-save">
    <?php $form = ActiveForm::begin(['action' => Url::to(['task/one', 'id' => $model->id])]);?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'date')
        //->textInput(['type' => 'date'])
        ->widget(\yii\jui\DatePicker::class, [
                'language' => 'ru'
        ])

    ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'responsible_id')->dropDownList(\common\models\tables\Users::getUsersList()) ?>
    <?= Html::submitButton('Save') ?>
    <?php ActiveForm::end(); ?>
<br>
    <?php $form = ActiveForm::begin(['action' => Url::to(['file/index', 'id' => $model->id])]);?>
    <?= Html::submitButton('Add Comment') ?>
    <?php ActiveForm::end(); ?>

    <br>

    <div class="comment-history">
        <?php $comments = \common\models\tables\Comments::find()
            ->where(['task_id' => $model->id])
            ->all();
        ?>

        <?php foreach ($comments as $comment): ?>
            <p><strong><?=\common\models\tables\Users::getUserName($comment->responsible_id)?></strong>: <?php echo $comment->description ?></p>

        <?php if($comment->file_name != null){
                echo Html::img('/img/small/' . $comment->file_name, ['class' => 'img-thumbnail']);
            }
            ?>

        <?php endforeach; ?>
    </div>

</div>
