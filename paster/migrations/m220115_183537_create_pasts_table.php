<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pasts}}`.
 */
class m220115_183537_create_pasts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pasts}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'author_id' => $this->integer()->null(),
            'type' => $this->integer(),
            'expiration_time' => $this->integer()->defaultValue(0),
            'create_at' => $this->timestamp(),
            'is_active' => $this->boolean(),
        ]);

        $this->addForeignKey('author_foreign_key', 'pasts', 'author_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('type_foreign_key', 'pasts', 'type', 'past_type', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pasts}}');
    }
}
