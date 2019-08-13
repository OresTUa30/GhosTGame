<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index block">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' =>false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'image:ntext',
            'name',
            'price',
            'status',
            'stock',
            'new',
//            'screen1:ntext',
//            'screen2:ntext',
            //'screen3:ntext',
            //'meta_description',
            //'category_id',
            //'short_content:ntext',
            //'content:ntext',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
