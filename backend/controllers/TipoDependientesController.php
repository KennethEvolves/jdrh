<?php

namespace backend\controllers;

use backend\models\TipoDependientes;
use backend\models\search\TipoDependientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoDependientesController implements the CRUD actions for TipoDependientes model.
 */
class TipoDependientesController extends Controller
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
     * Lists all TipoDependientes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TipoDependientesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoDependientes model.
     * @param int $idtipo_dependientes Idtipo Dependientes
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtipo_dependientes)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtipo_dependientes),
        ]);
    }

    /**
     * Creates a new TipoDependientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TipoDependientes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtipo_dependientes' => $model->idtipo_dependientes]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoDependientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtipo_dependientes Idtipo Dependientes
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtipo_dependientes)
    {
        $model = $this->findModel($idtipo_dependientes);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtipo_dependientes' => $model->idtipo_dependientes]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoDependientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtipo_dependientes Idtipo Dependientes
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtipo_dependientes)
    {
        $this->findModel($idtipo_dependientes)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoDependientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtipo_dependientes Idtipo Dependientes
     * @return TipoDependientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtipo_dependientes)
    {
        if (($model = TipoDependientes::findOne(['idtipo_dependientes' => $idtipo_dependientes])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
