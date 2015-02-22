<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Takonomy;
use app\core\helpers\TStringHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Takonomy */
/* @var $form yii\widgets\ActiveForm */


$options = '<option value="0">根节点</option>';
$takonomies = Takonomy::getArrayTree($type);
foreach($takonomies as $row)
{
	$style = '';
	
	if($model['parent_id'] == intval($row['id']))
	{
		$style = ' selected';
	}
	$options .= '<option value="' . $row['id'] . '"' . $style . '>' . TStringHelper::blank($row['level']) . $row['name'] . '</option>';
}

?>

<div class="takonomy-form">

    <?php $form = ActiveForm::begin(); ?>


        <div class="form-group field-takonomy-parent_id required">
<label class="control-label" for="takonomy-parent_id">父结点</label>
<select type="text" id="takonomy-parent_id" class="form-control" name="Takonomy[parent_id]">
<?php echo $options?>
</select>

<div class="help-block"></div>
</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
