<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */

$this->title = Yii::t('app', 'Modificando Datos Del Departamento: {nameAttribute}', [
    'nameAttribute' => $model->IDdepartamento,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departamentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDdepartamento, 'url' => ['view', 'id' => $model->IDdepartamento]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="departamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
