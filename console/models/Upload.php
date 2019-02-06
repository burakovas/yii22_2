<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-19
 * Time: 17:47
 */

namespace app\models;


use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class Upload extends Model
{
    public $comment;

    /** @var  UploadedFile */
    public $file;

    public function rules(){
        return [
            [['comment'], 'safe'],
            [['file'], 'file', 'extensions' => 'png, jpg']
        ];
    }

    public function upload(){

        if($this->validate()){
            $filename = $this->file->getBaseName() . "." . $this->file->getExtension();
            $filepath = \Yii::getAlias("@webroot/img/{$filename}");
            $this->file->saveAs($filepath);
            Image::thumbnail($filepath, 100, 100)
                ->save(\Yii::getAlias("@webroot/img/small/{$filename}"));
        }

    }

}