<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserOrder $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'delivery_type_id')->textInput() ?>

    <?= $form->field($model, 'total_cost')->textInput() ?>

    <?= $form->field($model, 'total_discount')->textInput() ?>

    <?= $form->field($model, 'order_place_id')->textInput() ?>

    <?= $form->field($model, 'card_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'is_delivered')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
