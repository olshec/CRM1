<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customers;

/**
 * CustomersSearch represents the model behind the search form of `app\models\Customers`.
 */
class CustomersSearch extends Customers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCustomers'], 'integer'],
            [['City_idCity'], 'string'],
            [['firstName', 'lastName', 'idDocument'], 'safe'],
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
        $query = Customers::find();

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
            'idCustomers' => $this->idCustomers,
            //'City_idCity' => $this->City_idCity,
        ]);
        
        //find city name
        if(isset($params['CustomersSearch'])){
            $nameCity= trim($params['CustomersSearch']['City_idCity']);
            
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
        

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'idDocument', $this->idDocument]);

        return $dataProvider;
    }
}
