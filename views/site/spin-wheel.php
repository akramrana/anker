<?php

use yii\helpers\BaseUrl;

$this->title = 'Lucky Draw';
$data = [];
if (!empty($items)) {
    /* $d = [
      'label' => 'No Luck',
      'sku' => '',
      'backgroundColor' => 'dimgray',
      'labelColor' => 'silver'
      ];
      array_push($data, $d); */
    foreach ($items as $key => $row) {
        $d = [
            'label' => (Yii::$app->session['lang'] == 'ar') ? $row->name_ar : $row->name_en,
            'sku' => $row->sku,
            'backgroundColor' => ($key % 2 == 1) ? '#F6F6F6' : '#F6F6F6',
            'labelColor' => ($key % 2 == 1) ? '#00BEFA' : '#00BEFA',
        ];
        array_push($data, $d);
    }
}
$jsonData = json_encode($data);

$dir = "ltr";
$titleFont = "DINNextLTPro-Bold";
$btnFont = 'DINNextLTPro-Regular';
$wheelLabelFont = "DINNextLTPro-Bold";
if (Yii::$app->session['lang'] == 'ar') {
    $dir = "rtl";
    $titleFont = "GESSTwoBold";
    $btnFont = "GESSTwoMedium";
    $wheelLabelFont = "GESSTwoMedium";
}
?>
<div class="row" dir="<?= $dir; ?>">
    <div class="container">
        <div class="mt-3">
            <div class="lucky-draw-box">
                <h2 class="draw-title <?= $titleFont; ?>"><?= Yii::t('yii', 'Participate in the Lucky Draw'); ?></h2>
                <?php
                if (!empty($model)) {
                    ?>
                    <div class="gui-wrapper">
                        <div class="wheel-wrapper"></div>
                        <button class="btn btn-primary btn-lg mt-4 mb-3 theme-bg <?= $btnFont; ?>"><?= Yii::t('yii', 'Spin the Wheel'); ?></button>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col">
                        <div class="alert alert-danger <?= $btnFont; ?>">
                            <?= Yii::t('yii', 'Verification failed: Invalid login code'); ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-default" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
            if (!empty($model)) {
                ?>
                <div class="modal-header theme-bg">
                    <h4 class="modal-title text-white <?= $btnFont; ?>"><?= Yii::t('yii', 'Congratulations!'); ?></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">

                    <div class="col d-none mb-3 text-center pt-3" id="won-section">
                        <div class="alert alert-default <?= $btnFont; ?>">
                            <?= Yii::t('yii', 'Congratulations! You have won a'); ?> <strong><span id="itemName"></span></strong>
                            <input type="hidden" id="item_sku" name="item_sku" value=""/>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <div class="float-right text-right w-100">
    <!--                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('yii', 'Close'); ?></button>-->
<!--                        <button onclick="site.claimGift('<?= $model->code; ?>')"  type="button" class="btn btn-primary theme-bg <?= $btnFont; ?>"><?= Yii::t('yii', 'Claim your gift'); ?></button>-->
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
$js = "
    const img1 = new Image();
    img1.src = baseUrl+'images/example-3-overlay.svg';
    img1.alt = 'alt';
    var items = $jsonData;
    window.onload = () => {
      const props = {
        name: 'Money',
        radius: 0.88,
        itemLabelRadius: 0.93,
        itemLabelRotation: 180,
        itemLabelAlign: 'left',
        itemLabelColors: ['#000'],
        itemLabelBaselineOffset: -0.06,
        lineWidth: 1,
        lineColor: '#00BEFA',
        overlayImage: img1,
        items: items,
        itemLabelFont:'$wheelLabelFont',
        itemLabelFontSizeMax:18,
      };
      const container = document.querySelector('.wheel-wrapper');
      window.wheel = new spinWheel.Wheel(container, props);
      wheel.isInteractive = false;
      //
      wheel.onRest = e => {
        var data = items[e.currentIndex]
        //console.log(data);
        if(data.sku){
            $('#won-section').removeClass('d-none');
            $('#itemName').html(data.label);
            $('#item_sku').val(data.sku);
            $('#modal-default').modal('show');
            site.claimGift('$model->code')
        }
      };
      const btnSpin = document.querySelector('button');
      let modifier = 0;
      window.addEventListener('click', (e) => {
        // Listen for click event on spin button:
        if (e.target === btnSpin) {
          const {duration, winningItemRotaion} = calcSpinToValues();
          wheel.spinTo(winningItemRotaion, duration);
        }
      });
      function calcSpinToValues() {
        const duration = 3000;
        const winningItemRotaion = getRandomInt(360, 360 * 1.75) + modifier;
        modifier += 360 * 1.75;
        return {duration, winningItemRotaion};
      }
      
      function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min)) + min;
      }
    }";

$this->registerJs($js, \yii\web\View::POS_END);
?>