<?php

use yii\helpers\Html;
use app\core\lib\Common;
use app\core\LuLu;


/* @var $this yii\web\View */
/* @var $model app\models\Takonomy */
$type= LuLu::getGetValue('type');

$this->title = '新建'.Common::getTakonomyArray($type);
$this->params['breadcrumbs'][] = ['label' => Common::getTakonomyArray($type), 'url' => ['index','type'=>$type]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takonomy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    		'type'=>$type,
    ]) ?>

</div>
