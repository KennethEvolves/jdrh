<?php

namespace backend\controllers;

use backend\models\TipoSangre;
use backend\models\search\TipoSangreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoSangreController implements the CRUD actions for TipoSangre model.
 */
class TipoSangreController extends Controller
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
     * Lists all TipoSangre models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TipoSangreSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoSangre model.
     * @param int $id_tipoSangre Id Tipo Sangre
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tipoSangre)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tipoSangre),
        ]);
    }

    /**
     * Creates a new TipoSangre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TipoSangre();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_tipoSangre' => $model->id_tipoSangre]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoSangre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_tipoSangre Id Tipo Sangre
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_tipoSangre)
    {
        $model = $this->findModel($id_tipoSangre);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tipoSangre' => $model->id_tipoSangre]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoSangre model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_tipoSangre Id Tipo Sangre
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_tipoSangre)
    {
        $this->findModel($id_tipoSangre)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoSangre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_tipoSangre Id Tipo Sangre
     * @return TipoSangre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tipoSangre)
    {
        if (($model = TipoSangre::findOne(['id_tipoSangre' => $id_tipoSangre])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
