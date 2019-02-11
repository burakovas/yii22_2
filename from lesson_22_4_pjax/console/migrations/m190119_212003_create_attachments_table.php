<?php

use yii\db\Migration;

/**
 * Handles the creation of table `attachments`.
 */
class m190119_212003_create_attachments_table extends Migration
{

    protected $commentsTable = 'task_comments';
    protected $attachmentsTable = 'task_attachments';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable($this->commentsTable, [
            'id' => $this->primaryKey(),
            'content' =>$this->string(),
            'task_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);

        $taskTable = 'tasks';
        $userTable = 'users';

        $this->addForeignKey('fk_comments_tasks',$this->commentsTable, 'task_id', $taskTable, 'id');
        $this->addForeignKey('fk_comments_users',$this->commentsTable, 'user_id', $userTable, 'id');


        $this->createTable($this->attachmentsTable, [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'path' => $this->string()
        ]);

        $this->addForeignKey('fk_attachments_tasks',$this->attachmentsTable, 'task_id', $taskTable, 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->commentsTable);
        $this->dropTable($this->attachmentsTable);
    }
}
