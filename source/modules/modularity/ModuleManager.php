<?php
namespace source\modules\modularity;

use source\core\base\ModuleComponent;
use source\core\modularity\ModuleInfo;
use source\core\base\BaseModule;
use source\modules\modularity\models\Modularity;
use source\LuLu;
use source\core\base\BaseComponent;

class ModuleManager extends BaseComponent
{
    public function loadActiveModules($isAdmin=false)
    {
        $field = $isAdmin ? 'enable_admin' : 'enable_home';
        
        $allModules = Modularity::find()->where([
            $field => 1
        ])
            ->indexBy('id')
            ->all();
        
        $modules = $this->loadAllModules();
        
        $ret = [];
        foreach ($modules as $m)
        {
            $moduleId = $m['id'];
            
            if (array_key_exists($moduleId, $allModules))
            {
                $ret[$moduleId] = $m;
                
                $exitModule = $allModules[$moduleId];
                $ret[$moduleId]['can_active_admin'] = ($exitModule['enable_admin'] === null || $exitModule['enable_admin'] === 0) ? true : false;
                $ret[$moduleId]['can_active_home'] = ($exitModule['enable_home'] === null || $exitModule['enable_home'] === 0) ? true : false;
                
                $ret[$moduleId]['can_install'] = false;
                $ret[$moduleId]['can_uninstall'] = (! $ret[$moduleId]['can_active_admin'] || ! $ret[$moduleId]['can_active_home']) ? false : true;
            }
        }
        return $ret;
    }

    public function loadModules()
    {
        $ret = [];
        
        $allModules = Modularity::find()->indexBy('id')->all();
        
        $modules = $this->loadAllModules();
        foreach ($modules as $m)
        {
            $moduleId = $m['id'];
            
            $ret[$moduleId] = $m;
            if (array_key_exists($moduleId, $allModules))
            {
                $exitModule = $allModules[$moduleId];
                $ret[$moduleId]['can_active_admin'] = ($exitModule['enable_admin'] === null || $exitModule['enable_admin'] === 0) ? true : false;
                $ret[$moduleId]['can_active_home'] = ($exitModule['enable_home'] === null || $exitModule['enable_home'] === 0) ? true : false;
                
                $ret[$moduleId]['can_install'] = false;
                $ret[$moduleId]['can_uninstall'] = (! $ret[$moduleId]['can_active_admin'] || ! $ret[$moduleId]['can_active_home']) ? false : true;
            }
        }
        return $ret;
    }

    private function loadAllModules()
    {
        $ret = [];
        
        $moduleRootPath = LuLu::getAlias('@source') . '/modules';
        
        if ($moduleRootDir = @ dir($moduleRootPath))
        {
            while (($moduleFile = $moduleRootDir->read()) !== false)
            {
                $modulePath = $moduleRootPath . '/' . $moduleFile;
                if (preg_match('|^\.+$|', $moduleFile) || ! is_dir($modulePath))
                {
                    continue;
                }
                
                if ($moduleDir = @ dir($modulePath))
                {
                    $moduleInfo = str_replace(' ', '', ucwords(implode(' ', explode('-', $moduleFile))));
                    
                    $class=null;
                    $instance = null;
                    $can_active_admin=null;
                    $can_active_home=null;
                    
                    while (($item = $moduleDir->read()) !== false)
                    {
                        $itemPath = $moduleRootPath . '/' . $moduleFile . '/' . $item;
                        if (preg_match('|^\.+$|', $item) || is_dir($itemPath))
                        {
                            continue;
                        }
                        if ($item === $moduleInfo . 'Module.php')
                        {
                            $class = 'source\modules\\' . $moduleFile . '\\' . $moduleInfo . 'Module';
                        }
                    }
                    if($class!==null)
                    {
                        try
                        {
                            // $moduleObj = LuLu::createObject($class);
                            $instance = new $class();
                            if (empty($instance->name))
                            {
                                $instance->name = $moduleFile;
                            }
                        }
                        catch (Exception $e)
                        {
                            // $instance=$e;
                        }
                    }
                    $ret[$moduleFile] = [
                        'id' => $moduleFile,
                        'class' => $class,
                        'instance' => $instance,
                        'can_install' => true,
                        'can_uninstall' => true,
                        'can_active_admin' => false,
                        'can_active_home' => false
                    ];
                }
            }
        }
        return $ret;
    }
}
