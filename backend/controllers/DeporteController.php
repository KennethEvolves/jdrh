<?php

namespace backend\controllers;

use backend\models\Deporte;
use backend\models\search\DeporteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DeporteController implements the CRUD actions for Deporte model.
 */
class DeporteController extends Controller
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
     * Lists all Deporte models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DeporteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Deporte model.
     * @param int $id_deporte Id Deporte
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_deporte)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_deporte),
        ]);
    }

    /**
     * Creates a new Deporte model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Deporte();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_deporte' => $model->id_deporte]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Deporte model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_deporte Id Deporte
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_deporte)
    {
        $model = $this->findModel($id_deporte);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_deporte' => $model->id_deporte]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Deporte model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_deporte Id Deporte
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_deporte)
    {
        $this->findModel($id_deporte)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Deporte model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_deporte Id Deporte
     * @return Deporte the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_deporte)
    {
        if (($model = Deporte::findOne(['id_deporte' => $id_deporte])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
