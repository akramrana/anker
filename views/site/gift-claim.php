<?php

use yii\helpers\BaseUrl;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\widgets\Alert;

$this->title = 'Claim your gift';
?>
<div class="row">
    <div class="container pt-3">
        <?= Alert::widget() ?>
        <div class="mt-3">
            <div class="claim-gift">
                <?php
                if (!empty($sessionSku)) {
                    ?>
                <h3 class="draw-title DINNextLTPro-Bold">You have won the <strong><u><?= $item->name_en; ?></u></strong> from lucky draw, claim your gift now!</h3>
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col">
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'address_line_1')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'landmark')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'item_code')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>

                            <?= $form->field($model, 'purchase_place')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col">
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'address_line_2')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'purchase_date')->textInput(['type' => 'date']) ?>

                            <?= $form->field($model, 'invoice_file')->fileInput() ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-lg theme-bg']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                    <?php
                } else {
                    ?>
                    <div class="col">
                        <div class="alert alert-danger">
                            Verification failed: Invalid item code
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>