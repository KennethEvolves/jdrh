<?php

namespace backend\controllers;

use backend\models\Tiempo;
use backend\models\search\TiempoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TiempoController implements the CRUD actions for Tiempo model.
 */
class TiempoController extends Controller
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
     * Lists all Tiempo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TiempoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tiempo model.
     * @param int $id_tiempo Id Tiempo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tiempo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tiempo),
        ]);
    }

    /**
     * Creates a new Tiempo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tiempo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_tiempo' => $model->id_tiempo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tiempo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_tiempo Id Tiempo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_tiempo)
    {
        $model = $this->findModel($id_tiempo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tiempo' => $model->id_tiempo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tiempo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_tiempo Id Tiempo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_tiempo)
    {
        $this->findModel($id_tiempo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tiempo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_tiempo Id Tiempo
     * @return Tiempo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tiempo)
    {
        if (($model = Tiempo::findOne(['id_tiempo' => $id_tiempo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
