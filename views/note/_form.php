<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="note-form">

    <?php $form = ActiveForm::begin(['method' => 'post', 'id' => 'note-form']); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'text')->textarea(['maxlength' => true]) ?>
        <?= $form->field($model, 'path_to_image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>