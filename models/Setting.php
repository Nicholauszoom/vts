<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $company
 * @property string $website
 * @property string $email
 * @property string|null $phone
 * @property string|null $logo
 * @property string|null $address
 * @property string|null $state
 * @property string|null $zip_code
 * @property string $created_at
 * @property string $updated_at
 * 
 * @property string $install_price
 * @property string $maintenance_price
 * @property string $period_to_initial_pay
 * @property string $period_to_maintenance
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company', 'website', 'email'], 'required'],
            [['created_at', 'updated_at', 'logo'], 'safe'],
            [['company', 'website', 'state'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['address', 'install_price', 'maintenance_price', 'period_to_initial_pay', 'period_to_maintenance'], 'string', 'max' => 255],
            [['zip_code'], 'string', 'max' => 10],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company' => 'Company',
            'website' => 'Website',
            'email' => 'Email',
            'phone' => 'Phone',
            'logo' => 'Logo',
            'address' => 'Address',
            'state' => 'State',
            'zip_code' => 'Zip Code',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'install_price'=>'Install Price',
            'maintenance_price'=>'Maintenance Price',
            'period_to_initial_pay'=>'Period to Initial Pay',
            'period_to_maintenance'=> 'Period to Maintenance',
        ];
    }
}
