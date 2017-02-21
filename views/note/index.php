<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use \yii\helpers\Url;
use \yii\widgets\Pjax;

$this->title = 'My notes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notes-index">

    <h1>Notes</h1>

    <p>
        <?= Html::button('Add note', ['value' => Url::to('create'), 'class' => 'btn btn-success', 'id' => 'note-button']) ?>
    </p>

    <?php
    Modal::begin([
        'id' => 'modal-note',
        'header' => '<h2>Add note</h2>',
        'size' => 'modal-md',
        'closeButton' => [
            'label' => 'Close',
            'class' => 'btn btn-default btn-sm pull-right',
            'id' => 'close-modal-note',
        ],
    ]);
    echo "<div id='createNote'></div>";
    Modal::end();
    ?>

    <?php Pjax::begin(['enablePushState' => false]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'text',
            [
                'label' => 'Image',
                'attribute' => 'path_to_pic',
                'value' => function($data){
                    return Html::img(Url::toRoute('@web/uploads/'. $data->path_to_image),[
                        'alt' => $data->title,
                        'style' => 'width: 50px; height: 50px'
                    ]);
                },
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end() ?>

</div>