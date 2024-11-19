<?php

namespace backend\controllers;

use backend\models\Adicciones;
use backend\models\search\AdiccionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdiccionesController implements the CRUD actions for Adicciones model.
 */
class AdiccionesController extends Controller
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
     * Lists all Adicciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdiccionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Adicciones model.
     * @param int $id_adicciones Id Adicciones
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_adicciones)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_adicciones),
        ]);
    }

    /**
     * Creates a new Adicciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Adicciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_adicciones' => $model->id_adicciones]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Adicciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_adicciones Id Adicciones
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_adicciones)
    {
        $model = $this->findModel($id_adicciones);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_adicciones' => $model->id_adicciones]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Adicciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_adicciones Id Adicciones
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_adicciones)
    {
        $this->findModel($id_adicciones)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Adicciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_adicciones Id Adicciones
     * @return Adicciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_adicciones)
    {
        if (($model = Adicciones::findOne(['id_adicciones' => $id_adicciones])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
