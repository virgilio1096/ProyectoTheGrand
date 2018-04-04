<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EquiposSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDequipo') ?>

    <?= $form->field($model, 'IDusuario') ?>

    <?= $form->field($model, 'IDdepartamento') ?>

    <?= $form->field($model, 'Entrego') ?>

    <?= $form->field($model, 'TipoEquipo') ?>

    <?php // echo $form->field($model, 'Modelo') ?>

    <?php // echo $form->field($model, 'NumSerie') ?>

    <?php // echo $form->field($model, 'FallaEquipo') ?>

    <?php // echo $form->field($model, 'ComentarioFalla') ?>

    <?php // echo $form->field($model, 'FechaIngreso') ?>

    <?php // echo $form->field($model, 'proceso') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
