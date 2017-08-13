<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;

?>
<div class="note-view">
    <div class="info-view col-md-4">
        <h1><?= $model->title; ?></h1>
        <h3><?= $model->text; ?></h3>

        <p class="buttons-view">
            <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <div class="img-for-view col-md-8">
        <div id="img_view">
            <?= Html::img('@web/uploads/' . $model->path_to_image) ?>
        </div>
    </div>
</div>
