<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Company $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control form-control-lg', 'placeholder' => 'Название'])->label(''); ?>

    <?= $form->field($model, 'tax_number')->textInput(['class' => 'form-control form-control-lg', 'placeholder' => 'Налоговый номер'])->label(''); ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true, 'type'=>'file', 'placeholder' => 'Фото'])->label('Добавьте фото'); ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'created_by')->textInput() ?>


    <?= $form->field($model, 'manager_list_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\ManagerList::find()->all(), 'id', 'manager_id')))->label(''); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
