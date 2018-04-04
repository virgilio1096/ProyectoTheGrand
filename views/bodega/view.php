<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bodega */

$this->title = $model->Refaccion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bodegas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bodega-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modificar Registro'), ['update', 'id' => $model->IDrefaccion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar Registro'), ['delete', 'id' => $model->IDrefaccion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'IDrefaccion',
            'Refaccion',
            'MarcaModelo',
            'NumSerie',
            'CantiDisponible',
        ],
    ]) ?>

</div>
