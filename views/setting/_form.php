<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Setting $model */
/** @var yii\widgets\ActiveForm $form */
?>
<section class="content">
      <div class="container-fluid">

<?php $form = ActiveForm::begin(); ?>

<div class="row g-3">
    <div class="col-md-6">
<?= $form->field($model, 'company')->label('Company Name * <small class="text-muted">eg.organization name</small>')->textInput() ?>
</div>
<div class="col-md-6">
<?= $form->field($model, 'email')->label('Company Email * <small class="text-muted">eg.tera@info.co.tz</small>')->textInput() ?>
</div>
</div>

<div class="row g-3">
    <div class="col-md-6">
<?= $form->field($model, 'website')->label('Web * <small class="text-muted">eg.System Name</small>')->textInput() ?>
</div>
<div class="col-md-6">
<?= $form->field($model, 'phone')->label('Company Phone * <small class="text-muted">eg.+255 67849..</small>')->textInput() ?>
</div>
</div>

<div class="row g-3">
    <div class="col-md-6">
<?= $form->field($model, 'address')->label('Company Address * <small class="text-muted">eg.Mbezi Beach</small>')->textInput() ?>
</div>
<div class="col-md-6">
<?= $form->field($model, 'zip_code')->label('Zip Code <small class="text-muted">(fill company location zip code eg.12019)</small>')->textInput() ?>
</div>
</div>

<div class="row g-3">
    <div class="col-md-6">
<?= $form->field($model, 'install_price')->label('Install Price * <small class="text-muted">eg.Tsh. 100,000</small>')->textInput() ?>
</div>
<div class="col-md-6">
<?= $form->field($model, 'maintenance_price')->label('Maintenance Price <small class="text-muted">eg. Tsh. 20,000</small>')->textInput() ?>
</div>

</div>


<div class="row g-3">
    <div class="col-md-6">
<?= $form->field($model, 'period_to_initial_pay')->label('Period to Initial Pay * <small class="text-muted">eg.4 month</small>')->textInput() ?>
</div>
<div class="col-md-6">
<?= $form->field($model, 'period_to_maintenance')->label('Period to Maintenance <small class="text-muted">eg.1 month</small>')->textInput() ?>
</div>
</div>


<div class="row g-3">
    <div class="col-md-6">
<?= $form->field($model, 'logo')->label('logo * <small class="text-muted">System logo</small>')->fileInput() ?>
</div>
</div>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
</section>

