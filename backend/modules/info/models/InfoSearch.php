<?php

namespace backend\modules\info\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Info;

/**
 * InfoSearch represents the model behind the search form of `common\models\Info`.
 */
class InfoSearch extends Info
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['email', 'phone', 'info', 'currencies', 'title', 'text_terms'], 'safe'],
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
        $query = Info::find();

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
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'currencies', $this->currencies])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text_terms', $this->text_terms]);

        return $dataProvider;
    }
}
