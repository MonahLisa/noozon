<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FeedbackMedia $model */

$this->title = 'Update Feedback Media: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Feedback Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feedback-media-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
