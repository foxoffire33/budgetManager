<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pot */

$this->title = 'Create Pot';
$this->params['breadcrumbs'][] = ['label' => 'Pots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
