<?php

use yii\helpers\Html;

?>
<div class="site-index">

    <div id="alert-div" class="alert alert-success"></div>

    <h1>Maybe you want to create a quick note? :)</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>