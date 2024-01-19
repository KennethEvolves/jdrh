<?php

namespace backend\controllers;

use backend\models\TipoDependencia;
use backend\models\search\TipoDependenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoDependenciaController implements the CRUD actions for TipoDependencia model.
 */
class TipoDependenciaController extends Controller
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
     * Lists all TipoDependencia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TipoDependenciaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoDependencia model.
     * @param int $idtipo_dependencia Idtipo Dependencia
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtipo_dependencia)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtipo_dependencia),
        ]);
    }

    /**
     * Creates a new TipoDependencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TipoDependencia();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtipo_dependencia' => $model->idtipo_dependencia]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoDependencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtipo_dependencia Idtipo Dependencia
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtipo_dependencia)
    {
        $model = $this->findModel($idtipo_dependencia);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtipo_dependencia' => $model->idtipo_dependencia]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoDependencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtipo_dependencia Idtipo Dependencia
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtipo_dependencia)
    {
        $this->findModel($idtipo_dependencia)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoDependencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtipo_dependencia Idtipo Dependencia
     * @return TipoDependencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtipo_dependencia)
    {
        if (($model = TipoDependencia::findOne(['idtipo_dependencia' => $idtipo_dependencia])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
