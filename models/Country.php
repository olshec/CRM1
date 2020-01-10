<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Country".
 *
 * @property int $idCountry
 * @property string $name
 * @property int $countPeople
 *
 * @property City[] $cities
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'countPeople'], 'required'],
            [['countPeople'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCountry' => 'Id Country',
            'name' => 'Название',
            'countPeople' => 'Население, млн',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['Country_idCountry' => 'idCountry']);
    }


    
}
