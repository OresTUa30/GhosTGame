
<?
use app\models\Setting;
?>


<?$currency = Setting::getSetting('currency');?>

<div class="table-responsive-lg">
        <table style="width: 60%" class="table table-hover table-striped">
            <thead>
                <tr style="background: #c5c5c5">
                    <th style="border: solid 1px">Название</th>
                    <th style="border: solid 1px">Кол-во</th>
                    <th style="border: solid 1px">Цена</th>
                    <th style="border: solid 1px">Сумма</th>
                </tr>
            </thead>
            <tbody>
            <? foreach ($session['cart'] as $id =>$item):?>
                <tr>
                    <td style=" font-size: 16px; text-align:center; border: solid 1px"><?= $item['name']?></td>
                    <td style="font-size: 16px; text-align:center;border: solid 1px"><?= $item['qty']?></td>
                    <td style="font-size: 16px; text-align:center;border: solid 1px"><?= $item['price']. ' '. $currency ?></td>
                    <td style="font-size: 16px; text-align:center;border: solid 1px"><?= $item['qty'] * $item['price'] .' '. $currency?></td>
                </tr>
            <? endforeach;?>
            <tr style="background: #c5c5c5">
                <th style="text-align: left;border: solid 1px" >Всего: </th>
                <th style="border: solid 1px" colspan="3"><?=$_SESSION['cart.qty']?></th>
            </tr>
            <tr style="background: #c5c5c5">
                <th style="text-align: left;border: solid 1px" >На сумму: </th>
                <th style="border: solid 1px"  colspan="3"><?=$_SESSION['cart.sum'] .' '. $currency?></th>
            </tr>
            </tbody>
        </table>
    </div>

