<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MediaType $model */

$this->title = 'Create Media Type';
$this->params['breadcrumbs'][] = ['label' => 'Media Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
