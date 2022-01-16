<?php

use yii\db\Migration;

/**
 * Class m220116_174146_insert_type_row_to_type_table
 */
class m220116_174146_insert_type_row_to_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', ['description' => 'public']);
        $this->insert('user', ['description' => 'unlisted']);
        $this->insert('user', ['description' => 'private']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
