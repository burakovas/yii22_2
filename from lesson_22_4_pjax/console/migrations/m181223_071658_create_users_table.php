<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181223_071658_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      /*  $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(50)->notNull(),
            'password' => $this->string()->notNull(),
            'email' => $this->string(),
        ]);*/

        $this->addForeignKey(
            'fk_tasks_users_responsible',
            'tasks',
            'responsible_id',
            'users',
            'id'
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
