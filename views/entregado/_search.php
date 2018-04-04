<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EntregadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entregado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'IDproceso') ?>

    <?= $form->field($model, 'IDusuario') ?>

    <?= $form->field($model, 'Recibio') ?>

    <?= $form->field($model, 'refaccion') ?>

   

    <?php // echo $form->field($model, 'IDequipo') ?>

    <?php // echo $form->field($model, 'Comentario') ?>

    <?php // echo $form->field($model, 'FechaEntrega') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
