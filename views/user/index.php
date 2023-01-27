<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Найти пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>


<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'login',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
//            //'city_id',
//            //'currency_id',
//            //'cart_id',
//            //'email:email',
//            //'phone',
//            //'status',
//            //'created_at',
//            //'updated_at',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, User $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
//        ],
//    ]); ?>


</div>
