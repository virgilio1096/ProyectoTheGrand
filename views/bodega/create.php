<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bodega */

$this->title = Yii::t('app', 'Registrar Refaccion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bodegas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bodega-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
