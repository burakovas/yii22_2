<?php

use yii\db\Migration;

/**
 * Handles the creation of table `chat`.
 */
class m181129_173447_create_chat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('chat', [
            'id' => $this->primaryKey(),
            'channel' => $this->string(),
            'message' => $this->string(),
            'user_id' => $this->integer(),
            'created_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('chat');
    }
}
