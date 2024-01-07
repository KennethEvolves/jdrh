<?php

namespace backend\controllers;

use backend\models\UnidadEstudio;
use backend\models\search\UnidadEstudioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
