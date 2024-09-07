<?php

use app\models\Admins;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-right">
                        <?= Html::a('Create Admins', ['create'], ['class' => 'btn btn-primary float-right']) ?>
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
                            'name',
                            'email:email',
                            'phone',
                            //'image',
                            [
                                'label' => 'Status',
                                'attribute' => 'is_active',
                                'format' => 'raw',
                                'value' => function ($model, $url) {
                                    return '<div class="onoffswitch">'
                                    . Html::checkbox('onoffswitch', $model->is_active, ['class' => "onoffswitch-checkbox", 'id' => "myonoffswitch" . $model->admin_id,
                                        'onclick' => 'app.changeStatus("admin/activate",this,' . $model->admin_id . ')'
                                    ])
                                    . '<label class="onoffswitch-label" for="myonoffswitch' . $model->admin_id . '"></label></div>';
                                },
                                'filter' => Html::activeDropDownList($searchModel, 'is_active', [1 => 'Active', 0 => 'Inactive'], ['class' => 'form-control select2', 'prompt' => 'Filter']),
                            ],
                            //'is_deleted',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Admins $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'admin_id' => $model->admin_id]);
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