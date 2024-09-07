<?php

use app\models\Items;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <?= Html::a('Create Items', ['create'], ['class' => 'btn btn-primary']) ?>
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
                            'name_en',
                            'name_ar',
                            'sku',
                            'remaining_qty',
                            [
                                'label' => 'Status',
                                'attribute' => 'is_active',
                                'format' => 'raw',
                                'value' => function ($model, $url) {
                                    return '<div class="onoffswitch">'
                                    . Html::checkbox('onoffswitch', $model->is_active, ['class' => "onoffswitch-checkbox", 'id' => "myonoffswitch" . $model->item_id,
                                        'onclick' => 'app.changeStatus("item/activate",this,' . $model->item_id . ')'
                                    ])
                                    . '<label class="onoffswitch-label" for="myonoffswitch' . $model->item_id . '"></label></div>';
                                },
                                'filter' => Html::activeDropDownList($searchModel, 'is_active', [1 => 'Active', 0 => 'Inactive'], ['class' => 'form-control select2', 'prompt' => 'Filter']),
                            ],
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Items $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'item_id' => $model->item_id]);
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