<?php

use app\models\Setting;
use yii\helpers\Html;
use yii\helpers\Url;
 $currency = Setting::getSetting('currency');
?>
<div class="col-md-3 col-sm-6 block_listView">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="<?= Url::toRoute('product/'. $model->id)?>"><?=Html::img("@web{$model->image}",['height' => 300])?></a>
                        </div>
                        <h2><a style="color: black; text-decoration: none;" href="<?= Url::toRoute(['product/'. $model->id])?>"><?=$model->title?></a></h2>
                        <div class="product-carousel-price">
                            <ins style="color: black;"><?=$model->price.' '. $currency?></ins>
                        </div>

                        <div class="product-option-shop">
                            <button class="add_to_cart_button" data-id = "<?=$model->id?>" data-quantity="1" data-product_sku=""
                                    data-product_id="70" rel="nofollow"
                                    href="<?=Url::to(['/cart/add', 'id' => $model->id]);?>">Добавить в корзину</button>
                        </div>
                    </div>
                </div>
