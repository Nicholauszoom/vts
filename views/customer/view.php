<?php

use app\models\Customer;
use app\models\Device;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Customer $model */

$company= Customer::findOne($model->id);
$this->title = $company->company;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
// Create breadcrumb trail with line breaks
$breadcrumbTrail = '';
if (!empty($this->params['breadcrumbs'])) {
    $breadcrumbTrail = implode('/', array_map(function($breadcrumb) {
        return is_array($breadcrumb) ? Html::encode($breadcrumb['label']) : Html::encode($breadcrumb);
    }, $this->params['breadcrumbs']));
}

?>

<div class="toolbar" id="kt_toolbar">
  
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
       
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
          
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                <?= Html::encode($this->title) ?>
              
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
               
                <small class="text-muted fs-7 fw-bold my-1 ms-1"><?= $breadcrumbTrail ?></small>
               
            </h1>
           
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">General</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Vehicle</button>
            <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" >More</button>
            </div>
           </nav>
      
        
    </div>
   
</div>

      <div class="container-fluid">
       <div class="tab-content" id="nav-tabContent">


  <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
       
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'email:email',
            'phone',
            'company',
            'address',
            'city',
            'state',
            'zip_code',
         

            [
                'attribute' => 'expired_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],


        ],
    ]) ?>

    </div>

    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">



<div class="vehicle-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Vehicle', ['vehicle/create', 'customerId' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $vehicle,
            'pagination' => false,
        ]),
        'columns' => [
            [
                'attribute' => 'plate_number',
                'label' => 'Vehicle Number',
                'value' => function ($vehicle) {
                    return $vehicle->plate_number;
                },
            ],
            [
                'label' => 'Device IMEI',
                'value' => function ($vehicle) {
                    $vehicle = Device::findOne($vehicle->device_id);
                    if ($vehicle !== null) {
                        return Html::encode($vehicle->IMEI);
                    } else {
                        return '<span class="text-muted">No Device</span>';
                    }
                },
                'format' => 'raw',
            ],

            [
                'attribute' => 'install_price',
                'label' => 'Install Price',
                'value' => function ($vehicle) {
                    return $vehicle->install_price;
                },
            ],

    
            [
                'attribute' => 'period_to_initial_pay',
                'label' => 'Period to Initial Pay',
                'value' => function ($vehicle) {
                    return $vehicle->period_to_initial_pay;
                },
            ],
            

            [
                'label' => 'Status',
                'value' => function ($vehicle) {
                    return getStatusLabel($vehicle->status);
                },
                'format' => 'raw',
            ],
            [
                'header' => 'Actions',
                'format' => 'raw',
                'value' => function ($vehicle) {
                    return $this->render('/vehicle/_action_dropdown', ['model' => $vehicle]);
                },
            ],
        ],
    ]); ?>
</div>
</div>

  </div>

  <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0"></div>
  </div>
</div>
</section>



<?php
   
   function getStatusLabel($status)
   {
       $statusLabels = [
           0 => '<span class="badge badge-secondary">Not set</span>',
           1 => '<span class="badge badge-success">Active</span>',
           2 => '<span class="badge badge-danger">Inactive</span>',
   
       ];
   
       return isset($statusLabels[$status]) ? $statusLabels[$status] : '';
   }
   
   function getStatusClass($status)
   {
       $statusClasses = [
          
           1 => 'status-active',
           2 => 'status-inactive',
       ];
   
       return isset($statusClasses[$status]) ? $statusClasses[$status] : '';
   }
   
   
      
      ?>


