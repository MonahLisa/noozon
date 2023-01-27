<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ManagerList $model */

$this->title = 'Create Manager List';
$this->params['breadcrumbs'][] = ['label' => 'Manager Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
