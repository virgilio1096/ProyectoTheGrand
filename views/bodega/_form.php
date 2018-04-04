<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bodega */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bodega-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Refaccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MarcaModelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NumSerie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CantiDisponible')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
