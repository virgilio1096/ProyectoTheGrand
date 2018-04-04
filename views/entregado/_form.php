<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\helpers\ArrayHelper;
use dosamigos\editable\Editable;
use kartik\select2\Select2;
use app\models\Bodega;
use app\models\Equipos;
use app\models\Entregado;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Entregado */

?>

<div class="entregado-form">




    <?php $form = ActiveForm::begin(); ?>

    <?php $usuarios = ArrayHelper::map(User::find()->where(['Roll'=>1])->all(),'IDusuario','NombreCompleto');
    
     $equipo = Entregado::find()->all();
     $datos = ArrayHelper::toArray($equipo,[
            'Entregado' => [
            'IDequipo',   
                           ],
                                            ]
                                    );  
     $equipo2 = ArrayHelper::map(Equipos::find()->where(['not in','IDequipo', $datos])
        ->andWhere(['proceso'=>'Finalizado'])->all(),'IDequipo','NumSerie');

    $bodega = ArrayHelper::map(Bodega::find()->all(),'Refaccion','Refaccion');?>
    

    
     <?= 

$form->field($model, 'IDusuario')->widget(Select2::classname(), [
    'data' => $usuarios,
    'language' => 'es',
    'options' => ['placeholder' => 'seleccione el equipo a entregar'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>

    <?= $form->field($model, 'Recibio')->textInput(['maxlength' => true]) ?>

    

    <?= 
// Normal select with ActiveForm & model
$form->field($model, 'refaccion')->widget(Select2::classname(), [
    'data' => $bodega,
    'language' => 'es',
    'options' => ['placeholder' => 'seleccione el equipo a entregar'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>


    <?= 
// Normal select with ActiveForm & model
$form->field($model, 'IDequipo')->widget(Select2::classname(), [
    'data' => $equipo2,
    'language' => 'es',
    'options' => ['placeholder' => 'seleccione alguna refaccion si uso alguna'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>

    <?= $form->field($model, 'Comentario')->textarea(['rows' => 6]) ?>

   




    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Entregar Equipo'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

