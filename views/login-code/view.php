<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\LoginCodes $model */
$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Login Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <?= Html::a('Update', ['update', 'login_code_id' => $model->login_code_id], ['class' => 'btn btn-primary']) ?>
                        <?=
                        Html::a('Delete', ['delete', 'login_code_id' => $model->login_code_id], [
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
                            'code',
                            'created_at',
                            'updated_at',
                            'used_at',
                            [
                                'attribute' => 'used',
                                'value' => ($model->used == 1) ? "Yes" : "No"
                            ],
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

