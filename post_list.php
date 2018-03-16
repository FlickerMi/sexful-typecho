<?php while($this->next()): ?>
<?php  
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $this->content, $thumbUrl);  //通过正则式获取图片地址
    $img_counter = $thumbUrl!=null?count($thumbUrl[0]):0;//一个src地址的计数器
?>
<?php $tags=$this->tags;if($tags!=null&&in_array("say",$tags[0])){ ?>
<article class="post post-list-article article-status">	
	<div class="ds-post-main">
		<div class="ds-avatar">
			<a title="<?php $this->title() ?>" href="<?php $this->permalink() ?>"><img alt="<?php $this->title() ?>" src="<?php $this->options->say_portrait(); ?>"></a>
		</div>
		<div class="ds-comment-body">
			<a class="dwtip-top user-name" data-tooltip="阅读详细" title="<?php $this->author() ?>" href="<?php $this->permalink() ?>"><?php $this->author() ?></a>
			<?php $this->content(); ?>
			<div class="status-meta">
				<span><i class="fa fa-clock-o"></i>&nbsp;<?php echo time_tran($this->date->timeStamp); ?></span>
				<a style="font-style: italic;"><i class="fa fa-map-marker"></i>&nbsp;ChengDu, China&nbsp;&nbsp;</a>
				<a rel="nofollow" href="<?php $this->permalink() ?>#comments"><i class="fa fa-comments-o"></i> <?php $this->commentsNum('0', '1', '%d'); ?></a>
			</div>
		</div>
	</div>
</article>
<?php } elseif ($img_counter > 0){ ?>
<article class="post post-list-article post-thumbimg">  
	<img alt="<?php $this->options->title() ?>" style="" src="<?php echo $thumbUrl[1][0]; ?>">
	<h2 class="post-title">
		<?php $tags=$this->tags;if($tags!=null&&strpos(json_encode($tags),'recommend')){ ?>
			<span class="cat label label-important" href="#"><a href="<?php $this->options->siteUrl('tag/recommend');  ?>">推荐</a><i class="label-arrow"></i></span>
		<?php } ?>
		<a class="title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
	</h2>				
	<div class="post-content">
		<?php $this->excerpt(200, '...'); ?>
	</div>				
	<ul class="post-meta">
		<li><i class="fa fa-th-large widget-fa"></i>&nbsp;<?php $this->category(','); ?></li>
		<li><i class="fa fa-clock-o widget-fa"></i>&nbsp;<?php $this->date('m月 j, Y'); ?></li>
		<li><i class="fa fa-eye widget-fa"></i>&nbsp;<?php Views_Plugin::theViews('',''); ?></li>
		<li><a rel="nofollow" href="<?php $this->permalink() ?>#comments"><i class="fa fa-comments-o widget-fa"></i>&nbsp;<?php $this->commentsNum('0', '1', '%d'); ?></a></li>
	</ul>
</article>
<?php } else { ?>
<article class="post post-list-article">
	<h2 class="post-title">
		<?php $tags=$this->tags;if($tags!=null&&strpos(json_encode($tags),'recommend')){ ?>
			<span class="cat label label-important" href="#"><a href="<?php $this->options->siteUrl('tag/recommend');  ?>">推荐</a><i class="label-arrow"></i></span>
		<?php } ?>
		<a class="title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
	</h2>				
	<div class="post-content">
		<?php $this->excerpt(200, '...'); ?>
	</div>				
	<ul class="post-meta">
		<li><i class="fa fa-th-large widget-fa"></i>&nbsp;<?php $this->category(','); ?></li>
		<li><i class="fa fa-clock-o widget-fa"></i>&nbsp;<?php $this->date('m月 j, Y'); ?></li>
		<li><i class="fa fa-eye widget-fa"></i>&nbsp;<?php Views_Plugin::theViews('',''); ?></li>
		<li><a rel="nofollow" href="<?php $this->permalink() ?>#comments"><i class="fa fa-comments-o widget-fa"></i>&nbsp;<?php $this->commentsNum('0', '1', '%d'); ?></a></li>
	</ul>
</article>
<?php } ?>
<?php endwhile; ?>
<div class="navigation">
	<nav class="pagination" role="navigation">
		<?php $t=false === $this->_total ? $this->_total = $this->size($this->_countSql) : $this->_total;if ($this->_currentPage > 1) {$this->pageLink('上一页');}else{
			echo '<span>« 上一页</span>';
		} ?>
		<span class="pagenum"><?php echo $this->_currentPage ."/".ceil($t/$this->parameter->pageSize) ;?></span>
		<?php  if ($this->_currentPage >= ceil($t/$this->parameter->pageSize)) {echo '<span>下一页 »</span>';}else{
		 $this->pageLink('下一页 »','next');} ?>		
	</nav>
</div>