<?php

namespace app\controllers;

use Yii;
use app\models\Admins;
use app\models\AdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\UserIdentity;
use app\components\AccessRule;
/**
 * AdminController implements the CRUD actions for Admins model.
 */
class AdminController extends Controller
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
                        'only' => ['index', 'view', 'create', 'update', 'delete', 'activate'],
                        'rules' => [
                            [
                                'actions' => ['index', 'view', 'create', 'update', 'delete', 'activate'],
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
     * Lists all Admins models.
     *
     * @return string
     */
    public function actionIndex() {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admins model.
     * @param int $admin_id Admin ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($admin_id) {
        return $this->render('view', [
                    'model' => $this->findModel($admin_id),
        ]);
    }

    /**
     * Creates a new Admins model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate() {
        $model = new Admins();
        $model->scenario = 'create';
        if ($this->request->isPost) {
            $model->admin_type = 'A';
            $model->is_active = 0;
            $model->is_deleted = 0;
            //
            $request = $this->request->post();
            $password = $request['Admins']['password_hash'];
            $model->password = Yii::$app->security->generatePasswordHash($password);
            if ($model->load($request) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Admin successfully added');
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Admins model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $admin_id Admin ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($admin_id) {
        $model = $this->findModel($admin_id);

        if ($this->request->isPost) {
            $request = $this->request->post();
            if (isset($request['Admins']['password_hash']) && $request['Admins']['password_hash'] != "") {
                $model->password = Yii::$app->getSecurity()->generatePasswordHash($request['Admins']['password_hash']);
            }
            if ($model->load($request) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Admin successfully updated');
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Admins model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $admin_id Admin ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($admin_id) {
        $model = $this->findModel($admin_id);
        $model->is_deleted = 1;
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Admin successfully deleted');
            return $this->redirect(['index']);
        }
        return $this->redirect(['index']);
    }

    public function actionActivate($id) {
        $model = $this->findModel($id);

        if ($model->is_active == 0)
            $model->is_active = 1;
        else
            $model->is_active = 0;

        if ($model->validate() && $model->save()) {
            return '1';
        } else {

            return json_encode($model->errors);
        }
    }

    /**
     * Finds the Admins model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $admin_id Admin ID
     * @return Admins the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($admin_id) {
        if (($model = Admins::findOne(['admin_id' => $admin_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
