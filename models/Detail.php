<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Detail".
 *
 * @property int $idDetail
 * @property string $name
 * @property int $cost
 * @property int $Distributer_idDistributer
 * @property int $TypeDetail_idTypeDetail
 *
 * @property Distributer $distributerIdDistributer
 * @property TypeDetail $typeDetailIdTypeDetail
 * @property Order[] $orders
 */
class Detail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'cost', 'Distributer_idDistributer', 'TypeDetail_idTypeDetail'], 'required'],
            [['cost', 'Distributer_idDistributer', 'TypeDetail_idTypeDetail'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['Distributer_idDistributer'], 'exist', 'skipOnError' => true, 'targetClass' => Distributer::className(), 'targetAttribute' => ['Distributer_idDistributer' => 'idDistributer']],
            [['TypeDetail_idTypeDetail'], 'exist', 'skipOnError' => true, 'targetClass' => TypeDetail::className(), 'targetAttribute' => ['TypeDetail_idTypeDetail' => 'idTypeDetail']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDetail' => 'Id Detail',
            'name' => 'Name',
            'cost' => 'Cost',
            'Distributer_idDistributer' => 'Distributer Id Distributer',
            'TypeDetail_idTypeDetail' => 'Type Detail Id Type Detail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributerIdDistributer()
    {
        return $this->hasOne(Distributer::className(), ['idDistributer' => 'Distributer_idDistributer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeDetailIdTypeDetail()
    {
        return $this->hasOne(TypeDetail::className(), ['idTypeDetail' => 'TypeDetail_idTypeDetail']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['Detail_idDetail' => 'idDetail']);
    }
}
