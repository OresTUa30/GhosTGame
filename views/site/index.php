<?php

use yii\helpers\Url;

?>
<div class="slider-area">
    <div class="zigzag-bottom"></div>
    <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">

        <div class="slide-bulletz">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="carousel-indicators slide-indicators">
                            <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                            <li data-target="#slide-list" data-slide-to="1"></li>
                            <li data-target="#slide-list" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="single-slide">
                    <div class="slide-bg slide-one"></div>
                    <div class="slide-text-wrapper">
                        <div class="slide-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <div class="slide-content">
                                            <h2>World of Warcraft: Battle for Azeroth</h2>
                                            <p>Седьмое контентное дополнение к игре World of Warcraft было анонсировано на игровой конференции BlizCon 2017 и получило название "Битва за Азерот".</p>
                                            <p>Уже в продаже в нашем магазине.</p>
                                            <a href="/product/15" class="readmore">Купить</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="single-slide">
                    <div class="slide-bg slide-two"></div>
                    <div class="slide-text-wrapper">
                        <div class="slide-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <div class="slide-content">
                                            <h2>Еженедельные акции на товар</h2>
                                            <p>В нашем магазине проходят еженедельные Акции где вы можете купить товары по заниженым ценникам!.</p>
                                            <a href="<?= Url::to('/product/stock');?>" class="readmore">Перейти</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="single-slide">
                    <div class="slide-bg slide-three"></div>
                    <div class="slide-text-wrapper">
                        <div class="slide-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <div class="slide-content">
                                            <h2>Новинки</h2>
                                            <p>Как только товар появляеться на рынке он сразу попадает на наши виртуальные стелажи где по доступным ценам вы сможете его купить!</p>
                                            <a href="<?= Url::to('/product/new');?>" class="readmore">Перейти</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>