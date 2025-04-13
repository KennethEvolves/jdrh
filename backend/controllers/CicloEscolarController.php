<?php

namespace backend\controllers;

use backend\models\CicloEscolar;
use backend\models\search\CicloEscolarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * CicloEscolarController implements the CRUD actions for CicloEscolar model.
 */
class CicloEscolarController extends Controller
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
     * Lists all CicloEscolar models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CicloEscolarSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CicloEscolar model.
     * @param int $ciclo_escolar_id Ciclo Escolar ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ciclo_escolar_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ciclo_escolar_id),
        ]);
    }

    /**
     * Generates a PDF for a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($ciclo_escolar_id)
    {
        $model = $this->findModel($ciclo_escolar_id);

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
                'title' => 'Ciclo Escolar PDF',
                'subject' => 'Detalles del ciclo escolar',
            ],
            'methods' => [
                'SetFooter' => ['|Página {PAGENO}|'],
                'SetTitle' => ['Ciclo Escolar - ' . $model->nombre_ciclo_escolar . '.pdf'],
            ],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new CicloEscolar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CicloEscolar();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ciclo_escolar_id' => $model->ciclo_escolar_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CicloEscolar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ciclo_escolar_id Ciclo Escolar ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ciclo_escolar_id)
    {
        $model = $this->findModel($ciclo_escolar_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ciclo_escolar_id' => $model->ciclo_escolar_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CicloEscolar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ciclo_escolar_id Ciclo Escolar ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ciclo_escolar_id)
    {
        $this->findModel($ciclo_escolar_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CicloEscolar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ciclo_escolar_id Ciclo Escolar ID
     * @return CicloEscolar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ciclo_escolar_id)
    {
        if (($model = CicloEscolar::findOne(['ciclo_escolar_id' => $ciclo_escolar_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
