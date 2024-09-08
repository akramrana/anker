<?php

/** @var yii\web\View $this */
use yii\helpers\BaseUrl;

$this->title = 'Home';
?>
<div class="row">
    <div class="col-4">
        <h1 class="DINNextLTPro-Bold ipower">
            <div>iPower</div>
            <div>Collection</div>
        </h1>
        <p class="MyriadPro-Regular experience">
            Experience the Ultimate in<br/> Fast, Safe, and Portable Charging 
        </p>
        <p>
            <a href="#" class="btn btn-primary btn-lg DINNextLTPro-Regular lucky-blue">Participate in Lucky Draw </a>
        </p>
    </div>
    <div class="col-8">
        <img class="img-fluid float-right" src="<?php echo BaseUrl::home(); ?>images/Microsite_07.png" alt="Microsite_07" />
    </div>
</div>
