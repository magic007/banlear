<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div id="footer">Copyright © 2010-2015 <a href="http://www.banlear.com.cn" target="_blank">banlear.com.cn</a> 广州缤利皮具有限公司版权所有<a  class="gray" href="http://about.worldmall.cn" target="_blank">技术支持：世界窗</a></div >
<script type="text/javascript">
$(function(){
	$(".picbig").each(function(i){
		var cur = $(this).find('.img-wrap').eq(0);
		var w = cur.width();
		var h = cur.height();
	   $(this).find('.img-wrap img').LoadImage(true, w, h,'<?php echo IMG_PATH;?>msg_img/loading.gif');
	});
})
</script>
</body>
</html>