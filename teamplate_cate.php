<?php
/**
 * category
 *
 * @package custom
 */
$this->need('header.php'); ?>
<style>
.arrow{
	width:0px;
}
.post-content{
	display: inline-block;
}
.category{
	width:45%;
	padding: 15px;
	border-radius: 4px;
	box-sizing: border-box;
	margin-top:5px;
	margin-bottom:50px;
	float:left;
	margin-left: 2.5%;
	margin-right: 2.5%;
	padding: 15px;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: normal;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
	display: block;
	line-height: 20px;
	border: 1px solid #ddd;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.055);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.055);
	box-shadow: 0 1px 3px rgba(0,0,0,0.055);
	-webkit-transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}  
@media print, screen and (max-width:1290px) {
	.article .time{
		/*display:none;*/
	} 
	.category{
		width:90%;
	}
}
.header {
	text-align:center;
	height: 40px;
	border-bottom: 1px solid #d9d9d9;
	margin-bottom: 20px;
	margin-top: -10px;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	font-size: 17.5px;
}
.header h4{
	margin-bottom: 10px;
	margin-top: 10px;
	
}
.header h4 a{color:#444;}
.intro {
	height: 55px;
	display: block;
	overflow: hidden;
	text-overflow: ellipsis;
}
 p {
	font-size: 13px;
	font-weight: normal;
	line-height: 20px;
}
hr {
	margin: 20px 0;
	border: 0;
	border-top: 1px solid #eeeeee;
	border-bottom: 1px solid white;
}
.article {
	height: 132px;
	padding: 0;
	margin-bottom: 10px;
	font-size: 14px;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	font-weight: 100;
	line-height: 30px;
	color: #2f2f2f;
	bottom: 0;
}
.category h5 {
	font-size: 14px;
	font-weight: bold;
	line-height: 30px;
	margin:0px auto;
}
.article ul{
	padding-left:0px;
}
.article li {
	width: 100%;
	margin-top: 7px;
	border-bottom: 1px dotted #d9d9d9;
	line-height: 20px;
	list-style-type:none;
} 
.article a {
	display: inline-block;
	width: 65%;
	font-size: 14px;
	color: inherit;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}
.article .time {
	float: right;
}
.cate_avatar{
	width: 60px;
	height: 60px;
	margin-top: 0;
	margin-right: 10px;
	float: left;
}
.cate_avatar img{
	width: 100%;
	height: 100%;
	border: 2px solid white;
	/*-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;*/
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	max-width: 100%;
	height: auto;
	vertical-align: middle;
	-ms-interpolation-mode: bicubic;
}
</style> 
<div class="post-content">			 
	<div class="categorys">			 
		<?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
		<?php while ($categories->next()): ?>			
		<?php $this->widget('Widget_Archive@category-' . $categories->mid, 'pageSize=3&type=category', 'mid=' . $categories->mid)->to($posts); ?>
		<div class="category">
		<div class="header">
		  <h4 class="name">
			<a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a>
		  </h4>
		</div>
		<a class="cate_avatar" href="<?php $categories->permalink(); ?>">
			<img src="<?php $this->options->themeUrl('/img/category/'.$categories->slug.'.jpg'); ?>">
		</a>
		<p class="intro"><?php $categories->description(); ?></p>
		<hr>
		<div class="article">
		  <h5>最新文章：</h5>
		  <ul class="">
		<?php while ($posts->next()): ?>
			<li>
				<a href="<?php $posts->permalink(); ?>">
				<?php $posts->title(40); ?> 
				</a>      <span class="time"><?php $posts->date('m-j, Y'); ?></span>    
			</li>  
		<?php endwhile; ?>
		 </ul>
		</div>
		</div>
		<?php endwhile; ?>
	 </div>
</div>
<?php $this->need('footer.php'); ?>