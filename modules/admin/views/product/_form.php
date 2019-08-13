<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use pendalf89\filemanager\widgets\FileInput;
//$categories = [];
//$list = Category::find()->all();
//array_walk($list, function($model) use (&$categories){
//    $categories[$model->id] = $model->title;
//});


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
            <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <?= $form->field($model, 'category_id')->textInput(); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <?= $form->field($model, 'short_content')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <? echo $form->field($model, 'image')->widget(FileInput::className(), [
                'buttonTag' => 'button',
                'buttonName' => 'Browse',
                'buttonOptions' => ['class' => 'btn btn-default'],
                'options' => ['class' => 'form-control'],
                // Widget template
                'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                // Optional, if set, only this image can be selected by user
                'thumb' => 'original',
                // Optional, if set, in container will be inserted selected image
                'imageContainer' => '.img',
                // Default to FileInput::DATA_URL. This data will be inserted in input field
                'pasteData' => FileInput::DATA_URL,
                // JavaScript function, which will be called before insert file data to input.
                // Argument data contains file data.
                // data example: [alt: "Ведьма с кошкой", description: "123", url: "/uploads/2014/12/vedma-100x100.jpeg", id: "45"]
                'callbackBeforeInsert' => 'function(e, data) {
            console.log( data );
        }',]);
            ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <? echo $form->field($model, 'screen1')->widget(FileInput::className(), [
                'buttonTag' => 'button',
                'buttonName' => 'Browse',
                'buttonOptions' => ['class' => 'btn btn-default'],
                'options' => ['class' => 'form-control'],
                // Widget template
                'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                // Optional, if set, only this image can be selected by user
                'thumb' => 'original',
                // Optional, if set, in container will be inserted selected image
                'imageContainer' => '.img',
                // Default to FileInput::DATA_URL. This data will be inserted in input field
                'pasteData' => FileInput::DATA_URL,
                // JavaScript function, which will be called before insert file data to input.
                // Argument data contains file data.
                // data example: [alt: "Ведьма с кошкой", description: "123", url: "/uploads/2014/12/vedma-100x100.jpeg", id: "45"]
                'callbackBeforeInsert' => 'function(e, data) {
            console.log( data );
        }',]);
            ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <? echo $form->field($model, 'screen2')->widget(FileInput::className(), [
                'buttonTag' => 'button',
                'buttonName' => 'Browse',
                'buttonOptions' => ['class' => 'btn btn-default'],
                'options' => ['class' => 'form-control'],
                // Widget template
                'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                // Optional, if set, only this image can be selected by user
                'thumb' => 'original',
                // Optional, if set, in container will be inserted selected image
                'imageContainer' => '.img',
                // Default to FileInput::DATA_URL. This data will be inserted in input field
                'pasteData' => FileInput::DATA_URL,
                // JavaScript function, which will be called before insert file data to input.
                // Argument data contains file data.
                // data example: [alt: "Ведьма с кошкой", description: "123", url: "/uploads/2014/12/vedma-100x100.jpeg", id: "45"]
                'callbackBeforeInsert' => 'function(e, data) {
            console.log( data );
        }',]);
            ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <? echo $form->field($model, 'screen3')->widget(FileInput::className(), [
                'buttonTag' => 'button',
                'buttonName' => 'Browse',
                'buttonOptions' => ['class' => 'btn btn-default'],
                'options' => ['class' => 'form-control'],
                // Widget template
                'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                // Optional, if set, only this image can be selected by user
                'thumb' => 'original',
                // Optional, if set, in container will be inserted selected image
                'imageContainer' => '.img',
                // Default to FileInput::DATA_URL. This data will be inserted in input field
                'pasteData' => FileInput::DATA_URL,
                // JavaScript function, which will be called before insert file data to input.
                // Argument data contains file data.
                // data example: [alt: "Ведьма с кошкой", description: "123", url: "/uploads/2014/12/vedma-100x100.jpeg", id: "45"]
                'callbackBeforeInsert' => 'function(e, data) {
        console.log( data );
    }',]);
            ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <?= $form->field($model, 'price')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10 ">
            <?= $form->field($model,'stock')->checkbox(['0,1']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10 ">
            <?= $form->field($model,'new')->checkbox(['0,1']) ?>
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
