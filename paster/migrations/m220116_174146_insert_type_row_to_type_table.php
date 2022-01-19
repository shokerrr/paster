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
        $this->insert('past_type', ['description' => 'public']);
        $this->insert('past_type', ['description' => 'unlisted']);
        $this->insert('past_type', ['description' => 'private']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
