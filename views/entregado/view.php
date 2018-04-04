<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Entregado */

$this->title = $model->Recibio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entregados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entregado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modificar'), ['update', 'id' => $model->IDproceso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->IDproceso], [
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
            'IDproceso',
             !'value' => 'usuario.NombreCompleto',
            'value' => 'equipo.NumSerie', 
            //'IDusuario',
            'Recibio',
            'refaccion',
          
            'Comentario:ntext',
            'FechaEntrega',
        ],
    ]) ?>

</div>
