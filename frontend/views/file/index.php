<?php
/** @var \app\models\Upload $model */
$form = \yii\widgets\ActiveForm::begin();

echo $form->field($model,'comment')->textInput();
echo $form->field($model,'file')->fileInput();
echo \yii\helpers\Html::submitButton("Send");

\yii\widgets\ActiveForm::end();

