<?php

use yii\helpers\Url;

?>

<div class="col-md-3 col-sm-6 ">
     <div class="single-promo  ">
         <a href="<?= Url::to(['category/'. $model->id])?>" style="text-decoration: none; color: white;"><i class="fa fa-refresh"></i><p><?= $model->title?></p></a>
     </div>
 </div>