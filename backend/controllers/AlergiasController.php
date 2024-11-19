<?php

namespace backend\controllers;

use backend\models\Alergias;
use backend\models\search\AlergiasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlergiasController implements the CRUD actions for Alergias model.
 */
class AlergiasController extends Controller
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
     * Lists all Alergias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlergiasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alergias model.
     * @param int $id_alergias Id Alergias
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_alergias)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_alergias),
        ]);
    }

    /**
     * Creates a new Alergias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Alergias();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_alergias' => $model->id_alergias]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alergias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_alergias Id Alergias
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_alergias)
    {
        $model = $this->findModel($id_alergias);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_alergias' => $model->id_alergias]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alergias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_alergias Id Alergias
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_alergias)
    {
        $this->findModel($id_alergias)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alergias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_alergias Id Alergias
     * @return Alergias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_alergias)
    {
        if (($model = Alergias::findOne(['id_alergias' => $id_alergias])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
