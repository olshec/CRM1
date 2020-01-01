<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detail;

/**
 * DetailSearch represents the model behind the search form of `app\models\Detail`.
 */
class DetailSearch extends Detail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDetail', 'cost', 'Distributer_idDistributer', 'TypeDetail_idTypeDetail'], 'integer'],
            [['name'], 'safe'],
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
        $query = Detail::find();

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
            'idDetail' => $this->idDetail,
            'cost' => $this->cost,
            'Distributer_idDistributer' => $this->Distributer_idDistributer,
            'TypeDetail_idTypeDetail' => $this->TypeDetail_idTypeDetail,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        
        //$name=$query->name;

        return $dataProvider;
    }
}
