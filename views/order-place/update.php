<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderPlace $model */

$this->title = 'Update Order Place: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-place-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
