<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
	<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
	<meta name="description" content="<?php echo $SEO['description'];?>">
	<link href="<?php echo CSS_PATH;?>/bl/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo CSS_PATH;?>/default_blue.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.sgallery.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>search_common.js"></script>
	<script src="<?php echo JS_PATH;?>nicescroll/jquery.min.js"></script>
	<script src="<?php echo JS_PATH;?>nicescroll/jquery.nicescroll.js"></script>
</head>
<body>
<div id="header">
       <div class="nav">
    	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
			<a href="<?php echo siteurl($siteid);?>">首页</a>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a>
			<?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<?php echo runhook('glogal_menu')?>
		</div>
</div>
