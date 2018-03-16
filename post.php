<?php $this->need('header.php'); ?>
<?php $tags=$this->tags;if($tags!=null&&in_array("gray",$tags[0])){ ?>
<style>html { filter:progidXImageTransform.Microsoft.BasicImage(grayscale=1); } </style>
<?php } ?>
<article class="post single_post">
	<h1 class="post-title"><i class="fa-paint-brush fa widget-fa"></i>&nbsp;<?php $this->title() ?></h1>
	<?php $tags=$this->tags;if($tags==null||!in_array("say",$tags[0])){ ?>
		<ul class="post-meta">
			<li><i class="fa fa-th-large widget-fa"></i>&nbsp;<?php $this->category(','); ?></li>
			<li><i class="fa fa-clock-o widget-fa"></i>&nbsp;<?php $this->date('m月 j, Y'); ?></li>
			<li><i class="fa fa-eye widget-fa"></i>&nbsp;<?php Views_Plugin::theViews('阅读(',')'); ?></li>
			<li><a rel="nofollow" href="<?php $this->permalink() ?>#comments"><i class="fa fa-comments-o widget-fa"></i>&nbsp;<?php $this->commentsNum('评论(0)', '评论(1)', '评论(%d)'); ?></a></li>
		</ul>
	<?php } ?>	
	<div class="post-content single-post-content">		
		<div class="BlogAnchor" id="BlogAnchor" style="display: none !important;">
			<p><b class="corner" id="AnchorContentToggle" title="收起" style="cursor:pointer;">目录</b></p>
			<div class="AnchorContent" id="AnchorContent"> </div>
		</div>
	
		<?php $tags=$this->tags;if($tags!=null&&in_array("images",$tags[0])){ ?>
			<?php echo img_postthumb($this->content); ?>
			<?php echo $str = preg_replace('~<img(.*?)>~','',$this->content);?>
		<?php } else if($tags!=null&&strpos(json_encode($tags),'hidden')){ ?>
			<?php
			$db = Typecho_Db::get();
			$sql = $db->select()->from('table.comments')
				->where('cid = ?',$this->cid)
				->where('mail = ?', $this->remember('mail',true))
				->limit(1);
			$result = $db->fetchAll($sql);
			if($this->user->hasLogin() || $result) {
				$content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div><i></i>$1</div>',$this->content);
			}
			else{
				$content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2view"><i></i>此处内容需要评论回复后方可阅读。</div>',$this->content);
			}
			echo $content 
			?>
		<?php } else { ?>
			<?php $this->content(); ?>
		<?php } ?>
	</div>
	<?php $tags=$this->tags;if($tags==null||!in_array("say",$tags[0])){ ?>
	<div id="myCopyRight">
		<p>
		<b>声明</b>：本博客如无特殊说明皆为原创，转载请注明来源：<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>，<font face="微软雅黑">谢谢！</font></p>
	</div>
	<div class="post-related">
		<h2>相关文章</h2>
		<?php $this->related(5)->to($relatedPosts); ?>
		<ul>
			<?php while ($relatedPosts->next()): ?>
			<li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
			<?php endwhile; ?>
		</ul>		
	</div>	
	<!--<a target="_blank" href="http://www.rkidc.net/?refcode=ARZ0B4P697I38ULY5">
		<img src="http://cdn.rkidc.loveml.com/rkidc-ad-700.jpg" style="width: 100%;">
	</a>-->
	<?php } ?>	
</article>
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>