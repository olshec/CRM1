<?php
namespace app\controllers;

use Yii;
use app\models\Detail;
use app\models\DetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\TypeDetail;
use app\models\Distributer;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Null_;

/**
 * DetailController implements the CRUD actions for Detail model.
 */
class DetailController extends Controller
{

    /**
     *
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [
                    'view',
                    'update',
                    'delete',
                    'create'
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'view'
                        ],
                        'roles' => [
                            '?'
                        ]
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'view',
                            'update',
                            'delete',
                            'create'
                        ],
                        'roles' => [
                            '@'
                        ]
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => [
                        'POST'
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Detail models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        // get POST params
        $params = Yii::$app->request->queryParams;
        // name string TypeDetail_idTypeDetail in params convert to integer
        if (! empty($params)) {
            $typeDetail = trim($params['DetailSearch']['TypeDetail_idTypeDetail']);
            if ($typeDetail != '') {
                $itemTypeDetail = (TypeDetail::find()->where([
                    'name' => $typeDetail
                ])->one());
                if($itemTypeDetail!=null){
                    $idTypeDetail=$itemTypeDetail->idTypeDetail;
                    $params['DetailSearch']['TypeDetail_idTypeDetail'] = intval($idTypeDetail);
                 }
//                  else {
//                     $searchModel = new DetailSearch();
                    
//                     $dataProvider = $searchModel->search(null);
                    
//                     $models = $dataProvider->getModels();

//                     //print_r( $models);
//                     //die();
                    
//                     foreach ($models as $mod) {
//                         $mod['TypeDetail_idTypeDetail'] = (TypeDetail::find()->where([
//                             'idTypeDetail' => $mod['TypeDetail_idTypeDetail']
//                         ])->one())->name;
//                     }
                    
//                     foreach ($models as $mod) {
//                         $mod['Distributer_idDistributer'] = (Distributer::find()->where([
//                             'idDistributer' => $mod['Distributer_idDistributer']
//                         ])->one())->name;
//                     }
                    
//                     return $this->render('index', [
//                         'searchModel' => $searchModel,
//                         'dataProvider' => $dataProvider
//                     ]);
//                 }
            }

            $distributer = trim($params['DetailSearch']['Distributer_idDistributer']);
            if ($distributer != '') {
                $idDistributer = (Distributer::find()->where([
                    'name' => $distributer
                ])->one())->idDistributer;
                $params['DetailSearch']['Distributer_idDistributer'] = intval($idDistributer);
            }
        }
        

        $searchModel = new DetailSearch();

        $dataProvider = $searchModel->search($params);
        if (! empty($params)) {
            // integer key TypeDetail_idTypeDetail in DetailSearch convert to string name
            if ($typeDetail != '' and $itemTypeDetail != null) {
                
                $searchIdDetail = $searchModel['TypeDetail_idTypeDetail'];
                $nameDetail = (TypeDetail::find()->where([
                    'idTypeDetail' => $searchIdDetail
                ])->one())->name;
                
                $searchModel['TypeDetail_idTypeDetail'] = $nameDetail;
            }
            
            if ($distributer != '') {
                $searchIdDistributer = $searchModel['Distributer_idDistributer'];
                $nameDistributer = (Distributer::find()->where([
                    'idDistributer' => $searchIdDistributer
                ])->one())->name;
                $searchModel['Distributer_idDistributer'] = $nameDistributer;
            }
        }
        
       // $searchModel->TypeDetail_idTypeDetail='';
        
        // $searchModel->TypeDetail_idTypeDetail[0];
       // $searchModel->addError('cost','zzzz');
      //   $er = $searchModel->getErrors();
      //   print_r($er);

        // print_r($searchModel);
       //  die(0);

        $models = $dataProvider->getModels();

        foreach ($models as $mod) {
            $mod['TypeDetail_idTypeDetail'] = (TypeDetail::find()->where([
                'idTypeDetail' => $mod['TypeDetail_idTypeDetail']
            ])->one())->name;
        }

        foreach ($models as $mod) {
            $mod['Distributer_idDistributer'] = (Distributer::find()->where([
                'idDistributer' => $mod['Distributer_idDistributer']
            ])->one())->name;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Detail model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $detail = $this->findModel($id);

        $detail->TypeDetail_idTypeDetail = (TypeDetail::find()->where([
            'idTypeDetail' => $detail->TypeDetail_idTypeDetail
        ])->one())->name;

        $detail->Distributer_idDistributer = (Distributer::find()->where([
            'idDistributer' => $detail->Distributer_idDistributer
        ])->one())->name;

        return $this->render('view', [
            'model' => $detail
        ]);
    }

    /**
     * Creates a new Detail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->idDetail
            ]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing Detail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->idDetail
            ]);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing Detail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect([
            'index'
        ]);
    }

    /**
     * Finds the Detail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return Detail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detail::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
