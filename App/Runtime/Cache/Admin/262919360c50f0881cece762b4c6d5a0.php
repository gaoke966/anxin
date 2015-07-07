<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>懒人diy手机网站管理系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0 ,user-scalable=no">
    <link rel="stylesheet" href="__ROOT__/App/Tpl/Admin/style/style.css">
	<link rel="stylesheet" href="__PUBLIC__/style/bootstrap.min.css">
    <script src="__PUBLIC__/js/jquery.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/js/functions.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/jquery.form.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/asyncbox/asyncbox.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/asyncbox/skins/default.css" />
	 <!--[if lt IE 9]>
        <script src="__PUBLIC__/js/html5shiv.min.js"></script>
        <script src="__PUBLIC__/js/respond.min.js"></script>
    <![endif]-->
 

	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<a href="http://diy.lanrenmb.com"  target="_black"><img class="img-rounded" src="__ROOT__/App/Tpl/Admin/style/img/logo.png" /></a>
			<a href="__GROUP__/Index/home" class="btn btn-default navbar-btn btn-group-lg">后台首页</a>
			<a href="__GROUP__/Login/logout" class="btn btn-default navbar-btn btn-group-lg">退出登陆</a>
			<a href="__ROOT__/"  target="_black" class="btn btn-default navbar-btn btn-group-lg">网站首页</a>
			<a href="__ROOT__/faq.html"  target="_black" class="btn btn-default navbar-btn btn-group-lg">帮助中心</a>
			<a href="__GROUP__/Sitemap/cahe"  class="btn btn-default navbar-btn btn-group-lg divider">删除缓存</a>
	
		</nav>

	
	
				

<div class="pull-left diywap_left">
			
			<div class="list-group" id="accordion">
			
				
				 
					<a class="list-group-item active navbar-link " data-toggle="collapse"  data-parent="#accordion" href="#collapseOne">
					网站基本信息设置  <span class="glyphicon  glyphicon-arrow-down"></span></a>
					<div id="collapseOne" class="panel-collapse collapse  
					<?php  if(strstr(__SELF__, 'webset')){echo ' in';} if(strstr(__SELF__, 'user')){echo ' in';} if(strstr(__SELF__, 'email')){echo ' in';} if(strstr(__SELF__, 'mysql')){echo ' in';} if(strstr(__SELF__, 'url')){echo ' in';} if(strstr(__SELF__, 'phone')){echo ' in';} if(strstr(__SELF__, 'zhuti')){echo ' in';} if(strstr(__SELF__, 'chuang')){echo ' in';} if(strstr(__SELF__, 'cahe')){echo ' in';} ?> ">
				<a href="__GROUP__/Index/webset" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 系统设置</a>
				<a href="__GROUP__/Index/user" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 用户管理</a>
				<a href="__GROUP__/Index/email" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 邮件设置</a>
				<a href="__GROUP__/Index/mysql" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 数据库设置</a>
				<a href="__GROUP__/Index/url" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> URL模式设置</a>
				<a href="__GROUP__/Index/phone" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 手机域名设置</a>
				<a href="__GROUP__/Index/chuang" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 图片上传设置</a>
				<a href="__GROUP__/Sitemap/cahe" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 删除缓存</a>
				</div>	
				

				<h4>
				<a class="list-group-item active navbar-link" data-toggle="collapse"  data-parent="#accordion" href="#collapsetwo">信息管理 <span class="glyphicon  glyphicon-arrow-down"></span></a>	
				</h4>
				<div id="collapsetwo" class="panel-collapse collapse
					<?php  if(strstr(__SELF__, 'cate')){echo ' in';} if(strstr(__SELF__, 'seecate')){echo ' in';} if(strstr(__SELF__, 'info')){echo ' in';} if(strstr(__SELF__, 'seeinfo')){echo ' in';} if(strstr(__SELF__, 'page')){echo ' in';} if(strstr(__SELF__, 'seepage')){echo ' in';} ?>				
				">
				<a href="__GROUP__/Index/cate" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 分类添加</a>
				<a href="__GROUP__/Index/seecate"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 分类管理</a>				
				<!--<a href="__GROUP__/Index/anli">图片添加</a>
				<a href="__GROUP__/Index/seeanli">图片管理</a>-->
				<a href="__GROUP__/Index/info"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 信息添加</a>
				<a href="__GROUP__/Index/seeinfo"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 信息管理</a>
				<a href="__GROUP__/Index/page"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 单页添加</a>
				<a href="__GROUP__/Index/seepage"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 单页管理</a>
				</div>

				<h4>
				<a class="list-group-item active navbar-link" data-toggle="collapse"  data-parent="#accordion" href="#collapsefoure">附加功能管理 <span class="glyphicon  glyphicon-arrow-down"></span></a>	
					</h4>
				<div id="collapsefoure" class="panel-collapse collapse
					<?php  if(strstr(__SELF__, 'comment')){echo ' in';} if(strstr(__SELF__, 'book')){echo ' in';} if(strstr(__SELF__, 'fenzu')){echo ' in';} if(strstr(__SELF__, 'moban')){echo ' in';} if(strstr(__SELF__, 'link')){echo ' in';} if(strstr(__SELF__, 'seelink')){echo ' in';} if(strstr(__SELF__, 'Sitemap')){echo ' in';} if(strstr(__SELF__, 'weixinpic')){echo ' in';} if(strstr(__SELF__, 'addads')){echo ' in';} ?>				
				">
				<a href="__GROUP__/Index/comment" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 评论管理</a>					
				<a href="__GROUP__/Index/book"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 留言管理</a>
				<a href="__GROUP__/Index/moban" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 模板管理</a>
				<a href="__GROUP__/Index/link"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 链接添加</a>
				<a href="__GROUP__/Index/seelink" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 链接管理</a>
				<a href="__GROUP__/Sitemap" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> Sitemap生成</a>
				<a href="__GROUP__/Adsa/addads" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 广告管理</a>
					</div>




				<h4>
				<a class="list-group-item active navbar-link" data-toggle="collapse"  data-parent="#accordion" href="#weixin">微信管理 <span class="glyphicon  glyphicon-arrow-down"></span></a>	
					</h4>
				<div id="weixin" class="panel-collapse collapse
					<?php  if(strstr(__SELF__, 'setweixin')){echo ' in';} if(strstr(__SELF__, 'event')){echo ' in';} if(strstr(__SELF__, 'huifu')){echo ' in';} if(strstr(__SELF__, 'menu')){echo ' in';} if(strstr(__SELF__, 'seemenu')){echo ' in';} ?>				
				">
				<a href="__GROUP__/Weixin/setweixin" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 设置微信公众号 </a>					
				<a href="__GROUP__/Weixin/event" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 关注时回复</a>					
				<a href="__GROUP__/Weixin/huifu" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 智能回复功能</a>					
				
<!--				
				<a href="__GROUP__/Weixin/menu" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 添加自定义菜单</a>					
				<a href="__GROUP__/Weixin/seemenu" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 管理自定义菜单</a>
-->


				
					</div>


				
				<a class="list-group-item active navbar-link " href="http://diy.lanrenmb.com">官方网站：diy.lanrenmb.com</a>
				<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=524076166&site=qq&menu=yes" class="list-group-item active navbar-link ">
				<img border="0" src="http://wpa.qq.com/pa?p=2:524076166:51" alt="点击这里给我发消息" title="点击这里给我发消息"/> 技术一</a>
						<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1330407081&site=qq&menu=yes" class="list-group-item active navbar-link ">
				<img border="0" src="http://wpa.qq.com/pa?p=2:1330407081:51" alt="点击这里给我发消息" title="点击这里给我发消息"/> 技术二</a>
				
			</div>
			
			
		</div>
<style>
#grid{padding-top:15px;background:url(../images/w1000bg.png) center top repeat-y;font-size:0}.grid{*word-spacing:-1px;/* IE6��7 */}	.grid li{z-index:0;font-size:12px;list-style-type: none;float:left;}	.grid li{*display:inline;*zoom:1;*float:left;}		.grid li.hover{cursor:pointer}	.grid li h3{font-size:20px;font-weight:normal;height:140px;line-height:28px}	.grid li h3 a{padding-top:15px;display:block;height:185px;z-index:100;position:absolute;width:188px;text-align:center;top:0;left:0}	.grid li h3 img{border-radius:43px;height:86px;width:86px}	.grid li h3 span{display:block;_padding-top:7px}	.grid li p{font-size:13px;text-align:center;color:#888;line-height:22px;z-index:10}#grid .mix{opacity:0;display:none}</style>


		<div class="diywap_right">
		<div class="well well-sm">模板管理</div>
					<table class="table table-hover table-bordered">						<tr><td>
						<ul class="cateradio g grid" id="grid">							
						<?php  $mulu=$_GET['_URL_']; echo '<h4>'; if($mulu[3] == 'Home'){ echo '电脑模板'; }elseif($mulu[3] == 'Wap'){ echo '手机模板'; } echo '主题列表</h4>'; $dir =@opendir('./App/Tpl/'.$mulu[3].'/'); while(($file = readdir($dir))!=false){ if ($file!="." && $file!="..") { $files[] = $file; } } natsort($files); foreach($files as $file){ $tmp = ''; $tmp2 = ''; if($mulu[3] == 'Home'){ if($pc_template == $file){ $tmp = 'checked'; } $tmp2 = 'p'; } if($mulu[3] == 'Wap'){ if($wap_template == $file){ $tmp = 'checked'; } $tmp2 = 't'; } echo '<li style="margin:10px 30px;" style="text-align:center">								 <a href="__GROUP__/Index/appTemplate/'.$tmp2.'/'.$file.'"><img src="/App/Tpl/'.$mulu[3].'/'.$file.'/ico.png"></a><h4> <input class="radio" type="radio" name="optype" value="'.$file.'" '.$tmp.' style="float:left;margin-left:100px;" onclick="javascript:location.href=\'__GROUP__/Index/appTemplate/'.$tmp2.'/'.$file.'\'"> 模板'.$file.'&nbsp;&nbsp<a href=__GROUP__/Index/moremoban/'.$mulu[3].'/'.$file.'>编辑</a></h4></li> '; } ?>		
										</ul>
					</td></tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>