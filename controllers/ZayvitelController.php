<?php
/**
 * Created by PhpStorm.
 * User: stud05
 * Date: 18.05.2017
 * Time: 15:22
 */

namespace app\controllers;

use Yii;
use app\models\Zayvitel;
use app\models\SearchZayvitel;
use yii\web\Controller;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;


class ZayvitelController extends Controller
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
        $searchModel = new SearchZayvitel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title'=> Yii::t('app', 'Zayvitel') . ' #' . $id,
                'content'=>$this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a(Yii::t('app', 'Edit'),['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
            ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Zayvitel();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> Yii::t('app', 'Create new') . ' ' . Yii::t('app', 'Zayvitel'),
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> Yii::t('app', 'Create new')                        . ' ' . Yii::t('app', 'Zayvitel'),
                    'content'=>'<span class="text-success">'.Yii::t('app', 'Create ') . Yii::t('app', 'Zayvitel') . Yii::t('app', ' success'). '</span>',
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a(Yii::t('app', 'Create More'),['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

                ];
            }else{
                return [
                    'title'=> Yii::t('app', 'Create new') . ' ' . Yii::t('app', 'Zayvitel'),
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

    }

    public function actionUpdate($id)
    {
        {
            $request = Yii::$app->request;
            $model = $this->findModel($id);

            if ($request->isAjax) {
                /*
                *   Process for ajax request
                */
                Yii::$app->response->format = Response::FORMAT_JSON;
                if ($request->isGet) {
                    return [
                        'title' => Yii::t('app', 'Update') . ' ' . Yii::t('app', 'Zayvitel') . ' #' . $id,
                        'content' => $this->renderAjax('update', [
                            'model' => $model,
                        ]),
                        'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                            Html::button(Yii::t('app', 'Save'), ['class' => 'btn btn-primary', 'type' => "submit"])
                    ];
                } else if ($model->load($request->post()) && $model->save()) {
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => Yii::t('app', 'Zayvitel') . ' #' . $id,
                        'content' => $this->renderAjax('view', [
                            'model' => $model,
                        ]),
                        'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                            Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                    ];
                } else {
                    return [
                        'title' => Yii::t('app', 'Update') . ' ' . Yii::t('app', 'Zayvitel') . ' #' . $id,
                        'content' => $this->renderAjax('update', [
                            'model' => $model,
                        ]),
                        'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                            Html::button(Yii::t('app', 'Save'), ['class' => 'btn btn-primary', 'type' => "submit"])
                    ];
                }
            } else {
                /*
                *   Process for non-ajax request
                */
                if ($model->load($request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
            }
        }
    }


    public function actionDelete($id)//удалит 1 запись
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }


    public function actionBulkDelete() //удалитвсе записи
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }

    }

    protected function findModel($id)
    {
        if (($model = Zayvitel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}