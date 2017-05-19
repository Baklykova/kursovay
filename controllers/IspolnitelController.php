<?php
/**
 * Created by PhpStorm.
 * User: stud04
 * Date: 19.05.2017
 * Time: 15:19
 */

namespace app\controllers;
use app\models\Ispolnite;
use app\models\Ispolnitel;
use app\models\SearchIspolnitel;
use Yii;
use app\models\Zayvitel;
use app\models\SearchZayvitel;
use yii\web\Controller;
use yii\filters\VerbFilter;

class IspolnitelController  extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            /* 'access' => [
                 'class' => \yii\filters\AccessControl::className(),
                 'rules' => [
                     [
                         'allow' => true,
                         'actions' => ['index', 'view', 'create', 'update', 'delete'],
                         'roles' => ['admins', 'users']
                     ],
                     [
                         'allow' => false
                     ]
                 ]
             ]*/
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SearchIspolnitel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionCreate()
    {
        $model = new Ispolnitel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new Ispolnitel();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Ispolnite::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}