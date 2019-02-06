<?php

use yii\db\Migration;

/**
 * Class m190114_182259_add_email_column_to_users
 */
class m190114_182259_add_email_column_to_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("users", "email", $this->string(55));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("users", "email");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_182259_add_email_column_to_users cannot be reverted.\n";

        return false;
    }
    */
}
