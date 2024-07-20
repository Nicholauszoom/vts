<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="dropdown">
    <button class="btn btn-sm btn-light btn-active-light-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Actions
    </button>
    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="<?= Url::to(['/vehicle/view', 'id' => $model->id]) ?>">View</a>
        </li>
        <li>
            <a class="dropdown-item" href="<?= Url::to(['/vehicle/update', 'id' => $model->id]) ?>">Edit</a>
        </li>
        <li>
            <a class="dropdown-item" href="<?= Url::to(['/vehicle/delete', 'id' => $model->id]) ?>" data-confirm="Are you sure you want to delete this item?" data-method="post">Delete</a>
        </li>
    </ul>
</div>