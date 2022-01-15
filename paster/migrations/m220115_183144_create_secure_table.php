<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%secure}}`.
 */
class m220115_183144_create_secure_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%secure}}', [
            'id' => $this->integer(),
            'pass' => $this->string(),
        ]);

        $this->addForeignKey('user_foreign_key', 'secure', 'id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%secure}}');
    }
}
