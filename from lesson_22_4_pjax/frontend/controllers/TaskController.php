<?php

namespace frontend\controllers;

use frontend\models\forms\TaskAttachmentsAddForm;
//use common\models\tables\TaskAttachments;
use common\models\tables\TaskComments;
use common\models\tables\Tasks;
use common\models\tables\TaskStatuses;
use common\models\tables\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class TaskController extends Controller
{

    public function actionIndex()
    {
        $month = 1;

        $dataProvider = new ActiveDataProvider([
           'query' => Tasks::find()
                //->where("MONTH(date) = {$month}")
        ]);

        return $this->render('index',[
           'dataProvider' => $dataProvider
        ]);
    }

    public function actionOne($id)
    {
        return $this->render('one', [
            'model' => Tasks::findOne($id),
            'usersList' => Users::getUsersList(),
            'statusesList' => TaskStatuses::getList(),
            'userId' => \Yii::$app->user->id,
            'taskCommentForm' => new TaskComments(),
            'taskAttachmentForm' => new TaskAttachmentsAddForm(),
            'channel' => 'Task_' . $id,
        ]);
    }

    public function actionSave($id)
    {
        if($model = Tasks::findOne($id)){
            $model->load(\Yii::$app->request->post());
            $model->save();
            \Yii::$app->session->setFlash('success', "Изменеия сохранены");
        }else {
            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения");
        }
        $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionAddComment()
    {
        $model = new TaskComments();
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            \Yii::$app->session->setFlash('success', "Комментарий добавлен");
        }else {
            \Yii::$app->session->setFlash('error', "Не удалось добавить комментарий");
        }
        $this->redirect(\Yii::$app->request->referrer);

    }

    public function actionAddAttachment()
    {
        $model = new TaskAttachmentsAddForm();
        $model->load(\Yii::$app->request->post());
        $model->file = UploadedFile::getInstance($model, 'file');
        if($model->save()){
            \Yii::$app->session->setFlash('success', "Файл добавлен");
        }else {
            \Yii::$app->session->setFlash('error', "Не удалось добавить файл");
        }
        $this->redirect(\Yii::$app->request->referrer);



    }
}
