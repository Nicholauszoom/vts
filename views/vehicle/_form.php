<?php

use app\models\Setting;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Vehicle $model */
/** @var yii\widgets\ActiveForm $form */

$setting= Setting::findOne(1);
$model->status = 1;
?>

<section class="content">
      <div class="container-fluid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row g-3">
    <div class="col-md-6">
    <?= $form->field($model, 'plate_number')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
    <?php echo $form->field($model, 'device_id', [
    'template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'></span></div>\n{error}"
])->dropDownList([
    'data' => ArrayHelper::map($devicesNotInVehicles, 'id', 'IMEI'),
    'options' => [
        'placeholder' => 'Select Device',
        'options' => [
            $model->customer_id => ['selected' => true]
        ],
    ],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]); ?>

    </div>
    </div>
    <div class="row g-3">
    <div class="col-md-6">
<?= $form->field($model, 'install_price')->label('Install Price * <small class="text-muted">eg.Tsh. 100,000</small>')->textInput(['value' => $setting->install_price]) ?>
</div>
<div class="col-md-6">
<?= $form->field($model, 'maintenance_price')->label('Maintenance Price <small class="text-muted">eg. Tsh. 20,000</small>')->textInput(['value' => $setting->maintenance_price]) ?>
</div>

</div>


<div class="row g-3">
    <div class="col-md-4">
<?= $form->field($model, 'period_to_initial_pay')->label('Period to Initial Pay * <small class="text-muted">eg.4 month</small>')->textInput(['value' => $setting->period_to_initial_pay]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'period_to_maintenance')
    ->label('Period to Maintenance <small class="text-muted">eg.1 month</small>')
    ->textInput(['value' => $setting->period_to_maintenance]) ?>
</div>
<div class="col-md-4">
    
<?= $form->field($model, 'status' , ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'></span></div>\n{error}"])->dropDownList(
    [
        1 => 'Active',
        2 => 'Inactive',
        
    ],
    ['prompt' => 'Select Status',
    $model->status => ['selected' => true]
    ]
); ?>
</div>
</div>
<?= $form->field($model, 'customer_id')->hiddenInput(['value' => $customerId->id])->label(false) ?>


    <div class="form-group my-5">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</section>

