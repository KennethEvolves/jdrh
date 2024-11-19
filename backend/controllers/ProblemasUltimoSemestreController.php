<?php

namespace backend\controllers;

use backend\models\ProblemasUltimoSemestre;
use backend\models\search\ProblemasUltimoSemestreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProblemasUltimoSemestreController implements the CRUD actions for ProblemasUltimoSemestre model.
 */
class ProblemasUltimoSemestreController extends Controller
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
     * Lists all ProblemasUltimoSemestre models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProblemasUltimoSemestreSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProblemasUltimoSemestre model.
     * @param int $id_problemasUltimoSemestre Id Problemas Ultimo Semestre
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_problemasUltimoSemestre)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_problemasUltimoSemestre),
        ]);
    }

    /**
     * Creates a new ProblemasUltimoSemestre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProblemasUltimoSemestre();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_problemasUltimoSemestre' => $model->id_problemasUltimoSemestre]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProblemasUltimoSemestre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_problemasUltimoSemestre Id Problemas Ultimo Semestre
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_problemasUltimoSemestre)
    {
        $model = $this->findModel($id_problemasUltimoSemestre);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_problemasUltimoSemestre' => $model->id_problemasUltimoSemestre]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProblemasUltimoSemestre model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_problemasUltimoSemestre Id Problemas Ultimo Semestre
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_problemasUltimoSemestre)
    {
        $this->findModel($id_problemasUltimoSemestre)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProblemasUltimoSemestre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_problemasUltimoSemestre Id Problemas Ultimo Semestre
     * @return ProblemasUltimoSemestre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_problemasUltimoSemestre)
    {
        if (($model = ProblemasUltimoSemestre::findOne(['id_problemasUltimoSemestre' => $id_problemasUltimoSemestre])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
