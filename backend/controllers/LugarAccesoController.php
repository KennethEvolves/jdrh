<?php

namespace backend\controllers;

use backend\models\LugarAcceso;
use backend\models\search\LugarAccesoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LugarAccesoController implements the CRUD actions for LugarAcceso model.
 */
class LugarAccesoController extends Controller
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
     * Lists all LugarAcceso models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LugarAccesoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LugarAcceso model.
     * @param int $id_lugarAcceso Id Lugar Acceso
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_lugarAcceso)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_lugarAcceso),
        ]);
    }

    /**
     * Creates a new LugarAcceso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LugarAcceso();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_lugarAcceso' => $model->id_lugarAcceso]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LugarAcceso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_lugarAcceso Id Lugar Acceso
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_lugarAcceso)
    {
        $model = $this->findModel($id_lugarAcceso);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_lugarAcceso' => $model->id_lugarAcceso]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LugarAcceso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_lugarAcceso Id Lugar Acceso
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_lugarAcceso)
    {
        $this->findModel($id_lugarAcceso)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LugarAcceso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_lugarAcceso Id Lugar Acceso
     * @return LugarAcceso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_lugarAcceso)
    {
        if (($model = LugarAcceso::findOne(['id_lugarAcceso' => $id_lugarAcceso])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
