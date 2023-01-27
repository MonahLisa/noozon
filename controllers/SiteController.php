<?php

namespace app\controllers;

use app\models\Favourite;
use app\models\SignupForm;
use app\models\UserProfile;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                //'only' => ['logout'],
                'only' => ['login', 'logout', 'signup', 'index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],


                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],


                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],

                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }





    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    $userProfile = new UserProfile();
                    $userProfile->user_id = \Yii::$app->user->id;
                    $userProfile->first_name = 'Неизвестный';
                    $userProfile->last_name = 'Пользователь';
                    $favourite = new Favourite();
                    $favourite->user_id = \Yii::$app->user->id;

                    $userRole = Yii::$app->authManager->getRole('buyer');
                    Yii::$app->authManager->assign($userRole, \Yii::$app->user->id);

                    $userProfile->save();
                    $favourite->save();


                    return $this->redirect(["user-profile/index"]);
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }




    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(["user-profile/index"]);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(["user-profile/index"]);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRole()
    {


//        $admin = Yii::$app -> AuthManager -> createRole('admin');
//        $admin -> description = 'Администратор';
//        Yii::$app -> AuthManager -> add($admin);
//
//        $manager = Yii::$app -> AuthManager -> createRole('manager');
//        $manager -> description = 'Менеджер';
//        Yii::$app -> AuthManager -> add($manager);
//
//        $user = Yii::$app -> AuthManager -> createRole('user');
//        $user -> description = 'Пользователь';
//        Yii::$app -> AuthManager -> add($user);
//
//        $buyer = Yii::$app -> AuthManager -> createRole('buyer');
//        $buyer -> description = 'Покупатель';
//        Yii::$app -> AuthManager -> add($buyer);
//
//        $ban = Yii::$app -> AuthManager -> createRole('banned');
//        $ban -> description = 'Заблокированный пользователь';
//        Yii::$app -> AuthManager -> add($ban);
//
//        $permit = Yii::$app->authManager->createPermission('canAdmin');
//        $permit->description = 'Право входа в админку';
//        Yii::$app->authManager->add($permit);
//
//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_m = Yii::$app->authManager->getRole('manager');
//        $permit = Yii::$app->authManager->getPermission('canAdmin');
//        Yii::$app->authManager->addChild($role_a, $permit);
//        Yii::$app->authManager->addChild($role_m, $permit);
//

//        $permit = Yii::$app->authManager->createPermission('updateUser');
//        $permit->description = 'Право менять права пользователям';
//        Yii::$app->authManager->add($permit);

//        $permit = Yii::$app->authManager->createPermission('writeReview');
//        $permit->description = 'Право написать отзыв под товаром';
//        Yii::$app->authManager->add($permit);


//        $permit = Yii::$app->authManager->createPermission('createCompany');
//        $permit->description = 'Право создать компанию';
//        Yii::$app->authManager->add($permit);


//        $permit = Yii::$app->authManager->createPermission('putRating');
//        $permit->description = 'Право ставить оценку товару';
//        Yii::$app->authManager->add($permit);





//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_m = Yii::$app->authManager->getRole('manager');
//        $permit = Yii::$app->authManager->getPermission('createCompany');
//        Yii::$app->authManager->addChild($role_a, $permit);
//        Yii::$app->authManager->addChild($role_m, $permit);




//        $permit = Yii::$app->authManager->createPermission('buyProduct');
//        $permit->description = 'Право покупать товар';
//        Yii::$app->authManager->add($permit);



//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_m = Yii::$app->authManager->getRole('manager');
//        $role_b = Yii::$app->authManager->getRole('buyer');

//        $permit = Yii::$app->authManager->getPermission('buyProduct');
//        Yii::$app->authManager->addChild($role_a, $permit);
//        Yii::$app->authManager->addChild($role_m, $permit);
//        Yii::$app->authManager->addChild($role_b, $permit);







//        $permit = Yii::$app->authManager->createPermission('addProduct');
//        $permit->description = 'Право добавлять товар';
//        Yii::$app->authManager->add($permit);



//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_m = Yii::$app->authManager->getRole('manager');
//        $permit = Yii::$app->authManager->getPermission('addProduct');
//        Yii::$app->authManager->addChild($role_a, $permit);
//        Yii::$app->authManager->addChild($role_m, $permit);








//        $userRole = Yii::$app->authManager->getRole('admin');
//        Yii::$app->authManager->assign($userRole, 6);
//        Yii::$app->authManager->assign($userRole, Yii::$app->user->getId());
//
//        $permit = Yii::$app->authManager->createPermission('canManagement');
//        $permit->description = 'Право быть менеджером компании';
//        Yii::$app->authManager->add($permit);

        return 123;
    }

}
