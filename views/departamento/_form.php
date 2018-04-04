<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreDepartamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Extension')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar Datos'), ['class' => 'btn btn-success']) ?>
    </div>
  

    <?php ActiveForm::end(); ?>

</div>
