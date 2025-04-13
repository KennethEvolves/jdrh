<?php

namespace backend\controllers;

use backend\models\PercepcionInstitucion;
use backend\models\search\PercepcionInstitucionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * PercepcionInstitucionController implements the CRUD actions for PercepcionInstitucion model.
 */
class PercepcionInstitucionController extends Controller
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
     * Lists all PercepcionInstitucion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PercepcionInstitucionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PercepcionInstitucion model.
     * @param int $per_inst_id Per Inst ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($per_inst_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($per_inst_id),
        ]);
    }

    /**
     * Generates a PDF for a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($per_inst_id)
    {
        $model = $this->findModel($per_inst_id);

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
                'title' => 'Percepcion Institucional PDF',
                'subject' => 'Detalles de la Percepcion Institucional',
            ],
            'methods' => [
                'SetFooter' => ['|Página {PAGENO}|'],
                'SetTitle' => ['Percepcion Institucional - ' . $model->per_inst_id . '.pdf'],
            ],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new PercepcionInstitucion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PercepcionInstitucion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'per_inst_id' => $model->per_inst_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PercepcionInstitucion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $per_inst_id Per Inst ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($per_inst_id)
    {
        $model = $this->findModel($per_inst_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'per_inst_id' => $model->per_inst_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PercepcionInstitucion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $per_inst_id Per Inst ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($per_inst_id)
    {
        $this->findModel($per_inst_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PercepcionInstitucion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $per_inst_id Per Inst ID
     * @return PercepcionInstitucion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($per_inst_id)
    {
        if (($model = PercepcionInstitucion::findOne(['per_inst_id' => $per_inst_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
