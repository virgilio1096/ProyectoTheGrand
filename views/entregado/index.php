<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EntregadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Entregados');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entregado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IDproceso',
            [
                //mostrar el nombre del usuario
                'attribute' => 'IDusuario',
                'value' => 'usuario.NombreCompleto',
            ],
            'Recibio',
            'refaccion',
            //'IDequipo',
            [
            //mostrar el numero de serie
                'attribute' => 'IDequipo',
                'value' => 'equipo.NumSerie',
            ],
            //'Comentario:ntext',
            'FechaEntrega',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
