<?php

namespace app\controllers;

use Yii;
use app\models\Departamento;
use app\models\search\DepartamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DepartamentoController implements the CRUD actions for Departamento model.
 */
class DepartamentoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    { return [
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
     * Lists all Departamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionDepa() 
    {
        $searchModel = new DepartamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('depa', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Departamento model.
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
     * Creates a new Departamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Departamento();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
            {\Yii::$app->session->setFlash('success',"Departamento Agregado ");
               $model->save();
            return $this->redirect(['view', 'id' => $model->IDdepartamento]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Departamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            \Yii::$app->session->setFlash('success',"Departamento Modificado ");
            $model->save();
            return $this->redirect(['view', 'id' => $model->IDdepartamento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Departamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        \Yii::$app->session->setFlash('success',"Departamento Eliminado ");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Departamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Departamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Departamento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
