<?php

namespace backend\controllers;

use backend\models\Asignaciones;
use backend\models\search\AsignacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AsignacionesController implements the CRUD actions for Asignaciones model.
 */
class AsignacionesController extends Controller
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
     * Lists all Asignaciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AsignacionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asignaciones model.
     * @param int $grupo_id_grupo Grupo Id Grupo
     * @param int $periodo_semestral_id_ciclo Periodo Semestral Id Ciclo
     * @param int $unidad_estudio_id_unidad Unidad Estudio Id Unidad
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($grupo_id_grupo, $periodo_semestral_id_ciclo, $unidad_estudio_id_unidad)
    {
        return $this->render('view', [
            'model' => $this->findModel($grupo_id_grupo, $periodo_semestral_id_ciclo, $unidad_estudio_id_unidad),
        ]);
    }

    /**
     * Creates a new Asignaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Asignaciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'grupo_id_grupo' => $model->grupo_id_grupo, 'periodo_semestral_id_ciclo' => $model->periodo_semestral_id_ciclo, 'unidad_estudio_id_unidad' => $model->unidad_estudio_id_unidad]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Asignaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $grupo_id_grupo Grupo Id Grupo
     * @param int $periodo_semestral_id_ciclo Periodo Semestral Id Ciclo
     * @param int $unidad_estudio_id_unidad Unidad Estudio Id Unidad
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($grupo_id_grupo, $periodo_semestral_id_ciclo, $unidad_estudio_id_unidad)
    {
        $model = $this->findModel($grupo_id_grupo, $periodo_semestral_id_ciclo, $unidad_estudio_id_unidad);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'grupo_id_grupo' => $model->grupo_id_grupo, 'periodo_semestral_id_ciclo' => $model->periodo_semestral_id_ciclo, 'unidad_estudio_id_unidad' => $model->unidad_estudio_id_unidad]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Asignaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $grupo_id_grupo Grupo Id Grupo
     * @param int $periodo_semestral_id_ciclo Periodo Semestral Id Ciclo
     * @param int $unidad_estudio_id_unidad Unidad Estudio Id Unidad
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($grupo_id_grupo, $periodo_semestral_id_ciclo, $unidad_estudio_id_unidad)
    {
        $this->findModel($grupo_id_grupo, $periodo_semestral_id_ciclo, $unidad_estudio_id_unidad)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asignaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $grupo_id_grupo Grupo Id Grupo
     * @param int $periodo_semestral_id_ciclo Periodo Semestral Id Ciclo
     * @param int $unidad_estudio_id_unidad Unidad Estudio Id Unidad
     * @return Asignaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($grupo_id_grupo, $periodo_semestral_id_ciclo, $unidad_estudio_id_unidad)
    {
        if (($model = Asignaciones::findOne(['grupo_id_grupo' => $grupo_id_grupo, 'periodo_semestral_id_ciclo' => $periodo_semestral_id_ciclo, 'unidad_estudio_id_unidad' => $unidad_estudio_id_unidad])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    


}
