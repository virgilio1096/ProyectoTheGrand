<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\BodegaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bodega-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDrefaccion') ?>

    <?= $form->field($model, 'Refaccion') ?>

    <?= $form->field($model, 'MarcaModelo') ?>

    <?= $form->field($model, 'NumSerie') ?>

    <?= $form->field($model, 'CantiDisponible') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
