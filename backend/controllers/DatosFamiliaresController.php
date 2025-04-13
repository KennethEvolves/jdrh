<?php

namespace backend\controllers;

use backend\models\DatosFamiliares;
use backend\models\EstadoCivil;
use backend\models\search\DatosFamiliaresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * DatosFamiliaresController implements the CRUD actions for DatosFamiliares model.
 */
class DatosFamiliaresController extends Controller
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
     * Lists all DatosFamiliares models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DatosFamiliaresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DatosFamiliares model.
     * @param int $id_datosFamiliares
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_datosFamiliares)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_datosFamiliares),
        ]);
    }

    /**
     * Generates a PDF for a single OptMotivosEstudio model.
     * @param int $motivo_id Motivo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewpdf($id_datosFamiliares)
    {
        $model = $this->findModel($id_datosFamiliares);

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
                'title' => 'Datos Familiares PDF',
                'subject' => 'Detalles de los datos familiares',
            ],
            'methods' => [
                'SetFooter' => ['|Página {PAGENO}|'],
                'SetTitle' => ['Datos Familiares - ' . $model->id_datosFamiliares . '.pdf'],
            ],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new DatosFamiliares model.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DatosFamiliares();
        $estadoCivilOptions = EstadoCivil::find()->select(['nombre_estado_civil', 'estado_civil_id'])->indexBy('estado_civil_id')->column();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_datosFamiliares' => $model->id_datosFamiliares]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'estadoCivilOptions' => $estadoCivilOptions,
        ]);
    }

    /**
     * Updates an existing DatosFamiliares model.
     *
     * @param int $id_datosFamiliares
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_datosFamiliares)
    {
        $model = $this->findModel($id_datosFamiliares);
        $estadoCivilOptions = EstadoCivil::find()->select(['nombre_estado_civil', 'estado_civil_id'])->indexBy('estado_civil_id')->column();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_datosFamiliares' => $model->id_datosFamiliares]);
        }

        return $this->render('update', [
            'model' => $model,
            'estadoCivilOptions' => $estadoCivilOptions,
        ]);
    }

    /**
     * Deletes an existing DatosFamiliares model.
     *
     * @param int $id_datosFamiliares
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_datosFamiliares)
    {
        $this->findModel($id_datosFamiliares)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DatosFamiliares model based on its primary key value.
     *
     * @param int $id_datosFamiliares
     * @return DatosFamiliares
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_datosFamiliares)
    {
        if (($model = DatosFamiliares::findOne(['id_datosFamiliares' => $id_datosFamiliares])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
