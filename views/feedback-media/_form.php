<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FeedbackMedia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="feedback-media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'media_type_id')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'feedback_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
