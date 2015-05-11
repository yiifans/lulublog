<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model source\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'takonomy_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'last_user_id')->textInput() ?>

    <?= $form->field($model, 'last_user_name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'focus_count')->textInput() ?>

    <?= $form->field($model, 'favorite_count')->textInput() ?>

    <?= $form->field($model, 'view_count')->textInput() ?>

    <?= $form->field($model, 'comment_count')->textInput() ?>

    <?= $form->field($model, 'agree_count')->textInput() ?>

    <?= $form->field($model, 'against_count')->textInput() ?>

    <?= $form->field($model, 'is_sticky')->textInput() ?>

    <?= $form->field($model, 'is_recommend')->textInput() ?>

    <?= $form->field($model, 'is_headline')->textInput() ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <?= $form->field($model, 'allow_comment')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'template')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <?= $form->field($model, 'visibility')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'content_type')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'seo_description')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'url_alias')->textInput(['maxlength' => 256]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
