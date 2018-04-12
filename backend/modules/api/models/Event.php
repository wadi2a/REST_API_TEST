<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property string $name
 * @property string $cookie_Id
 * @property string $referrer
 * @property string $createdAt
 */
class Event extends \yii\db\ActiveRecord
{   const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'referrer'], 'required'],
            
            [['name', 'referrer'], 'string', 'max' => 100],
        ];
    }
    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['create']=['name','cookie_id','referrer','createdAt'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'cookie_Id' => 'Cookie  ID',
            'referrer' => 'Referrer',
            'createdAt' => 'Created At',
        ];
    }
}
