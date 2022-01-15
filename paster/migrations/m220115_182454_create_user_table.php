<?php

use yii\db\Migration;

/**
 * Class m220115_182454_create_user_table
 */
class m220115_182454_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     * Создаем таблицу пользователи
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'nickname' => $this->string(30),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
