<?php

namespace backend\controllers;

use frontend\models\Perfil;
use backend\models\search\PerfilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use common\models\PermisosHelpers;
use kartik\mpdf\pdf;
use yii;
use yii\data\ActiveDataProvider;
/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'only' => ['index', 'view','create', 'update', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['index', 'create', 'view',],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function ($rule, $action) {
                             return PermisosHelpers::requerirMinimoRol('Admin') 
                             && PermisosHelpers::requerirEstado('Activo');
                            }
                        ],
                         [
                            'actions' => [ 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function ($rule, $action) {
                             return PermisosHelpers::requerirMinimoRol('SuperUsuario') 
                             && PermisosHelpers::requerirEstado('Activo');
                            }
                        ],
                             
                    ],
                         
                ],

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
     * Lists all Perfil models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PerfilSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
            
        ]);
        
    }

    public function actionViewpdf($id)
    {
        $model = Perfil::findOne($id);
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
        'filename'=>'.pdf',
        'options' => [
            'title' => '',
            'subject' => '',
                      
            ],
        'methods' => [  'SetFooter' => ['|Page {PAGENO}|'],
                        // 'SetHTMLFooter' => ('<div ALIGN="center"><img src="" width="200" height="50">
                        //  Pag.{PAGENO}</div>'),
                        'SetTitle'=>("PERFIL"),
                    ]
    ]);
    return $pdf->render();
    }

    /**
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Perfil();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Perfil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
