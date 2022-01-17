<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string|null $nickname
 *
 * @property Past[] $pasts
// * @property Secure[] $secures
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $authKey;
    public $accessToken;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'string', 'max' => 255],
            [['nickname'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'nickname' => 'Nickname',
        ];
    }

    /**
     * Gets query for [[Pasts]].
     *
     * @return \yii\db\ActiveQuery|PastsQuery
     */
    public function getPasts()
    {
        return $this->hasMany(Past::class, ['author_id' => 'id']);
    }

    /**
     * Gets query for [[Secures]].
     *
     * @return \yii\db\ActiveQuery|SecureQuery
     */
    public function getPassword()
    {
        return $this->hasOne(Secure::class, ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        if ($user = User::find()->where(['email' => $email])->one()) {
            return $user;
        }

        return null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $secure = Secure::findOne(['id' => $this->id]);
        return $secure->getAttribute('pass') === $password;
    }

    public static function findIdentity($id)
    {
        return User::find()->where(['id' => $id])->one();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return '__authKey';
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }
}
