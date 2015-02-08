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
            'id' => 'ID',
            'type' => 'Type ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'description' => 'Description',
            'contents' => 'Contents',
            'sort_num' => 'Sort Num',
        ];
    }
}
