<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PotitemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pot Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pot-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pot Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'pot_id' => [
                'attribute' => 'pot_id',
                'value' => function($data){
                    return $data->pot->title;
                },
            ],
            'date:date',
            'title',
            'price:currency',
             'amount',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
