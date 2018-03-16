<?php
function themeConfig($form) {
	//header左侧标语
	$top_text = new Typecho_Widget_Helper_Form_Element_Text('top_text', NULL, NULL, _t('title标语'), _t('输入左上方显示标语'));
	$form->addInput($top_text);
	//头像
	$portrait = new Typecho_Widget_Helper_Form_Element_Text('portrait', NULL, NULL, _t('头像'), _t('输入头像地址'));
	$form->addInput($portrait);
	//昵称
	$username = new Typecho_Widget_Helper_Form_Element_Text('username', NULL, NULL, _t('昵称'), _t('输入昵称'));
	$form->addInput($username);
	//个性签名
	$motto = new Typecho_Widget_Helper_Form_Element_Text('motto', NULL, NULL, _t('个性签名'), _t('输入个性签名'));
	$form->addInput($motto);
	//说说头像
	$say_portrait = new Typecho_Widget_Helper_Form_Element_Text('say_portrait', NULL, NULL, _t('说说头像'), _t('输入说说头像'));
	$form->addInput($say_portrait);
    //背景图
	$background= new Typecho_Widget_Helper_Form_Element_Text('background', NULL, NULL, _t('背景图'), _t('输入背景图地址'));
	$form->addInput($background);
	//社交链接
	$socialweibo = new Typecho_Widget_Helper_Form_Element_Text('social_weibo', NULL, NULL, _t('输入微博链接'), _t('在这里输入微博链接,带http://'));
	$form->addInput($socialweibo);

	$socialgithub = new Typecho_Widget_Helper_Form_Element_Text('social_github', NULL, NULL, _t('输入GitHub链接'), _t('在这里输入GitHub链接,带http://'));
	$form->addInput($socialgithub);

	$socialtwitter= new Typecho_Widget_Helper_Form_Element_Text('social_twitter', NULL, NULL, _t('输入Twitter链接'), _t('在这里输入twitter链接,带http://'));
	$form->addInput($socialtwitter);

	$socialgoogle = new Typecho_Widget_Helper_Form_Element_Text('social_google_plus', NULL, NULL, _t('输入Google +链接'), _t('在这里输入Google +链接,带http://'));
	$form->addInput($socialgoogle);
}

function is_pjax(){
	return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
} 
$siteUrl='http://notemi.cn';
$myEmail='806916924@qq.com';
$myName='小米';
function img_postthumb($content) {
	global $siteUrl;
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $content, $thumbUrl);  //通过正则式获取图片地址
	$img_src = $thumbUrl[1][0];  //将赋值给img_src
	$img_counter = count($thumbUrl[0]);  //一个src地址的计数器
	if($img_counter > 0){
		for($i=0;$i<$img_counter;$i++){
			echo "<img class='thumbimg' src='".$siteUrl."/timthumb/timthumb.php?src=".$thumbUrl[1][$i]."&w=150px&h=140px&zc=1' />";
		}
	}   
}

/*摘要*/
function myExcerpt($content,$length=200,$trim='...'){
 return Typecho_Common::subStr(strip_tags(Typecho_Common::fixHtml(MarkdownExtraExtended::defaultTransform($content))), 0, $length, $trim);
} 

/*获取我的状态*/
function get_my_state($email){
	global $siteUrl;
	$db = Typecho_Db::get();
	$sql = $db->select('type','url','author', 'mail', 'FROM_UNIXTIME(created,"%m-%d %H:%i") as created','title','text','slug')
	->from('(select a.type,a.url,a.author,a.mail,a.created,a.text as title,b.title as text,b.slug from typecho_comments a left join typecho_contents b on a.cid=b.cid
  where a.status="approved" and a.mail="'.$email.'") a order by created desc limit 10');
	$result = $db->fetchAll($sql);
	$output='';
	foreach ($result as $one)
	{
		$output .="<li>";
		$output .="<div class='avatar-container'><a target='_blank' href='".$one['url']."'><img src='". GravatarCache::getGravatarCache($one['mail'])."'></a>";		
		$output .="</div>";		
		$output .="<p class='status-comment-content'><i class='fa fa-quote-left'></i>&nbsp;&nbsp;".myExcerpt($one['title'])."&nbsp;&nbsp;<i class='fa fa-quote-right'></i></p>";
		$output .="<div class='meta'><span><a target='_blank' href='".$one['url']."'>".$one['author']."</a>&nbsp;评论了文章&nbsp;&nbsp;<a href='".$siteUrl."/".$one['slug'].".html'>".$one['text']."</a><time>· ".$one['created']."</time></span></div>";
		$output .="</li>";
	}
	$output = "<ul class='timeline'>".$output."</ul>";
	echo $output ;
}

/*获取全部状态*/
function get_all_state(){
	global $myEmail;
	global $siteUrl;
	global $myName;
	$db = Typecho_Db::get();
	$sql = $db->select('type','url','author', 'mail', 'FROM_UNIXTIME(created,"%m-%d %H:%i") as created','title','text','slug')
	->from('(select a.type,a.url,a.author,a.mail,a.created,a.text as title,b.title as text,b.slug from typecho_comments a left join typecho_contents b on a.cid=b.cid
  where a.status="approved"  union all select type,"http://notemi.cn" as url ,"小米" as author,"806916924@qq.com" as mail,created,title,text,slug from typecho_contents 
  where status ="publish" and type in ("post","page")) a order by created desc limit 20');
	$result = $db->fetchAll($sql);
	$output='';
	foreach ($result as $one)
	{		
		$type=$one['type'];
		$output .="<li>";
		$output .="<div class='avatar-container'><a target='_blank' href='".$one['url']."'><img src='". GravatarCache::getGravatarCache($one['mail'])."'></a>";		
		$output .="</div>";
		if($one['type']=='post'){
			$output .="<div class='meta'><span><a href='".$siteUrl."'>".$one['author']."</a>&nbsp;发布了文章&nbsp;&nbsp;<time>· ".$one['created']."</time></span></div>";
			$output .="<div class='status-article-content'><a class='title' href='".$siteUrl."/".$one['slug'].".html'>".$one['title']."</a><p>".myExcerpt($one['text'])."</p>";			
		}else if($one['type']=='page'){echo $one['author'];
			$output .="<div class='meta'><span><a href='".$siteUrl."'>".$one['author']."</a>&nbsp;发布了页面&nbsp;&nbsp;<time>· ".$one['created']."</time></span></div>";
			$output .="<p class='status-comment-content'><a href='".$siteUrl."/".$one['slug'].".html'>".$one['title']."</a></p>";
		}else if($one['type']=='comment'){		
			$output .="<p class='status-comment-content'><i class='fa fa-quote-left'></i>&nbsp;&nbsp;".myExcerpt($one['title'])."&nbsp;&nbsp;<i class='fa fa-quote-right'></i></p>";
			$output .="<div class='meta'><span><a target='_blank' href='".$one['url']."'>".$one['author']."</a>&nbsp;评论了文章&nbsp;&nbsp;<a href='".$siteUrl."/".$one['slug'].".html'>".$one['text']."</a><time>· ".$one['created']."</time></span></div>";
		}
		$output .="</li>";
	}
	$output = "<ul class='timeline'>".$output."</ul>";
	echo $output ;
}

/*获取最活跃的读者*/
function get_most_active_friends(){
	global $myEmail;
	$db = Typecho_Db::get();
	$sql = $db->select('COUNT(author) AS cnt','author', 'url', 'mail')
	->from('table.comments')
	->where('status = ?', 'approved')
	->where('type = ?', 'comment')
	->where('authorId = ?', '0')
	->where('mail != ?', '".$myEmail."') //把这里的邮箱改成你自己的
	->group('author')
	->order('cnt', Typecho_Db::SORT_DESC)
	->limit('45'); //这里面填写读取的用户数
	$result = $db->fetchAll($sql);
	$output='';
	$maxNum = $result[0]['cnt'];
	foreach ($result as $one)
	{
		$width = round(40 / ($maxNum / $one['cnt']),2);//这里是血条长度的计算公式
		if($one['url'])
			$url =$one['url'];
		else $url='#';
		$output .="<li><a target='_blank' href='".$one['url']."'><span class='pic' style='background: url(". GravatarCache::getGravatarCache($one['mail']).") no-repeat;'>pic</span><span class='num'>".$one['cnt']."</span><span class='name'>".$one['author']."</span></a><div class='active-bg'><div class='active-degree' style='width:".$width."px'></div></div></li>";
	} //我这里直接用的是gravatar服务器上的头像,如果你想使用本地缓存的话,请自己修改代码即可.
	//http://www.gravatar.com/avatar/".md5(strtolower($one['mail']))."?s=36&d=monsterid&r=G
	$output = "<div class='readerwall'>".$output."<div class='clear'></div></div>";
	echo $output ;
}

/*发文时间*/
function time_tran($the_time) {
	$the_time=date("Y-m-d H:i:s",$the_time);
    $now_time = date("Y-m-d H:i:s", time());
    $now_time = strtotime($now_time);
    $show_time = strtotime($the_time);
    $dur = $now_time - $show_time;
    if ($dur < 0) {
        return $the_time;
    } else {
        if ($dur < 60) {
            return $dur . '秒前';
        } else {
            if ($dur < 3600) {
                return floor($dur / 60) . '分钟前';
            } else {
                if ($dur < 86400) {
                    return floor($dur / 3600) . '小时前';
                } else {
                    if ($dur < 2592000) {//3天内
                        return floor($dur / 86400) . '天前';
                    } else {
                        return $the_time;
                    }
                }
            }
        }
    }
}