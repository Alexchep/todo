<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use \yii\helpers\Url;

$this->title = 'My notes';
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

    <?php foreach($notes as $note): ?>
        <div class='note'>
            <h3><?php echo $note->title; ?></h3>
            <p><?php echo $note->text; ?></p>
            <span><b><?php echo $note->date_of_create; ?></b></span>
            <div class="control_buttons">
                <?= Html::a('<span class="glyphicon glyphicon-eye-open" id="view_note">', ['view', 'id' => $note->id]) ?>
                <?= Html::a('<span class="glyphicon glyphicon-edit" id="edit_note">', ['update', 'id' => $note->id]) ?>
                <?= Html::a('<span class="glyphicon glyphicon-trash" id="delete_note">', ['delete', 'id' => $note->id]) ?>
            </div>
        </div>
    <?php endforeach; ?>

</div>