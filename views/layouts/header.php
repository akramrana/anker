<?php

use yii\helpers\BaseUrl;
use yii\helpers\Html;
?>
<style>
    .submit-button {
        margin-top: 5px;
    }
</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo BaseUrl::home() ?>" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <?php
            if (!Yii::$app->user->isGuest) {
                $name = '';
                if (\Yii::$app->session['_ankerAuth'] == 1) {
                    $name = Yii::$app->user->identity->name;
                }
                ?>
                <?= Html::beginForm(\yii\helpers\Url::to(['site/logout'], true), 'post') ?>
                <?= Html::submitButton('<i class="fas fa-lock"></i> ' . $name, ['class' => 'btn btn-sm btn-flat btn-default submit-button']) ?>
                <?= Html::endForm() ?>
                <?php
            }
            ?>
        </li>
    </ul>
</nav>