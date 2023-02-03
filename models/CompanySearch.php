<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Company;

/**
 * CompanySearch represents the model behind the search form of `app\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tax_number', 'created_by', 'manager_list_id', 'price', 'is_discounted'], 'integer'],
            [['name', 'photo', 'created_at', 'updated_at'], 'safe'],
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
//        $query = Company::find();
        $query = Product::find();
        $query->joinWith("company");

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
                'company_id'=> [
                    'asc' => ['company.name' =>SORT_ASC],
                    'desc' => ['company.name' =>SORT_DESC],
                    'default' =>SORT_ASC
                ],
                'created_at',
                'price',
                'category_id',
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
            'tax_number' => $this->tax_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'manager_list_id' => $this->manager_list_id,
            'price' => $this->price,
            'is_discounted' => $this->is_discounted,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
