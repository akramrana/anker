<?php

use yii\bootstrap5\ActiveForm;
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
    <div class="col-lg-4 col-md-4 col-sm-5 col-12 pt-xs-5 d-none d-sm-inline">
        <h1 class="<?= $titleFont; ?> ipower">
            <div><?= Yii::t('yii', 'iPower'); ?></div>
            <div><?= Yii::t('yii', 'Collection'); ?></div>
        </h1>
        <p class="<?= $experienceFont; ?> experience experience_ar">
            <span><?= Yii::t('yii', 'Experience the Ultimate in'); ?></span><br/>
            <span><?= Yii::t('yii', 'Fast, Safe, and Portable Charging'); ?></span>
        </p>
        <p class="<?= $luckyBlueFloat; ?>">
            <a data-toggle="modal" data-target="#modal-default" href="javascript:;" class="btn btn-primary btn-lg <?php echo $luckyBlueFont; ?> lucky-blue">
                <?= Yii::t('yii', 'Participate in Lucky Draw'); ?>
            </a>
        </p>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-7 col-12">
        <img class="img-fluid float-right" src="<?php echo BaseUrl::home(); ?>images/<?php echo $phoneImg; ?>.png" alt="Microsite_07" />
    </div>

    <div class="col-lg-4 col-md-4 col-sm-5 col-12 pt-xs-5 d-inline d-sm-none bottom-margin-top">
        <h1 class="<?= $titleFont; ?> ipower" style="text-align: center">
            <div><?= Yii::t('yii', 'iPower'); ?></div>
            <div><?= Yii::t('yii', 'Collection'); ?></div>
        </h1>
        <p class="<?= $experienceFont; ?> experience experience_ar" style="text-align: center">
            <span><?= Yii::t('yii', 'Experience the Ultimate in'); ?></span><br/>
            <span><?= Yii::t('yii', 'Fast, Safe, and Portable Charging'); ?></span>
        </p>
        <p style="text-align: center !important">
            <a data-toggle="modal" data-target="#modal-default" href="javascript:;" class="btn btn-primary btn-lg <?php echo $luckyBlueFont; ?> lucky-blue">
                <?= Yii::t('yii', 'Participate in Lucky Draw'); ?>
            </a>
        </p>
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
            $model = new app\models\LoginCodes();
            $form = ActiveForm::begin([
                        'id' => 'login-verify-form',
                        'action' => 'site/verify-code',
                        'options' => [
                            'method' => 'post',
                        ]
            ]);
            ?>
            <div class="modal-header theme-bg">
                <h4 class="modal-title text-white"><?= Yii::t('yii', 'Authorization'); ?></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="response"></div>
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="float-right text-right w-100">
<!--                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('yii', 'Close'); ?></button>-->
                    <button type="submit" class="btn btn-primary theme-bg"><?= Yii::t('yii', 'Submit'); ?></button>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
$this->registerJs("$('body').on('beforeSubmit', 'form#login-verify-form', function (e) {
            var form = $(this);
            if (form.find('.has-error').length) {
                return false;
            }
            else{
            $('#response').html('<div class=\"col-md-12\"><div class=\"alert alert-info\">" . Yii::t('yii', 'Sending....') . "</div></div>');
                   $.ajax({
                        url: form.attr('action'),
                        type: 'post',
                        data: form.serialize(),
                        //async: false,
                        success: function (response) {
                           if(response.success==1){
                              $('#response').html('<div class=\"col-md-12\"><div class=\"alert alert-success\">'+response.msg+'</div></div>');
                              setTimeout(function(){
                                 $('#response').html('');
                                 location.href = 'site/spin-wheel?loginCode='+response.code;
                              },4000)
                           }
                           else if(response.success==0){
                              $('#response').html('<div class=\"col-md-12\"><div class=\"alert alert-danger\">'+response.msg+'</div></div>');
                              setTimeout(function(){
                                 $('#response').html('');
                              },4000)
                           }
                           else{
                            $.each(response, function(key, val) {
                                 $('#'+key).after('<div class=\"help-block\">'+val+'</div>');
                                 $('#'+key).closest('.form-group').addClass(\"has-error\");
                             });
                           }
                        },
                    });
                    return false;            
            }

        });", \yii\web\View::POS_END);
?>