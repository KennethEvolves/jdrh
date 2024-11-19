<?php

namespace backend\controllers;

use backend\models\FrecuenciaMedico;
use backend\models\search\FrecuenciaMedicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FrecuenciaMedicoController implements the CRUD actions for FrecuenciaMedico model.
 */
class FrecuenciaMedicoController extends Controller
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
     * Lists all FrecuenciaMedico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FrecuenciaMedicoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FrecuenciaMedico model.
     * @param int $id_frecuenciaMedico Id Frecuencia Medico
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_frecuenciaMedico)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_frecuenciaMedico),
        ]);
    }

    /**
     * Creates a new FrecuenciaMedico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new FrecuenciaMedico();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_frecuenciaMedico' => $model->id_frecuenciaMedico]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FrecuenciaMedico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_frecuenciaMedico Id Frecuencia Medico
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_frecuenciaMedico)
    {
        $model = $this->findModel($id_frecuenciaMedico);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_frecuenciaMedico' => $model->id_frecuenciaMedico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FrecuenciaMedico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_frecuenciaMedico Id Frecuencia Medico
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_frecuenciaMedico)
    {
        $this->findModel($id_frecuenciaMedico)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FrecuenciaMedico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_frecuenciaMedico Id Frecuencia Medico
     * @return FrecuenciaMedico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_frecuenciaMedico)
    {
        if (($model = FrecuenciaMedico::findOne(['id_frecuenciaMedico' => $id_frecuenciaMedico])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
