<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\search\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
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
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->guardar()) {
            return $this->redirect(['view', 'id' => $model->IDusuario]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->Password = '';   

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $hash = Yii::$app->getSecurity()->generatePasswordHash($model->Password);
            $model->Password = $hash;
            $model->save();
            \Yii::$app->session->setFlash('success',"Usuario Modificado ");
            return $this->redirect(['view', 'id' => $model->IDusuario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        \Yii::$app->session->setFlash('success',"Usuario Eliminado Correctamente");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
