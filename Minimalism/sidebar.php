<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-4 kit-hidden-tb" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock)): ?>
    <?php $bing = bing(); ?> <!-- 获取今日必应壁纸 -->
    <section class="widget">
        <div class="info-header" title="<?php echo isset($bing['para1'])?$bing['para1']:$bing['copyright'];?>" style="background-image:url('<?php _e($this->options->siteUrl().date('Ymd').'.jpg'); ?>');">
            <a href="https://www.bing.com/?mkt=zh-CN" target="_blank">
                <div class="arrow01"></div>
            </a>
            <span class="info-header-img">
                <img title="<?php echo isset($bing['title'])?$bing['title']:$bing['copyright'];?>" src="<?php $this->options->themeUrl('img/header.jpg'); ?>">
            </span>
        </div>
        <div class="follow-me">
            <a href="https://music.163.com/#/playlist?id=55914568&userid=56816886" target="_blank">Music</a>
            <a href="https://github.com/ljzxzxl" target="_blank">Github</a>
            <a href="tencent://message/?uin=171145707&amp;Site=&amp;Menu=yes">QQ</a>
        </div>
    </section>
    <?php if(isset($this->options->plugins['activated']['Views'])): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('热门文章'); ?></h3>
            <ul class="widget-list">
                <?php Views_Plugin::theMostViewed(); ?>
            </ul>
        </section>
    <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    <section class="widget">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- xeylon_side -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-7546170918675493"
             data-ad-slot="5347153696"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </section>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?>: <?php $comments->excerpt(35, '...'); ?></a></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

    <section class="widget">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- xeylon_side -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-7546170918675493"
             data-ad-slot="5347153696"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </section>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget">
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
        <ul class="widget-list">
            <?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>" target="_blank"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li><a href="http://www.typecho.org" target="_blank">Typecho</a></li>
            <li><a href="http://www.aicimu.com/" target="_blank">爱词曲谱</a></li>
        </ul>
	</section>
    <?php endif; ?>

</div><!-- end #sidebar -->
