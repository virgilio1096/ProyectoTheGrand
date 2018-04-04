<?php

namespace app\controllers;

use Yii;
use app\models\Bodega;
use app\models\search\BodegaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;

/**
 * BodegaController implements the CRUD actions for Bodega model.
 */
class BodegaController extends Controller
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
     * Lists all Bodega models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BodegaSearch();
         $this->actionEli();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,
        ]);
    }


        public function actionEli(){
        $m =new Bodega();
        if($model = Bodega::findOne(['CantiDisponible'=>0])){
           $this->findModel($model->IDrefaccion)->delete();
        $model->save(); 
        }
        
        }
    
    /**
     * Displays a single Bodega model.
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
     * Creates a new Bodega model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bodega();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDrefaccion]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

   
    /**
     * Updates an existing Bodega model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDrefaccion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bodega model.
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
     * Finds the Bodega model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bodega the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bodega::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
