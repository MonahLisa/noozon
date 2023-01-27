<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderPlace $model */

$this->title = 'Create Order Place';
$this->params['breadcrumbs'][] = ['label' => 'Order Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-place-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
