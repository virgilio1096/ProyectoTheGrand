<?php

namespace app\controllers;

use Yii;
use app\models\Equipos;
use app\models\search\EquiposSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\filters\AccessControl;

/**
 * EquiposController implements the CRUD actions for Equipos model.
 */
class EquiposController extends Controller
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
     * Lists all Equipos models.
     * @return mixed
     */
    public function actionIndex() 
    {
        $searchModel = new EquiposSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionEqui() 
    {
        $searchModel = new EquiposSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('equi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
/*        public function actionEqui()
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
*/
    /**
     * Displays a single Equipos model.
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

        public function actionView2($id)
    {
        return $this->render('view2', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Equipos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Equipos();
        

        if($model->Entrego = Yii::$app->user->identity->Roll=='0'){

            $model->Entrego = Yii::$app->user->identity->NombreCompleto;
        }else{
            

        }   

        $model->FechaIngreso= new Expression('NOW()');
        $model->proceso = 'Pendiente';    
        if ($model->load(Yii::$app->request->post()) && $model->validate()){            

            $model->save();
            \Yii::$app->session->setFlash('success',"Equipo registrado");

           return $this->redirect(['view2', 'id' => $model->IDequipo]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Equipos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDequipo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }




    public function actionProceso($id)
    {
        $model = $this->findModel($id);

        $model->proceso = "Finalizado";
        $model->save();

        return $this->redirect(['index', 'id' => $model->IDequipo]);

       
    }

 public function actionPendiente($id)
    {
        $model = $this->findModel($id);

        $model->proceso = "Pendiente";
        $model->save();

        return $this->redirect(['index', 'id' => $model->IDequipo]);

       
    }


    /**
     * Deletes an existing Equipos model.
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
     * Finds the Equipos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Equipos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Equipos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
