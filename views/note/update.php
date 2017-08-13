<?php

use yii\helpers\Html;

?>
<div class="note-update">

    <h1 class="text-center"><?php echo $this->title = 'Редактировать заметку: ' . $model->title ?></h1>;

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
