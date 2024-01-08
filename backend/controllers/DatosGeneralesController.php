<?php

namespace backend\controllers;

use backend\models\DatosGenerales;
use backend\models\search\DatosGeneralesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DatosGeneralesController implements the CRUD actions for DatosGenerales model.
 */
class DatosGeneralesController extends Controller
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
     * Lists all DatosGenerales models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DatosGeneralesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DatosGenerales model.
     * @param int $iddatos_generales Iddatos Generales
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddatos_generales)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddatos_generales),
        ]);
    }

    /**
     * Creates a new DatosGenerales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DatosGenerales();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'iddatos_generales' => $model->iddatos_generales]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DatosGenerales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $iddatos_generales Iddatos Generales
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddatos_generales)
    {
        $model = $this->findModel($iddatos_generales);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddatos_generales' => $model->iddatos_generales]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DatosGenerales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $iddatos_generales Iddatos Generales
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddatos_generales)
    {
        $this->findModel($iddatos_generales)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DatosGenerales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $iddatos_generales Iddatos Generales
     * @return DatosGenerales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddatos_generales)
    {
        if (($model = DatosGenerales::findOne(['iddatos_generales' => $iddatos_generales])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
