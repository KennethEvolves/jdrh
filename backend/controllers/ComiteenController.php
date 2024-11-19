<?php

namespace backend\controllers;

use backend\models\Comiteen;
use backend\models\search\ComiteenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComiteenController implements the CRUD actions for Comiteen model.
 */
class ComiteenController extends Controller
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
     * Lists all Comiteen models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ComiteenSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comiteen model.
     * @param int $id_comiteEN Id Comite En
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_comiteEN)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_comiteEN),
        ]);
    }

    /**
     * Creates a new Comiteen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Comiteen();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_comiteEN' => $model->id_comiteEN]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Comiteen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_comiteEN Id Comite En
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_comiteEN)
    {
        $model = $this->findModel($id_comiteEN);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_comiteEN' => $model->id_comiteEN]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Comiteen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_comiteEN Id Comite En
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_comiteEN)
    {
        $this->findModel($id_comiteEN)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comiteen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_comiteEN Id Comite En
     * @return Comiteen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_comiteEN)
    {
        if (($model = Comiteen::findOne(['id_comiteEN' => $id_comiteEN])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
