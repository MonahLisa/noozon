<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserHasOrder $model */

$this->title = 'Create User Has Order';
$this->params['breadcrumbs'][] = ['label' => 'User Has Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-has-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
