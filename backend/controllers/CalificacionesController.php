<?php

namespace backend\controllers;

use backend\models\Calificaciones;
use backend\models\search\CalificacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CalificacionesController implements the CRUD actions for Calificaciones model.
 */
class CalificacionesController extends Controller
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
     * Lists all Calificaciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CalificacionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Calificaciones model.
     * @param int $id_calificaciones Id Calificaciones
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_calificaciones)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_calificaciones),
        ]);
    }

    /**
     * Creates a new Calificaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Calificaciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_calificaciones' => $model->id_calificaciones]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Calificaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_calificaciones Id Calificaciones
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_calificaciones)
    {
        $model = $this->findModel($id_calificaciones);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_calificaciones' => $model->id_calificaciones]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Calificaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_calificaciones Id Calificaciones
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_calificaciones)
    {
        $this->findModel($id_calificaciones)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Calificaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_calificaciones Id Calificaciones
     * @return Calificaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_calificaciones)
    {
        if (($model = Calificaciones::findOne(['id_calificaciones' => $id_calificaciones])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
