<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\models\Takonomy;
use source\models\Content;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\TimeHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model['title'];


$takonomies = Takonomy::getArrayTree('post');
?>



       <div class="content-wrap">
            <div class="content">

                <header class="article-header">
                    <h1 class="article-title"><?php echo $model['title']?></h1>
                    <div class="meta">
                        <span id="mute-category" class="muted"><i class="fa fa-list-alt"></i><a href=""> 搞笑</a></span>				<span class="muted"><i class="fa fa-user"></i> <a href="">LuLu Blog</a></span>
                        <time class="muted"><i class="fa fa-clock-o"></i> <?php echo TimeHelper::formatTime($model['created_at']) ?></time>
                        <span class="muted"><i class="fa fa-eye"></i> <?php echo $model['view_count']?>℃</span>
                        <span class="muted"><i class="fa fa-comments-o"></i> <a href=""><?php echo $model['comment_count']?>评论</a></span>
                        
                    </div>
                </header>
                <article class="article-content">
                	<?php echo $model['body_body'] ?>
                	

                    <h2><strong><span style="color: #ff6600;">分享是一种快乐，请和您的朋友一起分享吧。</span></strong></h2>


                    <div class="article-social">
                        <a href="javascript:;" data-action="ding" data-id="3975" id="Addlike" class="action"><i class="fa fa-heart-o"></i>喜欢 (<span class="count">9</span>)</a><span class="or">or</span><span class="action action-share bdsharebuttonbox"><i class="fa fa-share-alt"></i>分享 (<span class="bds_count" data-cmd="count" title="累计分享0次">0</span>)<div class="action-popover"><div class="popover top in"><div class="arrow"></div><div class="popover-content"><a href="#" class="sinaweibo fa fa-weibo" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone fa fa-star" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="tencentweibo fa fa-tencent-weibo" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="qq fa fa-qq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_renren fa fa-renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin fa fa-weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more fa fa-ellipsis-h" data-cmd="more"></a></div></div></div></span>
                    </div>
                </article>
                <footer class="article-footer">
                    <div class="article-tags"><i class="fa fa-tags"></i><a href="" rel="tag">走私</a></div>
                </footer>
                <nav class="article-nav">
                    <span class="article-nav-prev"><i class="fa fa-angle-double-left"></i> <a href="" rel="prev">他将面包车改成公寓环游世界</a></span>
                    <span class="article-nav-next"><a href="" rel="next">你永远都想不到这个摄影师是如何创作这些非凡的假发？</a>  <i class="fa fa-angle-double-right"></i></span>
                </nav>

                <div class="related_top">
                    <div class="related_posts">
                        <ul class="related_img">
                            <?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'created_at desc','item'=>'item_related','limit'=>4]);?>   
                        </ul>


                        <div class="relates">
                            <ul>
                                
			                 	<?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'created_at desc','item'=>'item','limit'=>6]);?>                          
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="comment-ad" class="banner banner-related">

                </div>
                <a name="comments"></a>

                <div class="ds-thread" data-thread-key="3975" data-author-key="1" data-title="他居然用自己的内裤来走私鸟" data-url="http://bb178.com/2015/3975.html"></div>


            </div>
        </div>
        <aside class="sidebar">
           
            <div class="widget d_postlist">
            	<div class="title"><h2>分类</h2></div>
            	<ul>
            		<li><?php echo Html::a('所有',['/post'])?></li>
            		<?php foreach ($takonomies as $takonomy):?>
            		<li><?php echo Html::a($takonomy['name'],['/post','takonomy'=>$takonomy['id']])?></li>
            		<?php endforeach;?>
            	</ul>
            	
            </div>
            <div class="widget d_postlist">
                <div class="title"><h2>为您推荐</h2></div>
                <ul>
                    <?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'created_at desc']);?>
               </ul>
            </div>
            <div class="widget d_postlist">
                <div class="title"><h2>热评文章</h2></div>
                <ul>
                    <?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'created_at desc']);?>
                </ul>
            </div>
            <div class="widget ds-widget-recent-visitors">
                <div class="title"><h2>最近访客</h2></div>
                <ul class="ds-recent-visitors" data-num-items="15" data-show-time="0" data-avatar-size="50">
                </ul>
            </div>
            <script>
                if (typeof DUOSHUO !== 'undefined')
                    DUOSHUO.RecentVisitors('.ds-recent-visitors');
            </script>
        </aside>

    

