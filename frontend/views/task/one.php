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
    <div id="form_chat">
        <form action="" name="chat_form" id="chat_form">
            <label>
            введите сообщение
            <input type="hidden" name="id" value="<?= $model->id?> \n">
            <input type="text" name="message"/>
            <input type="submit"/>
            </label>
        </form>
        <div id="root_chat"></div>
        <script src="http://frontend.local.dev:8888/client.js"></script>
    </div>

    <!DOCTYPE html>
    <meta charset="utf-8" />
    <title>WebSocket Test</title>
    <script language="javascript" type="text/javascript">

        var wsUri = "wss://echo.websocket.org/";
        var output;

        function init()
        {
            output = document.getElementById("output");
            testWebSocket();
        }

        function testWebSocket()
        {
            websocket = new WebSocket(wsUri);
            websocket.onopen = function(evt) { onOpen(evt) };
            websocket.onclose = function(evt) { onClose(evt) };
            websocket.onmessage = function(evt) { onMessage(evt) };
            websocket.onerror = function(evt) { onError(evt) };
        }

        function onOpen(evt)
        {
            writeToScreen("CONNECTED");
            doSend("WebSocket rocks");
        }

        function onClose(evt)
        {
            writeToScreen("DISCONNECTED");
        }

        function onMessage(evt)
        {
            writeToScreen('<span style="color: blue;">RESPONSE: ' + evt.data+'</span>');
            websocket.close();
        }

        function onError(evt)
        {
            writeToScreen('<span style="color: red;">ERROR:</span> ' + evt.data);
        }

        function doSend(message)
        {
            writeToScreen("SENT: " + message);
            websocket.send(message);
        }

        function writeToScreen(message)
        {
            var pre = document.createElement("p");
            pre.style.wordWrap = "break-word";
            pre.innerHTML = message;
            output.appendChild(pre);
        }

        window.addEventListener("load", init, false);

    </script>

    <h2>WebSocket Test</h2>

    <div id="output"></div>

</div>
