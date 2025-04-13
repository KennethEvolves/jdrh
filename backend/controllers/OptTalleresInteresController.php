<?php

namespace backend\controllers;

use backend\models\OptTalleresInteres;
use backend\models\search\OptTalleresInteresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * OptTalleresInteresController implements the CRUD actions for OptTalleresInteres model.
 */
class OptTalleresInteresController extends Controller
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
     * Lists all OptTalleresInteres models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OptTalleresInteresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OptTalleresInteres model.
     * @param int $taller_id Taller ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($taller_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($taller_id),
        ]);
    }

    /**
     * Generates a PDF for a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($taller_id)
    {
        $model = $this->findModel($taller_id);

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
                'title' => 'Taller de Interes PDF',
                'subject' => 'Detalles del taller de interes',
            ],
            'methods' => [
                'SetFooter' => ['|Página {PAGENO}|'],
                'SetTitle' => ['Taller de Interes - ' . $model->nombre_taller . '.pdf'],
            ],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new OptTalleresInteres model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OptTalleresInteres();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'taller_id' => $model->taller_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OptTalleresInteres model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $taller_id Taller ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($taller_id)
    {
        $model = $this->findModel($taller_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'taller_id' => $model->taller_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OptTalleresInteres model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $taller_id Taller ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($taller_id)
    {
        $this->findModel($taller_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OptTalleresInteres model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $taller_id Taller ID
     * @return OptTalleresInteres the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($taller_id)
    {
        if (($model = OptTalleresInteres::findOne(['taller_id' => $taller_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
