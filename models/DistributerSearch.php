<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Distributer;

/**
 * DistributerSearch represents the model behind the search form of `app\models\Distributer`.
 */
class DistributerSearch extends Distributer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDistributer'], 'integer'],
            [['City_idCity'], 'string'],
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
        $query = Distributer::find();

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
        
        //find city name
        if(isset($params['DistributerSearch'])){
            $nameCity= trim($params['DistributerSearch']['City_idCity']);
            
            $city = (City::find()->where([
                'name' => $nameCity
            ])->one());
            
            if($city !=null)
            {
                $idCity = $city->idCity;
                $query->andFilterWhere(['City_idCity' => $idCity]);
                
            }else if($nameCity != ''){
                $query->andFilterWhere(['City_idCity' => -1]);
            }
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idDistributer' => $this->idDistributer,
            //'City_idCity' => $this->City_idCity,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
