<?php

use app\models\Customer;
use app\models\CustomLinkPager;
use app\models\Vehicle;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\data\Pagination;

/** @var yii\web\View $this */
/** @var $searchModel app\models\CustomerSearch */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Customer';

$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = $this->title;


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
      
    </div>
   
</div>
    <section class="content">
        <div class="container-fluid">

            <p>
                <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
           
         
                            <?php
                            $model = Customer::find()->all();
                            $dataProvider = new \yii\data\ArrayDataProvider([
                                'allModels' => $model,
                                'pagination' => [
                                    'pageSize' => 6, // Adjust the page size as needed
                                ],
                            ]);
                            ?>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,

                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'company',
                                    'email:email',
                                    'phone',
                                    [
                                        'label' => 'Vehicle', // Column header text
                                        'value' => function ($model) {
                                            $vehicleCount = Vehicle::find()->where(['customer_id' => $model->id])->count();
                                            return $vehicleCount;
                                        },
                                    ],

                                    [
                                        'attribute' => 'status',
                                        'value' => function ($model) {
                                            return getStatusLabel($model->status);
                                        },
                                        'format' => 'raw',
                                        'contentOptions' => function ($model) {
                                            return ['class' => getStatusClass($model->status)];
                                        },
                                    ],

                                    [
                                        'header' => 'Actions',
                                        'format' => 'raw',
                                        'value' => function ($model) {
                                            return $this->render('_action_dropdown', ['model' => $model]);
                                        },
                                    ],
                                    
                                ],

                            ]); ?>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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
    