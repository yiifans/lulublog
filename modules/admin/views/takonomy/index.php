<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\core\LuLu;
use app\core\lib\Common;
use app\models\Takonomy;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TakonomySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$type=LuLu::getGetValue('type');
$this->title = Takonomy::getTypes($type);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takonomy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建', ['create','type'=>LuLu::getGetValue('type')], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'parent_id',
            'name',
            'alias',
            // 'description',
            // 'contents',
            // 'sort_num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
