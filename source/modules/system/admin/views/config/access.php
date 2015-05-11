<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use source\models\config\BasicConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->addBreadcrumbs([
		'基本设置'
		]);
?>
<div class="config-basic">

注册与访问控制
    <?php $form = ActiveForm::begin(); ?>

       
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- config-basic -->
