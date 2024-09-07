<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GiftClaims $model */

$this->title = 'Create Gift Claims';
$this->params['breadcrumbs'][] = ['label' => 'Gift Claims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-claims-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
