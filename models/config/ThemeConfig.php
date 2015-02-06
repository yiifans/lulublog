<?php

namespace app\models\config;

use Yii;
use app\core\base\BaseModel;
use app\models\Config;

class ThemeConfig extends BaseConfig
{
	public $sys_site_theme;
	

	
    public function rules()
    {
        return [
            [['sys_site_theme'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_site_theme' => '主题',
            
        ];
    }
    
    public function initValue()
    {
    	$this->sys_site_theme=parent::initValueInternael('sys_site_theme');
    }
    
    public function save()
    {
    	parent::saveAll([
    			'sys_site_theme' => $this->sys_site_theme,
    			]);
    }
}
