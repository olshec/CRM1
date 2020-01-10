<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "City".
 *
 * @property int $idCity
 * @property string $name
 * @property int $countPeople
 * @property double $square
 * @property int $Country_idCountry
 *
 * @property Country $countryIdCountry
 * @property Customers[] $customers
 * @property Distributer[] $distributers
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'City';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'countPeople', 'square', 'Country_idCountry'], 'required'],
            [['countPeople', 'Country_idCountry'], 'integer'],
            [['square'], 'number'],
            [['name'], 'string', 'max' => 45],
            [['Country_idCountry'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['Country_idCountry' => 'idCountry']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCity' => 'Id City',
            'name' => 'Название',
            'countPeople' => 'Население, млн',
            'square' => 'Площадь',
            'Country_idCountry' => 'Страна',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryIdCountry()
    {
        return $this->hasOne(Country::className(), ['idCountry' => 'Country_idCountry']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customers::className(), ['City_idCity' => 'idCity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributers()
    {
        return $this->hasMany(Distributer::className(), ['City_idCity' => 'idCity']);
    }
    
    public function getCountries()
    {
        $td=Country::find()->all();
        foreach($td as $rec){
            $masName[$rec->idCountry]=$rec->name;
        }
        return $masName;
    }
    
    
}
