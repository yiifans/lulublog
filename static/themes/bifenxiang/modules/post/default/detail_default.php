<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\models\Takonomy;
use source\models\Content;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model['title'];


$takonomies = Takonomy::getArrayTree('post');

$posts = Content::findAll();


?>



       <div class="content-wrap">
            <div class="content">

                <header class="article-header">
                    <h1 class="article-title"><?php echo $model['title']?></h1>
                    <div class="meta">
                        <span id="mute-category" class="muted"><i class="fa fa-list-alt"></i><a href="http://bb178.com/category/gaoxiao"> 搞笑</a></span>				<span class="muted"><i class="fa fa-user"></i> <a href="http://bb178.com/author/zengxf178">必分享</a></span>
                        <time class="muted"><i class="fa fa-clock-o"></i> <?php echo $model['created_at']?></time>
                        <span class="muted"><i class="fa fa-eye"></i> <?php echo $model['view_count']?>℃</span>
                        <span class="muted"><i class="fa fa-comments-o"></i> <a href="http://bb178.com/2015/3975.html#comments"><?php echo $model['comment_count']?>评论</a></span>
                        <a target="_blank" title="点击查看" rel="external nofollow" href="http://www.baidu.com/s?wd=他居然用自己的内裤来走私鸟">百度已收录</a>
                    </div>
                </header>
                <article class="article-content">
                	<?php echo $model['body_body'] ?>
                	
                	
                    <p>转载请注明：<a href="http://bb178.com">必分享-分享精彩内容</a> &raquo; <a href="http://bb178.com/2015/3975.html">他居然用自己的内裤来走私鸟</a></p>



                    <h2><strong><span style="color: #ff6600;">分享是一种快乐，请和您的朋友一起分享吧。</span></strong></h2>


                    <div class="article-social">
                        <a href="javascript:;" data-action="ding" data-id="3975" id="Addlike" class="action"><i class="fa fa-heart-o"></i>喜欢 (<span class="count">9</span>)</a><span class="or">or</span><span class="action action-share bdsharebuttonbox"><i class="fa fa-share-alt"></i>分享 (<span class="bds_count" data-cmd="count" title="累计分享0次">0</span>)<div class="action-popover"><div class="popover top in"><div class="arrow"></div><div class="popover-content"><a href="#" class="sinaweibo fa fa-weibo" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone fa fa-star" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="tencentweibo fa fa-tencent-weibo" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="qq fa fa-qq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_renren fa fa-renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin fa fa-weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more fa fa-ellipsis-h" data-cmd="more"></a></div></div></div></span>
                    </div>
                </article>
                <footer class="article-footer">
                    <div class="article-tags"><i class="fa fa-tags"></i><a href="http://bb178.com/tag/%e8%b5%b0%e7%a7%81" rel="tag">走私</a></div>
                </footer>
                <nav class="article-nav">
                    <span class="article-nav-prev"><i class="fa fa-angle-double-left"></i> <a href="http://bb178.com/2015/3958.html" rel="prev">他将面包车改成公寓环游世界</a></span>
                    <span class="article-nav-next"><a href="http://bb178.com/2015/3986.html" rel="next">你永远都想不到这个摄影师是如何创作这些非凡的假发？</a>  <i class="fa fa-angle-double-right"></i></span>
                </nav>

                <div class="related_top">
                    <div class="related_posts">
                        <ul class="related_img">

                            <li class="related_box">
                                <a href="http://bb178.com/2015/3859.html" title="这23个画脸比面具还恐怖" target="_blank">
                                    <img src="http://bb178.com/wp-content/themes/yusi1.0/timthumb.php?src=http://bb178.com/wp-content/uploads/2015/01/desktop-1421435834.jpg&h=110&w=185&q=90&zc=1&ct=1" alt="这23个画脸比面具还恐怖" /><br><span class="r_title">这23个画脸比面具还恐怖</span>
                                </a>
                            </li>

                            <li class="related_box">
                                <a href="http://bb178.com/2014/3308.html" title="现代版“清明上河图”发布" target="_blank">
                                    <img src="http://bb178.com/wp-content/themes/yusi1.0/timthumb.php?src=http://bb178.com/wp-content/uploads/2014/11/1416793548960.jpg&h=110&w=185&q=90&zc=1&ct=1" alt="现代版“清明上河图”发布" /><br><span class="r_title">现代版“清明上河图”发布</span>
                                </a>
                            </li>

                            <li class="related_box">
                                <a href="http://bb178.com/2014/3172.html" title="三次“老公我爱你”后的神回复" target="_blank">
                                    <img src="http://bb178.com/wp-content/themes/yusi1.0/timthumb.php?src=http://bb178.com/wp-content/uploads/2014/10/46f0fdfaaf51f3de47434ee496eef01f382979a0.jpg&h=110&w=185&q=90&zc=1&ct=1" alt="三次“老公我爱你”后的神回复" /><br><span class="r_title">三次“老公我爱你”后的神回复</span>
                                </a>
                            </li>

                            <li class="related_box">
                                <a href="http://bb178.com/2014/2893.html" title="女子为上电视真人秀自制三乳房" target="_blank">
                                    <img src="http://bb178.com/wp-content/themes/yusi1.0/timthumb.php?src=http://bb178.com/wp-content/uploads/2014/09/091734l2qfwbfv2fl2l36w.jpg&h=110&w=185&q=90&zc=1&ct=1" alt="女子为上电视真人秀自制三乳房" /><br><span class="r_title">女子为上电视真人秀自制三乳房</span>
                                </a>
                            </li>
                        </ul>


                        <div class="relates">
                            <ul>
			                 	<?php foreach ($posts as $post):?>
			                	
			                    <li><i class="fa fa-minus"></i><?php echo Html::a($post['title'],['/post/detail/detail','id'=>$post['id']])?> </li>
			                   
			               		<?php endforeach;?>                           
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
                 	<?php foreach ($posts as $post):?>
                	
                    <li><a href="<?php echo Url::to(['/post/detail/detail','id'=>$post['id']]);?>" title="这狗也能享受和人一样的待遇"><span class="thumbnail"><img src="http://bb178.com/wp-content/themes/yusi1.0/timthumb.php?src=http://bb178.com/wp-content/uploads/2015/01/desktop-14204863231.jpg&h=64&w=100&q=90&zc=1&ct=1" alt="这狗也能享受和人一样的待遇" /></span><span class="text"><?php echo $post['title']?></span><span class="muted"><?php echo $post['createdAt']?></span><span class="muted"><span class="ds-thread-count" data-thread-key="3718" data-replace="1"><?php echo $post['comment_count']?>评论</span></span></a></li>
                   
               		<?php endforeach;?>                   
               </ul>
            </div>
            <div class="widget d_postlist">
                <div class="title"><h2>热评文章</h2></div>
                <ul>
                    <li><a href="http://bb178.com/2015/3975.html" title="他居然用自己的内裤来走私鸟"><span class="thumbnail"><img src="http://bb178.com/wp-content/themes/yusi1.0/timthumb.php?src=http://bb178.com/wp-content/uploads/2015/01/desktop-14222859391.jpg&h=64&w=100&q=90&zc=1&ct=1" alt="他居然用自己的内裤来走私鸟" /></span><span class="text">他居然用自己的内裤来走私鸟</span><span class="muted">2015-01-30</span><span class="muted"><span class="ds-thread-count" data-thread-key="3975" data-replace="1">54评论</span></span></a></li>
                    <li><a href="http://bb178.com/2014/3495.html" title="大学开昆虫宴吃光50斤虫子"><span class="thumbnail"><img src="http://bb178.com/wp-content/themes/yusi1.0/timthumb.php?src=http://bb178.com/wp-content/uploads/2014/12/671ac15ca16c4bc259ebc8c86146e1ed.jpg&h=64&w=100&q=90&zc=1&ct=1" alt="大学开昆虫宴吃光50斤虫子" /></span><span class="text">大学开昆虫宴吃光50斤虫子</span><span class="muted">2014-12-07</span><span class="muted"><span class="ds-thread-count" data-thread-key="3495" data-replace="1">38评论</span></span></a></li>
                    <li><a href="http://bb178.com/2014/3684.html" title="大多数人都害怕这11种动物，但它们实际上不会伤害你"><span class="thumbnail"><img src="http://bb178.com/wp-content/themes/yusi1.0/timthumb.php?src=http://bb178.com/wp-content/uploads/2014/12/desktop-14194459831.jpg&h=64&w=100&q=90&zc=1&ct=1" alt="大多数人都害怕这11种动物，但它们实际上不会伤害你" /></span><span class="text">大多数人都害怕这11种动物，但它们实际上不会伤害你</span><span class="muted">2014-12-28</span><span class="muted"><span class="ds-thread-count" data-thread-key="3684" data-replace="1">34评论</span></span></a></li>
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

    

