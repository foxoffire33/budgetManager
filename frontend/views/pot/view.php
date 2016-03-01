<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Pot */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pot-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'budget:currency',
            'datetime_created',
            'datetime_updated',
        ],
    ]) ?>


    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-9">
                <?= GridView::widget([
                    'dataProvider' => new ArrayDataProvider(['allModels' => $model->potItems]),
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'date:date',
                        'title',
                        'price:currency',
                        'amount',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'urlCreator' => function ($action, $model, $key, $index) {
                                return Url::toRoute(['/pot-item/'.$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
            <div class="col-sm-3">
                <?php $form = ActiveForm::begin(['action' => '/pot-item/create']); ?>
                <?php $potItem = new \common\models\PotItem(); ?>
                <?= $form->field($potItem, 'pot_id')->hiddenInput(['value' => $model->id])->label(false) ?>
                <div class="row">
                    <?= $form->field($potItem, 'title')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('title')])->label(false) ?>
                    <?= $form->field($potItem, 'date')->widget(\kartik\date\DatePicker::classname(), ['options' => ['value' => date('d-m-Y')], 'pluginOptions' => ['autoclose' => true]])->label(false); ?>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <?= $form->field($potItem, 'price')->textInput(['placeholder' => $model->getAttributeLabel('price')])->label(false) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($potItem, 'amount')->textInput(['value' => 1])->label(false) ?>
                    </div>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-success']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
