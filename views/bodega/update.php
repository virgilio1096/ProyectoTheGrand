<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bodega */

$this->title = Yii::t('app', 'Modifcando Datos Del Registro: {nameAttribute}', [
    'nameAttribute' => $model->IDrefaccion,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bodegas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDrefaccion, 'url' => ['view', 'id' => $model->IDrefaccion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bodega-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
