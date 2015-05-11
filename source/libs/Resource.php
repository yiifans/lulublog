<?php

namespace source\libs;

use source\LuLu;

class Resource 
{
	public static function registerFile($url)
	{
		$view = LuLu::getView();
	
		$dot = stripos($url, '.css');
		if($dot>0)
		{
		    echo '<link type="text/css" rel="stylesheet" href="'.$url.'" />'."\n";
		    
			//$view->registerCssFile($url);
		}
		else
		{
		    echo '<script type="text/javascript" src="'.$url.'" ></script>'."\n";
			//$view->registerJsFile($url);
		}
	}
	
	public static function getCommonPath($path=null)
	{
		$ret = LuLu::getAlias('@webroot/static/common');
		if($path!=null)
		{
			return $ret.$path;
		}
		return $ret;
	}
	public static function getCommonUrl($url=null)
	{
		$ret = LuLu::getAlias('@web/static/common');
		if($url!=null)
		{
			return $ret.$url;
		}
		return $ret;
	}
	public static function registerCommon($url)
	{
		$url = self::getCommonUrl($url);
		self::registerFile($url);
	}
	
	
	public static function getAdminPath($path=null)
	{
	    $currentTheme = LuLu::getAppParam('adminTheme');
		$ret = '@webroot/static/admin/'.$currentTheme;
		if($path!=null)
		{
			return $ret.$path;
		}
		return $ret;
	}
	public static function getAdminUrl($url=null)
	{
	    $currentTheme = LuLu::getAppParam('adminTheme');
		$ret = LuLu::getAlias('@web/static/admin/'.$currentTheme);
		if($url!=null)
		{
			return $ret.$url;
		}
		return $ret;
	}
	public static function registerAdmin($url)
	{
		$url = self::getAdminUrl($url);
		self::registerFile($url);
	}
	
	
	public static function getThemePath($path=null)
	{
		$currentTheme = LuLu::getAppParam('homeTheme');
		$ret = '@webroot/static/themes/'.$currentTheme;
		if($path!=null)
		{
			return $ret.$path;
		}
		return $ret;
	}
	public static function getThemeUrl($url=null)
	{
		$currentTheme = LuLu::getAppParam('homeTheme');
		$ret = LuLu::getAlias('@web/static/themes/'.$currentTheme);
		if($url!=null)
		{
			return $ret.$url;
		}
		return $ret;
	}
	public static function registerTheme($url)
	{
		$url = self::getThemeUrl($url);
		self::registerFile($url);
	}
	
	public static function getContentItemView($content)
	{
		$currentTheme = LuLu::getAppParam('homeTheme');
		$ret = '@webroot/static/themes/'.$currentTheme.'/modules/'.$content['type'].'/_inc/content_default';
		
		return $ret;
	}
}

