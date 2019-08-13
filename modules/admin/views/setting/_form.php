<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pendalf89\filemanager\widgets\FileInput;
?>

<div class="block">

<?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <div class="col-md-10">
        <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10">
        <?= $form->field($model, 'phones')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10">
        <?= $form->field($model, 'logo_image')->widget(FileInput::className(), [
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
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10">
        <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10">
            <?= $form->field($model, 'maps')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>