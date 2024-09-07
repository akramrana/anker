<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\assets\ThemeAsset;
use yii\helpers\BaseUrl;
use yii\helpers\Html;

AppAsset::register($this);
ThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?= Html::csrfMetaTags() ?>
        <meta name="theme-color" content="#ffffff">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script type="application/javascript">
            var baseUrl = '<?php echo BaseUrl::home(); ?>';
            var _csrf = '<?php echo Yii::$app->request->getCsrfToken() ?>';
        </script>
    </head>
    <body class="hold-transition sidebar-mini">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <?=
            $this->render(
                    'header.php'
            )
            ?>

            <?=
            $this->render(
                    'left.php'
            )
            ?>

            <?=
            $this->render(
                    'content.php', ['content' => $content,]
            )
            ?>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
