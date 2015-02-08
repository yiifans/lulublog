<?php

namespace app\models\config;

use Yii;
use app\core\base\BaseModel;
use app\models\Config;

class ThemeConfig extends BaseConfig
{
	public $sys_site_theme;
	public $test_data_theme;
	
    public function rules()
    {
        return [
            [['sys_site_theme','test_data_theme'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_site_theme' => '主题',
            'test_data_theme'=>'测试'
        ];
    }
}
