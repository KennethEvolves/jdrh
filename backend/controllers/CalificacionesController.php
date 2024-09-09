<?php

namespace backend\controllers;

use backend\models\Calificaciones;
use backend\models\Generaciones;
use backend\models\search\CalificacionesSearch;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Json;
use kartik\editable\EditableAction;
use yii\web\Response;




/**
 * CalificacionesController implements the CRUD actions for Calificaciones model.
 */
class CalificacionesController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Calificaciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CalificacionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        
        $model = new Calificaciones();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     // Redirigir a la vista de detalles del nuevo registro
        //     return $this->redirect(['view', 'id_calificacion' => $model->id_calificacion]);
        // }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Calificaciones model.
     * @param int $id_calificacion Id Calificacion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_calificacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_calificacion),
        ]);
    }

    /**
     * Creates a new Calificaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Calificaciones();
        $generaciones = Generaciones::find()->all();
        

        if ($this->request->isPost) {
            $postData = $this->request->post();
            $model->id_generaciones = $postData['Calificaciones']['id_generaciones'];

    
            // Establecer valores predeterminados
            if (empty($postData['Calificaciones']['calif_m1'])) {
                $postData['Calificaciones']['calif_m1'] = 0;
            }
    
            if (empty($postData['Calificaciones']['calif_m2'])) {
                $postData['Calificaciones']['calif_m2'] = 0;
            }
    
            if (empty($postData['Calificaciones']['promedio'])) {
                $postData['Calificaciones']['promedio'] = 0;
            }
    
            if (empty($postData['Calificaciones']['proyecto_integrador'])) {
                $postData['Calificaciones']['proyecto_integrador'] = 0;
            }
    
            if (empty($postData['Calificaciones']['calif_final'])) {
                $postData['Calificaciones']['calif_final'] = 0;
            }
    
            if (empty($postData['Calificaciones']['porcentaje_asistencia'])) {
                $postData['Calificaciones']['porcentaje_asistencia'] = 0;
            }
    

            if ($model->load($postData) && $model->save()) {
                return $this->redirect(['index', 'id_calificacion' => $model->id_calificacion]);
            } else {
                Yii::error('Error al guardar el modelo: ' . print_r($model->errors, true));
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'generaciones' => $generaciones,
        ]);
    }

    /**
     * Updates an existing Calificaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_calificacion Id Calificacion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_calificacion)
    {
        $model = $this->findModel($id_calificacion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id_calificacion' => $model->id_calificacion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Calificaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_calificacion Id Calificacion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_calificacion)
    {
        $this->findModel($id_calificacion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Calificaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_calificacion Id Calificacion
     * @return Calificaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_calificacion)
    {
        if (($model = Calificaciones::findOne(['id_calificacion' => $id_calificacion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //calificacion 1
    public function actionEditable($id_calificacion)
    {   
        Yii::$app->response->format = Response::FORMAT_JSON; // Configura el formato de respuesta como JSON

        $model = Calificaciones::findOne($id_calificacion);

        if ($model !== null) {
            // Carga los datos del POST al modelo
            $model->load(Yii::$app->request->post(), '');

            if ($model->validate() && $model->save()) {
                return ['success' => true, 'value' => $model->calif_m1];
            } else {
                return ['success' => false, 'error' => $model->errors];
            }
        } else {
            return ['success' => false, 'error' => 'La calificación no fue encontrada.'];
        }
    }

    //calificacion 2
    public function actionEditable2($id_calificacion)
    {   
        Yii::$app->response->format = Response::FORMAT_JSON; // Configura el formato de respuesta como JSON

        $model = Calificaciones::findOne($id_calificacion);

        if ($model !== null) {
            // Carga los datos del POST al modelo
            $model->load(Yii::$app->request->post(), '');

            if ($model->validate() && $model->save()) {
                return ['success' => true, 'value' => $model->calif_m2];
            } else {
                return ['success' => false, 'error' => $model->errors];
            }
        } else {
            return ['success' => false, 'error' => 'La calificación no fue encontrada.'];
        }
    }
    //promedio
    public function actionEditable3($id_calificacion)
    {   
        Yii::$app->response->format = Response::FORMAT_JSON; // Configura el formato de respuesta como JSON

        $model = Calificaciones::findOne($id_calificacion);

        if ($model !== null) {
            // Carga los datos del POST al modelo
            $model->load(Yii::$app->request->post(), '');

            if ($model->validate() && $model->save()) {
                return ['success' => true, 'value' => $model->promedio];
            } else {
                return ['success' => false, 'error' => $model->errors];
            }
        } else {
            return ['success' => false, 'error' => 'La calificación no fue encontrada.'];
        }
    }
    //proyecto integrador 
    public function actionEditable4($id_calificacion)
    {   
        Yii::$app->response->format = Response::FORMAT_JSON; // Configura el formato de respuesta como JSON

        $model = Calificaciones::findOne($id_calificacion);

        if ($model !== null) {
            // Carga los datos del POST al modelo
            $model->load(Yii::$app->request->post(), '');

            if ($model->validate() && $model->save()) {
                return ['success' => true, 'value' => $model->proyecto_integrador];
            } else {
                return ['success' => false, 'error' => $model->errors];
            }
        } else {
            return ['success' => false, 'error' => 'La calificación no fue encontrada.'];
        }
    }
    //calificacion final
    public function actionEditable5($id_calificacion)
    {   
        Yii::$app->response->format = Response::FORMAT_JSON; // Configura el formato de respuesta como JSON

        $model = Calificaciones::findOne($id_calificacion);

        if ($model !== null) {
            // Carga los datos del POST al modelo
            $model->load(Yii::$app->request->post(), '');

            if ($model->validate() && $model->save()) {
                return ['success' => true, 'value' => $model->calif_final];
            } else {
                return ['success' => false, 'error' => $model->errors];
            }
        } else {
            return ['success' => false, 'error' => 'La calificación no fue encontrada.'];
        }
    }
    //porcentaje calificacion
    public function actionEditable6($id_calificacion)
    {   
        Yii::$app->response->format = Response::FORMAT_JSON; // Configura el formato de respuesta como JSON

        $model = Calificaciones::findOne($id_calificacion);

        if ($model !== null) {
            // Carga los datos del POST al modelo
            $model->load(Yii::$app->request->post(), '');

            if ($model->validate() && $model->save()) {
                return ['success' => true, 'value' => $model->porcentaje_asistencia];
            } else {
                return ['success' => false, 'error' => $model->errors];
            }
        } else {
            return ['success' => false, 'error' => 'La calificación no fue encontrada.'];
        }
    }



    
    




        

    
}
