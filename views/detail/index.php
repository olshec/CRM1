<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Детали';
//$this->params['breadcrumbs'] = null;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить деталь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= 
    
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idDetail',
            'name',
            'cost',
            'Distributer_idDistributer',
            'TypeDetail_idTypeDetail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    
//     $mod=$dataProvider->getModels()[4];
//     $mod['TypeDetail_idTypeDetail']=1000;
//     $dataProvider->getModels()[4]['TypeDetail_idTypeDetail']=1000;
    
//     print_r($mod['TypeDetail_idTypeDetail']);die();
//     $dataProvider->getModels();
//     $dataProvider->getKeys();

    
    
    ?>


</div>
