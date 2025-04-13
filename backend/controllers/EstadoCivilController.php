<?php

namespace backend\controllers;

use backend\models\EstadoCivil;
use backend\models\search\EstadoCivilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * EstadoCivilController implements the CRUD actions for EstadoCivil model.
 */
class EstadoCivilController extends Controller
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
     * Lists all EstadoCivil models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EstadoCivilSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstadoCivil model.
     * @param int $estado_civil_id Estado Civil ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($estado_civil_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($estado_civil_id),
        ]);
    }

    /**
     * Generates a PDF for a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($estado_civil_id)
    {
        $model = $this->findModel($estado_civil_id);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LETTER,
            'defaultFontSize' => 12,
            'defaultFont' => 'Arial',
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'marginBottom' => 30,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('viewpdf', ['model' => $model]),
            'options' => [
                'title' => 'Estado Civil PDF',
                'subject' => 'Detalles del estado civil',
            ],
            'methods' => [
                'SetFooter' => ['|Página {PAGENO}|'],
                'SetTitle' => ['Estado Civil - ' . $model->nombre_estado_civil . '.pdf'],
            ],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new EstadoCivil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new EstadoCivil();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'estado_civil_id' => $model->estado_civil_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EstadoCivil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $estado_civil_id Estado Civil ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($estado_civil_id)
    {
        $model = $this->findModel($estado_civil_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'estado_civil_id' => $model->estado_civil_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EstadoCivil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $estado_civil_id Estado Civil ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($estado_civil_id)
    {
        $this->findModel($estado_civil_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstadoCivil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $estado_civil_id Estado Civil ID
     * @return EstadoCivil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($estado_civil_id)
    {
        if (($model = EstadoCivil::findOne(['estado_civil_id' => $estado_civil_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
