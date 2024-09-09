<?php

/** @var yii\web\View $this */
use yii\helpers\BaseUrl;

$this->title = 'Home';
$titleFont = "DINNextLTPro-Bold";
$experienceFont = "MyriadPro-Regular";
$luckyBlueFont = "DINNextLTPro-Regular";
$luckyBlueFloat = "";
$phoneImg = "Microsite_07";
if (Yii::$app->session['lang'] == 'ar') {
    $titleFont = "GESSTwoBold";
    $experienceFont = "GESSTwoMedium";
    $luckyBlueFont = "GESSTwoMedium";
    $luckyBlueFloat = "float-right";
    $phoneImg = "Microsite-2_03";
}
?>
<div class="row">
    <div class="col-4">
        <h1 class="<?= $titleFont; ?> ipower">
            <div><?= Yii::t('yii', 'iPower'); ?></div>
            <div><?= Yii::t('yii', 'Collection'); ?></div>
        </h1>
        <p class="<?= $experienceFont; ?> experience">
            <span><?= Yii::t('yii', 'Experience the Ultimate in'); ?></span><br/>
            <span><?= Yii::t('yii', 'Fast, Safe, and Portable Charging'); ?></span>
        </p>
        <p class="<?= $luckyBlueFloat; ?>">
            <a href="#" class="btn btn-primary btn-lg <?php echo $luckyBlueFont; ?> lucky-blue">
                <?= Yii::t('yii', 'Participate in Lucky Draw'); ?>
            </a>
        </p>
    </div>
    <div class="col-8">
        <img class="img-fluid float-right" src="<?php echo BaseUrl::home(); ?>images/<?php echo $phoneImg; ?>.png" alt="Microsite_07" />
    </div>
</div>
