<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CustomerSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-search">


<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<?= $form->field($model, 'id') ?>

<?= $form->field($model, 'first_name') ?>

<?= $form->field($model, 'last_name') ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'phone') ?>

<?php echo $form->field($model, 'company') ?>

<?php // echo $form->field($model, 'address') ?>

<?php // echo $form->field($model, 'city') ?>

<?php // echo $form->field($model, 'state') ?>

<?php // echo $form->field($model, 'zip_code') ?>

<?php // echo $form->field($model, 'created_at') ?>

<?php // echo $form->field($model, 'updated_at') ?>

<?php // echo $form->field($model, 'created_by') ?>

<?php // echo $form->field($model, 'updated_by') ?>

<?php // echo $form->field($model, 'status') ?>

<div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
</div>

<?php ActiveForm::end(); ?>


</div>
