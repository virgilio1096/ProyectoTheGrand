<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EquiposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Equipos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IDequipo',
            //'IDusuario',
            //'IDdepartamento',
             [
                'attribute' => 'IDusuario',
                'value' => 'usuario.NombreCompleto',
            ],
            [
                'attribute' => 'IDdepartamento',
                'value' => 'departamento.NombreDepartamento',
            ],
            'Entrego',
            'TipoEquipo',
            'proceso',
            //'Modelo',
            'NumSerie',
            //'FallaEquipo',
            //'ComentarioFalla:ntext',
            //'FechaIngreso',
            //'proceso',

        ],
    ]); ?>
</div>

