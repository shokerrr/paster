<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasts".
 *
 * @property int $id
 * @property string|null $content
 * @property int|null $author_id
 * @property int|null $type
 * @property string|null $create_at
 * @property bool|null $is_active
 *
 * @property User $author
 * @property PastType $type0
 */
class Past extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['author_id', 'type'], 'default', 'value' => null],
            [['author_id', 'type'], 'integer'],
            [['create_at'], 'safe'],
            [['is_active'], 'boolean'],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => PastType::class, 'targetAttribute' => ['type' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Контент',
            'author_id' => 'Автор',
            'type' => 'Тип видимости',
            'create_at' => 'Дата создания',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(PastType::class, ['id' => 'type']);
    }
}
