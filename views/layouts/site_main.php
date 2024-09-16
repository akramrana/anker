
<?php

use yii\helpers\BaseUrl;
use yii\helpers\Html;
use app\assets\FrontendAsset;

FrontendAsset::register($this);
$this->beginPage();
//debugPrint(Yii::$app->session['lang']);
$direction = "ltr";
$imageAngle = "en";
$float = "right";
$textAlign = "";
$textLeft = "text-left";
$topPaddingRightClass = "";
$authorFont = "TitilliumWeb-SemiBold";
if (Yii::$app->session['lang'] == 'ar') {
    $direction = "rtl";
    $imageAngle = "ar";
    $float = "left";
    $textAlign = "text-right";
    $textLeft = "text-right";
    $topPaddingRightClass = "rtl-top-padding";
    $authorFont = "GESSTwoMedium";
}
?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->session['lang']; ?>" xmlns="http://www.w3.org/1999/html">
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
        <?php
        if (Yii::$app->session['lang'] == 'ar') {
            ?>
            <link rel="stylesheet" href="<?php echo BaseUrl::home() ?>css/custom_rtl.css?<?php echo microtime() ?>"/>
            <?php
        }
        ?>
    </head>
    <body class="hold-transition" dir="<?= $direction; ?>">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <div class="header">
                <div class="row">
                    <div class="col-10 <?= $textAlign; ?> <?= $topPaddingRightClass; ?>" dir="ltr">
                        <span class="ml-lg-5 ml-md-5">
                            <a href="<?php echo BaseUrl::home(); ?>">
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
                    <div class="col-2 text-center" dir="ltr">
                        <div class="image-angle-<?php echo $imageAngle; ?> float-<?= $float; ?> lang-pad">
                            <span class="lang-sec">
                                <a onclick="site.changelanguage('en')" href="javascript:;" class="TitilliumWeb-SemiBold lang-txt">
                                    ENG
                                </a>
                            </span>
                            <span>
                                <img class="ms-3 me-3 vertical-line" src="<?php echo BaseUrl::home(); ?>images/vertical-line.png" alt="line" />
                            </span>
                            <span>
                                <a onclick="site.changelanguage('ar')" href="javascript:;" class="MyriadPro-Regular lang-txt">
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
                            <div class="row bottom-link ml-lg-5">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                                    <div class="author-txt">
                                        <span class="<?= $authorFont; ?> author">
                                            <?= Yii::t('yii', 'Exclusively Available in:'); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 no-padding-right">
                                    <div class="<?= $textLeft; ?> btn-sec">
                                        <!--                                        <a target="_new" href="https://www.carrefouruae.com/mafuae/en/v4/search?keyword=anker%20power%20bank" class="btn-custom">
                                                                                    <img class="bottom-link-img" src="<?php echo BaseUrl::home(); ?>images/Microsite_07.gif" alt="external link" />
                                                                                </a>
                                        
                                                                                <a target="_new" href="https://www.eros.ae/accessories/anker.html" class="btn-custom">
                                                                                    <img class="bottom-link-img" src="<?php echo BaseUrl::home(); ?>images/Microsite_09.gif" alt="external link" />
                                                                                </a>
                                        
                                                                                <a target="_new" href="https://www.jumbo.ae/search/Anker" class="btn-custom">
                                                                                    <img class="bottom-link-img" src="<?php echo BaseUrl::home(); ?>images/Microsite_11.gif" alt="external link" />
                                                                                </a>-->

                                        <a target="_new" href="https://www.citycentremirdif.com/en/find-a-store/anker-innovations" class="btn-custom">
                                            <img class="bottom-link-img anker-img" src="<?php echo BaseUrl::home(); ?>images/20240916-143746.png" alt="external link" />
                                        </a>
                                        <a target="_new" href="https://www.virginmegastore.ae/en/search/?q=Anker%3AsearchID%3D63411947%26action%3DFACET_REFING%26page%3D1%26nbResultsPerPage%3D48%26sorting%3DMY_SELECTION%26constraints%3DdisplayedElvisLabel%3AANKER%26query%3DAnker%26version%3D4.1#" class="btn-custom">
                                            <img class="bottom-link-img" src="<?php echo BaseUrl::home(); ?>images/Microsite_15.gif" alt="external link" />
                                        </a>
                                        <a class="text-white <?= $authorFont; ?> terms d-none d-sm-inline" href="<?php echo BaseUrl::home() ?>site/terms-conditions"><?= Yii::t('yii', 'Terms & Conditions'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 col-md-4 col-lg-3 d-none d-md-block">
                            <div class="image-angle-<?php echo $imageAngle; ?>-bottom float-<?= $float; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row tc d-inline d-sm-none">
                        <div class="col text-center">
                            <a class="text-white <?= $authorFont; ?>" href="<?php echo BaseUrl::home() ?>site/terms-conditions"><?= Yii::t('yii', 'Terms & Conditions'); ?></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>