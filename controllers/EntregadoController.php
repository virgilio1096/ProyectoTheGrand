<?php

namespace app\controllers;

use Yii;
use app\models\Entregado;
use app\models\search\EntregadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Bodega;
use yii\db\Expression;
use yii\filters\AccessControl;

/**
 * EntregadoController implements the CRUD actions for Entregado model.
 */
class EntregadoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access' => [
                'class' => AccessControl::className(),
                'only' => ['_form','_search','create','index','update','view'],
                'rules' => [
                    [
                        'actions' => ['_search',],
                        'allow' => function($rule, $action){
                            if(User::idusuarionormal(Yii::$app->User->identity->IDusuario)){
                            
                            return true;

                            }else{

                            return false;
                            }

                        },
                        'roles' => ['?']

                    ],
                    [

                        'actions' => ['_form','_search','create','index','update','view'],
                        'allow' => function($rule, $action){
                            if(User::idusuarioadmin(Yii::$app->User->identity->IDusuario)){
                            
                            return true;

                            }else{

                            return false;
                            }

                        },
                        'roles' => ['@']
                        
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Entregado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntregadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entregado model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Entregado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Entregado();

          
            $model->FechaEntrega= date("d-M-y");
            
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
           

            $refaccion=$model->refaccion;
            if($refaccion != ""){
                $this->actionReducir($refaccion);
            }
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->IDproceso]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionReducir($refaccion){
        

        
        $model = Bodega::findOne(['Refaccion'=>$refaccion]);
        $model->CantiDisponible--;
        $model->save();

        

    }

    /**
     * Updates an existing Entregado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDproceso]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Entregado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Entregado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Entregado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Entregado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
