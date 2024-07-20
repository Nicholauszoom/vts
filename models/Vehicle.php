<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "vehicle".
 *
 * @property int $id
 * @property string $plate_number
 * @property string $payment
 * @property int $customer_id
 * @property int $status
 * @property int $device_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $install_price
 * @property string $maintenance_price
 * @property string $period_to_initial_pay
 * @property string $period_to_maintenance
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plate_number', 'customer_id'], 'required'],
            [['customer_id','device_id', 'status', 'period_to_initial_pay', 'period_to_maintenance'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['plate_number', 'install_price', 'maintenance_price'], 'string', 'max' => 50],
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plate_number' => 'Plate Number',
            'customer_id' => 'Customer',
            'device_id' => 'Device',
            'status' => 'Status',
            'install_price'=>'Install Price',
            'maintenance_price'=>'Maintenance Price',
            'period_to_initial_pay'=>'Period to Initial Pay',
            'period_to_maintenance'=> 'Period to Maintenance',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            
        ];
    }
}
