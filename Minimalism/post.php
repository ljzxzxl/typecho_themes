<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post shadow" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline">
            <?php $this->title() ?>
        </h1>
        <ul class="post-meta">
            <!-- <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li> -->
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d H:i'); ?></time></li>
            <?php if(isset($this->options->plugins['activated']['Views'])) _e('<li>').Views_Plugin::theViews(). _e('</li>'); ?>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- xeylon_banner -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:606px;height:90px"
                 data-ad-client="ca-pub-7546170918675493"
                 data-ad-slot="2535844443"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <?php $this->content(); ?>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- xeylon_banner_2 -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:606px;height:90px"
                 data-ad-client="ca-pub-7546170918675493"
                 data-ad-slot="1462435926"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(' ', true, '无'); ?></p>
    </article>

    <?php $this->need('comments.php'); ?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div><!-- end #main-->
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
