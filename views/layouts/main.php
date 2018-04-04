<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name='Palace Resorts',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if(Yii::$app->user->isGuest){
        $menuItems[] = ['label' => 'inicio', 'url' => ['/site/index']];
        $menuItems[] = ['label' => 'Consular Equipos', 'url' => ['/equipos/equi']];
        $menuItems[] = ['label' => 'Departamentos', 'url' => ['/departamento/depa']];
        //$menuItems[] = ['label' => 'Entregar Equipos', 'url' => ['/entregado']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];

    }else if(Yii::$app->User->identity->Roll=='1'){
        
        
        $menuItems[] = ['label' => 'inicio', 'url' => ['/site/index']];
        $menuItems[] = ['label' => 'Usuario',
        'items'=>[
        ['label'=>'Alta De Usuarios', 'url' => ['/usuario/create']],
        '<li class="divider"></li>',
        ['label'=>'Consulta De Usuarios', 'url' => ['/usuario']],]];
          $menuItems[] = ['label' => 'Departamentos',
        'items'=>[
        ['label'=>'Consulta De Departamentos', 'url' => ['/departamento']],
        '<li class="divider"></li>',
        ['label'=>'Alta De Departamentos', 'url' => ['/departamento/create']],]];
          $menuItems[] = ['label' => 'Refacciones',
        'items'=>[
        ['label'=>'Alta De Refacciones', 'url' => ['/bodega/create']],
        '<li class="divider"></li>',
        ['label'=>'Consulta De Refacciones', 'url' => ['/bodega']],]];
          $menuItems[] = ['label' => 'Equipos',
        'items'=>[
        ['label'=>'Alta De Equipos', 'url' => ['/equipos/create']],
        '<li class="divider"></li>',
        ['label'=>'Consulta De Equipos', 'url' => ['/equipos']],]];
          $menuItems[] = ['label' => 'Entregar Equipos',
        'items'=>[
        ['label'=>'Entregar Equipos', 'url' => ['/entregado/create']],
        '<li class="divider"></li>',
        ['label'=>'Consultar Equipos Entregados', 'url' => ['/entregado']],]];
        
       
        $menuItems[] = ['label' => 'Logout('.Yii::$app->User->identity->Usuario.')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method'=> 'post']];

    }
    else{
        $menuItems[] = ['label' => 'inicio', 'url' => ['/site/index']];
        $menuItems[] = ['label' => 'Registrar Equipo',
        'items'=>[
        ['label'=>'Registra Equipo', 'url' => ['/equipos/create']],
        '<li class="divider"></li>',
        ['label'=>'Consultar Equipos', 'url' => ['/equipos/equi']],]];
        
        $menuItems[] = ['label' => 'Departamentos',
        'items'=>[
        
        ['label'=>'Departamentos', 'url' => ['/departamento/depa']],]];

        $menuItems[] = ['label' => 'Logout('.Yii::$app->User->identity->Usuario.')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method'=> 'post']];



    }
    echo Nav::widget([
 



        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();     
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
