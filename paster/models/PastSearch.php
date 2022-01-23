<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Exception;

class PastSearch extends Past
{
    /**
     * @var integer поиск по автору
     */
    public $authorID = null;

    /**
     * @var integer поиск времени создания
     */
    public $create_at = null;

    /**
     * @var integer поиск по ID
     */
    public $id = null;

    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
            [['create_at', 'author_id'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @throws Exception
     */
    public function search($params)
    {
        $query = Past::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'create_at' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            throw new Exception('Ошибка поиска');
        }

        // изменяем запрос добавляя в его фильтрацию
        $query->andFilterWhere(['author_id' => $this->authorID]);

        /**
         * Обязательная фильтрация на 'Открытые' записи
         */
        $query->andFilterWhere(['is_active' => TRUE]);

        return $dataProvider;
    }
}