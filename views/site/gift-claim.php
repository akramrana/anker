<?php

use yii\helpers\BaseUrl;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Claim your gift';
?>
<div class="row">
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col">
                        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                        
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        
                        <?= $form->field($model, 'address_line_1')->textInput(['maxlength' => true]) ?>
                        
                         <?= $form->field($model, 'landmark')->textInput(['maxlength' => true]) ?>
                        
                        <?= $form->field($model, 'item_code')->textInput(['maxlength' => true]) ?>
                        
                        <?= $form->field($model, 'purchase_place')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col">
                        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                        
                         <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                        
                        <?= $form->field($model, 'address_line_2')->textInput(['maxlength' => true]) ?>
                        
                        <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                        
                        <?= $form->field($model, 'purchase_date')->textInput() ?>
                        
                        <?= $form->field($model, 'invoice_file')->fileInput() ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>