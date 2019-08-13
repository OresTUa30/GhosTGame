<?php

use yii\widgets\ListView;

?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Категории</h2>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '/category/item_index.php',
                    'summary' => false,
                ])
                ?>
            </div>
        </div>
    </div>

