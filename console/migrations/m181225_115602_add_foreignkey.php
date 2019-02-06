<?php

use yii\db\Migration;

/**
 * Class m181225_115602_add_foreignkey
 */
class m181225_115602_add_foreignkey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
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
            $this->dropForeignKey(
                'fk_tasks_users_responsible',
                'tasks'
            );

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }
*/
    public function down()
    {
        echo "m181225_115602_add_foreignkey cannot be reverted.\n";

        return false;
    }

}
