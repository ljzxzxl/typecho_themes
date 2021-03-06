<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="windows-Target" contect="_top">
    <meta name="robots" content="all">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link href="//cdn.bootcss.com/normalize/7.0.0/normalize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/top.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/darcula.css'); ?>">

    <!--[if lt IE 9]>
    <script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-7546170918675493",
            enable_page_level_ads: true
        });
    </script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?f13ce2ff1832a07924b536cb4dc7dc82";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>

<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<header id="header" class="clearfix Navbar visible">
    <div id="nav">
        <div id="nav_inner">
            <div id="pulldown-menu" class="ciNav">
                <ul>
                    <li class="toctree-l1">
                        <a class="reference internal" href="javascript:;">欢迎访问！</a>
                        <ul class="simple">
                        </ul>
                    </li>
                </ul>
                <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
                <?php while ($categories->next()): ?>
                <ul>
                    <li class="toctree-l1">
                        <a class="reference internal" href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a>
                        <?php $this->widget('Widget_Archive@category-' . $categories->mid, 'pageSize=20&type=category', 'mid=' . $categories->mid)->to($posts); ?>
                        <ul>
                            <?php while ($posts->next()): ?>
                            <li class="toctree-l2"><a class="reference internal" href="<?php $posts->permalink(); ?>" title="<?php $posts->title(); ?>"><?php $posts->title(40); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </li>
                </ul>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="site-name col-mb-3 col-2">
                <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <?php if ($this->options->logoUrl): ?>
                    <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                    <?php endif; ?>
                    <?php $this->options->title() ?>
                </a>
        	    <p class="description hide"><?php $this->options->description() ?></p>
            </div>
            <div class="col-mb-9 col-7">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                    <a href="http://kod.xeylon.com/" title="PHP版本：<?php echo PHP_VERSION;?>">实验室</a>
                    <a href="javascript:;" id="openToc">目录</a>
                </nav>
            </div>
            <div class="site-search kit-hidden-tb col-3"> <!-- kit-hidden-tb -->
                <form id="search" method="post" action="./" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" name="s" class="text" placeholder="" />
                    <button type="submit" class="submit"><?php _e('搜索'); ?></button>
                </form>
            </div>
            <div class="hamburger hide" id="hamburger-1">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
            </div>

        </div><!-- end .row -->
    </div>
</header><!-- end #header -->
<div id="body">
    <div class="container">
        <div class="row">

    
    
