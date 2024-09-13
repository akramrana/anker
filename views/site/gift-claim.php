<?php

use yii\helpers\BaseUrl;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\widgets\Alert;

$this->title = 'Claim your gift';

$dir = "ltr";
$titleFont = "DINNextLTPro-Bold";
$btnFont = 'DINNextLTPro-Regular';
$textAlign = "";
if (Yii::$app->session['lang'] == 'ar') {
    $dir = "rtl";
    $titleFont = "GESSTwoBold";
    $btnFont = "GESSTwoMedium";
    $textAlign = "text-right";
}
?>
<div class="row" dir="<?= $dir; ?>">
    <div class="container pt-3">
        <?= Alert::widget() ?>
        <div class="mt-3">
            <div class="claim-gift">
                <?php
                if (!empty($sessionSku)) {
                    if (empty(Yii::$app->session['form_submitted'])) {
                        ?>
                                        <!--                        <h3 class="draw-title <?= $titleFont; ?>"><?= Yii::t('yii', 'You have won the'); ?> <strong><u><?= $item->name_en; ?></u></strong> <?= Yii::t('yii', 'from lucky draw, claim your gift now!'); ?></h3>-->
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="row">
                            <div class="col">
                                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                                <?=
                                $form->field($model, 'purchase_place')->dropDownList([
                                    'Virgin Dubai Hills Mall' => 'Virgin Dubai Hills Mall',
                                    'Virgin Dubai Marina Mall' => 'Virgin Dubai Marina Mall',
                                    'Virgin IBN Batuta Mall' => 'Virgin IBN Batuta Mall',
                                    'Virgin Mall of Emirates' => 'Virgin Mall of Emirates',
                                    'Virgin Mercato Mall' => 'Virgin Mercato Mall',
                                    'Virgin Mirdif City Center' => 'Virgin Mirdif City Center',
                                    'Virgin Nakheel Mall' => 'Virgin Nakheel Mall',
                                    'Virgin Dubai Mall' => 'Virgin Dubai Mall',
                                    'Virgin Ranches Souk' => 'Virgin Ranches Souk',
                                    'Virgin Abu Dhabi Mall' => 'Virgin Abu Dhabi Mall',
                                    'Virgin Al Maryah Island' => 'Virgin Al Maryah Island',
                                    'Virgin Reem Island' => 'Virgin Reem Island ',
                                    'Virgin Yas Mall' => 'Virgin Yas Mall',
                                        ], ['prompt' => 'Select a Place'])
                                ?>

                                <?= $form->field($model, 'purchase_date')->textInput(['type' => 'date']) ?>
                            </div>
                            <div class="col">
                                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                                <?=
                                $form->field($model, 'city')->dropDownList([
                                    'Dubai' => 'Dubai',
                                    'Abu Dhabi' => 'Abu Dhabi',
                                        ], ['prompt' => 'Select a City'])
                                ?>
                                
                            </div>
                        </div>

                        <div class="form-group <?= $textAlign; ?>">
                            <?= Html::submitButton(Yii::t('yii', 'Submit'), ['class' => 'btn btn-primary btn-lg theme-bg ' . $btnFont]) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                        <?php
                    }
                } else {
                    ?>
                    <div class="col">
                        <div class="alert alert-danger <?= $btnFont; ?>">
                            <?= Yii::t('yii', 'Verification failed: Invalid item code'); ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>