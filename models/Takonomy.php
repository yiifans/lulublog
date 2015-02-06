<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%takonomy}}".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $parent_id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property integer $contents
 * @property integer $sort_num
 */
class Takonomy extends \app\core\base\BaseActiveRecord
{
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
            [['type_id', 'parent_id', 'name', 'sort_num'], 'required'],
            [['type_id', 'parent_id', 'contents', 'sort_num'], 'integer'],
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
            'type_id' => 'Type ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'description' => 'Description',
            'contents' => 'Contents',
            'sort_num' => 'Sort Num',
        ];
    }
}
