<?php

namespace app\controllers;

use Yii;
use app\models\Distributer;
use app\models\DistributerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\City;

/**
 * DistributerController implements the CRUD actions for Distributer model.
 */
class DistributerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view', 'update', 'delete', 'create'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view', 'update', 'delete', 'create'],
                        'roles' => ['@'],
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
     * Lists all Distributer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DistributerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        
        $models = $dataProvider->getModels();
        
        foreach ( $models as $mod){
            $mod['City_idCity']=(City::find()
                ->where(['idCity'=> $mod['City_idCity']])->one())->name;
        }
        
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Distributer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        $distributer = $this->findModel($id);
        
        $distributer->City_idCity = (City::find()->where([
            'idCity' => $distributer->City_idCity
        ])->one())->name;
        
        return $this->render('view', [
            'model' => $distributer,
        ]);
    }

    /**
     * Creates a new Distributer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Distributer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idDistributer]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Distributer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idDistributer]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Distributer model.
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
     * Finds the Distributer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Distributer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Distributer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
