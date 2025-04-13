<?php

namespace backend\controllers;

use backend\models\InformacionPersonal;
use backend\models\Licenciaturas; // Importamos el modelo de Licenciaturas
use backend\models\CicloEscolar; // Importamos el modelo de CicloEscolar
use backend\models\search\InformacionPersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;

class InformacionPersonalController extends Controller
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
     * Lists all InformacionPersonal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InformacionPersonalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InformacionPersonal model.
     * @param int $inf_personal_id Inf Personal ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($inf_personal_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($inf_personal_id),
        ]);
    }

    /**
     * Generates a PDF for a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($inf_personal_id)
    {
        $model = $this->findModel($inf_personal_id);

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
                'title' => 'Información Personal PDF',
                'subject' => 'Detalles de la información personal',
            ],
            'methods' => [
                'SetFooter' => ['|Página {PAGENO}|'],
                'SetTitle' => ['Información personal - ' . $model->inf_personal_id . '.pdf'],
            ],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new InformacionPersonal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InformacionPersonal();

        // Obtener las opciones para los dropDownList
        $licenciaturas = ArrayHelper::map(Licenciaturas::find()->all(), 'licenciatura_id', 'nombre_licenciatura');
        $ciclosEscolares = ArrayHelper::map(CicloEscolar::find()->all(), 'ciclo_escolar_id', 'nombre_ciclo_escolar');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'inf_personal_id' => $model->inf_personal_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'licenciaturas' => $licenciaturas, // Pasamos las licenciaturas
            'ciclosEscolares' => $ciclosEscolares, // Pasamos los ciclos escolares
        ]);
    }

    /**
     * Updates an existing InformacionPersonal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $inf_personal_id Inf Personal ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($inf_personal_id)
    {
        $model = $this->findModel($inf_personal_id);

        // Obtener las opciones para los dropDownList
        $licenciaturas = ArrayHelper::map(Licenciaturas::find()->all(), 'licenciatura_id', 'nombre_licenciatura');
        $ciclosEscolares = ArrayHelper::map(CicloEscolar::find()->all(), 'ciclo_escolar_id', 'nombre_ciclo_escolar');

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'inf_personal_id' => $model->inf_personal_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'licenciaturas' => $licenciaturas, // Pasamos las licenciaturas
            'ciclosEscolares' => $ciclosEscolares, // Pasamos los ciclos escolares
        ]);
    }

    /**
     * Deletes an existing InformacionPersonal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $inf_personal_id Inf Personal ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($inf_personal_id)
    {
        $this->findModel($inf_personal_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InformacionPersonal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $inf_personal_id Inf Personal ID
     * @return InformacionPersonal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($inf_personal_id)
    {
        if (($model = InformacionPersonal::findOne(['inf_personal_id' => $inf_personal_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
