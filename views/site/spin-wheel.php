<?php

use yii\helpers\BaseUrl;

$this->title = 'Lucky Draw';
$data = [];
if (!empty($items)) {
    foreach ($items as $row) {
        $d = [
            'text' => $row->name_en,
            'sku' => $row->sku,
            'fontSize' => 8,
        ];
        array_push($data, $d);
    }
}
$jsonData = json_encode($data);
?>
<div class="row" dir="ltr">
    <div class="container">
        <div class="mt-3">
            <div class="lucky-draw-box">
                <h2 class="draw-title DINNextLTPro-Bold"><?= Yii::t('yii', 'Participate in Lucky Draw'); ?></h2>
                <?php
                if (!empty($model)) {
                    ?>
                    <svg id="wheel4" class="mb-3"></svg>

                    <div class="col d-none" id="won-section">
                        <div class="alert alert-default">
                            Hurry: you have won the <strong><span id="itemName"></span></strong>
                            <input type="hidden" id="item_sku" name="item_sku" value=""/>
                        </div>
                        <a onclick="site.claimGift()" href="javascript:;" class="btn btn-warning text-white">Claim your gift</a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col">
                        <div class="alert alert-danger">
                            Verification failed: Invalid login code
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
$js = "new Wheel({
  el: document.getElementById('wheel4'),
  data: $jsonData,
  theme: 'light',
  radius: 170,
  buttonWidth: 75,
  limit:3,
  color: {
    button: '#fef5e7',
    buttonFont: '#34495e',
    line: '#e41e27',
    border: '#e41e27',
    prize: '#ffffff',
    prizeFont: '#00000',
  },
  onSuccess(data) {
    console.log(data);
    $('#won-section').removeClass('d-none');
    $('#itemName').html(data.text);
    $('#item_sku').val(data.sku);
  }
});";

$this->registerJs($js, \yii\web\View::POS_END);
?>