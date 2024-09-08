
<?php

use yii\helpers\BaseUrl;
use yii\helpers\Html;
use app\assets\FrontendAsset;

FrontendAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <?= Html::csrfMetaTags() ?>
        <meta name="application-name" content=""/>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script type="text/javascript">
            var baseUrl = '<?php echo BaseUrl::home(); ?>';
        </script>
    </head>
    <body class="hold-transition">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <div class="header">
                <div class="row">
                    <div class="col-10">
                        <span class="ml-lg-5 ml-md-5">
                            <a href="#">
                                <img class="mt-lg-5 mt-md-5 ms-lg-4 ms-md-4 logo" src="<?php echo BaseUrl::home(); ?>images/angker-logo.png" alt="logo" />
                            </a>
                        </span>
                        <span class="d-none d-md-inline">
                            <img class="mt-lg-5 mt-md-5 ms-lg-4 ms-md-4 vertical-line" src="<?php echo BaseUrl::home(); ?>images/vertical-line.png" alt="line" />
                        </span>
                        <span class="d-none d-md-inline">
                            <img class="mt-lg-5 mt-md-5 ms-lg-4 ms-md-4" src="<?php echo BaseUrl::home(); ?>images/heading.png" alt="heading" />
                        </span>
                        <span class="d-block d-sm-block d-md-none">
                            <img class="mt-lg-5 ms-lg-4 heading-xs" src="<?php echo BaseUrl::home(); ?>images/heading.png" alt="heading" />
                        </span>
                    </div>
                    <div class="col-2 text-center">
                        <div class="image-angle-en float-right lang-pad">
                            <span class="lang-sec">
                                <a href="#" class="TitilliumWeb-SemiBold lang-txt">
                                    ENG
                                </a>
                            </span>
                            <span>
                                <img class="ms-3 me-3 vertical-line" src="<?php echo BaseUrl::home(); ?>images/vertical-line.png" alt="line" />
                            </span>
                            <span>
                                <a href="#" class="MyriadPro-Regular lang-txt">
                                    عربي
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <?php echo $content; ?>
            </div>
            <footer class="site-footer">
                <div class="footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                            <div class="row bottom-link ml-5">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-5">
                                    <div class="author-txt">
                                        <span class="TitilliumWeb-SemiBold author">
                                            Authorised Sellers:
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-7">
                                    <div class="text-left btn-sec">
                                        <a href="#" class="btn-custom">
                                            <img class="bottom-link-img" src="<?php echo BaseUrl::home(); ?>images/Microsite_07.gif" alt="external link" />
                                        </a>

                                        <a href="#" class="btn-custom">
                                            <img class="bottom-link-img" src="<?php echo BaseUrl::home(); ?>images/Microsite_09.gif" alt="external link" />
                                        </a>

                                        <a href="#" class="btn-custom">
                                            <img class="bottom-link-img" src="<?php echo BaseUrl::home(); ?>images/Microsite_11.gif" alt="external link" />
                                        </a>

                                        <a href="#" class="btn-custom">
                                            <img class="bottom-link-img" src="<?php echo BaseUrl::home(); ?>images/Microsite_13.gif" alt="external link" />
                                        </a>
                                        <a href="#" class="btn-custom">
                                            <img class="bottom-link-img" src="<?php echo BaseUrl::home(); ?>images/Microsite_15.gif" alt="external link" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 col-md-4 col-lg-3 d-none d-md-block">
                            <div class="image-angle-en-bottom float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>