<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-19
 * Time: 17:44
 */

namespace frontend\controllers;


use common\models\tables\Comments;
use common\models\Upload;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class FileController extends Controller
{

    public function actionIndex($id){

        /*
        if(!\Yii::$app->user->can('CommentAdd')){
            echo \Yii::$app->user->id;
            throw new ForbiddenHttpException();
        }
        */

        $comment = new Comments();
        $model = new Upload();


        if($model->load(\Yii::$app->request->post())){
            if (UploadedFile::getInstance($model, 'file') != null) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $comment->file_name = $model->file->name;
                $model->upload();
            };
            $comment->task_id = $id;
            $comment->description = $model->comment;
            $comment->responsible_id = \Yii::$app->user->id;
            //$comment->created_at = date(Now());
            $comment->save();

            return $this->redirect(['task/one', 'id' => $id]);
        }


        return $this->render('index', ['model' => $model]);

    }

    public function actionLoc(){
        \Yii::$app->language = 'en';
        echo \Yii::t("main", "error");
        exit();
    }


}