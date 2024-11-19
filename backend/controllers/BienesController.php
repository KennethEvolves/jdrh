<?php

namespace backend\controllers;

use backend\models\Bienes;
use backend\models\search\BienesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BienesController implements the CRUD actions for Bienes model.
 */
class BienesController extends Controller
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
     * Lists all Bienes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BienesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bienes model.
     * @param int $id_bienes Id Bienes
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_bienes)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_bienes),
        ]);
    }

    /**
     * Creates a new Bienes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bienes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_bienes' => $model->id_bienes]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bienes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_bienes Id Bienes
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_bienes)
    {
        $model = $this->findModel($id_bienes);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_bienes' => $model->id_bienes]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bienes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_bienes Id Bienes
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_bienes)
    {
        $this->findModel($id_bienes)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bienes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_bienes Id Bienes
     * @return Bienes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_bienes)
    {
        if (($model = Bienes::findOne(['id_bienes' => $id_bienes])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
