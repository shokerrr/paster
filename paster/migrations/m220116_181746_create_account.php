<?php

use yii\db\Migration;

/**
 * Class m220116_181746_create_account
 */
class m220116_181746_create_account extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', ['email' => 'user1@mail.com', 'nickname' => 'Nick']);
        $this->insert('user', ['email' => 'user2@mail.com', 'nickname' => 'Ivan']);
        $this->insert('user', ['email' => 'user3@mail.com', 'nickname' => 'Kim']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220116_181746_create_account cannot be reverted.\n";

        return false;
    }
}
