<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Distributer".
 *
 * @property int $idDistributer
 * @property string $nameCorporation
 * @property int $City_idCity
 *
 * @property Detail[] $details
 * @property City $cityIdCity
 */
class Distributer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Distributer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'City_idCity'], 'required'],
            [['City_idCity'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['City_idCity'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['City_idCity' => 'idCity']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDistributer' => 'Id Distributer',
            'name' => 'Название компании',
            'City_idCity' => 'Город',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasMany(Detail::className(), ['Distributer_idDistributer' => 'idDistributer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityIdCity()
    {
        return $this->hasOne(City::className(), ['idCity' => 'City_idCity']);
    }
    
    public function getNameCity()
    {
        $td=City::find()->all();
        foreach($td as $rec){
            $masName[$rec->idCity]=$rec->name;
        }
        return $masName;
    }
    
}
