<?php

namespace backend\controllers;

use backend\models\UnidadEstudio;
use backend\models\search\UnidadEstudioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use kartik\mpdf\pdf;

/**
 * UnidadEstudioController implements the CRUD actions for UnidadEstudio model.
 */
class UnidadEstudioController extends Controller
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
     * Lists all UnidadEstudio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UnidadEstudioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UnidadEstudio model.
     * @param int $id_unidad Id Unidad
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_unidad)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_unidad),
        ]);
    }




    public function actionViewpdf($id)
    { 
        $model = UnidadEstudio::findOne($id);
        // $materia= Asignatura::findOne($model->id_asignatura)->nombre. ' - ' . Grupos::findOne(['idgrupo'=>$model->grupo])->nombre ;
        
       $pdf = new Pdf([
        'mode' => Pdf::MODE_UTF8,
        'format' => Pdf::FORMAT_LETTER,
        'defaultFontSize'=>12,
        'defaultFont'=>'Arial',
        // 'orientation' => Pdf::ORIENT_LANDSCAPE,
        'orientation' => Pdf::ORIENT_PORTRAIT, // Cambiado a orientación vertical
        'marginBottom'=>30,
        'marginFooter'=>0,
        'destination' => Pdf::DEST_BROWSER,
        // 'cssFile'=>'@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        'cssInline' => '',
        'content'=>$this->renderPartial('viewpdf', ['model' => $this->findModel($id),false]),
        // 'filename'=>'Instrumentacion de '.$materia.'.pdf',
        'filename'=>'.pdf', //SE PUEDE MODIFICAR PARA EL TITULO DE LA PAGINA
        'options' => [
            'title' => '',
            'subject' => '',
                      
            ],
        'methods' => [  'SetFooter' => ['|Page {PAGENO}|'],
                        // 'SetHTMLFooter' => ('<div ALIGN="center"><img src="" width="200" height="50">
                        //  Pag.{PAGENO}</div>'),
                        'SetTitle'=>("UNIDAD DE ESTUDIO"), //SE MUESTRA ANTES DEL TITULO DE LA PAGINA
                    ]
    ]);
    return $pdf->render();
    }


    /**
     * Creates a new UnidadEstudio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UnidadEstudio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_unidad' => $model->id_unidad]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UnidadEstudio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_unidad Id Unidad
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_unidad)
    {
        $model = $this->findModel($id_unidad);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_unidad' => $model->id_unidad]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UnidadEstudio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_unidad Id Unidad
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_unidad)
    {
        $this->findModel($id_unidad)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UnidadEstudio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_unidad Id Unidad
     * @return UnidadEstudio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_unidad)
    {
        if (($model = UnidadEstudio::findOne(['id_unidad' => $id_unidad])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionList($id) 
    {
        $materias = UnidadEstudio::find()->where(['plan_estudios_id_plan' => $id])->all();
        $materiasSize = UnidadEstudio::find()->where(['plan_estudios_id_plan' => $id])->count();
        if ($materiasSize > 0) {
            echo '<option selected disabled>Selecciona una Unidad de Estudio</option>';
            foreach ($materias as $mat) {
                echo "<option value='" . $mat->id_unidad . "'>" . $mat->nombre_asignatura . " - " . $mat->clave .  "</option>";
            }
         } else {
            echo "<option> ---- </option>";
         }
    }


}
