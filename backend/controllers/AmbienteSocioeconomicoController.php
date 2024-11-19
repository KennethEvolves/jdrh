<?php

namespace backend\controllers;

use backend\models\AmbienteSocioeconomico;
use backend\models\search\AmbienteSocioeconomicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AmbienteSocioeconomicoController implements the CRUD actions for AmbienteSocioeconomico model.
 */
class AmbienteSocioeconomicoController extends Controller
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
     * Lists all AmbienteSocioeconomico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AmbienteSocioeconomicoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AmbienteSocioeconomico model.
     * @param int $id_ambienteSocioeconomico Id Ambiente Socioeconomico
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_ambienteSocioeconomico)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_ambienteSocioeconomico),
        ]);
    }

    /**
     * Creates a new AmbienteSocioeconomico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AmbienteSocioeconomico();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_ambienteSocioeconomico' => $model->id_ambienteSocioeconomico]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AmbienteSocioeconomico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_ambienteSocioeconomico Id Ambiente Socioeconomico
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_ambienteSocioeconomico)
    {
        $model = $this->findModel($id_ambienteSocioeconomico);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_ambienteSocioeconomico' => $model->id_ambienteSocioeconomico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AmbienteSocioeconomico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_ambienteSocioeconomico Id Ambiente Socioeconomico
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_ambienteSocioeconomico)
    {
        $this->findModel($id_ambienteSocioeconomico)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AmbienteSocioeconomico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_ambienteSocioeconomico Id Ambiente Socioeconomico
     * @return AmbienteSocioeconomico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_ambienteSocioeconomico)
    {
        if (($model = AmbienteSocioeconomico::findOne(['id_ambienteSocioeconomico' => $id_ambienteSocioeconomico])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
