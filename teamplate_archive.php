<?php
/**
 * archive
 *
 * @package custom
 */
 $this->need('header.php'); ?>
<article class="post">	 
	<div class="post-content">		
		<div class="page_archive_cell">
			<div class="page_archive_box">
				<h3>分类</h3>
				<ul>
					<?php $this->widget('Widget_Metas_Category_List')
            ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
				<ul>
			</div>
			<div class="page_archive_box">
				<h3>页面</h3>
				<ul>
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
					<?php while($pages->next()): ?>
					<li><a href="<?php $pages->permalink(); ?>" id="<?php echo $pages->slug ;?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
					<?php endwhile; ?>
					<!-- <li><a href="<?php $this->options->siteUrl('readerwall.html'); ?>" id="" title="读者墙">读者墙</a></li>
					<li><a href="<?php $this->options->siteUrl('painting.html'); ?>" id="" title="读者墙">涂鸦板</a></li>
					<li><a href="<?php $this->options->siteUrl('html_to_markdown.html'); ?>" id="" title="TOMarkDown">TOMarkDown</a></li>  -->
				<ul>	
			</div>		
		</div>
		<div class="page_archive_cell page_archive_cell2">
			<div class="page_archive_box">
				<h3>推荐文章</h3>
				<ol>
					<?php Views_Plugin::theMostViewed(); ?>
				</ol>
			</div>
			<div class="page_archive_box">
				<h3>最近评论</h3>
				<ul>
					<?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments);$i=0; ?>
				<?php while($comments->next()&&$i<5): $i=$i+1;?>
					<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>：<?php $comments->excerpt(35, '...'); ?></li>
				<?php endwhile; ?>
				</ul>
			</div>
			<div class="page_archive_box">
				<h3>日期归档</h3>
				<?php $this->content(); ?>
			</div>
			<div class="page_archive_box">
				<h3>友链</h3>
				<ul>	<?php Links_Plugin::output(); ?>
					<li>	
						<a data-tooltip="虚位以待" target="_blank" class="dwtip-right" href="#">虚位以待</a>
					</li>
				</ul>
			</div>
			<?php $this->get_most_active_friends(); ?>
		</div>
	</div>
</article>		
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>