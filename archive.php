<?php $this->need('header.php'); ?>
	<h3 class="archive-title">
	<?php  if ($this->is('archive')){ ?>
	   <?php $this->archiveTitle(array(
            'category'  =>  _t('分类 : %s '),
            'search'    =>  _t('包含关键字 : %s '),
            'tag'       =>  _t('标签 : %s '),
            'author'    =>  _t('作者 ：%s')
        ), '', ''); ?>
	<?php }else if($this->is('page')||$this->is('post')){ ?>
		<?php $this->title() ?> 
	<?php } else{ ?>
		<?php $this->options->title() ?>	
	<?php } ?>	
	</h3><div>
        <?php if ($this->have()): ?>    	 
            <?php $this->need('post_list.php'); ?> 
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>
		</div> 
	</div>
</div>
<?php $this->need('footer.php'); ?>