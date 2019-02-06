<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m190122_042020_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime(),
            'description' => $this->text(),
            'responsible_id' => $this->integer(),
            'task_id' => $this->integer(),
            'file_name' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comments');
    }
}
