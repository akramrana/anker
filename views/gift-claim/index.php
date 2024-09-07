<?php

use app\models\GiftClaims;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\GiftClaimSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Gift Claims';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        
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
                            'first_name',
                            'email:email',
                            'phone',
                            //'address_line_1',
                            //'address_line_2',
                            //'landmark',
                            //'city',
                            'item_code',
                            'purchase_date',
                            'purchase_place',
                            //'invoice_file',
                            //'is_deleted',
                            [
                                'attribute' => 'is_contacted',
                                'format' => 'raw',
                                'value' => function ($model, $url) {
                                    return '<div class="onoffswitch">'
                                    . Html::checkbox('onoffswitch', $model->is_contacted, ['class' => "onoffswitch-checkbox", 'id' => "myonoffswitch-contacted" . $model->gift_claim_id,
                                        'onclick' => 'app.changeStatus("gift-claim/contacted",this,' . $model->gift_claim_id . ')'
                                    ])
                                    . '<label class="onoffswitch-label" for="myonoffswitch-contacted' . $model->gift_claim_id . '"></label></div>';
                                },
                                'filter' => Html::activeDropDownList($searchModel, 'is_contacted', [1 => 'Yes', 0 => 'No'], ['class' => 'form-control select2', 'prompt' => 'Filter']),
                            ],
                            [
                                'attribute' => 'is_processed',
                                'format' => 'raw',
                                'value' => function ($model, $url) {
                                    return '<div class="onoffswitch">'
                                    . Html::checkbox('onoffswitch', $model->is_processed, ['class' => "onoffswitch-checkbox", 'id' => "myonoffswitch-processed" . $model->gift_claim_id,
                                        'onclick' => 'app.changeStatus("gift-claim/processed",this,' . $model->gift_claim_id . ')'
                                    ])
                                    . '<label class="onoffswitch-label" for="myonoffswitch-processed' . $model->gift_claim_id . '"></label></div>';
                                },
                                'filter' => Html::activeDropDownList($searchModel, 'is_processed', [1 => 'Yes', 0 => 'No'], ['class' => 'form-control select2', 'prompt' => 'Filter']),
                            ],
                            //'created_at',
                            [
                                'class' => ActionColumn::className(),
                                'template' => '{view}{delete}',
                                'urlCreator' => function ($action, GiftClaims $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'gift_claim_id' => $model->gift_claim_id]);
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
