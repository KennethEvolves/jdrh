<?php

namespace backend\controllers;

use backend\models\EjercicioYDeporte;
use backend\models\search\EjercicioYDeporteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EjercicioYDeporteController implements the CRUD actions for EjercicioYDeporte model.
 */
class EjercicioYDeporteController extends Controller
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
     * Lists all EjercicioYDeporte models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EjercicioYDeporteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EjercicioYDeporte model.
     * @param int $id_ejercicioDeporte Id Ejercicio Deporte
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_ejercicioDeporte)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_ejercicioDeporte),
        ]);
    }

    /**
     * Creates a new EjercicioYDeporte model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new EjercicioYDeporte();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_ejercicioDeporte' => $model->id_ejercicioDeporte]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EjercicioYDeporte model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_ejercicioDeporte Id Ejercicio Deporte
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_ejercicioDeporte)
    {
        $model = $this->findModel($id_ejercicioDeporte);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_ejercicioDeporte' => $model->id_ejercicioDeporte]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EjercicioYDeporte model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_ejercicioDeporte Id Ejercicio Deporte
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_ejercicioDeporte)
    {
        $this->findModel($id_ejercicioDeporte)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EjercicioYDeporte model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_ejercicioDeporte Id Ejercicio Deporte
     * @return EjercicioYDeporte the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_ejercicioDeporte)
    {
        if (($model = EjercicioYDeporte::findOne(['id_ejercicioDeporte' => $id_ejercicioDeporte])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
