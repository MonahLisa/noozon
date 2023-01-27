<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FeedbackMedia $model */

$this->title = 'Create Feedback Media';
$this->params['breadcrumbs'][] = ['label' => 'Feedback Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-media-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
