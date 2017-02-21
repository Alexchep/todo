<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-view">

    <h1><?= $this->title = 'Note: ' . $model->id; ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'text',
            [
                'label' => 'Image',
                'value' => '@web/uploads/'. $model->path_to_image,
                'format' => 'image',
                'contentOptions' => ['class' => 'view-img'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
        ],
    ]) ?>

</div>
