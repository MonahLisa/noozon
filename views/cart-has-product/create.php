<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CartHasProduct $model */

$this->title = 'Create Cart Has Product';
$this->params['breadcrumbs'][] = ['label' => 'Cart Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-has-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
