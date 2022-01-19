<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m220116_183729_generate_pass_for_accs
 */
class m220116_183729_generate_pass_for_accs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $users = User::find()->all();

        foreach ($users as $user) {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $generatedPass =  substr(str_shuffle($permitted_chars), 0, 6);
            $this->insert('secure', ['id' => $user->id, 'pass' => $generatedPass]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220116_183729_generate_pass_for_accs cannot be reverted.\n";

        return true;
    }
}
