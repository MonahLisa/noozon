<?php

namespace app\controllers;

use app\models\ManagerList;
use app\models\ManagerListSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;


/**
 * ManagerListController implements the CRUD actions for ManagerList model.
 */
class ManagerListController extends Controller
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
     * Lists all ManagerList models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ManagerListSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ManagerList model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ManagerList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ManagerList();
//        if ($model->load(Yii::$app->request->post())) {

        if ($this->request->isPost) {
//            if ($manager = $model->createManager()) {
            if ($model->load($this->request->post()) ) {
                $model->save();


              $userRole = Yii::$app->authManager->getRole('manager');
              Yii::$app->authManager->assign($userRole, $model->manager_id);

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }
//        $userRole = Yii::$app->authManager->getRole('manager');
//        Yii::$app->authManager->assign($userRole, \Yii::$app->user->id);

        return $this->render('create', [
            'model' => $model,
        ]);
    }

//    public function actionSignup()
//    {
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post())) {
//            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    $userProfile = new UserProfile();
//                    $userProfile->user_id = \Yii::$app->user->id;
//                    $userProfile->first_name = 'Неизвестный';
//                    $userProfile->last_name = 'Пользователь';
//                    $favourite = new Favourite();
//                    $favourite->user_id = \Yii::$app->user->id;
//
//                    $userRole = Yii::$app->authManager->getRole('buyer');
//                    Yii::$app->authManager->assign($userRole, \Yii::$app->user->id);
//
//                    $userProfile->save();
//                    $favourite->save();
//
//
//                    return $this->redirect(["user-profile/index"]);
//                }
//            }
//        }
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Updates an existing ManagerList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
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
     * Deletes an existing ManagerList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $model = $this->findModel($id);
//        $userRole = Yii::$app->authManager->getRole('manager');
//        Yii::$app->authManager->remove($userRole, $id);

        return $this->redirect(['manager-list/index']);
    }

    /**
     * Finds the ManagerList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ManagerList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ManagerList::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
