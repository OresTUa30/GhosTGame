
<?php use yii\helpers\Html;?>

<? if (!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
            <? foreach ($session['cart'] as $id =>$item):?>
                <tr>
                    <td><?= Html::img("{$item['image']}",
                            ['alt' => $item['name'], 'class' => 'cart_item_img'])?></td>
                    <td><?= $item['name']?></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
                    <td><span data-id ="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <? endforeach;?>
            <tr>
                <th colspan="4">Итог: </th>
                <th><?=$_SESSION['cart.qty']?></th>
            </tr>
            <tr>
                <th colspan="4">На сумму: </th>
                <th><?=$_SESSION['cart.sum']?></th>
            </tr>
            </tbody>

        </table>
    </div>

<?php else: ?>
    <h3>Корзина пуста</h3>

<?php endif;?>
