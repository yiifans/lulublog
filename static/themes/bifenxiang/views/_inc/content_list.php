<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;
use source\LuLu;
/* @var $this yii\web\View */


if(!isset($orderBy))
{
	$orderBy = 'created_at desc';
}
if(!isset($limit))
{
	$limit = 5;
}

if(!isset($item))
{
    $item='item_pic';
}
if(!isset($isPic))
{
    $isPic = true;
}
$where=[];
$moduleId = LuLu::$app->controller->module->id;
if( $moduleId!=='app-frontend')
{
    $where = ['content_type'=>$moduleId];
}


$contents = 	Content::findAll($where,$orderBy,$limit);

?>

<?php foreach ($contents as $content):?>
<?php echo $this->render(Resource::getThemePath('/views/_inc/'.$item),['content'=>$content]);?>
<?php endforeach;?>
