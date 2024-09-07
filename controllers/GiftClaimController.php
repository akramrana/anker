<?php

namespace app\controllers;

use Yii;
use app\models\GiftClaims;
use app\models\GiftClaimSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\UserIdentity;
use app\components\AccessRule;

/**
 * GiftClaimController implements the CRUD actions for GiftClaims model.
 */
class GiftClaimController extends Controller
{

    /**
     * @inheritDoc
     */
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
                        'only' => ['index', 'view', 'delete', 'activate'],
                        'rules' => [
                            [
                                'actions' => ['index', 'view', 'delete', 'activate'],
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

    /**
     * Lists all GiftClaims models.
     *
     * @return string
     */
    public function actionIndex() {
        $searchModel = new GiftClaimSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GiftClaims model.
     * @param int $gift_claim_id Gift Claim ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($gift_claim_id) {
        return $this->render('view', [
                    'model' => $this->findModel($gift_claim_id),
        ]);
    }

    /**
     * Deletes an existing GiftClaims model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $gift_claim_id Gift Claim ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($gift_claim_id) {
        $model = $this->findModel($gift_claim_id);
        $model->is_deleted = 1;
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Gift claims successfully deleted');
            return $this->redirect(['index']);
        }
        return $this->redirect(['index']);
    }
    
    public function actionContacted($id) {
        $model = $this->findModel($id);

        if ($model->is_contacted == 0)
            $model->is_contacted = 1;
        else
            $model->is_contacted = 0;

        if ($model->validate() && $model->save()) {
            return '1';
        } else {
            return json_encode($model->errors);
        }
    }
    
    public function actionProcessed($id) {
        $model = $this->findModel($id);

        if ($model->is_processed == 0)
            $model->is_processed = 1;
        else
            $model->is_processed = 0;

        if ($model->validate() && $model->save()) {
            return '1';
        } else {
            return json_encode($model->errors);
        }
    }

    /**
     * Finds the GiftClaims model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $gift_claim_id Gift Claim ID
     * @return GiftClaims the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($gift_claim_id) {
        if (($model = GiftClaims::findOne(['gift_claim_id' => $gift_claim_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
