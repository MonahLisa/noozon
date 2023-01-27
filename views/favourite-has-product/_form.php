<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FavouriteHasProduct $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="favourite-has-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'favourite_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
