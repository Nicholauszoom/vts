<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Device $model */
/** @var yii\widgets\ActiveForm $form */
?>


       <section class="content">
            <div class="container-fluid">
                <div class="item-wrapper one">
                    <div class="item">
                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'myAwesomeDropzone', 'class' => 'dropzone', 'data-plugin' => 'dropzone', 'data-previews-container' => '#file-previews', 'data-upload-preview-template' => '#uploadPreviewTemplate']]); ?>
                        
                        <div class="item-inner">
            <div class="item-content">
                <div class="dz-message needsclick text-center d-flex flex-column align-items-center justify-content-center">
                    <div>
                        <?= $form->field($model, 'files')->fileInput(['maxlength' => true])->label('<small class="text-muted">Select exel/csv file</small>') ?>
                    </div>
                    <div>
                        <span class="text-muted font-13">(Select the exel/csv file to be uploaded contain <strong>devices</strong> list details)</span>
                        <span class="text-muted font-13"> <?= Html::a('download exel template', Url::to('@web/files/template.xlsx')) ?></span>

                    </div>
                </div>
            </div>
        </div>


                <div class="form-group text-center mt-3">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-lg']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div><!--item-->
        </div><!--item-wrapper-->

        <!-- Preview -->
        <div class="dropzone-previews mt-3" id="file-previews"></div>

        <!-- file preview template -->
        <div class="d-none" id="uploadPreviewTemplate">
            <div class="card mt-1 mb-0 shadow-none border">
                <div class="p-2">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                        </div>
                        <div class="col ps-0">
                            <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                            <p class="mb-0" data-dz-size></p>
                        </div>
                        <div class="col-auto">
                            <!-- Button -->
                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                <i class="ri-close-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!--container-fluid-->
</section>

<style>
    .dplay-tbl {
        display: table;
        width: 100%;
        height: 100%;
    }
    .dplay-tbl-cell {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }
    .dz-message {
        display: table;
        width: 100%;
        height: 300px;
        border: 2px dashed #ddd;
        border-radius: 10px;
        margin-bottom: 20px;
        padding: 20px;
    }
    .dz-message i {
        font-size: 48px;
    }
    .dz-message h3 {
        margin-top: 20px;
    }
    .form-group.text-center {
        margin-top: 20px;
    }
    .btn-primary {
        padding: 10px 20px;
        font-size: 16px;
    }
</style>
