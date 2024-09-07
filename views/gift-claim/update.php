<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GiftClaims $model */

$this->title = 'Update Gift Claims: ' . $model->gift_claim_id;
$this->params['breadcrumbs'][] = ['label' => 'Gift Claims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gift_claim_id, 'url' => ['view', 'gift_claim_id' => $model->gift_claim_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gift-claims-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
