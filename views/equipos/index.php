<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EquiposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tabla De Equipos');
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
            //mostrar el nombre del usuario
                'attribute' => 'IDusuario',
                'value' => 'usuario.NombreCompleto',
            ],
            
            [
            //mostrar le nombre del departamento
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

            ['class' => 'yii\grid\ActionColumn',
            'template'=> '{view} {update} {delete} {proceso} {pendiente}',
            'buttons'=>[
            'proceso' => function ($url, $model){
                return Html::a('<span class="glyphicon glyphicon-ok"</span>',$url,['title'=> Yii::t('yii','Finalizar')]);
            },
            'pendiente' => function ($url, $model){
                return Html::a('<span class="glyphicon glyphicon-send"</span>',$url,['title'=> Yii::t('yii','Pendiente')]);
              
            },
            ]
            ],
        ],
    ]); ?>
</div>

