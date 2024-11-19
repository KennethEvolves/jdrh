<?php

namespace backend\controllers;

use backend\models\InteresesPersonales;
use backend\models\search\InteresesPersonalesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InteresesPersonalesController implements the CRUD actions for InteresesPersonales model.
 */
class InteresesPersonalesController extends Controller
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
     * Lists all InteresesPersonales models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InteresesPersonalesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InteresesPersonales model.
     * @param int $id_interesesPersonales Id Intereses Personales
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_interesesPersonales)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_interesesPersonales),
        ]);
    }

    /**
     * Creates a new InteresesPersonales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InteresesPersonales();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_interesesPersonales' => $model->id_interesesPersonales]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InteresesPersonales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_interesesPersonales Id Intereses Personales
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_interesesPersonales)
    {
        $model = $this->findModel($id_interesesPersonales);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_interesesPersonales' => $model->id_interesesPersonales]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InteresesPersonales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_interesesPersonales Id Intereses Personales
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_interesesPersonales)
    {
        $this->findModel($id_interesesPersonales)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InteresesPersonales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_interesesPersonales Id Intereses Personales
     * @return InteresesPersonales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_interesesPersonales)
    {
        if (($model = InteresesPersonales::findOne(['id_interesesPersonales' => $id_interesesPersonales])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
