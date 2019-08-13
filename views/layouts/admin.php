<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AdminAsset;

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;


AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Админпанель</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?$user = User::find()->where(['role' => 'admin'])->one();?>

<div class="page-container">
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="<?= Url::toRoute('/admin');?>">Админпанель</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <div class="profile">
                    <div class="profile-data">
                        <div class="profile-data-name"><?= $user['username'];?></div>
                        <div class="profile-data-title">Web Developer/Designer</div>
                    </div>
                </div>
            </li>
            <li class="xn-title">Навигация</li>
            <li class="xn-openable active">
                <a href="/"><span class="fa fa-desktop"></span> <span class="xn-text">На сайт</span></a>
            </li>
            <li class="xn-openable">
                <a href="<?= Url::toRoute('/admin');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Главная</span></a>
            </li>
            <li class="xn-openable">
                <a href=""><span class="fa fa-files-o"></span> <span class="xn-text">Категории</span></a>
                <ul>
                    <li><a href="<?= Url::toRoute('/admin/category/index');?>">Все категории</a></li>
                    <li><a href="<?= Url::toRoute('/admin/category/create');?>">Создать категорию</a></li>

                </ul>
            </li>
            <li class="xn-openable">
                <a href=""><span class="fa fa-files-o"></span> <span class="xn-text">Продукт</span></a>
                <ul>
                    <li><a href="<?= Url::toRoute('/admin/product/index');?>">Все продукты</a></li>
                    <li><a href="<?= Url::toRoute('/admin/product/create');?>">Создать продукт</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="<?= Url::toRoute('/admin/order/index');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Заказы</span></a>
            </li>
            <li class="xn-openable">
                <a href="<?= Url::toRoute('/admin/setting');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Настройки</span></a>
            </li>


        </ul>
    </div>
    <div class="page-content">


        <?= $content?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
