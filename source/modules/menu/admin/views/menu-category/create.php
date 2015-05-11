<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model source\models\MenuCategory */


$this->title = '新建菜单分类';
$this->addBreadcrumbs([
		['菜单管理',['/menu']],
		$this->title,
		]);

?>
<div class="menu-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
