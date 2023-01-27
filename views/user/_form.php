<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'city_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'currency_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'cart_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
