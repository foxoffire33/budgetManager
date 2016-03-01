<?php

namespace common\models;

use common\components\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "pot_user_relation".
 *
 * @property integer $user_id
 * @property integer $pot_id
 * @property integer $status
 * @property string $datetime_created
 * @property string $datetime_updated
 */
class PotUserRelation extends ActiveRecord
{

    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;
    const STATUS_RREQUEST_SEND = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pot_user_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //status validatetors
            [['status'],'default','value' => self::STATUS_ACTIVE],
            ['status','in','range' => [self::STATUS_ACTIVE,self::STATUS_INACTIVE,self::STATUS_RREQUEST_SEND]],
            //yii defualt
            [['user_id', 'pot_id', 'status'], 'required'],
            [['user_id', 'pot_id', 'status'], 'integer'],
            [['datetime_created', 'datetime_updated'], 'safe'],
            [['user_id', 'pot_id'], 'unique', 'targetAttribute' => ['user_id', 'pot_id'], 'message' => 'The combination of User ID and Pot ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('pot', 'User ID'),
            'pot_id' => Yii::t('pot', 'Pot ID'),
            'status' => Yii::t('pot', 'Status'),
            'datetime_created' => Yii::t('pot', 'Datetime Created'),
            'datetime_updated' => Yii::t('pot', 'Datetime Updated'),
        ];
    }
}
