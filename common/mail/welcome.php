Hello, welcome to budget manager click the link below to active your account<br />
<?= \yii\helpers\Html::a(Yii::t('signup','Activate account'),[Yii::getAlias('@web').'/user/activateAccount',['token' => $model->auth_key]]); ?>