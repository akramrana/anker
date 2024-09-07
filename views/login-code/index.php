<?php

use app\models\LoginCodes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LoginCodeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Login Codes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <?= Html::a('Create Login Codes', ['create'], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'code',
                            [
                                'attribute' => 'used_at',
                                'filter' => false
                            ],
                            [
                                'attribute' => 'used',
                                'value' => function ($model, $url) {
                                    return $model->used == 1 ? 'Yes' : 'No';
                                },
                                'filter' => Html::activeDropDownList($searchModel, 'used', [1 => 'Yes', 0 => 'No'], ['class' => 'form-control select2', 'prompt' => 'Filter']),
                            ],
                            [
                                'label' => 'Status',
                                'attribute' => 'is_active',
                                'format' => 'raw',
                                'value' => function ($model, $url) {
                                    return '<div class="onoffswitch">'
                                    . Html::checkbox('onoffswitch', $model->is_active, ['class' => "onoffswitch-checkbox", 'id' => "myonoffswitch" . $model->login_code_id,
                                        'onclick' => 'app.changeStatus("login-code/activate",this,' . $model->login_code_id . ')'
                                    ])
                                    . '<label class="onoffswitch-label" for="myonoffswitch' . $model->login_code_id . '"></label></div>';
                                },
                                'filter' => Html::activeDropDownList($searchModel, 'is_active', [1 => 'Active', 0 => 'Inactive'], ['class' => 'form-control select2', 'prompt' => 'Filter']),
                            ],
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, LoginCodes $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'login_code_id' => $model->login_code_id]);
                                }
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
