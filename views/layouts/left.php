<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\helpers\BaseUrl;

$controller = $this->context->action->controller->id;
$method = $this->context->action->id;
$current_action = $controller . '/' . $method;

$get = Yii::$app->request->queryParams;
?>
<aside id="menu" class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo BaseUrl::home() ?>" class="brand-link">
        <img src="<?php echo BaseUrl::home() ?>/images/logo.png" alt="Logo" class="img-fluid" style="opacity: .8">
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <?php
            echo Menu::widget([
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => '<i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p>',
                        'url' => ['/dashboard/index'],
                        'options' => [
                            'class' => 'nav-item',
                        ],
                        'template' => '<a class="nav-link ' . (($current_action == 'dashboard/index') ? "active" : "") . '" href="{url}">{label}</a>',
                    ],
                    [
                        'label' => '<i class="nav-icon fas fa-users"></i><p>Admins<i class="right fas fa-angle-left"></i></p>',
                        'options' => [
                            'class' => 'nav-item' . (($controller == 'admin') ? " menu-open" : ""),
                        ],
                        'template' => '<a class="nav-link ' . (($controller == 'admin') ? "active" : "") . '" href="#">{label}</a>',
                        'items' => [
                            [
                                'label' => '<i class="far fa-circle nav-icon"></i><p>Manage Admin</p>',
                                'url' => ['/admin/index'],
                                'template' => '<a class="nav-link ' . (($current_action == 'admin/index') ? "active" : "") . '" href="{url}">{label}</a>',
                                'options' => [
                                    'class' => 'nav-item',
                                ],
                            ],
                            [
                                'label' => '<i class="far fa-circle nav-icon"></i><p>Create Admin</p>',
                                'url' => ['/admin/create'],
                                'template' => '<a class="nav-link ' . (($current_action == 'admin/create') ? "active" : "") . '" href="{url}">{label}</a>',
                                'options' => [
                                    'class' => 'nav-item',
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => '<i class="nav-icon fas fa-gift"></i><p>Gift Items<i class="right fas fa-angle-left"></i></p>',
                        'options' => [
                            'class' => 'nav-item' . (($controller == 'item') ? " menu-open" : ""),
                        ],
                        'template' => '<a class="nav-link ' . (($controller == 'item') ? "active" : "") . '" href="#">{label}</a>',
                        'items' => [
                            [
                                'label' => '<i class="far fa-circle nav-icon"></i><p>Manage Gift Item</p>',
                                'url' => ['/item/index'],
                                'template' => '<a class="nav-link ' . (($current_action == 'item/index') ? "active" : "") . '" href="{url}">{label}</a>',
                                'options' => [
                                    'class' => 'nav-item',
                                ],
                            ],
                            [
                                'label' => '<i class="far fa-circle nav-icon"></i><p>Create Gift Item</p>',
                                'url' => ['/item/create'],
                                'template' => '<a class="nav-link ' . (($current_action == 'item/create') ? "active" : "") . '" href="{url}">{label}</a>',
                                'options' => [
                                    'class' => 'nav-item',
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => '<i class="nav-icon fas fa-lock"></i><p>Login Codes<i class="right fas fa-angle-left"></i></p>',
                        'options' => [
                            'class' => 'nav-item' . (($controller == 'login-code') ? " menu-open" : ""),
                        ],
                        'template' => '<a class="nav-link ' . (($controller == 'login-code') ? "active" : "") . '" href="#">{label}</a>',
                        'items' => [
                            [
                                'label' => '<i class="far fa-circle nav-icon"></i><p>Manage Login Code</p>',
                                'url' => ['/login-code/index'],
                                'template' => '<a class="nav-link ' . (($current_action == 'login-code/index') ? "active" : "") . '" href="{url}">{label}</a>',
                                'options' => [
                                    'class' => 'nav-item',
                                ],
                            ],
                            [
                                'label' => '<i class="far fa-circle nav-icon"></i><p>Create Login Code</p>',
                                'url' => ['/login-code/create'],
                                'template' => '<a class="nav-link ' . (($current_action == 'login-code/create') ? "active" : "") . '" href="{url}">{label}</a>',
                                'options' => [
                                    'class' => 'nav-item',
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => '<i class="nav-icon fas fa-gifts"></i><p>Gift Claims</p>',
                        'url' => ['/gift-claim/index'],
                        'options' => [
                            'class' => 'nav-item',
                        ],
                        'template' => '<a class="nav-link ' . (($current_action == 'gift-claim/index') ? "active" : "") . '" href="{url}">{label}</a>',
                    ],
                ],
                'submenuTemplate' => "\n<ul class='nav nav-treeview'>\n{items}\n</ul>\n",
                'options' => [
                    'class' => 'nav nav-pills nav-sidebar flex-column',
                    'id' => 'side-menu',
                    'data-widget' => 'treeview',
                    'role' => 'menu',
                    'data-accordion' => 'false'
                ],
            ]);
            ?>
        </nav>
    </div>
</aside>
