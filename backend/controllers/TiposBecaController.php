<?php

namespace backend\controllers;

use backend\models\Tiposbeca;
use backend\models\search\TiposBecaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TiposBecaController implements the CRUD actions for Tiposbeca model.
 */
class TiposBecaController extends Controller
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
     * Lists all Tiposbeca models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TiposBecaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tiposbeca model.
     * @param int $idtipos_beca Idtipos Beca
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtipos_beca)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtipos_beca),
        ]);
    }

    /**
     * Creates a new Tiposbeca model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tiposbeca();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtipos_beca' => $model->idtipos_beca]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tiposbeca model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtipos_beca Idtipos Beca
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtipos_beca)
    {
        $model = $this->findModel($idtipos_beca);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtipos_beca' => $model->idtipos_beca]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tiposbeca model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtipos_beca Idtipos Beca
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtipos_beca)
    {
        $this->findModel($idtipos_beca)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tiposbeca model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtipos_beca Idtipos Beca
     * @return Tiposbeca the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtipos_beca)
    {
        if (($model = Tiposbeca::findOne(['idtipos_beca' => $idtipos_beca])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
