<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\GiftClaims $model */
$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Gift Claims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <?=
                        Html::a('Delete', ['delete', 'gift_claim_id' => $model->gift_claim_id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ])
                        ?>
                    </div>
                </div>
                <div class="card-body">

                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'first_name',
                            'last_name',
                            'email:email',
                            'phone',
                            //'address_line_1',
                            //'address_line_2',
                            //'landmark',
                            'city',
                            'item_code',
                            'purchase_date',
                            'purchase_place',
                            /*[
                                'attribute' => 'invoice_file',
                                'value' => call_user_func(function ($model) {
                                    return \yii\bootstrap5\Html::a($model->invoice_file, yii\helpers\BaseUrl::home() . 'uploads/' . $model->invoice_file, [
                                        'download' => 'download'
                                    ]);
                                }, $model),
                                'format' => ['raw'],
                            ],*/
                            [
                                'attribute' => 'is_contacted',
                                'value' => ($model->is_contacted == 1) ? "Yes" : "No"
                            ],
                            [
                                'attribute' => 'is_processed',
                                'value' => ($model->is_processed == 1) ? "Yes" : "No"
                            ],
                            'created_at',
                        ],
                    ])
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
