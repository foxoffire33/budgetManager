<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Pot;

/* @var $this yii\web\View */
/* @var $model common\models\PotItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pot-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pot_id')->dropDownList(ArrayHelper::map(Pot::find()->asArray()->all(),'id','title')) ?>

    <?= $form->field($model, 'date')->widget(\kartik\date\DatePicker::classname(), [
        'options' => ['value' => ($model->isNewRecord ? date('d-m-Y') : $model->date)],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
