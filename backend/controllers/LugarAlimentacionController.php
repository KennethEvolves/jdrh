<?php

namespace backend\controllers;

use backend\models\LugarAlimentacion;
use backend\models\search\LugarAlimentacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LugarAlimentacionController implements the CRUD actions for LugarAlimentacion model.
 */
class LugarAlimentacionController extends Controller
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
     * Lists all LugarAlimentacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LugarAlimentacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LugarAlimentacion model.
     * @param int $id_lugarAlimentacion Id Lugar Alimentacion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_lugarAlimentacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_lugarAlimentacion),
        ]);
    }

    /**
     * Creates a new LugarAlimentacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LugarAlimentacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_lugarAlimentacion' => $model->id_lugarAlimentacion]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LugarAlimentacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_lugarAlimentacion Id Lugar Alimentacion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_lugarAlimentacion)
    {
        $model = $this->findModel($id_lugarAlimentacion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_lugarAlimentacion' => $model->id_lugarAlimentacion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LugarAlimentacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_lugarAlimentacion Id Lugar Alimentacion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_lugarAlimentacion)
    {
        $this->findModel($id_lugarAlimentacion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LugarAlimentacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_lugarAlimentacion Id Lugar Alimentacion
     * @return LugarAlimentacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_lugarAlimentacion)
    {
        if (($model = LugarAlimentacion::findOne(['id_lugarAlimentacion' => $id_lugarAlimentacion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
