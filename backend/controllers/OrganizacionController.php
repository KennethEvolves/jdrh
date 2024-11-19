<?php

namespace backend\controllers;

use backend\models\Organizacion;
use backend\models\search\OrganizacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrganizacionController implements the CRUD actions for Organizacion model.
 */
class OrganizacionController extends Controller
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
     * Lists all Organizacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrganizacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Organizacion model.
     * @param int $id_participacionOrganizacion Id Participacion Organizacion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_participacionOrganizacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_participacionOrganizacion),
        ]);
    }

    /**
     * Creates a new Organizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Organizacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_participacionOrganizacion' => $model->id_participacionOrganizacion]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Organizacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_participacionOrganizacion Id Participacion Organizacion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_participacionOrganizacion)
    {
        $model = $this->findModel($id_participacionOrganizacion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_participacionOrganizacion' => $model->id_participacionOrganizacion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Organizacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_participacionOrganizacion Id Participacion Organizacion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_participacionOrganizacion)
    {
        $this->findModel($id_participacionOrganizacion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Organizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_participacionOrganizacion Id Participacion Organizacion
     * @return Organizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_participacionOrganizacion)
    {
        if (($model = Organizacion::findOne(['id_participacionOrganizacion' => $id_participacionOrganizacion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
