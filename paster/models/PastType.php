<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "past_type".
 *
 * @property int $id
 * @property string|null $description
 *
 * @property Past[] $past
 */
class PastType extends \yii\db\ActiveRecord
{
    /** @var int  */
    const PUBLIC_TYPE = 1;
    /** @var int  */
    const UNLISTED_TYPE = 2;
    /** @var int  */
    const PRIVATE_TYPE = 3;

    public static $pastType = [
        self::PUBLIC_TYPE => 'Видно всем',
        self::UNLISTED_TYPE => 'Только по ссылке',
        self::PRIVATE_TYPE => 'Только автору',
    ];
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
//    public function getPast()
//    {
//        return $this->hasMany(Past::class, ['type' => 'id']);
//    }
}
