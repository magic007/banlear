<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--潮流商品 开始 -->
<div class="product pr">
	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4c63cfa931c8dcd2c40a10ba7e629294&action=lists&onload=AutoResizeImage%28document.body.clientWidth%2C0%2Cthis%29&catid=%24catid&num=5&moreinfo=1&order=listorder+Desc%2Cid+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 5;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('onload'=>'AutoResizeImage(document.body.clientWidth,0,this)','catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('onload'=>'AutoResizeImage(document.body.clientWidth,0,this)','catid'=>$catid,'moreinfo'=>'1','order'=>'listorder Desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
	<!--大图 开始 -->
	<div class="big_pic">
	<img class="img" id="bj" onload="AutoResizeImage(document.body.clientWidth,0,this)" src="../../../../statics/images/bl/pro_1.jpg" alt="潮流商品" />
	</div>
	<!--大图 结束 -->
	<!-- 导航 开始 -->
	<div class="pro_nav">
    <?php $i=0;?>
    	<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
		<a <?php if($i==0) { ?>class="current"<?php } ?> href="javascript:;" pid="<?php echo $r['id'];?>" ><?php echo str_cut($r[title],10);?></a>
        <?php $i++?>
        <?php $n++;}unset($n); ?>
	</div>
	<!-- 导航 结束 -->
	<!--滚动图 开始 -->
	<div class="roll_pic">
	<div class="pic_overflow">
    <?php $i=0;?>
    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
		<ul pid="<?php echo $r['id'];?>" class="pics_ul" <?php if($i!=0) { ?>style="display:none;"<?php } ?>>
        <?php $pics=string2array($r[pictureurls])?>
        <?php $n=1;if(is_array($pics)) foreach($pics AS $pic) { ?>
			<li><a href="javascript:;" <?php if($i==0) { ?>class="current"<?php } ?>><img src="<?php echo thumb($pic[url], 130, 80, 0);?>" alt="潮流商品" big="<?php echo $pic['url'];?>" /></a></li>
       <?php $i++?>
       <?php $n++;}unset($n); ?>
		</ul>
        <?php $n++;}unset($n); ?>
		</div>
	</div>
	<!--滚动图 结束 -->
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
<!--潮流商品 结束 -->
<script type="text/javascript">
function AutoResizeImage(maxWidth, maxHeight, objImg) {
    var img = new Image();
    img.src = objImg.src;
    var hRatio;
    var wRatio;
    var Ratio = 1;
    var w = img.width? img.width:1440;
    var h = img.height?img.height:546;
    wRatio = maxWidth / w;
    hRatio = maxHeight / h;
    if (maxWidth == 0 && maxHeight == 0) {
        Ratio = 1;
    } else if (maxWidth == 0) { //
        if (hRatio < 1) Ratio = hRatio;
    } else if (maxHeight == 0) {
        if (wRatio < 1) Ratio = wRatio;
    } else if (wRatio < 1 || hRatio < 1) {
        Ratio = (wRatio <= hRatio ? wRatio: hRatio);
    }
    if (Ratio < 1) {
        w = w * Ratio;
        h = h * Ratio;
    }
    objImg.height = h;
    objImg.width = w;
	
}
$(window).resize(function() {
  AutoResizeImage(document.body.clientWidth,0, $("#bj")[0]);
});
</script>
<script type="text/javascript">
$(function(){
	//取当前显示图片组的第一张显示为背景
	var bj_img=$(".roll_pic .pics_ul:visible li:first a img").attr("big");
	(bj_img!='undefined'&&bj_img!='')&&$("#bj").attr("src",bj_img);
	
	//图片组内图片点击浏览事件
	$(".roll_pic .pics_ul li a img").click(function(){
		$(".roll_pic .pics_ul:visible a.current").removeClass("current");
		$(this).parent().addClass("current");
		var img=$(this).attr("big");
		(img!='undefined'&&img!='')&&$("#bj").attr("src",img);
		ul_autoresize();
	 });
	
	//图片组切换事件
	$(".pro_nav li a").click(function(){
		var pid=$(this).attr("pid");
		$(".roll_pic .pics_ul:visible a.current").removeClass("current");
		$(".pro_nav .current").removeClass("current");
		$(".roll_pic .pics_ul:visible ").hide();
		$(".roll_pic .pics_ul[pid='"+pid+"']").show();
		$(".roll_pic .pics_ul:visible li:first a").addClass("current");
		$(this).addClass("current");
		var bj_src=$(".roll_pic .pics_ul:visible li:first a img").attr("big");
 	    (bj_src!='undefined'&&bj_src!='')&&$("#bj").attr("src",bj_src);

	 });
	
	//切换图片显示
	function tab_img()
	{
		var ul=$(".roll_pic .pics_ul:visible ");
		var a_cnt=ul.find("li a").size();
		var a_index=ul.find("li a.current").parent().index();
		//当当前显示图片组图片数量大于0时,循环显示
		if(a_cnt>0)
		{
			ul.find("li a.current").removeClass("current");
			if(a_index<(a_cnt-1))
			{
				ul.find("li a:eq("+(a_index+1)+")").addClass("current");
			}
			else
			{
				ul.find("li a:eq(0)").addClass("current");
			}
			var bj_src=$(".roll_pic .pics_ul:visible li a.current img").attr("big");
 	    	(bj_src!='undefined'&&bj_src!='')&&$("#bj").attr("src",bj_src);
			ul_autoresize();
		}	
	}
	
	setInterval(tab_img,2600);
	
});

	//根据显示的图片自动调节ul
	function ul_autoresize()
	{
		var ul=$(".roll_pic .pics_ul:visible ");
		var a_cnt=ul.find("li a").size();
		var a_index=ul.find("li a.current").parent().index()+1;
		var max_cnt=7; //ul显示缩略图数量
		var center_index=4; //当前显示缩略图所在位置
		var li_width=ul.find("li:first").width();  //获取li的宽度
		var li_margin_right=parseFloat(ul.find("li:first").css("margin-right"));  //获取li的右边距

		if(a_cnt>max_cnt)
		{
			var re_cnt=a_cnt-max_cnt;  //可以左移的缩略图数量
			if(a_index<=center_index)
			{
				ul.find("li").css("marginLeft","0px");	
			}
			else if(a_index>center_index&&(a_index-center_index)<=re_cnt)
			{
				ul.find("li").css("marginLeft","0px");	
				ul.find("li:lt("+(a_index-center_index)+")").css("marginLeft","-"+((a_index-center_index-1)*(li_width+li_margin_right)+li_width)+"px");	 
			}
		}
	}	
</script>
<?php include template("content","footer"); ?>