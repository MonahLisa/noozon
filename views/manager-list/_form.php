<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ManagerList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="manager-list-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'id')->textInput() ?>

<!--    --><?//= $form->field($model, 'manager_id')->textInput() ?>
    <?= $form->field($model, 'manager_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'login')))->label(''); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
