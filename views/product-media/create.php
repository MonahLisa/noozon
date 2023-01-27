<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductMedia $model */

$this->title = 'Create Product Media';
$this->params['breadcrumbs'][] = ['label' => 'Product Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-media-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
