<?php

namespace backend\controllers;

use backend\models\Licenciaturas;
use backend\models\search\LicenciaturasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * LicenciaturasController implements the CRUD actions for Licenciaturas model.
 */
class LicenciaturasController extends Controller
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
     * Lists all Licenciaturas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LicenciaturasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Licenciaturas model.
     * @param int $licenciatura_id Licenciatura ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($licenciatura_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($licenciatura_id),
        ]);
    }

    /**
     * Generates a PDF for a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($licenciatura_id)
    {
        $model = $this->findModel($licenciatura_id);

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
                'title' => 'Licenciatura PDF',
                'subject' => 'Detalles de la licenciatura',
            ],
            'methods' => [
                'SetFooter' => ['|Página {PAGENO}|'],
                'SetTitle' => ['Licenciatura - ' . $model->nombre_licenciatura . '.pdf'],
            ],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new Licenciaturas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Licenciaturas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'licenciatura_id' => $model->licenciatura_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Licenciaturas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $licenciatura_id Licenciatura ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($licenciatura_id)
    {
        $model = $this->findModel($licenciatura_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'licenciatura_id' => $model->licenciatura_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Licenciaturas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $licenciatura_id Licenciatura ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($licenciatura_id)
    {
        $this->findModel($licenciatura_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Licenciaturas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $licenciatura_id Licenciatura ID
     * @return Licenciaturas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($licenciatura_id)
    {
        if (($model = Licenciaturas::findOne(['licenciatura_id' => $licenciatura_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
