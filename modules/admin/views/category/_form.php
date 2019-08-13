<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(); ?>

<div class="block">

        <div class="form-group">
            <div class="col-md-10">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <?= $form->field($model, 'short_content')->textarea(['rows' => 6, 'class' => 'form-control']) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <?= $form->field($model, 'content')->textarea(['rows' => 6, 'class' => 'form-control']) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10 ">
                <?= $form->field($model,'status')->dropDownList([
                    0 => 'Неактивно',
                    1 => 'Активно'

                ]) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
