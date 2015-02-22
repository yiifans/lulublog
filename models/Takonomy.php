<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%takonomy}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property integer $contents
 * @property integer $sort_num
 * @property integer $type
 */
class Takonomy extends \app\core\base\BaseActiveRecord
{
	const TYPE_POST = 1;
	const TYPE_PAGE = 2;
	const TYPE_TAG = 3;
	
	public static function getTypes($type=null)
	{
		$ret = [self::TYPE_PAGE=>'页面分类',self::TYPE_POST=>'文章分类',self::TYPE_TAG=>'Tag分类' ];
		if($type!=null)
		{
			return $ret[$type];
		}
		return $ret;
	}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%takonomy}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'parent_id', 'name', 'sort_num'], 'required'],
            [['type', 'parent_id', 'contents', 'sort_num'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'type' => '类别',
            'parent_id' => '父结点',
            'name' => '名称',
            'alias' => '别名',
            'description' => '描述',
            'contents' => '内容数量',
            'sort_num' => '排序',
        ];
    }
    
    private $_level;
    
    public function getLevel()
    {
    	return $this->_level;
    }
    
    public function setLevel($value)
    {
    	$this->_level = $value;
    }
    
  
    
    private static function getArrayTreeInternal($takonomies, $parentId = 0, $level = 0)
    {
    	$ret = [];
    
    	$dataList=[];
    	foreach ($takonomies as $takonomy)
    	{
    		if($takonomy['parent_id']===$parentId)
    		{
    			$dataList[$takonomy['id']]=$takonomy;
    		}
    	}
    	
    	if($dataList == null || empty($dataList))
    	{
    		return $ret;
    	}
    
    	foreach($dataList as $key => $value)
    	{
    		$value->level = $level;
    		$ret[] = $value;
    			
    		$temp = self::getArrayTreeInternal($takonomies,$value['id'], $level + 1);
    		$ret = array_merge($ret, $temp);
    	}
    	return $ret;
    }
    public static function getArrayTree($type)
    {
    	$takonomies = Takonomy::findAll(['type'=>$type],'sort_num desc');
    	return self::getArrayTreeInternal($takonomies,0,0);
    }
}
