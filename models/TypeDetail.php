<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TypeDetail".
 *
 * @property int $idTypeDetail
 * @property string $name
 *
 * @property Detail[] $details
 */
class TypeDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TypeDetail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTypeDetail' => 'Id Type Detail',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasMany(Detail::className(), ['TypeDetail_idTypeDetail' => 'idTypeDetail']);
    }

    public function getName()
    {
        return $this->name;
    }


}
