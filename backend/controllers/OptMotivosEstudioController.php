<?php

namespace backend\controllers;

use backend\models\OptMotivosEstudio;
use backend\models\search\OptMotivosEstudioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * OptMotivosEstudioController implements the CRUD actions for OptMotivosEstudio model.
 */
class OptMotivosEstudioController extends Controller
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
     * Lists all OptMotivosEstudio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OptMotivosEstudioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($motivo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($motivo_id),
        ]);
    }

    /**
     * Generates a PDF for a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($motivo_id)
    {
        $model = $this->findModel($motivo_id);

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
                'title' => 'Motivo de Estudio PDF',
                'subject' => 'Detalles del motivo de estudio',
            ],
            'methods' => [
                'SetFooter' => ['|Página {PAGENO}|'],
                'SetTitle' => ['Motivo de Estudio - ' . $model->nombre_motivo . '.pdf'],
            ],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new OptMotivosEstudio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OptMotivosEstudio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'motivo_id' => $model->motivo_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OptMotivosEstudio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $motivo_id Motivo ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($motivo_id)
    {
        $model = $this->findModel($motivo_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'motivo_id' => $model->motivo_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OptMotivosEstudio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $motivo_id Motivo ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($motivo_id)
    {
        $this->findModel($motivo_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OptMotivosEstudio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $motivo_id Motivo ID
     * @return OptMotivosEstudio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($motivo_id)
    {
        if (($model = OptMotivosEstudio::findOne(['motivo_id' => $motivo_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
