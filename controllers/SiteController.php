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
use yii\web\UploadedFile;

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
            /* 'error' => [
              'class' => 'yii\web\ErrorAction',
              ], */
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionError() {
        $this->layout = 'custom_error';

        $exception = Yii::$app->errorHandler->exception;

        return $this->render('error', ['exception' => $exception]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        Yii::$app->session->remove('sku');
        Yii::$app->session->remove('code');
        Yii::$app->session->remove('form_submitted');
        $this->layout = 'site_main';
        return $this->render('index');
    }

    public function actionSpinWheel($loginCode) {
        Yii::$app->session->remove('sku');
        Yii::$app->session->remove('code');
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
        $sessionSku = Yii::$app->session['sku'];
        $sessionCode = Yii::$app->session['code'];
        $model = new GiftClaims();
        $model->item_code = $sessionSku;
        $model->created_at = date('Y-m-d H:i:s');
        //
        $item = Items::find()
                ->where(['is_active' => 1, 'is_deleted' => 0, 'sku' => $sessionSku])
                ->andWhere('remaining_qty > 0')
                ->one();
        if ($this->request->isPost) {
            $directory = \Yii::getAlias('@app/web/uploads') . DIRECTORY_SEPARATOR;
            if ($model->load($this->request->post())) {
                $imageFile = UploadedFile::getInstance($model, 'invoice_file');
                if (!empty($imageFile)) {
                    if ($imageFile) {
                        $filetype = mime_content_type($imageFile->tempName);
                        $allowed = array('image/png', 'image/jpeg', 'image/gif');
                        if (!in_array(strtolower($filetype), $allowed)) {
                            
                        } else {
                            $uid = uniqid(time(), true);
                            $fileName = $uid . '.' . $imageFile->extension;
                            $filePath = $directory . $fileName;
                            if ($imageFile->saveAs($filePath)) {
                                $model->invoice_file = $fileName;
                            }
                        }
                    }
                }
                if ($model->save()) {
                    $loginCode = \app\models\LoginCodes::find()
                            ->where(['code' => $sessionCode, 'used' => 0, 'is_active' => 1, 'is_deleted' => 0])
                            ->one();
                    if (!empty($loginCode)) {
                        $loginCode->used = 1;
                        $loginCode->used_at = date('Y-m-d H:i:s');
                        $loginCode->save(false);
                    }
                    if (!empty($item)) {
                        $oldQty = $item->remaining_qty;
                        $newQty = $oldQty - 1;
                        $item->remaining_qty = $newQty;
                        $item->updated_at = date('Y-m-d H:i:s');
                        $item->save(false);
                    }
                    $subject = "Congratulations on Winning " . $item->name_en . "!";
                    if ($item->sku >= 109) {
                        $subject = "Congratulations on Winning UFC 308 Tickets!";
                    }
                    Yii::$app->mailer->compose('@app/mail/gift-confirmation', [
                                'model' => $model,
                                'item' => $item,
                            ])
                            ->setFrom([Yii::$app->params['siteEmail'] => Yii::$app->params['appName']])
                            ->setTo($model->email)
                            ->setSubject($subject)
                            ->send();
                    Yii::$app->session->setFlash('success', Yii::t('yii', 'Thank You for submitting, you will receive an email from us shortly!'));
                    Yii::$app->session->set('form_submitted', 1);
                    return $this->redirect(['gift-claim']);
                }
            }
        }
        return $this->render('gift-claim', [
                    'model' => $model,
                    'sessionSku' => $sessionSku,
                    'item' => $item,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['dashboard/index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['dashboard/index']);
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

    public function actionTermsConditions() {
        $this->layout = 'site_main';
        return $this->render('terms-conditions');
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
                    ->where(['trim(code)' => $request['LoginCodes']['code'], 'used' => 0, 'is_active' => 1, 'is_deleted' => 0])
                    ->one();
            if (!empty($model)) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => 1, 'msg' => Yii::t('yii', 'Verification successful, Redirecting...'), 'code' => $model->code];
            } else {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => 0, 'msg' => Yii::t('yii', 'Verification failed: Invalid login code')];
            }
        }
    }

    public function actionClaimWiningItem() {
        if (isset($_GET) && $_GET['sku'] != '') {
            Yii::$app->session->set('sku', $_GET['sku']);
        }
        if (isset($_GET) && $_GET['code'] != '') {
            Yii::$app->session->set('code', $_GET['code']);
        }
    }

    public function actionTestEmail() {
        $model = GiftClaims::find()->one();
        $item = Items::find()
                ->where(['is_active' => 1, 'is_deleted' => 0, 'sku' => 104])
                ->andWhere('remaining_qty > 0')
                ->one();
        $subject = "Congratulations on Winning " . $item->name_en . "!";
        if ($item->sku >= 109) {
            $subject = "Congratulations on Winning UFC 308 Tickets!";
        }
        Yii::$app->mailer->compose('@app/mail/gift-confirmation', [
                    'model' => $model,
                    'item' => $item,
                ])
                ->setFrom([Yii::$app->params['siteEmail'] => Yii::$app->params['appName']])
                ->setTo('akram.lezasolutions@gmail.com')
                ->setSubject($subject)
                ->send();
    }
}
