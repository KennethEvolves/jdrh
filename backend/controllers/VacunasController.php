<?php

namespace backend\controllers;

use backend\models\Vacunas;
use backend\models\search\VacunasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VacunasController implements the CRUD actions for Vacunas model.
 */
class VacunasController extends Controller
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
     * Lists all Vacunas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VacunasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vacunas model.
     * @param int $id_vacunas Id Vacunas
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_vacunas)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_vacunas),
        ]);
    }

    /**
     * Creates a new Vacunas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Vacunas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_vacunas' => $model->id_vacunas]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vacunas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_vacunas Id Vacunas
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_vacunas)
    {
        $model = $this->findModel($id_vacunas);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_vacunas' => $model->id_vacunas]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vacunas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_vacunas Id Vacunas
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_vacunas)
    {
        $this->findModel($id_vacunas)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vacunas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_vacunas Id Vacunas
     * @return Vacunas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_vacunas)
    {
        if (($model = Vacunas::findOne(['id_vacunas' => $id_vacunas])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
