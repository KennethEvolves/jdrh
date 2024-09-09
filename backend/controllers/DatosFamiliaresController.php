<?php

namespace backend\controllers;

use backend\models\DatosFamiliares;
use backend\models\search\DatosFamiliaresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DatosFamiliaresController implements the CRUD actions for DatosFamiliares model.
 */
class DatosFamiliaresController extends Controller
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
     * Lists all DatosFamiliares models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DatosFamiliaresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DatosFamiliares model.
     * @param int $iddatos_familiares Iddatos Familiares
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddatos_familiares)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddatos_familiares),
        ]);
    }

    /**
     * Creates a new DatosFamiliares model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DatosFamiliares();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'iddatos_familiares' => $model->iddatos_familiares]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DatosFamiliares model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $iddatos_familiares Iddatos Familiares
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddatos_familiares)
    {
        $model = $this->findModel($iddatos_familiares);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddatos_familiares' => $model->iddatos_familiares]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DatosFamiliares model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $iddatos_familiares Iddatos Familiares
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddatos_familiares)
    {
        $this->findModel($iddatos_familiares)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DatosFamiliares model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $iddatos_familiares Iddatos Familiares
     * @return DatosFamiliares the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddatos_familiares)
    {
        if (($model = DatosFamiliares::findOne(['iddatos_familiares' => $iddatos_familiares])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
