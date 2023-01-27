<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserOrder;

/**
 * UserOrderSearch represents the model behind the search form of `app\models\UserOrder`.
 */
class UserOrderSearch extends UserOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'delivery_type_id', 'total_discount', 'order_place_id', 'card_id', 'is_delivered'], 'integer'],
            [['total_cost'], 'number'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserOrder::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'delivery_type_id' => $this->delivery_type_id,
            'total_cost' => $this->total_cost,
            'total_discount' => $this->total_discount,
            'order_place_id' => $this->order_place_id,
            'card_id' => $this->card_id,
            'created_at' => $this->created_at,
            'is_delivered' => $this->is_delivered,
        ]);

        return $dataProvider;
    }
}
