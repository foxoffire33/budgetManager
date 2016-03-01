<?php

namespace frontend\controllers;

use Yii;
use common\models\PotItem;
use common\models\search\PotitemSearch;
use frontend\components\web\FrontendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PotItemController implements the CRUD actions for PotItem model.
 */
class PotItemController extends FrontendController
{

    /**
     * Lists all PotItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PotitemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PotItem model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PotItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PotItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pot/view', 'id' => $model->pot_id]);
        }

        return $this->render('create', ['model' => $model,]);
    }

    /**
     * Updates an existing PotItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pot/view', 'id' => $model->pot_id]);
        }
        return $this->render('update', ['model' => $model,]);
    }

    /**
     * Deletes an existing PotItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['/pot/view', 'id' => $model->pot_id]);
    }

    /**
     * Finds the PotItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PotItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PotItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
