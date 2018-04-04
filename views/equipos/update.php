<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos */

$this->title = Yii::t('app', 'Modificando Datos Del Equipo: {nameAttribute}', [
    'nameAttribute' => $model->IDequipo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDequipo, 'url' => ['view', 'id' => $model->IDequipo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="equipos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
