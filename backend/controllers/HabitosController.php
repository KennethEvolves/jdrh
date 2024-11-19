<?php

namespace backend\controllers;

use backend\models\Habitos;
use backend\models\search\HabitosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HabitosController implements the CRUD actions for Habitos model.
 */
class HabitosController extends Controller
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
     * Lists all Habitos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HabitosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Habitos model.
     * @param int $id_habitos Id Habitos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_habitos)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_habitos),
        ]);
    }

    /**
     * Creates a new Habitos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Habitos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_habitos' => $model->id_habitos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Habitos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_habitos Id Habitos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_habitos)
    {
        $model = $this->findModel($id_habitos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_habitos' => $model->id_habitos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Habitos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_habitos Id Habitos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_habitos)
    {
        $this->findModel($id_habitos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Habitos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_habitos Id Habitos
     * @return Habitos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_habitos)
    {
        if (($model = Habitos::findOne(['id_habitos' => $id_habitos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
