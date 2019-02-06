<?php

namespace app\models\tables;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $password
 * @property string $email
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'password'], 'string', 'max' => 55],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password' => 'Password',
        ];
    }

    public function fields(){
        return[
        'id',
            'username' => 'name',
            'password',
        ];
    }

    static function getUsersList(){

        $users = static::find()
            ->select(['id', 'name'])
            ->asArray()
            ->all();

        return $usersList = ArrayHelper::map($users,'id', 'name');
    }

    static function getUserName($id){

        $username = static::find()
            ->select(['name'])
            ->where(['id' => $id])
            ->one();

        if($username != null){
            return $username->name;
        } else {
            return "Unknown User";
        }
    }

    public function getResponsible(){
        return $this->hasOne(Users::className(),['id' => 'responsible_id']);
    }

}
