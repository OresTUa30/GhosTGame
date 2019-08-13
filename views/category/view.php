<?

use app\models\Category;
use yii\widgets\ListView;

?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?=$model->title?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
<?
echo ListView::widget([
    'dataProvider' => $category_pr,
    'itemView' => '/category/item_view.php',
    'summary' => false,
])
?>
</div>
</div>
</div>


