<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Customer $model */

$this->title = 'Create Customer';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

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
      
        
    </div>
   
</div>


    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>


