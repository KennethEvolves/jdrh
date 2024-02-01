<?php

namespace backend\controllers;

use backend\models\UsosInternet;
use backend\models\search\UsosInternetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsosInternetController implements the CRUD actions for UsosInternet model.
 */
class UsosInternetController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all UsosInternet models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsosInternetSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsosInternet model.
     * @param int $idusos_internet Idusos Internet
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idusos_internet)
    {
        return $this->render('view', [
            'model' => $this->findModel($idusos_internet),
        ]);
    }

    /**
     * Creates a new UsosInternet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UsosInternet();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idusos_internet' => $model->idusos_internet]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UsosInternet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idusos_internet Idusos Internet
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idusos_internet)
    {
        $model = $this->findModel($idusos_internet);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idusos_internet' => $model->idusos_internet]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UsosInternet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idusos_internet Idusos Internet
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idusos_internet)
    {
        $this->findModel($idusos_internet)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsosInternet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idusos_internet Idusos Internet
     * @return UsosInternet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idusos_internet)
    {
        if (($model = UsosInternet::findOne(['idusos_internet' => $idusos_internet])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
