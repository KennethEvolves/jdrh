<?php

namespace backend\controllers;

use backend\models\TratamientoPsiquiatrico;
use backend\models\search\TratamientoPsiquiatricoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TratamientoPsiquiatricoController implements the CRUD actions for TratamientoPsiquiatrico model.
 */
class TratamientoPsiquiatricoController extends Controller
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
     * Lists all TratamientoPsiquiatrico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TratamientoPsiquiatricoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TratamientoPsiquiatrico model.
     * @param int $id_tratamientoPsiquiatrico Id Tratamiento Psiquiatrico
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tratamientoPsiquiatrico)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tratamientoPsiquiatrico),
        ]);
    }

    /**
     * Creates a new TratamientoPsiquiatrico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TratamientoPsiquiatrico();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_tratamientoPsiquiatrico' => $model->id_tratamientoPsiquiatrico]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TratamientoPsiquiatrico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_tratamientoPsiquiatrico Id Tratamiento Psiquiatrico
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_tratamientoPsiquiatrico)
    {
        $model = $this->findModel($id_tratamientoPsiquiatrico);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tratamientoPsiquiatrico' => $model->id_tratamientoPsiquiatrico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TratamientoPsiquiatrico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_tratamientoPsiquiatrico Id Tratamiento Psiquiatrico
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_tratamientoPsiquiatrico)
    {
        $this->findModel($id_tratamientoPsiquiatrico)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TratamientoPsiquiatrico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_tratamientoPsiquiatrico Id Tratamiento Psiquiatrico
     * @return TratamientoPsiquiatrico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tratamientoPsiquiatrico)
    {
        if (($model = TratamientoPsiquiatrico::findOne(['id_tratamientoPsiquiatrico' => $id_tratamientoPsiquiatrico])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
