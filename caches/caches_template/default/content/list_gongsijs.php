<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>



<!--公司介绍 开始 -->
<div class="about">
	<div class="main">
         <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5a4daadda886540b7213434e4b7326fa&action=lists&catid=%24catid&num=5&moreinfo=1&order=listorder+Desc%2Cid+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 5;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
		<div class="about_menu">
       		 <?php $i=0;?>
		<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<a href="javascript:;" <?php if($i==0) { ?>class="current"<?php } ?> pid="<?php echo $r['id'];?>"><?php echo str_cut($r[title],30);?></a>
         <?php $i++?>
       	 <?php $n++;}unset($n); ?>
		</div>
		<!--公司介绍正文 开始 -->
         <?php $i=0;?>
		<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
		<div class="about_main" pid="<?php echo $r['id'];?>" <?php if($i!=0) { ?>style="display:none; height:200px;"<?php } ?>>
			<?php echo $r['content'];?>
		</div>
          <?php $i++?>
       	 <?php $n++;}unset($n); ?>
		<!--公司介绍正文 结束 -->
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	</div>
</div>
<!--公司介绍 介绍 -->
<script type="text/javascript">
$(function(){
	//文章组切换事件
	$(".about_menu a").click(function(){
		var pid=$(this).attr("pid");
		$(".about_main:visible ").hide();
		$(".about_main[pid='"+pid+"']").show();
		$(".about_menu .current").removeClass("current");
		$(this).addClass("current");
	 });
	 
	  $(".about_main").niceScroll({cursorcolor:"#777",cursorwidth:"3px",cursorborder:"none"});

})
</script>
<?php include template("content","footer"); ?>