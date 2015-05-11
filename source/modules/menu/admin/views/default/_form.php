<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use source\models\Menu;
use source\libs\Common;

/* @var $this yii\web\View */
/* @var $model source\models\Menu */
/* @var $form yii\widgets\ActiveForm */

$category=$model->category_id;


$takonomies = Menu::getArrayTree($category);

$options = Common::buildTreeOptionsForSelf($takonomies, $model);

$targets=[
	'_self'=>'当前窗口',
	'_blank'=>'新窗口',
	
];
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo Html::activeHiddenInput($model, 'category_id')?>
<div class="form-group field-menu-parent_id required">
<label class="control-label" for="menu-parent_id">父结点</label>
<select type="text" id="menu-parent_id" class="form-control" name="Menu[parent_id]">
<?php echo $options?>
</select>

<div class="help-block"></div>
</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'target')->radioList($targets) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'enabled')->radioList(['1'=>'可用','0'=>'禁止']) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
