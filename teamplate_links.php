<?php
/**
 * links
 *
 * @package custom
 */
 $this->need('header.php'); ?>
<article class="post">
	<h1 class="post-title">
		<i class="fa-paint-brush fa widget-fa"></i>&nbsp;友链
	</h1>
	<ul class="post-meta">
		<li>
			<a rel="nofollow" href="#comments">
				<i class="fa fa-comments-o widget-fa"></i>&nbsp;<?php $this->commentsNum('评论(0)', '评论(1)', '评论(%d)'); ?>
			</a>
		</li>
	</ul>
	<div class="post-content">
		<p>申请友链请在下方留言，我看到后会第一时间回复，谢谢！</p>
		<ul>
			<?php Links_Plugin::output(); ?>
			<li>	
				<a data-tooltip="虚位以待" target="_blank" class="dwtip-right" href="#">虚位以待</a>
			</li>
		</ul>
	</div>
	<?php $this->get_most_active_friends(); ?>
</article>		
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>