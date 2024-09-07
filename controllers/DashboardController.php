<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\UserIdentity;
use app\components\AccessRule;

class DashboardController extends Controller
{

    public function behaviors() {
        return array_merge(
                parent::behaviors(),
                [
                    'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'delete' => ['POST'],
                        ],
                    ],
                    'access' => [
                        'class' => AccessControl::className(),
                        'ruleConfig' => [
                            'class' => AccessRule::className(),
                        ],
                        'only' => ['index'],
                        'rules' => [
                            [
                                'actions' => ['index'],
                                'allow' => true,
                                'roles' => [
                                    UserIdentity::ROLE_ADMIN
                                ]
                            ],
                        ],
                    ],
                ]
        );
    }

    public function actionIndex() {
        $items = \app\models\Items::find()
                ->where(['is_deleted' => 0])
                ->orderBy('item_id DESC')
                ->limit(5)
                ->all();

        $giftClaims = \app\models\GiftClaims::find()
                ->where(['is_deleted' => 0, 'is_processed' => 0])
                ->orderBy('gift_claim_id DESC')
                ->limit(5)
                ->all();

        $loginCodes = \app\models\LoginCodes::find()
                ->where(['is_deleted' => 0])
                ->orderBy('login_code_id DESC')
                ->limit(10)
                ->all();

        $adminCount = \app\models\Admins::find()
                ->where(['is_deleted' => 0])
                ->count();

        $itemCount = \app\models\Items::find()
                ->where(['is_deleted' => 0])
                ->count();

        $codeCount = \app\models\LoginCodes::find()
                ->where(['is_deleted' => 0])
                ->count();

        $claimCount = \app\models\GiftClaims::find()
                ->where(['is_deleted' => 0])
                ->count();

        return $this->render('index', [
                    'items' => $items,
                    'giftClaims' => $giftClaims,
                    'loginCodes' => $loginCodes,
                    'adminCount' => $adminCount,
                    'itemCount' => $itemCount,
                    'codeCount' => $codeCount,
                    'claimCount' => $claimCount,
        ]);
    }
}
