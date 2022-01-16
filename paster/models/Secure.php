<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secure".
 *
 * @property int|null $id
 * @property string|null $pass
 *
 * @property User $id0
 */
class Secure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'secure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => null],
            [['id'], 'integer'],
            [['pass'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pass' => 'Pass',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SecureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SecureQuery(get_called_class());
    }
}
