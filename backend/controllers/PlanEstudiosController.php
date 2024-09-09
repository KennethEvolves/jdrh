<?php

namespace backend\controllers;
use yii;
use backend\models\PlanEstudios;
use backend\models\search\PlanEstudiosSearch;
use backend\models\UnidadEstudio;
use backend\models\search\UnidadEstudioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanEstudiosController implements the CRUD actions for PlanEstudios model.
 */
class PlanEstudiosController extends Controller
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
     * Lists all PlanEstudios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlanEstudiosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlanEstudios model.
     * @param int $id_plan Id Plan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_plan)
    {
//            return $this->render('view', [
//                'model' => $this->findModel($id_plan),
//            ]);

        // $model = PlanEstudios::findOne($id_plan);
        // return $this->render('view', [
        //     'model' => $model,
        // ]);
        $searchModel = new UnidadEstudioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id_plan);

        return $this->render('view', [
            'model' => $this->findModel($id_plan),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);

        // $searchModel = new AsignaturaSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);
        // return $this->render('view', [
        //     'model' => $this->findModel($id),
        //     'searchModel'=>$searchModel,
        //     'dataProvider'=>$dataProvider,
        // ]);

    }

    /**
     * Creates a new PlanEstudios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PlanEstudios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_plan' => $model->id_plan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PlanEstudios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_plan Id Plan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_plan)
    {
        $model = $this->findModel($id_plan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_plan' => $model->id_plan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PlanEstudios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_plan Id Plan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_plan)
    {
        $this->findModel($id_plan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PlanEstudios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_plan Id Plan
     * @return PlanEstudios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_plan)
    {
        if (($model = PlanEstudios::findOne(['id_plan' => $id_plan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
    * Obtiene un listado de planes de estudio cuyo id_carrera coincida con el argumento.
    * El formato del listado será HTML de tipo <option value=id_carrera>nombre</option>
    */
    public function actionList($id) 
    {
    $planes = PlanEstudios::find()->where(['carrera_id_carrera' => $id])->all();
    $planesSize = PlanEstudios::find()->where(['carrera_id_carrera' => $id])->count();
    if ($planesSize > 0) 
        {   echo '<option selected disabled>Selecciona un Plan de Estudio</option>';
        foreach ($planes as $p) {
            echo "<option value='" . $p->id_plan . "'>" . $p->nombre . "</option>";
        }
     } else {
        echo "<option> ---- </option>";
     }
    }






}
