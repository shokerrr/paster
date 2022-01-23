<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasts".
 *
 * @property int $id
 * @property string $content
 * @property int|null $author_id
 * @property int $type
 * @property int $expiration_time
 * @property string $create_at
 * @property bool $is_active
 * @property string $hash
 *
 * @property User $author
 * @property PastType $type0
 */
class Past extends \yii\db\ActiveRecord
{

    const NO_TIME_LIMIT = 0;

    const TIME_LIMIT_10_MIN = 1;

    const TIME_LIMIT_1_HOUR = 2;

    const TIME_LIMIT_3_HOUR = 3;

    const TIME_LIMIT_DAY = 4;

    const TIME_LIMIT_WEEK = 5;

    const TIME_LIMIT_MONTH = 6;


    public static $listLimit = [
        self::NO_TIME_LIMIT => 'Без ограничений',
        self::TIME_LIMIT_10_MIN => '10 минут',
        self::TIME_LIMIT_1_HOUR => '1 час',
        self::TIME_LIMIT_3_HOUR => '3 часа',
        self::TIME_LIMIT_DAY => '1 день',
        self::TIME_LIMIT_WEEK => '1 неделя',
        self::TIME_LIMIT_MONTH => '1 месяц',
    ];

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
            [['author_id', 'type', 'expiration_time'], 'integer'],
            [['create_at'], 'safe'],
            [['is_active'], 'boolean'],
            [['content', 'type', 'expiration_time'], 'required'],
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
            'expiration_time' => 'Ограничение времени',
            'type' => 'Тип видимости',
            'create_at' => 'Дата создания',
            'is_active' => 'Is Active',
            'hash' => 'ХЭШ',
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
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PastType::class, ['id' => 'type']);
    }

    /**
     * Получение типа
     *
     * @return string
     */
    public function getTimeLimit()
    {
        return self::$listLimit[$this->category];
    }

    public function beforeSave($insert)
    {
        if (!isset($this->author_id)) {
            $this->author_id = Yii::$app->user->getId();
        }

        if ($this->isNewRecord) {
            $this->is_active = true;
            $this->hash = md5('ID' . $this->id . ' ' . $this->content);
        }
        return parent::beforeSave($insert);
    }
}
