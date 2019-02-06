<?php

use yii\db\Migration;

/**
 * Class m190129_180658_add_lang_column_to_users
 */
class m190129_180658_add_lang_column_to_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("users", "lang", $this->string(10));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("users", "lang");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190129_180658_add_lang_column_to_users cannot be reverted.\n";

        return false;
    }
    */
}
