<?php

namespace backend\controllers;

use backend\models\MotivosEstudioLicenciatura;
use backend\models\search\MotivosEstudioLicenciaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MotivosEstudioLicenciaturaController implements the CRUD actions for MotivosEstudioLicenciatura model.
 */
class MotivosEstudioLicenciaturaController extends Controller
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
     * Lists all MotivosEstudioLicenciatura models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MotivosEstudioLicenciaturaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MotivosEstudioLicenciatura model.
     * @param int $id_motivosEstudioLicenciatura Id Motivos Estudio Licenciatura
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_motivosEstudioLicenciatura)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_motivosEstudioLicenciatura),
        ]);
    }

    /**
     * Creates a new MotivosEstudioLicenciatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MotivosEstudioLicenciatura();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_motivosEstudioLicenciatura' => $model->id_motivosEstudioLicenciatura]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MotivosEstudioLicenciatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_motivosEstudioLicenciatura Id Motivos Estudio Licenciatura
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_motivosEstudioLicenciatura)
    {
        $model = $this->findModel($id_motivosEstudioLicenciatura);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_motivosEstudioLicenciatura' => $model->id_motivosEstudioLicenciatura]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MotivosEstudioLicenciatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_motivosEstudioLicenciatura Id Motivos Estudio Licenciatura
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_motivosEstudioLicenciatura)
    {
        $this->findModel($id_motivosEstudioLicenciatura)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MotivosEstudioLicenciatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_motivosEstudioLicenciatura Id Motivos Estudio Licenciatura
     * @return MotivosEstudioLicenciatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_motivosEstudioLicenciatura)
    {
        if (($model = MotivosEstudioLicenciatura::findOne(['id_motivosEstudioLicenciatura' => $id_motivosEstudioLicenciatura])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
