<?
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Корзина</h2>
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
                        <?php $form = ActiveForm::begin()?>

                        <?= $form->field($order, 'name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($order, 'email')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($order, 'phone')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($order, 'address')->textInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end()?>
                    </div>
                </div>


                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <? if(!empty($session['cart'])):?>
                            <form method="post" action="/cart/clear-index">
                                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Постер</th>
                                            <th class="product-name">Продукт</th>
                                            <th class="product-price">Цена</th>
                                            <th class="product-sum">Количество</th>
                                            <th class="product-quantity">Сумма</th>
                                            <th class="product-quantity">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? foreach ($session['cart'] as $id =>$item):?>
                                        <tr class="cart_item">

                                            <td class="product-thumbnail">
                                                <a href="<?= Url::to(['product/show', 'id' => $id])?>"><?= Html::img("@web{$item['image']}", ['class'=> 'shop_thumbnail', 'width' => 300, 'height'=> 200 ])?></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="<?= Url::to(['product/show', 'id' => $id])?>"><?= $item['name']?></a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?= $item['price']?></span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <span class="amount"><?= $item['qty']?></span>
                                                </div>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <span class="amount"><?=$item['price'] * $item['qty']?></span>
                                                </div>
                                            </td>
                                            <td class="product-thumbnail">
                                                <span data-id ="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span>
                                            </td>
                                        </tr>
                                        <? endforeach;?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <input type="submit" value="Очистить корзину" name="clear_cart" class="checkout-button button alt wc-forward">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="cart_totals ">
                                    <h2>Вобщем</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Всего товара</th>
                                            <td><span class="amount"><?= $session['cart.qty']?></span></td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Общая цена</th>
                                            <td><strong><span class="amount"><?= $session['cart.sum']?></span></strong> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                             <?php else: ?>
                             <h3>Корзина пуста</h3>
                            <?php endif;?>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
</div>

