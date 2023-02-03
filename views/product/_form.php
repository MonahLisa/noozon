<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\jui;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'autofocus' => true, 'class' => 'form-control form-control-lg', 'placeholder' => 'Название'])->label(''); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'class' => 'form-control form-control-lg', 'placeholder' => 'Описание'])->label(''); ?>

    <?= $form->field($model, 'discount')->textInput(['class' => 'form-control form-control-lg', 'placeholder' => 'Размер скидки'])->label(''); ?>

    <?= $form->field($model, 'is_discounted')->checkbox()?>

    <?= $form->field($model, 'specifications')->textarea(['rows' => 6, 'class' => 'form-control form-control-lg', 'placeholder' => 'Характеристики'])->label(''); ?>

    <?= $form->field($model, 'way_to_use')->textarea(['rows' => 6, 'class' => 'form-control form-control-lg', 'placeholder' => 'Инструкция по использованию'])->label(''); ?>

<!--    --><?//= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'company_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(), 'id', 'name')))->label(''); ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>
<!--    --><?//= $form->field($model, 'created_at')->widget(\yii\jui\DatePicker::className(), [
//        'options' => ['class' => 'form-control'],
//        'dateFormat' => 'yyyy-MM-dd',
//    ]) ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->widget(\yii\jui\DatePicker::className(), [
//        'options' => ['class' => 'form-control'],
//        'dateFormat' => 'yyyy-MM-dd',
//    ]) ?>

<!--    --><?//= $form->field($model, 'created_by')->textInput() ?>

<!--    --><?//= $form->field($model, 'created_by')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'first_name')))?>

    <?= $form->field($model, 'price')->textInput(['class' => 'form-control form-control-lg', 'placeholder' => 'Цена'])->label(''); ?>

<!--    --><?//= $form->field($model, 'new_price')->textInput(['class' => 'form-control form-control-lg', 'placeholder' => 'Новая цена'])->label(''); ?>

    <?= $form->field($model, 'category_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'title')))->label(''); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
