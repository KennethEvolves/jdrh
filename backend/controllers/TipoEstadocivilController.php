<?php

namespace backend\controllers;

use backend\models\TipoEstadocivil;
use backend\models\search\TipoEstadocivilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoEstadocivilController implements the CRUD actions for TipoEstadocivil model.
 */
class TipoEstadocivilController extends Controller
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
     * Lists all TipoEstadocivil models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TipoEstadocivilSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoEstadocivil model.
     * @param int $idtipo_estadocivil Idtipo Estadocivil
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtipo_estadocivil)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtipo_estadocivil),
        ]);
    }

    /**
     * Creates a new TipoEstadocivil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TipoEstadocivil();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtipo_estadocivil' => $model->idtipo_estadocivil]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoEstadocivil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtipo_estadocivil Idtipo Estadocivil
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtipo_estadocivil)
    {
        $model = $this->findModel($idtipo_estadocivil);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtipo_estadocivil' => $model->idtipo_estadocivil]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoEstadocivil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtipo_estadocivil Idtipo Estadocivil
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtipo_estadocivil)
    {
        $this->findModel($idtipo_estadocivil)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoEstadocivil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtipo_estadocivil Idtipo Estadocivil
     * @return TipoEstadocivil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtipo_estadocivil)
    {
        if (($model = TipoEstadocivil::findOne(['idtipo_estadocivil' => $idtipo_estadocivil])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
