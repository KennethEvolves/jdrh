<?php

namespace backend\controllers;

use common\models\User;
use backend\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use common\models\PermisosHelpers;


use kartik\mpdf\pdf;


use yii\data\ActiveDataProvider;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
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
        $model = User::findOne($id);
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
                        'SetTitle'=>("USUARIO"), //SE MUESTRA ANTES DEL TITULO DE LA PAGINA
                    ]
    ]);
    return $pdf->render();
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();

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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
