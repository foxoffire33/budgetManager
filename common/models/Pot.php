<?php

namespace common\models;

use common\components\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "pot".
 *
 * @property integer $id
 * @property string $title
 * @property double $budget
 * @property string $datetime_created
 * @property string $datetime_updated
 */
class Pot extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['budget'], 'number'],
            [['datetime_created', 'datetime_updated'], 'safe'],
            [['title'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('pot', 'ID'),
            'title' => Yii::t('pot', 'Title'),
            'budget' => Yii::t('pot', 'Budget'),
            'datetime_created' => Yii::t('pot', 'Datetime Created'),
            'datetime_updated' => Yii::t('pot', 'Datetime Updated'),
        ];
    }

    public function getPotItems()
    {
        return $this->hasMany(PotItem::className(), ['pot_id' => 'id']);
    }
}
