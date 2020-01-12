<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\City;

/**
 * CitySearch represents the model behind the search form of `app\models\City`.
 */
class CitySearch extends City
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCity', 'countPeople'], 'integer'],
            [['Country_idCountry'], 'string'],
            [['name'], 'safe'],
            [['square'], 'number'],
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
        $query = City::find();

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
            'idCity' => $this->idCity,
            'countPeople' => $this->countPeople,
            'square' => $this->square,
            //'Country_idCountry' => $this->Country_idCountry,
        ]);
        
        //find country
        if(isset($params['CitySearch'])){
            
            $nameCountry = trim($params['CitySearch']['Country_idCountry']);
            
            $country = (Country::find()->where([
                'name' => $nameCountry
            ])->one());
            
            if($country  !=null)
            {
                $idCountry = $country ->idCountry;
                $query->andFilterWhere(['Country_idCountry' => $idCountry]);
                
            }else if($nameCountry!=''){
                $query->andFilterWhere(['Country_idCountry' => -1]);
            }
        }
        
        

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
