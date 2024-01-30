<?php

namespace backend\controllers;
use Yii;
use backend\models\Carrera;
use backend\models\search\CarreraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\search\PlanEstudiosSearch;
use backend\models\PlanEstudios;

use kartik\mpdf\pdf;
/**
 * CarreraController implements the CRUD actions for Carrera model.
 */
class CarreraController extends Controller
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
     * Lists all Carrera models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CarreraSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carrera model.
     * @param int $id_carrera Id Carrera
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_carrera)
    {
        //  return $this->render('view', [
        //      'model' => $this->findModel($id_carrera),
        //  ]);

        $searchModel = new PlanEstudiosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id_carrera);

        return $this->render('view', [
            'model' => $this->findModel($id_carrera),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,

            
        ]);


        
    }


    public function actionViewpdf($id)
    { 
        $model = Carrera::findOne($id);
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
                        'SetTitle'=>("CARRERA"), //SE MUESTRA ANTES DEL TITULO DE LA PAGINA
                    ]
    ]);
    return $pdf->render();
    }



    /**
     * Creates a new Carrera model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Carrera();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_carrera' => $model->id_carrera]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Carrera model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_carrera Id Carrera
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_carrera)
    {
        $model = $this->findModel($id_carrera);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_carrera' => $model->id_carrera]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Carrera model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_carrera Id Carrera
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_carrera)
    {
        $this->findModel($id_carrera)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Carrera model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_carrera Id Carrera
     * @return Carrera the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_carrera)
    {
        if (($model = Carrera::findOne(['id_carrera' => $id_carrera])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }




}
