<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "past_type".
 *
 * @property int $id
 * @property string|null $description
 *
 * @property Pasts[] $pasts
 */
class PastType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'past_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Pasts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasts()
    {
        return $this->hasMany(Past::class, ['type' => 'id']);
    }
}
