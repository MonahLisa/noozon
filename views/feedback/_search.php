<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FeedbackSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="feedback-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'advantages') ?>

    <?= $form->field($model, 'disadvantages') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'evalutation') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'likes') ?>

    <?php // echo $form->field($model, 'dislikes') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'product_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
