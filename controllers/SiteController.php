<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\GiftClaims;
use app\models\LoginCodes;
use app\models\Items;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
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

    public function init() {
        parent::init();
        if (Yii::$app->session->has('lang')) {
            Yii::$app->language = Yii::$app->session->get('lang');
        } else {
            Yii::$app->language = 'en';
            Yii::$app->session->set('lang', 'en');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
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
    public function actionIndex() {
        Yii::$app->session->remove('sku');
        $this->layout = 'site_main';
        return $this->render('index');
    }

    public function actionSpinWheel($loginCode) {
        Yii::$app->session->remove('sku');
        $model = \app\models\LoginCodes::find()
                ->where(['code' => $loginCode, 'used' => 0, 'is_active' => 1, 'is_deleted' => 0])
                ->one();
        $items = Items::find()
                ->where(['is_active' => 1, 'is_deleted' => 0])
                ->andWhere('remaining_qty > 0')
                ->all();
        $this->layout = 'site_main';
        return $this->render('spin-wheel', [
                    'model' => $model,
                    'items' => $items
        ]);
    }

    public function actionGiftClaim() {
        $this->layout = 'site_main';
        $model = new GiftClaims();
        $model->item_code = Yii::$app->session['sku'];
        return $this->render('gift-claim', [
                    'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['dashboard/index']);
            ;
        }

        $model->password = '';
        return $this->renderAjax('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
        ;
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
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
    public function actionAbout() {
        return $this->render('about');
    }

    public function actionChangeLanguage() {
        if (isset($_GET) && $_GET['lang'] != '') {
            Yii::$app->session->set('lang', $_GET['lang']);
        }
    }

    public function actionVerifyCode() {
        if (Yii::$app->request->isAjax) {
            $request = Yii::$app->request->post();
            $model = \app\models\LoginCodes::find()
                    ->where(['code' => $request['LoginCodes']['code'], 'used' => 0, 'is_active' => 1, 'is_deleted' => 0])
                    ->one();
            if (!empty($model)) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => 1, 'msg' => 'Verification successfull', 'code' => $model->code];
            } else {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => 0, 'msg' => 'Verification failed: Invalid login code'];
            }
        }
    }
    
    public function actionClaimWiningItem() {
        if (isset($_GET) && $_GET['sku'] != '') {
            Yii::$app->session->set('sku', $_GET['sku']);
        }
    }
}
