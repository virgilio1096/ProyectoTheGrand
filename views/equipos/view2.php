<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\user;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos */

$this->title = $model->Entrego;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            !'IDequipo',
            !'value' => 'usuario.NombreCompleto',
            'value' => 'departamento.NombreDepartamento', 
            'Entrego',
            'TipoEquipo',
            'Modelo',
            'NumSerie',
            'FallaEquipo',
            'ComentarioFalla:ntext',
            'FechaIngreso',
            'proceso',
        ],
    ]) ?>

</div>
