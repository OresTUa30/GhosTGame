
<?

use app\models\Comments;
use app\models\Order;
use app\models\Product;
use app\models\User;

?>

<? $product_count = Product::find()->where(['status' => 1])->count();
   $order_count = Order::find()->count();
   $order_5 = Order::find()->orderBy(['id' => SORT_DESC])->limit('5')->all();
   $user_count = User::find()->where(['role' => 'user'])->count();
   $comments_count = Comments::find()->count();
   $product_5 = Product::find()->orderBy(['id' => SORT_DESC])->limit('5')->all();

?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Главная</a></li>
    <li class="active">Информ-доска</li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-3">

            <!-- START WIDGET SLIDER -->
            <div class="widget widget-default widget-carousel">
                <div class="owl-carousel" id="owl-example">
                    <div>
                        <div class="widget-title">Пользователи</div>
                        <div class="widget-subtitle"><?= date('d.m.y')?></div>
                        <div class="widget-int"><?=$user_count?></div>
                    </div>
                    <div>
                        <div class="widget-title">Коментарий оставленно</div>
                        <div class="widget-subtitle">Пользователями</div>
                        <div class="widget-int"><?=$comments_count?></div>
                    </div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET SLIDER -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count"><?= $product_count;?></div>
                    <div class="widget-title">Всего товаров</div>
                    <div class="widget-subtitle">в магазине</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count"><?= $order_count?></div>
                    <div class="widget-title">Всего заказов</div>
                    <div class="widget-subtitle">сделано покупателями</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET CLOCK -->
            <div class="widget widget-info widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="widget-subtitle plugin-date">Loading...</div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">

            <!-- START SALES & EVENTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3> 5 </h3>
                        <span>последних загруженных товаров</span>
                    </div>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-line-1" style="height: 200px;">
                        <ul class="panel-controls panel-controls-title block">
                            <? foreach ( $product_5 as $product): ?>
                                <li><?=$product->id.'. '. $product->name?></li>
                                <br>
                                <hr>
                            <? endforeach; ?>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3> 5 </h3>
                        <span>последних заказов</span>
                    </div>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-line-1" style="height: 200px;">
                        <ul class="panel-controls panel-controls-title block">
                            <? foreach ( $order_5 as $order): ?>
                                <li><?=$order->id.'.   <strong>Имя:</strong> '.
                                        $order->name.'.   <strong>Email:</strong> '.
                                        $order->email.'.   <strong>Количество:</strong> '.
                                        $order->qty.'.   <strong>На сумму:</strong> '.
                                        $order->sum;?></li>
                                <br>
                                <hr>
                            <? endforeach; ?>
                        </ul>

                    </div>
                </div>
            </div>
            <!-- END SALES & EVENTS BLOCK -->

        </div>
    </div>

    <!-- START DASHBOARD CHART -->
    <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
    <div class="block-full-width">

    </div>
    <!-- END DASHBOARD CHART -->

    </div>
<!-- END PAGE CONTENT WRAPPER -->