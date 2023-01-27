<?php

namespace app\controllers;

use app\models\FavouriteHasProduct;
use app\models\FavouriteHasProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavouriteHasProductController implements the CRUD actions for FavouriteHasProduct model.
 */
class FavouriteHasProductController extends Controller
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
     * Lists all FavouriteHasProduct models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FavouriteHasProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FavouriteHasProduct model.
     * @param int $favourite_id Favourite ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($favourite_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($favourite_id),
        ]);
    }

    /**
     * Creates a new FavouriteHasProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new FavouriteHasProduct();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'favourite_id' => $model->favourite_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FavouriteHasProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $favourite_id Favourite ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($favourite_id)
    {
        $model = $this->findModel($favourite_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'favourite_id' => $model->favourite_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FavouriteHasProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $favourite_id Favourite ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($favourite_id)
    {
        $this->findModel($favourite_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FavouriteHasProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $favourite_id Favourite ID
     * @return FavouriteHasProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($favourite_id)
    {
        if (($model = FavouriteHasProduct::findOne(['favourite_id' => $favourite_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
