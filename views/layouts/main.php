<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Cart;
use app\models\Setting;
use app\models\User;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Setting::getSetting('title');?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?$currency = Setting::getSetting('currency');?>


<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <?php if(Yii::$app->user->isGuest):?>
                            <li><a href="<?= Url::to(['/site/signup']);?>"><i class="fa fa-user"></i> Регистрация</a></li>
                            <li><a href="<?= Url::to(['/site/login']);?>"><i class="fa fa-user"></i> Войти</a></li>
                        <?php else:?>
                            <li><a href="<?= Url::to(['/site/logout']);?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username']?> Выйти</a></li>
                        <?php endif;?>
                        <li><a href="<?= Url::to(['/admin']);?>"><i class="fa fa-lock"></i> Админпанель</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="<?= Url::toRoute('/');?>"><span><?= Setting::getSetting('logo');?></span></a></h1>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="active-cyan-3  mb-4">
                <form method="get" action="<?= Url::to(['site/search'])?>">
                        <input type="text" placeholder="Поиск..." name="search" >
                        </form>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="shopping-item">
                    <a href="<?= Url::toRoute('cart/index');?>">Корзина <span class="cart-amunt"><?=$_SESSION['cart.sum']?></span>
                        <i class="fa fa-shopping-cart"></i> <span class="product-count"><?= $_SESSION['qty']?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<? if($_SERVER['REQUEST_URI'] == '/' ){echo 'active';} ?>"><a href="<?= Url::toRoute('/');?>">Главная</a></li>
                    <li class="<? if($_SERVER['REQUEST_URI'] == '/product/index' ){echo 'active';} ?>"><a href="<?= Url::toRoute('/product/index');?>">Магазин</a></li>
                    <li class="<? if($_SERVER['REQUEST_URI'] == '/category/index' ){echo 'active';} ?>"><a href="<?= Url::toRoute('category/index');?>">Категории</a></li>
                    <li class="<? if($_SERVER['REQUEST_URI'] == '/product/stock' ){echo 'active';} ?>"><a href="<?= Url::toRoute('/product/stock');?>">Акции</a></li>
                    <li class="<? if($_SERVER['REQUEST_URI'] == '/product/new' ){echo 'active';} ?>"><a href="<?= Url::toRoute('/product/new');?>">Новинки</a></li>
                    <li class="<? if($_SERVER['REQUEST_URI'] == '/cart/index' ){echo 'active';} ?>"><a href="<?= Url::toRoute('/cart/index');?>">Оформление</a></li>
                    <li><a href="#footer">Контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $content?>

<div class="footer-top-area" id="footer">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2><span>GhosTGameS</span></h2>
                    <p>Социальные Сети</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Контакты</h2>
                    <ul>
                        <li><span>Телефон: <?= Setting::getSetting('phones');?></span></li>
                        <li><a href="#">Email: <?= Setting::getSetting('email');?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <ul>
                        <li><a href="#"><?= Setting::getSetting('maps');?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2019 ItHub. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data-dismiss="modal" -->
<?
    Modal::begin([
            'header' => '<h2>Корзина</h2>',
            'id' => 'cart',
            'size' => 'modal-md',
            'footer' =>'<button type="submit" class="btn btn-success btn-default pull-left"
                        data-dismiss="modal"></span> Продолжить </button>
                        <button type="submit" class="btn btn-danger pull-left index-clear-cart"
                         > Очистить корзину </button>'

    ]);
    Modal::end();

?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
