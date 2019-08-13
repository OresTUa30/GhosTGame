
<?
use app\models\Setting;
use yii\helpers\Url;

$currency = Setting::getSetting('currency');
?>

<div class="col-md-3 col-sm-6 block_listView">
                    <div class="single-shop-product">
                        <div class="product-upper">
                           <a href="<?= Url::to(['product/'. $model->id])?>"><img src="<?=$model->image?>" alt=""></a>
                        </div>
                        <h2><a href="<?= Url::to(['product/'. $model->id])?>"><?=$model->title?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?=$model->price. ' ' .$currency?></ins>
                        </div>

                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-id = "<?=$model->id?>" data-quantity="1" data-product_sku=""
                               data-product_id="70" rel="nofollow"
                               href="<?=Url::to(['/cart/add', 'id' => $model->id]);?>">Добавить в корзину</a>
                        </div>                       
                    </div>
                </div>
