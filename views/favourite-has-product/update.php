<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FavouriteHasProduct $model */

$this->title = 'Update Favourite Has Product: ' . $model->favourite_id;
$this->params['breadcrumbs'][] = ['label' => 'Favourite Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->favourite_id, 'url' => ['view', 'favourite_id' => $model->favourite_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favourite-has-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
