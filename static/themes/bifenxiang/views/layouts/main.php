<?php 

use source\libs\Resource;
use source\models\Menu;


$themeUrl= Resource::getThemeUrl();


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title><?php echo $this->title?> —— <?php echo $this->getConfigValue('sys_site_name')?></title>
    
    <link rel='stylesheet' id='style-css' href='<?php echo $themeUrl?>/css/style.css' type='text/css' media='all' />
   
    
    <script type='text/javascript' src='<?php echo $themeUrl?>/js/jquery.min.js'></script>
    
    <meta name="keywords" content="分享，精彩，内容，必分享，娱乐，生活，动物，奇闻，社会，态度，搞笑，">
    <meta name="description" content="分享是一种态度，也是一种高度；分享是一种享受，也是被享受；与你一起分享精彩内容。">
    
    <?php $this->head() ?>
    <!-- http://bb178.com/2015/3975.html -->
</head>
<body class="home blog">
<?php $this->beginBody() ?>
    <header id="header" class="header">
        <div class="container-inner" style="height: 60px;">
            <div class="yusi-logo" style="font-size: 40px;margin-top:15px;">
                <a href="/">
                    
                    LuLu Blog
                </a>
				
            </div>
            <div class="ban-r">
            	<?php echo $this->getConfigValue('sys_site_description')?>
                <script type="text/javascript">
                    /*728*90 创建于 2014-08-20*/
                    var cpro_id = "u1670011";
                </script>
                
            </div>
        </div>

        <div id="nav-header" class="navbar">

            <ul class="nav">
            	<li id="menu-item-2333" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2333"><a href=".">首页</a></li>
            	<?php foreach (Menu::findAll(['category_id'=>'main','parent_id'=>0],'sort_num desc') as $menu):?>
				<li id="menu-item-<?php echo $menu['id']?>" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-<?php echo $menu['id']?>"><a href="<?php echo $menu['url']?>"><?php echo $menu['name']?></a></li>
				<?php endforeach;?>
			
                <li style="float:right;">
                    <div class="toggle-search"><i class="fa fa-search"></i></div>
                    <div class="search-expand" style="display: none;"><div class="search-expand-inner"><form method="get" class="searchform themeform" onsubmit="location.href='http://bb178.com/search/' + encodeURIComponent(this.s.value).replace(/%20/g, '+'); return false;" action="/"><div> <input type="ext" class="search" name="s" onblur="if(this.value=='')this.value='search...';" onfocus="if(this.value=='search...')this.value='';" value="search..."></div></form></div></div>
                </li>
            </ul>
        </div>
        
    </header>
   
   <section class="container" style="padding-top: 10px;">
    <?php echo $content;?>
   </section>
   
    <footer class="footer">
        <div class="footer-inner">
            <div class="copyright pull-left">
                <a href="http://bb178.com/" title="必分享">必分享</a> 佛山市万钧金属有限公司版权所有，<a href="http://www.miitbeian.gov.cn/">粤ICP备10078168号-2</a>，保留一切权利 ·   © 2011-2015
            </div>
            <div class="trackcode pull-right">
                统计代码
                
            </div>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<!-- Dynamic page generated in 1.996 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2015-04-23 10:30:21 -->
<!-- Compression = gzip -->
<?php $this->endPage() ?>