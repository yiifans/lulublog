<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Content;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-md-9">
    <?= $form->field($model, 'title')->textInput(['maxlength' => 256,'placeholder'=>'请输入标题'])->label(false) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 128,'placeholder'=>'Url 地址']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 12]) ?>	
    
    <?= $form->field($model, 'excerpt')->textarea(['rows' => 6]) ?>
	</div>
	
	<div class="col-md-3">
    
    <?= $form->field($model, 'visibility')->dropDownList(Content::getVisibilities()) ?>
	
	<?= $form->field($model, 'password')->passwordInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'status')->dropDownList(Content::getStatuses()) ?>

    <?= $form->field($model, 'allow_comment')->checkbox() ?>
    
    <?= $form->field($model, 'sticky')->checkbox() ?>
    
    <?= $form->field($model, 'thumb')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'template')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'comments')->textInput() ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'diggs')->textInput() ?>

    <?= $form->field($model, 'burys')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>	
	</div>
</div>




    <?php ActiveForm::end(); ?>

</div>
