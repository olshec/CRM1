<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form of `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idOrder', 'countDetail'], 'integer'],
            [['Customers_idCustomers', 'Detail_idDetail'], 'string'],
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
        $query = Order::find();

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
        
        
        
        
        if(isset($params['OrderSearch'])){
            //find customer name
            $firstAndLastNames = trim($params['OrderSearch']['Customers_idCustomers']);
            $arrayFirstAndLastNames = explode ( ' ', $firstAndLastNames ) ;
            
            $firstNameCustomer= $arrayFirstAndLastNames[0];
            
            $customers = (Customers::find()->where([
                'firstName' => $firstNameCustomer
            ])->one());
            
            if($customers !=null)
            {
                $idCustomer = $customers->idCustomers;
                $query->andFilterWhere(['Customers_idCustomers' => $idCustomer]);
                
            }else if($firstNameCustomer != ''){
                $query->andFilterWhere(['Customers_idCustomers' => -1]);
            }
            
            if(isset($arrayFirstAndLastNames[1]))
            {
                $lastNameCustomer = $arrayFirstAndLastNames[1];
                
                $customers = (Customers::find()->where([
                    'lastName' => $lastNameCustomer
                ])->one());
                
                if($customers !=null)
                {
                    $idCustomer = $customers->idCustomers;
                    $query->andFilterWhere(['Customers_idCustomers' => $idCustomer]);
                    
                }else if($lastNameCustomer!= ''){
                    $query->andFilterWhere(['Customers_idCustomers' => -1]);
                }
            }
            
            //find detail name
            $nameDetail = trim($params['OrderSearch']['Detail_idDetail']);
            
            $detail = (Detail::find()->where([
                'name' => $nameDetail
            ])->one());
            
            if($detail !=null)
            {
                $idDetail = $detail ->idDetail;
                $query->andFilterWhere(['Detail_idDetail' => $idDetail]);
                
            }else if($nameDetail!=''){
                $query->andFilterWhere(['Detail_idDetail' => -1]);
            }
           
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idOrder' => $this->idOrder,
            'countDetail' => $this->countDetail,
            //'Customers_idCustomers' => $this->Customers_idCustomers,
            //'Detail_idDetail' => $this->Detail_idDetail,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
