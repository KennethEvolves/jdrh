<?php

namespace backend\controllers;

use backend\models\TratamientoPsicologico;
use backend\models\search\TratamientoPsicologicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TratamientoPsicologicoController implements the CRUD actions for TratamientoPsicologico model.
 */
class TratamientoPsicologicoController extends Controller
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
     * Lists all TratamientoPsicologico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TratamientoPsicologicoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TratamientoPsicologico model.
     * @param int $id_tratamientoPsicologico Id Tratamiento Psicologico
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tratamientoPsicologico)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tratamientoPsicologico),
        ]);
    }

    /**
     * Creates a new TratamientoPsicologico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TratamientoPsicologico();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_tratamientoPsicologico' => $model->id_tratamientoPsicologico]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TratamientoPsicologico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_tratamientoPsicologico Id Tratamiento Psicologico
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_tratamientoPsicologico)
    {
        $model = $this->findModel($id_tratamientoPsicologico);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tratamientoPsicologico' => $model->id_tratamientoPsicologico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TratamientoPsicologico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_tratamientoPsicologico Id Tratamiento Psicologico
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_tratamientoPsicologico)
    {
        $this->findModel($id_tratamientoPsicologico)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TratamientoPsicologico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_tratamientoPsicologico Id Tratamiento Psicologico
     * @return TratamientoPsicologico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tratamientoPsicologico)
    {
        if (($model = TratamientoPsicologico::findOne(['id_tratamientoPsicologico' => $id_tratamientoPsicologico])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
