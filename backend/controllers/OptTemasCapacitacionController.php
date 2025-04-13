<?php

namespace backend\controllers;

use backend\models\OptTemasCapacitacion;
use backend\models\search\OptTemasCapacitacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * OptTemasCapacitacionController implements the CRUD actions for OptTemasCapacitacion model.
 */
class OptTemasCapacitacionController extends Controller
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
     * Lists all OptTemasCapacitacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OptTemasCapacitacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OptTemasCapacitacion model.
     * @param int $tema_id Tema ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tema_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($tema_id),
        ]);
    }

    /**
     * Generates a PDF for a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($tema_id)
    {
        $model = $this->findModel($tema_id);

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
                'title' => 'Tema de Capacitacion PDF',
                'subject' => 'Detalles del tema de capacitacion',
            ],
            'methods' => [
                'SetFooter' => ['|Página {PAGENO}|'],
                'SetTitle' => ['Tema de capacitacion - ' . $model->nombre_tema . '.pdf'],
            ],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new OptTemasCapacitacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OptTemasCapacitacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'tema_id' => $model->tema_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OptTemasCapacitacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tema_id Tema ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tema_id)
    {
        $model = $this->findModel($tema_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tema_id' => $model->tema_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OptTemasCapacitacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tema_id Tema ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tema_id)
    {
        $this->findModel($tema_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OptTemasCapacitacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tema_id Tema ID
     * @return OptTemasCapacitacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tema_id)
    {
        if (($model = OptTemasCapacitacion::findOne(['tema_id' => $tema_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
