<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'description:ntext',
            'discount',

            [
                'attribute' => 'is_discounted',
                'value' => function ($model) {
                    return $model->is_discounted ? 'Да' : 'Нет';
                },
                'filter' => [1 => "Да", 0 => "Нет"]
            ],
            //'specifications:ntext',
            //'way_to_use:ntext',
//            'rating',
     
//            [
//                'attribute' => 'company_id',
//                'value' => function ($model) {
//                    return $model->company->name;
//                },
//            ],
            [
                'attribute' => 'company_id',
                'value' => function ($model) {
                    return Html::a($model->company->name, Url::to(['product/view', 'id' => $model->id]));
                },
                'format' => 'html',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d.m.Y']
            ],

            //'updated_at',
            //'created_by',
            'price',
            //'new_price',
//            [
//                'attribute' => 'category_id',
//                'value' => function ($model) {
//                    return $model->category->title;
//                },
//            ],

            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return Html::a($model->category->title, Url::to(['product/view', 'id' => $model->id]));
                },
                'format' => 'html',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'title')
            ],


            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
