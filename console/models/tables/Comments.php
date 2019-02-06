<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $created_at
 * @property string $description
 * @property int $responsible_id
 * @property int $task_id
 * @property string $file_name
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['description', 'file_name'], 'string'],
            [['responsible_id', 'task_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'description' => 'Description',
            'responsible_id' => 'Responsible ID',
            'task_id' => 'Task ID',
            'file_name' => 'File Name',
        ];
    }
}
