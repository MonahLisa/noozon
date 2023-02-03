<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * CategorySearch represents the model behind the search form of `app\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'p_id', 'price', 'is_discounted'], 'integer'],
            [['title', 'created_at','category_id'], 'safe'],

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
//        $query = Category::find();
        $query = Product::find();

        $query->joinWith("category");

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $dataProvider->setSort([
            'attributes' => [
//                'id',
                'title',
                'description',
                'discount',
                'is_discounted',
                'company_id',
                'created_at',
                'price',
                'category_id' => [
                    'asc' => ['category.title' =>SORT_ASC],
                    'desc' => ['category.title' =>SORT_DESC],
                    'default' =>SORT_ASC
                ],
            ]
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'p_id' => $this->p_id,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'is_discounted' => $this->is_discounted,
        ]);
        $query
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'category.title', $this->category_id])
        ;

//        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
