<?php

namespace backend\controllers;

use backend\models\Grado;
use backend\models\search\GradoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GradoController implements the CRUD actions for Grado model.
 */
class GradoController extends Controller
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
     * Lists all Grado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GradoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Grado model.
     * @param int $id_grado Id Grado
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_grado)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_grado),
        ]);
    }

    /**
     * Creates a new Grado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Grado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_grado' => $model->id_grado]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Grado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_grado Id Grado
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_grado)
    {
        $model = $this->findModel($id_grado);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_grado' => $model->id_grado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Grado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_grado Id Grado
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_grado)
    {
        $this->findModel($id_grado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Grado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_grado Id Grado
     * @return Grado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_grado)
    {
        if (($model = Grado::findOne(['id_grado' => $id_grado])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
