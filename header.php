<?php if (!is_pjax()) { ?>
<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,user-scalable=no">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
	<link rel="shortcut icon" href="<?php $this->options->siteUrl('favicon.ico'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('sexful.css'); ?>?v=20171026" >
	<script src="https://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
	<link href="https://cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <![endif]-->	
	<script>
		if (window!=top){top.location.href = window.location.href;}
	</script>
	<?php $this->header('rss1=&atom=&generator=&template=&pingback=&xmlrpc=&wlw='); ?>
</head>
<body style="background-image:url(<?php $this->options->background(); ?>)">
	<div id="container" class="clearfix">
	<div id="secondary">
		<div class="site-name ">
			<a href="<?php $this->options->siteUrl(); ?>"><img class="avatar" src="<?php $this->options->portrait(); ?>" alt="Flicker" width="40" height="40">
			</a>
			<p style="padding-top: 10px;"><?php $this->options->username(); ?></p>
			<p class="description"><?php $this->options->motto(); ?></p>
		</div>		 
		<div class="nav">
			<div class="nav-title">Menu</div> 
			<ul class="header-nav">
				<a  href="<?php $this->options->siteUrl(); ?>"><li class="<?php if($this->is('index')): ?>current<?php endif; ?> <?php if($this->is('post')): ?>current<?php endif; ?>"><i class="fa fa-home"></i><?php _e('首页'); ?></li></a>
				<a href="<?php $this->options->siteUrl("category.html"); ?>"><li class="tree-nav <?php if($this->is('page', 'category')): ?> current<?php endif; ?>"><i class="fa fa-plus"></i>分类</li></a>
				<!-- <ul class="sub-nav">
					/*<?php $this->widget('Widget_Metas_Category_List')->parse('<li class="child"><a href="{permalink}"><span class="cicle cicle-{slug}"></span>{name}{levels}</a></li>'); ?>*/
				</ul> -->
				<a href="<?php $this->options->siteUrl('tag/say/'); ?>" id="saysay" title="说说"><li <?php if($this->is('tag', 'say')): ?> class="current"<?php endif; ?>><i class="fa fa-shekel"></i>说说</li></a>
				<a href="<?php $this->options->siteUrl('archives.html'); ?>" id="archives" title="归档"><li <?php if($this->is('page', 'archives')): ?> class="current"<?php endif; ?>><i class="fa fa-cloud"></i>归档</li></a>
				<a href="<?php $this->options->siteUrl('message.html'); ?>" id="message" title="留言"><li <?php if($this->is('page', 'message')): ?> class="current"<?php endif; ?>><i class="fa fa-comments"></i>留言</li></a>
				<a href="<?php $this->options->siteUrl('links.html'); ?>" id="message" title="友链"><li <?php if($this->is('page', 'links')): ?> class="current"<?php endif; ?>><i class="fa fa-link"></i>友链</li></a>
				<a href="<?php $this->options->siteUrl('start-page.html'); ?>" id="start-page" title="关于"><li <?php if($this->is('page', 'start-page')): ?> class="current"<?php endif; ?>><i class="fa fa-lastfm"></i>关于</li></a>
				<li class="search">
					<form class="form" id="search-form">
                		<input id="search" type="text" name="s" required="" placeholder="搜索..." class="search">
            		</form>
        		</li>
			</ul>
		</div>
		<footer id="footer">		
			<div class="social">
				<a target="_blank" href="<?php $this->options->social_weibo(); ?>"><i class="fa fa-weibo"></i></a>
				<a target="_blank" href="<?php $this->options->social_twitter(); ?>"><i class="fa fa-twitter"></i></a>
				<a target="_blank" href="<?php $this->options->social_github(); ?>"><i class="fa fa-github"></i></a>
				<a target="_blank" href="<?php $this->options->social_google_plus(); ?>"><i class="fa fa-google-plus"></i></a>
				<a target="_blank" href="/feed"><i class="fa fa-rss"></i></a>
			</div>		
			<div class="copyright">
				&copy; 2014 <a href="<?php $this->options->siteUrl(); ?>">小米笔记</a> &nbsp; | &nbsp; <a href="https://new.cnzz.com/v1/login.php?siteid=5593802" target="_blank">站长统计</a>
			</div>
		</footer>
		<!--<div class="nav ad">
			<ul>
				<li><a href="http://yushux.com" target="_blank"><i class="fa fa-shopping-cart"></i>榆树下双十一红包免费领</a></li>
			</ul>
		</div>-->
	</div>	
		<div id="content">
			<div id="say">
				<span><a href="/"><?php $this->options->top_text(); ?></a></span>
				<div id="view">
					<!--i class="fa fa-search"></i-->
					<i id="navcontrol" class="fa fa-bars"></i>			
				</div>			
			</div>
	<?php } ?><div id="content_sub">