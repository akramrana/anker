<?php

namespace app\controllers;

use Yii;
use app\models\Items;
use app\models\ItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\UserIdentity;
use app\components\AccessRule;

/**
 * ItemController implements the CRUD actions for Items model.
 */
class ItemController extends Controller
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
     * Lists all Items models.
     *
     * @return string
     */
    public function actionIndex() {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Items model.
     * @param int $item_id Item ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($item_id) {
        return $this->render('view', [
                    'model' => $this->findModel($item_id),
        ]);
    }

    /**
     * Creates a new Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate() {
        $model = new Items();
        if ($this->request->isPost) {
            $request = $this->request->post();
            $model->is_active = 0;
            $model->is_deleted = 0;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            if ($model->load($request) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Item successfully added');
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
     * Updates an existing Items model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $item_id Item ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($item_id) {
        $model = $this->findModel($item_id);
        if ($this->request->isPost) {
            $model->updated_at = date('Y-m-d H:i:s');
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Item successfully added');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Items model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $item_id Item ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($item_id) {
        $model = $this->findModel($item_id);
        $model->is_deleted = 1;
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Item successfully deleted');
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
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $item_id Item ID
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_id) {
        if (($model = Items::findOne(['item_id' => $item_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
