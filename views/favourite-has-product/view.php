<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\FavouriteHasProduct $model */

$this->title = $model->favourite_id;
$this->params['breadcrumbs'][] = ['label' => 'Favourite Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="favourite-has-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'favourite_id' => $model->favourite_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'favourite_id' => $model->favourite_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'favourite_id',
            'product_id',
        ],
    ]) ?>

</div>
