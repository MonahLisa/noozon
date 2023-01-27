<?php

use app\models\FavouriteHasProduct;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FavouriteHasProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Favourite Has Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favourite-has-product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Favourite Has Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'favourite_id',
            'product_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FavouriteHasProduct $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'favourite_id' => $model->favourite_id]);
                 }
            ],
        ],
    ]); ?>


</div>
