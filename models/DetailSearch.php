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
            //[['idDetail', 'cost', 'Distributer_idDistributer', 'TypeDetail_idTypeDetail'], 'integer'],
            [['idDetail', 'cost', ], 'integer'],
            [['Distributer_idDistributer', 'TypeDetail_idTypeDetail' ], 'string'],
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
            //'Distributer_idDistributer' => $this->Distributer_idDistributer,
            //'TypeDetail_idTypeDetail' => $this->TypeDetail_idTypeDetail,
        ]);

        
        if(isset($params['DetailSearch'])){
            //find type of detail
            $nameTypeDetail = trim($params['DetailSearch']['TypeDetail_idTypeDetail']);
            
            $typeDetail = (TypeDetail::find()->where([
                'name' => $nameTypeDetail
            ])->one());
            
            if($typeDetail !=null)
            {
                $idTypeDetail = $typeDetail->idTypeDetail;
                $query->andFilterWhere(['TypeDetail_idTypeDetail' => $idTypeDetail]);
                
            }else if($nameTypeDetail!=''){
                $query->andFilterWhere(['TypeDetail_idTypeDetail' => -1]);
            }
            
            
            //fint distributer name
            $nameDistributer = trim($params['DetailSearch']['Distributer_idDistributer']);
            
            $distributer = (Distributer::find()->where([
                'name' => $nameDistributer
            ])->one());
            
            if($distributer != null)
            {
                $idDistributer = $distributer->idDistributer;
                $query->andFilterWhere(['Distributer_idDistributer' => $idDistributer]);
            }
            else if($nameDistributer!=''){
                $query->andFilterWhere(['Distributer_idDistributer' => -1]);
            }
        }
        
        
        
        
        
        
        
        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
