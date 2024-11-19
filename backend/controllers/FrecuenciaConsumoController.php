<?php

namespace backend\controllers;

use backend\models\FrecuenciaConsumo;
use backend\models\search\FrecuenciaConsumoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FrecuenciaConsumoController implements the CRUD actions for FrecuenciaConsumo model.
 */
class FrecuenciaConsumoController extends Controller
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
     * Lists all FrecuenciaConsumo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FrecuenciaConsumoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FrecuenciaConsumo model.
     * @param int $id_frecuenciaConsumo Id Frecuencia Consumo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_frecuenciaConsumo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_frecuenciaConsumo),
        ]);
    }

    /**
     * Creates a new FrecuenciaConsumo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new FrecuenciaConsumo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_frecuenciaConsumo' => $model->id_frecuenciaConsumo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FrecuenciaConsumo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_frecuenciaConsumo Id Frecuencia Consumo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_frecuenciaConsumo)
    {
        $model = $this->findModel($id_frecuenciaConsumo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_frecuenciaConsumo' => $model->id_frecuenciaConsumo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FrecuenciaConsumo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_frecuenciaConsumo Id Frecuencia Consumo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_frecuenciaConsumo)
    {
        $this->findModel($id_frecuenciaConsumo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FrecuenciaConsumo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_frecuenciaConsumo Id Frecuencia Consumo
     * @return FrecuenciaConsumo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_frecuenciaConsumo)
    {
        if (($model = FrecuenciaConsumo::findOne(['id_frecuenciaConsumo' => $id_frecuenciaConsumo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
