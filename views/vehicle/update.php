<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vehicle $model */

$this->title = 'Update Vehicle: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'customer'=>$customer,
        'device'=>$device,
        'customerId'=>$customerId,

    ]) ?>


