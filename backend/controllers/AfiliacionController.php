<?php

namespace backend\controllers;

use backend\models\Afiliacion;
use backend\models\search\AfiliacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AfiliacionController implements the CRUD actions for Afiliacion model.
 */
class AfiliacionController extends Controller
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
     * Lists all Afiliacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AfiliacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Afiliacion model.
     * @param int $id_afiliacionEscuela Id Afiliacion Escuela
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_afiliacionEscuela)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_afiliacionEscuela),
        ]);
    }

    /**
     * Creates a new Afiliacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Afiliacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_afiliacionEscuela' => $model->id_afiliacionEscuela]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Afiliacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_afiliacionEscuela Id Afiliacion Escuela
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_afiliacionEscuela)
    {
        $model = $this->findModel($id_afiliacionEscuela);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_afiliacionEscuela' => $model->id_afiliacionEscuela]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Afiliacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_afiliacionEscuela Id Afiliacion Escuela
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_afiliacionEscuela)
    {
        $this->findModel($id_afiliacionEscuela)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Afiliacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_afiliacionEscuela Id Afiliacion Escuela
     * @return Afiliacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_afiliacionEscuela)
    {
        if (($model = Afiliacion::findOne(['id_afiliacionEscuela' => $id_afiliacionEscuela])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
