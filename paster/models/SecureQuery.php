<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Secure]].
 *
 * @see Secure
 */
class SecureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Secure[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Secure|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
