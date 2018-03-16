<?php $this->need('header.php'); ?>
<style>
.post img{
	padding: 0em 0 !important;
}
.post img:hover{	
}
</style>
<article class="post">
	<h1 class="post-title"><i class="fa-paint-brush fa widget-fa"></i>&nbsp;<?php $this->title() ?></h1>
	<ul class="post-meta">
		<li><i class="fa fa-clock-o widget-fa"></i>&nbsp;<?php $this->date('m月 j, Y'); ?></li>
		<li><i class="fa fa-eye widget-fa"></i>&nbsp;<?php Views_Plugin::theViews('阅读(',')'); ?></li>
		<li><a rel="nofollow" href="<?php $this->permalink() ?>#comments"><i class="fa fa-comments-o widget-fa"></i>&nbsp;<?php $this->commentsNum('评论(0)', '评论(1)', '评论(%d)'); ?></a></li>
	</ul>
	<div class="post-content">
		<?php $this->content(); ?>
	</div>
	<!--<a target="_blank" href="http://www.rkidc.net/?refcode=ARZ0B4P697I38ULY5">
		<img src="http://cdn.rkidc.loveml.com/rkidc-ad-700.jpg" style="width: 100%;">
	</a>-->
</article>
<?php $this->need('comments.php'); ?> 
<?php $this->need('footer.php'); ?>
