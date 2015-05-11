<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use source\models\config\BasicConfig;
use source\models\config\DatetimeConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title='时间设置';
$this->addBreadcrumbs([
		'基本设置'
		]);
?>
<div class="config-basic">

    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'sys_datetime_timezone')->dropDownList(DatetimeConfig::getTimezoneItems()); ?>
	    <?= $form->field($model, 'sys_datetime_date_format') ?>
	    <?= $form->field($model, 'sys_datetime_time_format') ?>
	    <?= $form->field($model, 'sys_datetime_pretty_format')->radioList(['1'=>'是','0'=>'否']) ?>
	   
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- config-basic -->
