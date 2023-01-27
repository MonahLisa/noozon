<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CartHasProduct $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cart-has-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cart_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
