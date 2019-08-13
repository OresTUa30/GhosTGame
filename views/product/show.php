<?php

use app\models\Category;
use app\models\Comments;
use app\models\Product;
use app\models\Setting;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$currency = Setting::getSetting('currency');
$comments = Comments::find()->where(['product_id'=>$product->id])->all();
$product_5 = Product::find()->where(['category_id'=> $product->category_id])->andWhere(['not in', 'id', [$product->id]])->limit('5')->all();
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?= $product->name?></h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Поиск</h2>
                    <form method="get" action="<?= Url::to(['site/search'])?>">
                        <input type="text" name="search" placeholder="Найти товар...">
                        <input type="submit" value="Найти">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Похожие товары</h2>
                    <? foreach ($product_5 as $product_count):?>
                    <? if($product_count->id === $product->id ){
                        false;
                    }
                    ?>
                        <div class="thubmnail-recent">
                            <a href="<?= Url::to(['product/'. $product_count->id])?>"><?= Html::img("@web{$product_count->image}",['class' => 'recent-thumb' ])?></a>
                            <h2><a href="<?= Url::to(['product/'. $product_count->id])?>"><?=$product_count->name?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?= $product_count->price. ' '. $currency?></ins>
                            </div>
                        </div>
                    <? endforeach;?>
                </div>
                <div>
                    <hr style="color: black;">
                </div>
                <div class="single-sidebar">
                    <a href="<?= Url::to(['product/stock'])?>" style="text-decoration: none;"><h2 class="sidebar-title">Скидки</h2></a>
                    <? $stock = Product::find()->where(['stock' => 1])->orderBy('RAND()')->limit('3')->all(); ?>
                    <? foreach ($stock as $stocks):?>
                        <? if($stocks->id === $product->id ){
                            false;
                        }
                        ?>
                        <div class="thubmnail-recent">
                            <a href="<?= Url::to(['product/'. $stocks->id])?>"><?= Html::img("@web{$stocks->image}",['class' => 'recent-thumb' ])?></a>
                            <h2><a href="<?= Url::to(['product/'. $stocks->id])?>"><?=$stocks->name?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?= $stocks->price. ' '. $currency?></ins>
                            </div>
                        </div>
                    <? endforeach;?>
                </div>
            </div>



            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="<?= Url::to('/');?>">Главная</a>
                        <a href="<?= Url::to('/product/index');?>">Магазин</a>
                        <a href="<?= Url::to(['product/'. $product->id])?>"><?=$product->name?></a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                   <a href="<?= Url::to(['product/'. $product->id])?>"><?= Html::img("@web{$product->image}")?></a>
                                </div>

                                <div class="product-gallery">
                                    <img src="<?=$product->screen1?>" alt="">
                                    <img src="<?=$product->screen2?>" alt="">
                                    <img src="<?=$product->screen3?>" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?=$product->name?></h2>
                                <div class="product-inner-price">
                                    <ins><?=$product->price.' '. $currency?></ins>
                                </div>

                                <form action="" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" id="qty" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" data-id = "<?=$product->id?>" data-quantity="1" data-product_sku=""
                                            data-product_id="70" rel="nofollow"
                                            href="<?=Url::to(['/cart/add', 'id' => $product->id]);?>">Добавить в корзину</button>
                                </form>

                                <div class="product-inner-category">
                                    <p>Категории: <a href="<?= Url::to(['category/'. $product->category_id])?>"><?= Category::getCategoryTitle($product->category_id) ?></a>
                                </div>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Описание</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Коментарии</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Описание</h2>
                                            <p><?= $product->short_content?></p>
                                            <p><?= $product->content?></p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Коментарии</h2>
                                            <div class="submit-review">
                                                <?php if(Yii::$app->user->isGuest): ?>
                                                <? echo 'Чтоб оставить коментарий нужно авторизоваться';?>
                                                <?php else: ?>
                                                <? $form = ActiveForm::begin(); ?>

                                                <?= $form->field($comment, 'comment')->textarea(['row' => 6]) ?>

                                                <div class="form-group">
                                                    <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
                                                </div>

                                                <?php ActiveForm::end()?>

                                                <?php endif?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-products-wrapper">
                        <? if (!empty($comments) ): ?>
                            <div class="comments">
                                    <h3 class="title-comments"></h3>
                                <? foreach ($comments as $com):?>
                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <div class="author"><?= User::getUsernameById($com->user_id)?></div>
                                                    <div class="metadata">
                                                        <span class="date"><?= $com->date_create?></span>
                                                    </div>
                                                </div>
                                                <div class="media-text text-justify"><?= $com->comment?></div>
                                                <hr>
                                            </div>
                                        </li>
                                    </ul>
                                <? endforeach;?>
                            </div>

                        <? else:?>

                            <? echo 'Коментарии отсуцтвуют'?>

                        <? endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

