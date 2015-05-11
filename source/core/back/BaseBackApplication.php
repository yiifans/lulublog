<?php
namespace source\core\back;

use Yii;

use source\core\base\BaseApplication;
use source\LuLu;

class BaseBackApplication extends BaseApplication
{
    public function init()
    {
        parent::init();
        $this->loadModules();
    }
    
    public function loadModules()
    {
        $moduleManager = LuLu::$app->moduleManager;
        $activeModules = $moduleManager->loadActiveModules(true);
       
        foreach ($activeModules as $m)
        {
            $moduleId = $m['id'];
        
            $this->setModule($moduleId, [
                'class'=>'source\modules\\'.$moduleId.'\\AdminModule'
            ]);
        }
    }
}
