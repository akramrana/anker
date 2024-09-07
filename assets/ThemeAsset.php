<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\assets;

/**
 * Description of ThemeAsset
 *
 * @author akram
 */
class ThemeAsset extends \yii\web\AssetBundle
{
    //put your code here
    public $baseUrl = '@web/admin_lte/';
    
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'plugins/fontawesome-free/css/all.min.css',
        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'dist/css/adminlte.min.css'
    ];
    
    public $js = [
        //'plugins/jquery/jquery.min.js',
        'plugins/bootstrap/js/bootstrap.bundle.min.js',
        'dist/js/adminlte.js',
        //'plugins/chart.js/Chart.min.js',
        //'dist/js/demo.js',
        //'dist/js/pages/dashboard3.js'
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
