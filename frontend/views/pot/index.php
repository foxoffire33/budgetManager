<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pot-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'budget:currency',
            'datetime_created',
            'datetime_updated',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
