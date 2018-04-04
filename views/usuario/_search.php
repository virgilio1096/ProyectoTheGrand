<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDusuario') ?>

    <?= $form->field($model, 'NombreCompleto') ?>

    <?= $form->field($model, 'Telefono') ?>

    <?= $form->field($model, 'Correo') ?>

    <?= $form->field($model, 'Usuario') ?>

    <?php // echo $form->field($model, 'Password') ?>

    <?php // echo $form->field($model, 'Roll') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
