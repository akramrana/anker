<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GiftClaims;

/**
 * GiftClaimSearch represents the model behind the search form of `app\models\GiftClaims`.
 */
class GiftClaimSearch extends GiftClaims
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gift_claim_id', 'is_deleted', 'is_contacted', 'is_processed'], 'integer'],
            [['first_name', 'last_name', 'email', 'phone', 'address_line_1', 'address_line_2', 'landmark', 'city', 'item_code', 'purchase_date', 'purchase_place', 'invoice_file', 'created_at'], 'safe'],
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
        $query = GiftClaims::find()->where(['is_deleted' => 0]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['gift_claim_id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'purchase_date' => $this->purchase_date,
            'is_contacted' => $this->is_contacted,
            'is_processed' => $this->is_processed,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address_line_1', $this->address_line_1])
            ->andFilterWhere(['like', 'address_line_2', $this->address_line_2])
            ->andFilterWhere(['like', 'landmark', $this->landmark])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'item_code', $this->item_code])
            ->andFilterWhere(['like', 'purchase_place', $this->purchase_place])
            ->andFilterWhere(['like', 'invoice_file', $this->invoice_file]);

        return $dataProvider;
    }
}
