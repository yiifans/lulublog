<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use source\models\Takonomy;
use source\helpers\StringHelper;
use source\libs\Common;

/* @var $this yii\web\View */
/* @var $model app\models\Takonomy */
/* @var $form yii\widgets\ActiveForm */


$category=$model->category_id;


$takonomies = Takonomy::getArrayTree($category);

$options = Common::buildTreeOptionsForSelf($takonomies, $model);

?>

<div class="takonomy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo Html::activeHiddenInput($model, 'category_id');?>

        <div class="form-group field-takonomy-parent_id required">
<label class="control-label" for="takonomy-parent_id">父结点</label>
<select id="takonomy-parent_id" class="form-control" name="Takonomy[parent_id]">
<?php echo $options?>
</select>

<div class="help-block"></div>
</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'url_alias')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
