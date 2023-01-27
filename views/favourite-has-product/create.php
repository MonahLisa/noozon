<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FavouriteHasProduct $model */

$this->title = 'Create Favourite Has Product';
$this->params['breadcrumbs'][] = ['label' => 'Favourite Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favourite-has-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
