<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use app\helpers\AppHelper;

app\assets\AppAsset::register($this);
app\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <div class="container">
                <?php echo $content; ?>
            </div>                
        </div>            
        <?php
        $this->endBody();
        ?>
    </body>
</html>
<?php $this->endPage() ?>
