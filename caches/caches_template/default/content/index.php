<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<div class="banner">
	<ul>
		<li><img class="img" onload="AutoResizeImage(document.body.clientWidth,0,this)" src="<?php echo IMG_PATH;?>bl/index_body.jpg" /></li>
		<li><img class="img" onload="AutoResizeImage(document.body.clientWidth,0,this)" src="<?php echo IMG_PATH;?>bl/index_body1.jpg" /></li>
		<li><img class="img" onload="AutoResizeImage(document.body.clientWidth,0,this)" src="<?php echo IMG_PATH;?>bl/index_body2.jpg" /></li>
	</ul>
</div>
<script type="text/javascript"> 


var i = 1;
function tabimg() {
    obj_tab = $(".banner ul");
    obj_tab.i = i - 1; //当前第几张
    obj_tab.liWidth = document.body.clientWidth; //LI宽度
    obj_tab.animate({
        left: -(obj_tab.i * obj_tab.liWidth) + "px"
    },
    1000); ++i;
    if (obj_tab.i == 2) {
        i = 1;
    }
}
$(function() {
    $('.banner').width(document.body.clientWidth);	
	$('.banner').height(document.documentElement.clientHeight-196);
    setInterval(tabimg, 5000);
});
$(window).resize(function() {//改变窗口时执行函数	
    $(".banner ul").css('left', '0px');
    $('.banner').width(document.body.clientWidth);
	$('.banner').height(document.documentElement.clientHeight-196);
    for (m = 0; m < 3; m++) {
        AutoResizeImage(document.body.clientWidth, 0, $(".banner ul li img")[m]);
    }
});

function AutoResizeImage(maxWidth, maxHeight, objImg) {
    var img = new Image();
    img.src = objImg.src;
    var hRatio;
    var wRatio;
    var Ratio = 1;
    var w = img.width;
    var h = img.height;
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
</script>
<?php include template("content","footer"); ?>