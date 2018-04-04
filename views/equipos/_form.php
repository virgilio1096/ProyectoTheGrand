<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use app\models\Departamento;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipos-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $usuarios = ArrayHelper::map(User::find()->where(['Roll'=>1])->all(),'IDusuario','NombreCompleto');
         $departamento = ArrayHelper::map(Departamento::find()->all(),'IDdepartamento','NombreDepartamento'); ?>

    
    <?= $form->field($model, 'IDusuario')->widget(Select2::classname(), [
        'data' => $usuarios,
        'language' => 'es',
        'options' => ['placeholder' => 'seleccione el equipo a entregar'],
        'pluginOptions' => [
            'allowClear' => true
                            ],                                          ]
                                                );
    ?>

        <?= $form->field($model, 'IDdepartamento')->widget(Select2::classname(), [
            'data' => $departamento,
            'language' => 'es',
            'options' => ['placeholder' => 'seleccione el departamento'],
            'pluginOptions' => [
                'allowClear' => true
                                ],                                              ]
                                                            );
        ?>

    <?= $form->field($model, 'Entrego')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'TipoEquipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NumSerie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FallaEquipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ComentarioFalla')->textarea(['rows' => 6]) ?>





    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar Datos'), ['class' => 'btn btn-success ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
