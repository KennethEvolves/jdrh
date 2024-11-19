<?php

namespace backend\controllers;

use backend\models\Vivienda;
use backend\models\search\ViviendaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ViviendaController implements the CRUD actions for Vivienda model.
 */
class ViviendaController extends Controller
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
     * Lists all Vivienda models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ViviendaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vivienda model.
     * @param int $id_vivienda Id Vivienda
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_vivienda)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_vivienda),
        ]);
    }

    /**
     * Creates a new Vivienda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Vivienda();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_vivienda' => $model->id_vivienda]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vivienda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_vivienda Id Vivienda
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_vivienda)
    {
        $model = $this->findModel($id_vivienda);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_vivienda' => $model->id_vivienda]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vivienda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_vivienda Id Vivienda
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_vivienda)
    {
        $this->findModel($id_vivienda)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vivienda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_vivienda Id Vivienda
     * @return Vivienda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_vivienda)
    {
        if (($model = Vivienda::findOne(['id_vivienda' => $id_vivienda])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
