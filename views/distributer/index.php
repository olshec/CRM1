<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DistributerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Distributers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Distributer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDistributer',
            'nameCorporation',
            'City_idCity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
