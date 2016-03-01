<?php

namespace common\models;

use common\components\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "pot_item".
 *
 * @property integer $id
 * @property integer $pot_id
 * @property string $date
 * @property string $title
 * @property double $price
 * @property double $amount
 * @property string $datetime_created
 * @property string $datetime_updated
 *
 * @property Pot $pot
 */
class PotItem extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pot_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pot_id', 'date', 'title', 'price', 'amount'], 'required'],
            [['pot_id'], 'integer'],
            [['date', 'datetime_created', 'datetime_updated'], 'safe'],
            [['price', 'amount'], 'number'],
            [['title'], 'string', 'max' => 128],
            //date
            ['date','date','format' => 'dd-MM-yyyy']
        ];
    }

    public function beforeSave($insert)
    {
        $this->date = Yii::$app->formatter->asDate($this->date,'yyyy-MM-dd');
        $this->user_id = Yii::$app->user->identity->id;
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('pot', 'ID'),
            'pot_id' => Yii::t('pot', 'Pot ID'),
            'date' => Yii::t('pot', 'Date'),
            'title' => Yii::t('pot', 'Title'),
            'price' => Yii::t('pot', 'Price'),
            'amount' => Yii::t('pot', 'Amount'),
            'datetime_created' => Yii::t('pot', 'Datetime Created'),
            'datetime_updated' => Yii::t('pot', 'Datetime Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPot()
    {
        return $this->hasOne(Pot::className(), ['id' => 'pot_id']);
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }

}
