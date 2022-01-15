<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%past_type}}`.
 */
class m220115_183421_create_past_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%past_type}}', [
            'id' => $this->primaryKey(),
            'description' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%past_type}}');
    }
}
