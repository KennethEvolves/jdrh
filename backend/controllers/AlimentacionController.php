<?php

namespace backend\controllers;

use backend\models\Alimentacion;
use backend\models\search\AlimentacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlimentacionController implements the CRUD actions for Alimentacion model.
 */
class AlimentacionController extends Controller
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
     * Lists all Alimentacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlimentacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alimentacion model.
     * @param int $id_alimentacion Id Alimentacion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_alimentacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_alimentacion),
        ]);
    }

    /**
     * Creates a new Alimentacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Alimentacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_alimentacion' => $model->id_alimentacion]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alimentacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_alimentacion Id Alimentacion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_alimentacion)
    {
        $model = $this->findModel($id_alimentacion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_alimentacion' => $model->id_alimentacion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alimentacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_alimentacion Id Alimentacion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_alimentacion)
    {
        $this->findModel($id_alimentacion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alimentacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_alimentacion Id Alimentacion
     * @return Alimentacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_alimentacion)
    {
        if (($model = Alimentacion::findOne(['id_alimentacion' => $id_alimentacion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
