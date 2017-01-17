<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--走进缤利 开始 -->
<div class="join">
	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5a4daadda886540b7213434e4b7326fa&action=lists&catid=%24catid&num=5&moreinfo=1&order=listorder+Desc%2Cid+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 5;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
	<div class="join_main pr">
		<div class="pro_nav join_nav">
            <?php $i=0;?>
    	<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<a href="javascript:;" pid="<?php echo $r['id'];?>" <?php if($i==0) { ?>class="current"<?php } ?>><?php echo str_cut($r[title],20);?></a>
          <?php $i++?>
        <?php $n++;}unset($n); ?>
		</div>
		<ul class="join_pic">
			<li><a href="javascript:;"><img class="back_pic" src="../../../../statics/images/bl/arrows_left.png" alt="左箭头" /></a></li>
             <?php $i=0;?>
   			 <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<li class="pic_show" pid="<?php echo $r['id'];?>" <?php if($i!=0) { ?>style="display:none;"<?php } ?>>
            <?php $pics=string2array($r[pictureurls])?>
			<?php $n=1;if(is_array($pics)) foreach($pics AS $pic) { ?>
            <a href="javascript:;" <?php if($i!=0) { ?>style="display:none;"<?php } ?>> <img src="<?php echo $pic['url'];?>" alt="左箭头" /></a>
            <?php $i++?>
      	    <?php $n++;}unset($n); ?>
            </li>
           <?php $n++;}unset($n); ?>
			<li><a href="javascript:;"><img class="next_pic" src="../../../../statics/images/bl/arrows_right.png" alt="右箭头" /></a></li>
		</ul>
	</div>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
<script type="text/javascript">
$(function(){
	
	//图片组内图片点击浏览事件
	$(".join_pic .back_pic,.join_pic .next_pic").click(function(){
		var class_name=$(this).attr("class");
		var curr_img_obj=$(".join_pic .pic_show:visible a:visible");
		var index=curr_img_obj.index();
		var max_index=$(".join_pic .pic_show:visible a").size()-1;
		if(max_index<=0){return false;}
		if(class_name=="back_pic")
		{
			if(index!=0)
			{
				$(".join_pic .pic_show:visible a:eq("+(index-1)+")").show();
			}
			else
			{
				$(".join_pic .pic_show:visible a:eq("+max_index+")").show();
			}
			curr_img_obj.hide();
		}
		else
		{

			if(index<max_index)
			{
				$(".join_pic .pic_show:visible a:eq("+(index+1)+")").show();
			}
			else
			{
				$(".join_pic .pic_show:visible a:eq(0)").show();

			}
			curr_img_obj.hide();
		}
	 });
	
	//图片组切换事件
	$(".join_nav li a").click(function(){
		var pid=$(this).attr("pid");
		$(".join_nav .current").removeClass("current");
		$(this).addClass("current");
		$(".join_pic .pic_show:visible ").hide();
		$(".join_pic .pic_show[pid='"+pid+"']").show();
		$(".join_pic .pic_show:visible a:first").show();
	 });
})
</script>
<!--走进缤利 结束 -->
<?php include template("content","footer"); ?>