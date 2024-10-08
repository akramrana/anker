<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\assets;

/**
 * Description of FrontendAsset
 *
 * @author akram
 */
define('time', microtime());

class FrontendAsset extends \yii\web\AssetBundle
{

    //put your code here
    public $baseUrl = '@web/';
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'admin_lte/plugins/fontawesome-free/css/all.min.css',
        'admin_lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'admin_lte/dist/css/adminlte.min.css',
        'css/custom.css?' . time,
    ];
    public $js = [
        'admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'js/spin-wheel-iife.js',
        'js/site.js?' . time,
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
