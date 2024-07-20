<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $brand
 * @property string $IMEI
 * @property int $created_at
 * @property int $updated_at
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    public function behaviors(){
        return [
            TimestampBehavior::class,
            [
                'class'=>BlameableBehavior::class,
                'updatedByAttribute'=>false,
            ],
            
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand', 'IMEI'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['brand', 'IMEI'], 'string', 'max' => 50],
            [['files'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Model',
            'IMEI' => 'ID',
            'files'=>'Files',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
