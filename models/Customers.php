<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Customers".
 *
 * @property int $idCustomers
 * @property string $firstName
 * @property string $lastName
 * @property string $idDocument
 * @property int $City_idCity
 *
 * @property City $cityIdCity
 * @property Order[] $orders
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'idDocument', 'City_idCity'], 'required'],
            [['City_idCity'], 'integer'],
            [['firstName', 'lastName', 'idDocument'], 'string', 'max' => 45],
            [['City_idCity'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['City_idCity' => 'idCity']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCustomers' => 'Id Customers',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'idDocument' => 'Id Document',
            'City_idCity' => 'City Id City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityIdCity()
    {
        return $this->hasOne(City::className(), ['idCity' => 'City_idCity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['Customers_idCustomers' => 'idCustomers']);
    }
}
