<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--媒体报道 开始 -->
<div class="reports">
	<div class="main">
		<h3 class="vh">媒体报道</h3>
    	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a22dafae796b072e79432b043b5a9937&action=lists&catid=%24catid&moreinfo=1&num=10&order=listorder+Desc%2Cid+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 10;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
		<ul>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<li>
			<a href="<?php echo $r['url'];?>"><img src="<?php echo thumb($r[thumb],170,100);?>" width="170" height="100" alt="媒体报道" /></a>
			<h3><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></h3>
			<p><a href="<?php echo $r['url'];?>"><?php echo $r['content'];?></a></p>
			</li>
         <?php $n++;}unset($n); ?>
		</ul>
        	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	</div>
</div>
<!--媒体报道 结束 -->
<script type="text/javascript">
$(function(){
	  $("div.main ul").niceScroll({cursorcolor:"#777",cursorwidth:"3px",cursorborder:"none"});	
})
</script>
<?php include template("content","footer"); ?>