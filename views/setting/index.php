<?php

use app\models\Setting;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;

$model=Setting::find()->all();
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

     

        <?php foreach($model as $model):?>
<section style="background-color: #eee;">
  <div class="container py-5">
   

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
            
          <div class="card-body text-center">
            <?php
              $fileName = $model->logo;
              $filePath = Yii::getAlias('@webroot/upload/' . $fileName);
              $downloadPath = Yii::getAlias('@web/upload/' . $fileName);
            ?>
            <img src=<?=$downloadPath?> alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?=$model->logo?></h5>
          <p class="text-muted mb-1"></p>
      
          <p class="text-muted mb-1"></p>
        
           
            <p class="text-muted mb-4"></p>
          
          </div>
        </div>
      
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Company Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->company?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Organization Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->email?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Default Password</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->zip_code?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Organization Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->phone?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Company Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->address?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Web</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->website?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Install Price</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->install_price?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Maintenance Price</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->maintenance_price?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Period Until initial pay</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->period_to_initial_pay?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Period to Maintenance</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$model->period_to_maintenance?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Created Date</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=Yii::$app->formatter->asDatetime($model->created_at)?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Updated Date</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=Yii::$app->formatter->asDatetime($model->updated_at)?></p>
              </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-sm-9">
            

              <?php if ($model->id!==null):?>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span><span style="color:blue;">  Edit Setting </span>', ['update', 'id'=> $model->id], [
                    'title' => 'edit',
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]) ?>
              <div style="color:red; margin:5px;">
              <?= Html::a('<span class="glyphicon glyphicon-trash"></span><span>  delete Setting </span>', ['delete','id'=>$model->id], [
                    'title' => 'delete',
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]) ?>
              </div>
    
               <?php endif; ?>
               

            </div>
            </div>
          </div>
        </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
<?php endforeach;?>
<?php if ($model==null):?>
<?= Html::a('<span class="glyphicon glyphicon-plus"></span><span style="color:blue;">  New Setting </span>', ['create'], [
                    'title' => 'create',
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]) ?>
    <?php endif; ?>
             
  
