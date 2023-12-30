<?php

namespace backend\controllers;

use backend\models\Fases;
use backend\models\search\FasesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FasesController implements the CRUD actions for Fases model.
 */
class FasesController extends Controller
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
     * Lists all Fases models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FasesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fases model.
     * @param int $id_fase Id Fase
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_fase)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_fase),
        ]);
    }

    /**
     * Creates a new Fases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Fases();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_fase' => $model->id_fase]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fases model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_fase Id Fase
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_fase)
    {
        $model = $this->findModel($id_fase);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_fase' => $model->id_fase]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fases model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_fase Id Fase
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_fase)
    {
        $this->findModel($id_fase)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fases model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_fase Id Fase
     * @return Fases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_fase)
    {
        if (($model = Fases::findOne(['id_fase' => $id_fase])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
