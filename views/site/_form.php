<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="main-note-form">

    <?php $form = ActiveForm::begin(['method' => 'post', 'id' => 'main-note-form']); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'text')->textarea(['maxlength' => true]) ?>
        <?= $form->field($model, 'path_to_image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>