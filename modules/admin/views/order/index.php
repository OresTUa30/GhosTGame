<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index block">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'qty',
            'sum',
            'status',
            'name',
            'email:email',
            'phone',
            'address',
            'create_at',
            'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
