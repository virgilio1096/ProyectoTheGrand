<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entregado */

$this->title = Yii::t('app', 'Update Entregado: {nameAttribute}', [
    'nameAttribute' => $model->IDproceso,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entregados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDproceso, 'url' => ['view', 'id' => $model->IDproceso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="entregado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
