<?php
/**@var \app\models\tables\Tasks $model */
/**@var integer $userId */
/**@var \app\models\tables\TaskStatuses[] $statusesList */
/**@var \app\models\tables\Users[] $usersList */
/**@var \app\models\tables\TaskComments $taskCommentForm */
/**@var \app\models\tables\TaskAttachments $taskAttachmentForm */
use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;
?>

<div class="task-edit">
    <div class="task-main">
        <?php $form = ActiveForm::begin(['action' => Url::to(['task/save', 'id' => $model->id])]);?>
        <?=$form->field($model, 'name')->textInput();?>
        <div class="row">
            <div class="col-lg-4">
                <?=$form->field($model, 'status')
                    ->dropDownList($statusesList)?>
            </div>
            <div class="col-lg-4">
                <?=$form->field($model, 'responsible_id')
                    ->dropDownList($usersList)?>
            </div>
            <div class="col-lg-4">
                <?=$form->field($model, 'date')
                    ->textInput(['type' => 'date'])?>
            </div>
        </div>
        <div>
            <?=$form->field($model, 'description')
                ->textarea()?>
        </div>
        <?=Html::submitButton("Сохранить",['class' => 'btn btn-success']);?>
       <?ActiveForm::end()?>
    </div>
</div>
<div class="attachments">
    <h3>Вложения</h3>
    <?php $form = ActiveForm::begin([
        'action' => Url::to(['task/add-attachment']),
        'options' => ['class' => "form-inline"]
    ]);?>
    <?=$form->field($taskAttachmentForm, 'taskId')->hiddenInput(['value' => $model->id])->label(false);?>
    <?=$form->field($taskAttachmentForm, 'file')->fileInput();?>
    <?=Html::submitButton("Добавить",['class' => 'btn btn-default']);?>
    <?ActiveForm::end()?>
    <hr>
    <div class="attachments-history">
        <?foreach ($model->taskAttachments as $file): ?>
            <a href="/img/tasks/<?=$file->path?>">
                <img src="/img/tasks/small/<?=$file->path?>" alt="">
            </a>
        <?php endforeach;?>
    </div>
    <div class="task-history">
        <div class="comments">
            <h3>Комментарии</h3>
            <?php $form = ActiveForm::begin(['action' => Url::to(['task/add-comment'])]);?>
            <?=$form->field($taskCommentForm, 'user_id')->hiddenInput(['value' => $userId])->label(false);?>
            <?=$form->field($taskCommentForm, 'task_id')->hiddenInput(['value' => $model->id])->label(false);?>
            <?=$form->field($taskCommentForm, 'content')->textInput();?>
            <?=Html::submitButton("Добавить",['class' => 'btn btn-default']);?>
            <?ActiveForm::end()?>
            <hr>
            <div class="comment-history">
                <?foreach ($model->taskComments as $comment): ?>
                    <p><strong><?=$comment->user->login?></strong>: <?=$comment->content?></p>
                <?php endforeach;?>
            </div>
        </div>

    </div>
</div>

