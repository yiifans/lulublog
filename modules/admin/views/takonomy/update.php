<?php

use yii\helpers\Html;
use app\core\LuLu;
use app\core\Common;

/* @var $this yii\web\View */
/* @var $model app\models\Takonomy */

$type=LuLu::getGetValue('type');

$this->title = '更新: '.Common::getTakonomyArray($type) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Common::getTakonomyArray($type), 'url' => ['index','type'=>$type]];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="takonomy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    		'type'=>$type
    ]) ?>

</div>
