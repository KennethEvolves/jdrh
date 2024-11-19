<?php

namespace backend\controllers;

use backend\models\UsoPersonal;
use backend\models\search\UsoPersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsoPersonalController implements the CRUD actions for UsoPersonal model.
 */
class UsoPersonalController extends Controller
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
     * Lists all UsoPersonal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsoPersonalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsoPersonal model.
     * @param int $id_usoPersonal Id Uso Personal
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_usoPersonal)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_usoPersonal),
        ]);
    }

    /**
     * Creates a new UsoPersonal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UsoPersonal();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_usoPersonal' => $model->id_usoPersonal]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UsoPersonal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_usoPersonal Id Uso Personal
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_usoPersonal)
    {
        $model = $this->findModel($id_usoPersonal);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_usoPersonal' => $model->id_usoPersonal]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UsoPersonal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_usoPersonal Id Uso Personal
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_usoPersonal)
    {
        $this->findModel($id_usoPersonal)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsoPersonal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_usoPersonal Id Uso Personal
     * @return UsoPersonal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_usoPersonal)
    {
        if (($model = UsoPersonal::findOne(['id_usoPersonal' => $id_usoPersonal])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
