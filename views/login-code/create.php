<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LoginCodes $model */
$this->title = 'Create Login Codes';
$this->params['breadcrumbs'][] = ['label' => 'Login Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <?=
                    $this->render('_form', [
                        'model' => $model,
                    ])
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
