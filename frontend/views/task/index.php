<?php

use yii\helpers\Html;
use common\models\filters\TasksSearch;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MyTask';

?>

<p>
    <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-default']) ?>

    <?php /* echo  $this->render('_search', ['model' => $searchModel]); */
    ?>

</p>
<?php $form = ActiveForm::begin(
        ['id' => 'form-input-example',
            'options' => [
                'enctype' => 'multipart/form-data'
                ],
        ]);


$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'view'
])

?>

<?php ActiveForm::end(); ?>

