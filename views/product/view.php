<?php

use yii\widgets\ListView;
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Магазин</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row row-flex row-flex-wrap ">
<?
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '/product/index.php',
    'summary' => false,
])
?>
</div>
</div>
</div>