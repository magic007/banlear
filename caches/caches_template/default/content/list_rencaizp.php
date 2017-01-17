<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--人才招聘 开始 -->
<div class="job">
	<div class="main">
		<h3 class="vh">人才招聘</h3>
		<div class="job_main">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a8c6c8deadca916522f4856a3bc0cbaa&action=lists&catid=%24catid&moreinfo=1&num=1&order=listorder+Desc%2Cid+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 1;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
		<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<div>
				<?php echo $r['content'];?>
			</div>
		<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</div>
	</div>
</div>
<!--人才招聘 结束 -->
<script type="text/javascript">
$(function(){
	  $("div.job_main").niceScroll({cursorcolor:"#777",cursorwidth:"3px",cursorborder:"none"});	
})
</script>
<?php include template("content","footer"); ?>