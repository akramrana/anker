<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Items $model */
$this->title = $model->name_en;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <?= Html::a('Update', ['update', 'item_id' => $model->item_id], ['class' => 'btn btn-primary']) ?>
                        <?=
                        Html::a('Delete', ['delete', 'item_id' => $model->item_id], [
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
                            'name_en',
                            'name_ar',
                            'sku',
                            'remaining_qty',
                            'created_at',
                            'updated_at',
                            [
                                'attribute' => 'is_active',
                                'value' => ($model->is_active == 1) ? "Active" : "Inactive"
                            ],
                        ],
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
