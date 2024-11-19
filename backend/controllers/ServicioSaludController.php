<?php

namespace backend\controllers;

use backend\models\ServicioSalud;
use backend\models\search\ServicioSaludSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServicioSaludController implements the CRUD actions for ServicioSalud model.
 */
class ServicioSaludController extends Controller
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
     * Lists all ServicioSalud models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ServicioSaludSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServicioSalud model.
     * @param int $id_servicioSalud Id Servicio Salud
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_servicioSalud)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_servicioSalud),
        ]);
    }

    /**
     * Creates a new ServicioSalud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ServicioSalud();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_servicioSalud' => $model->id_servicioSalud]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ServicioSalud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_servicioSalud Id Servicio Salud
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_servicioSalud)
    {
        $model = $this->findModel($id_servicioSalud);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_servicioSalud' => $model->id_servicioSalud]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ServicioSalud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_servicioSalud Id Servicio Salud
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_servicioSalud)
    {
        $this->findModel($id_servicioSalud)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServicioSalud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_servicioSalud Id Servicio Salud
     * @return ServicioSalud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_servicioSalud)
    {
        if (($model = ServicioSalud::findOne(['id_servicioSalud' => $id_servicioSalud])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
