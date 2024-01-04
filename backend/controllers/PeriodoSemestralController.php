<?php

namespace backend\controllers;

use backend\models\PeriodoSemestral;
use backend\models\search\PeriodoSemestralSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeriodoSemestralController implements the CRUD actions for PeriodoSemestral model.
 */
class PeriodoSemestralController extends Controller
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
     * Lists all PeriodoSemestral models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeriodoSemestralSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PeriodoSemestral model.
     * @param int $id_ciclo Id Ciclo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_ciclo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_ciclo),
        ]);
    }

    /**
     * Creates a new PeriodoSemestral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PeriodoSemestral();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_ciclo' => $model->id_ciclo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PeriodoSemestral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_ciclo Id Ciclo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_ciclo)
    {
        $model = $this->findModel($id_ciclo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_ciclo' => $model->id_ciclo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PeriodoSemestral model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_ciclo Id Ciclo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_ciclo)
    {
        $this->findModel($id_ciclo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PeriodoSemestral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_ciclo Id Ciclo
     * @return PeriodoSemestral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_ciclo)
    {
        if (($model = PeriodoSemestral::findOne(['id_ciclo' => $id_ciclo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
