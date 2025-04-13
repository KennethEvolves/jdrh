<?php

namespace backend\controllers;

use backend\models\InformacionAcademica;
use backend\models\search\InformacionAcademicaSearch;
use backend\models\OptMotivosEstudio;
use backend\models\OptTemasCapacitacion;
use backend\models\OptTalleresInteres;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use kartik\mpdf\Pdf;

/**
 * InformacionAcademicaController implements the CRUD actions for InformacionAcademica model.
 */
class InformacionAcademicaController extends Controller
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
     * Lists all InformacionAcademica models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InformacionAcademicaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InformacionAcademica model.
     * @param int $inf_academica_id Inf Academica ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($inf_academica_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($inf_academica_id),
        ]);
    }

    /**
     * Export a single InformacionAcademica model to PDF.
     * @param int $inf_academica_id Inf Academica ID
     * @return string PDF content
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($inf_academica_id)
    {
        $model = $this->findModel($inf_academica_id);

        // Generate PDF using kartik\mpdf\Pdf
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LETTER,
            'defaultFontSize' => 12,
            'defaultFont' => 'Arial',
            'orientation' => Pdf::ORIENT_PORTRAIT, // Cambiado a orientación vertical
            'marginBottom' => 30,
            'marginFooter' => 0,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('viewpdf', ['model' => $model]), // Use viewpdf for layout
            'filename' => 'InformacionAcademica_' . $model->inf_academica_id . '.pdf',
            'options' => [
                'title' => 'Información Académica',
                'subject' => 'PDF Export',
            ],
            'methods' => [
                'SetFooter' => ['|Page {PAGENO}|'],
                'SetTitle' => "Información Académica - " . $model->inf_academica_id . ".pdf",
            ]
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new InformacionAcademica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InformacionAcademica();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save(false)) {
                // Guardar las relaciones de muchos a muchos
                if ($motivosEstudios = Yii::$app->request->post('InformacionAcademica')['motivosEstudios']) {
                    foreach ($motivosEstudios as $motivoEstudio) {
                        $model->link('motivosEstudios', OptMotivosEstudio::findOne($motivoEstudio));
                    }
                }

                if ($temasCapacitaciones = Yii::$app->request->post('InformacionAcademica')['temasCapacitaciones']) {
                    foreach ($temasCapacitaciones as $temaCapacitacion) {
                        $model->link('temasCapacitaciones', OptTemasCapacitacion::findOne($temaCapacitacion));
                    }
                }

                if ($talleresInteres = Yii::$app->request->post('InformacionAcademica')['talleresInteres']) {
                    foreach ($talleresInteres as $tallerInteres) {
                        $model->link('talleresInteres', OptTalleresInteres::findOne($tallerInteres));
                    }
                }

                return $this->redirect(['view', 'inf_academica_id' => $model->inf_academica_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InformacionAcademica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $inf_academica_id Inf Academica ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($inf_academica_id)
    {
        $model = $this->findModel($inf_academica_id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save(false)) {
                // Desvinculamos los registros anteriores y agregamos los nuevos
                $model->unlinkAll('motivosEstudios', true);
                $model->unlinkAll('temasCapacitaciones', true);
                $model->unlinkAll('talleresInteres', true);

                // Volver a vincular las relaciones
                if ($motivosEstudios = Yii::$app->request->post('InformacionAcademica')['motivosEstudios']) {
                    foreach ($motivosEstudios as $motivoEstudio) {
                        $model->link('motivosEstudios', OptMotivosEstudio::findOne($motivoEstudio));
                    }
                }

                if ($temasCapacitaciones = Yii::$app->request->post('InformacionAcademica')['temasCapacitaciones']) {
                    foreach ($temasCapacitaciones as $temaCapacitacion) {
                        $model->link('temasCapacitaciones', OptTemasCapacitacion::findOne($temaCapacitacion));
                    }
                }

                if ($talleresInteres = Yii::$app->request->post('InformacionAcademica')['talleresInteres']) {
                    foreach ($talleresInteres as $tallerInteres) {
                        $model->link('talleresInteres', OptTalleresInteres::findOne($tallerInteres));
                    }
                }

                return $this->redirect(['view', 'inf_academica_id' => $model->inf_academica_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InformacionAcademica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $inf_academica_id Inf Academica ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($inf_academica_id)
    {
        $this->findModel($inf_academica_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InformacionAcademica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $inf_academica_id Inf Academica ID
     * @return InformacionAcademica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($inf_academica_id)
    {
        if (($model = InformacionAcademica::findOne(['inf_academica_id' => $inf_academica_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
