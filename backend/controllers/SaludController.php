<?php

namespace backend\controllers;

use backend\models\Salud;
use backend\models\search\SaludSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SaludController implements the CRUD actions for Salud model.
 */
class SaludController extends Controller
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
     * Lists all Salud models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SaludSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Salud model.
     * @param int $id_salud Id Salud
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_salud)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_salud),
        ]);
    }

    /**
     * Creates a new Salud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Salud();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_salud' => $model->id_salud]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Salud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_salud Id Salud
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_salud)
    {
        $model = $this->findModel($id_salud);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_salud' => $model->id_salud]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Salud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_salud Id Salud
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_salud)
    {
        $this->findModel($id_salud)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Salud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_salud Id Salud
     * @return Salud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_salud)
    {
        if (($model = Salud::findOne(['id_salud' => $id_salud])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
