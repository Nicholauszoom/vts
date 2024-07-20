<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;




/** @var yii\web\View $this */
/** @var app\models\Customer $model */
/** @var yii\widgets\ActiveForm $form */

?>

<section class="content">
      <div class="container-fluid">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row g-3">
    <div class="col-md-6">
        <?= $form->field($model, 'first_name', ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'><i class=''></i></span></div>\n{error}"])->label('first name * <small class="text-muted">eg. Fredy</small>')->textInput(['maxlength' => true, 'placeholder'=>''])?>
    </div>
   
    <div class="col-md-6">
        <?= $form->field($model, 'last_name', ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'><i class=''></i></span></div>\n{error}"])->label('last name * <small class="text-muted">eg. Mushi</small>')->textInput(['maxlength' => true,'placeholder'=>''])?>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <?= $form->field($model, 'email', ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'><i class=''></i></span></div>\n{error}"])->label('email * <small class="text-muted">eg. company@gmail.com</small>')->textInput(['maxlength' => true, 'placeholder'=>''])?>
    </div>
   
    <div class="col-md-4">
    <?= $form->field($model, 'phone')->textInput(['maxlength' => 10])->label('phone * <small class="text-muted">eg. +2556 XXXXXXX</small>') ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'company', ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'><i class=''></i></span></div>\n{error}"])->label('company * <small class="text-muted"> Fill company name</small>')->textInput(['maxlength' => true,'placeholder'=>''])?>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <?= $form->field($model, 'address', ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'><i class=''></i></span></div>\n{error}"])->label('address  <small class="text-muted">eg. 123 Main Street, Country</small>')->textInput(['maxlength' => true, 'placeholder'=>''])?>
    </div>
   
    <div class="col-md-6">
        <?= $form->field($model, 'city', ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'><i class=''></i></span></div>\n{error}"])->label('city * <small class="text-muted">eg. Dar es salaam</small>')->textInput(['maxlength' => true,'placeholder'=>''])?>
    </div>

</div>

<div class="row g-3">
    <div class="col-md-4">
        <?= $form->field($model, 'state', ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'><i class=''></i></span></div>\n{error}"])->label('state * <small class="text-muted">eg. United Republic Of Tanzania</small>')->textInput(['maxlength' => true, 'placeholder'=>''])?>
    </div>
   
    <div class="col-md-4">
        <?= $form->field($model, 'zip_code', ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'><i class=''></i></span></div>\n{error}"])->label('zip code  <small class="text-muted"> Fill regional zip code</small>')->textInput(['maxlength' => true,'placeholder'=>''])?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'status' , ['template' => "{label}\n<div class='input-group'>{input}\n<span class='input-group-addon'><i class=''></i></span></div>\n{error}"])->dropDownList(
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
<div class="form-group py-5">
    <?= Html::submitButton('Submit', [
        'class' => 'btn btn-primary',
        'id' => 'submitBtn',
        'data-loading-text' => 'Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>',
    ]) ?>
</div>

    <?php ActiveForm::end(); ?>

</div>
</select>