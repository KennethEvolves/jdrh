<?php

namespace backend\controllers;

use backend\models\EscalaConsumo;
use backend\models\search\EscalaConsumoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EscalaConsumoController implements the CRUD actions for EscalaConsumo model.
 */
class EscalaConsumoController extends Controller
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
     * Lists all EscalaConsumo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EscalaConsumoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EscalaConsumo model.
     * @param int $id_escala Id Escala
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_escala)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_escala),
        ]);
    }

    /**
     * Creates a new EscalaConsumo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new EscalaConsumo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_escala' => $model->id_escala]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EscalaConsumo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_escala Id Escala
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_escala)
    {
        $model = $this->findModel($id_escala);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_escala' => $model->id_escala]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EscalaConsumo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_escala Id Escala
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_escala)
    {
        $this->findModel($id_escala)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EscalaConsumo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_escala Id Escala
     * @return EscalaConsumo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_escala)
    {
        if (($model = EscalaConsumo::findOne(['id_escala' => $id_escala])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
