<?php
/**
 * Created by PhpStorm.
 * User: stud04
 * Date: 23.05.2017
 * Time: 10:59
 */

namespace app\controllers;

use Yii;
use app\models\Ispolnenie;
use app\models\SearchIspolnenie;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;

class IspolnenieController extends Controller
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
        $searchModel = new SearchIspolnenie();
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

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Ispolnenie();

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
            $model = new Ispolnenie;
        }else{
            $model = $this->findModel($id);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
        if (($model = Ispolnenie::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }


    public function actionUpload(){
        $model = new UploadForm();
        if(Yii::$app->request->isPost) {
            $model->pdfFile = UploadedFile::getInstance($model, 'pdfFile');
            if ($model->uploadPdf()){

                return true;
            }
        }
        return $this->render('upload', ['model' =>$model]);
    }
}