<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'login')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg', 'placeholder' => 'Логин'])->label(''); ?>
            <?= $form->field($model, 'email')->textInput(['class' => 'form-control form-control-lg', 'type' => 'email', 'placeholder' => 'Почта'])->label(''); ?>
            <?= $form->field($model, 'phone')->textInput(['class' => 'form-control form-control-lg form-primary', 'type' => 'phone', 'placeholder' => 'Номер телефона'])->label(''); ?>
            <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'))->label('');?>
            <?= $form->field($model, 'currency_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Currency::find()->all(), 'id', 'title'))->label('');?>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg form-primary', 'placeholder' => 'Пароль'])->label(''); ?>
<!--            --><?//= Html::activeCheckboxList($user, 'role', ArrayHelper::map($roleModels, 'id', 'name')) ?>
            <?php


            ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<!--<div class="row">-->
<!--    <div class="col-6 mx-auto">-->
<!--        <h1 style="font-family: 'JetBrains Mono', monospace;">Добро пожаловать в Club++!</h1>-->
<!--        <p>Всего несколько шагов, чтобы начать общение!</p>-->
<!--        --><?php //$form = ActiveForm::begin(['id' => 'form-signup']); ?>
<!--        --><?//= $form->field($model, 'nick')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg', 'placeholder' => 'Никнейм'])->label(''); ?>
<!--        --><?//= $form->field($model, 'email')->textInput(['class' => 'form-control form-control-lg', 'type' => 'email', 'placeholder' => 'Почта'])->label(''); ?>
<!--        --><?//= $form->field($model, 'phone')->textInput(['class' => 'form-control form-control-lg form-primary', 'type' => 'phone', 'placeholder' => 'Номер телефона'])->label(''); ?>
<!--        --><?//= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg form-primary', 'placeholder' => 'Пароль'])->label(''); ?>
<!--        <div class="d-grid gap-2 mx-auto">-->
<!--            --><?//= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
<!--        </div>-->
<!--        --><?php //ActiveForm::end(); ?>
<!--    </div>-->
<!--</div>-->