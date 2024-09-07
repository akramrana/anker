<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
use yii\helpers\BaseUrl;

$controller = $this->context->action->controller->id;
$method = $this->context->action->id;
$current_action = $controller . '/' . $method;
?>

<!-- Main Wrapper -->
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <?php echo \yii\helpers\Html::encode($this->title); ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <?php
                    echo
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'tag' => 'ol',
                        'options' => [
                            'class' => 'breadcrumb float-sm-right'
                        ],
                        'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>",
                        'activeItemTemplate' => "<li class=\"breadcrumb-item active\">{link}</li>"
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <?= Alert::widget() ?>
        <?php echo $content; ?>
    </div>
</div>
<!-- Footer-->
<footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href="#">Anker</a></strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
<div class="global-loader">
    <div class="main-content">
        <div class="loading">
            <img src="<?php echo BaseUrl::home() ?>images/loading-bars.svg" alt="loading"/>
        </div>
    </div>
</div>