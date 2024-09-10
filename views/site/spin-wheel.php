<?php

use yii\helpers\BaseUrl;

$this->title = 'Lucky Draw';
$data = [];
if (!empty($items)) {
    $d = [
        'label' => 'No Luck',
        'sku' => '',
        'backgroundColor' => 'dimgray',
        'labelColor' => 'silver'
    ];
    array_push($data, $d);
    foreach ($items as $key => $row) {
        $d = [
            'label' => $row->name_en,
            'sku' => $row->sku,
            'backgroundColor' => ($key % 2 == 1) ? '#0096FF' : 'lightyellow',
            'labelColor' => ($key % 2 == 1) ? '#fff' : 'orange'
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
                    <div class="gui-wrapper">
                        <div class="wheel-wrapper"></div>
                        <button class="btn btn-primary btn-lg mb-3">Spin</button>
                    </div>
                    <div class="col d-none mb-3" id="won-section">
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

$js = "
    const img1 = new Image();
    img1.src = baseUrl+'images/example-3-overlay.svg';
    img1.alt = 'alt';
    
    window.onload = () => {
      const props = {
        name: 'Money',
        radius: 0.88,
        itemLabelRadius: 0.93,
        itemLabelRotation: 180,
        itemLabelAlign: 'left',
        itemLabelColors: ['#000'],
        itemLabelBaselineOffset: -0.06,
        itemLabelFont: 'Arial',
        itemLabelFontSizeMax: 22,
        lineWidth: 1,
        lineColor: '#000',
        overlayImage: img1,
        items: $jsonData,
      };
      const container = document.querySelector('.wheel-wrapper');
      window.wheel = new spinWheel.Wheel(container, props);
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

$this->registerJs($js,\yii\web\View::POS_END);
?>