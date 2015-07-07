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
	
	<div class="diywap_right">
		<div class="well well-sm">系统设置</div>





<form class="form-horizontal" action="" method="post" />
			<div class="form-group">
			 <label for="webname" class="col-sm-2 control-label">网站名:</label>
				 <div class="col-sm-4">
					<input type="webname" name="webname" value="<?php echo (C("webname")); ?>" class="form-control"  placeholder="网站名称">
				 </div>
			</div>
			<div class="form-group">
			 <label for="weburl" class="col-sm-2 control-label">域名:</label>
				 <div class="col-sm-4">
					<input type="weburl" name="weburl" value="<?php echo (C("weburl")); ?>" class="form-control"  placeholder="域名">
				 </div>
			</div>
			<div class="form-group">
			 <label for="seotitle" class="col-sm-2 control-label">SEO 标题:</label>
				 <div class="col-sm-4">
					<input type="seotitle" name="seotitle" value="<?php echo (C("seotitle")); ?>" class="form-control"  placeholder="SEO标题">
				 </div>
			</div>
			<div class="form-group">
			 <label for="webkey" class="col-sm-2 control-label">网站关键词:</label>
				 <div class="col-sm-4">
					<input type="webkey" name="webkey" value="<?php echo (C("webkey")); ?>" class="form-control"  placeholder="网站关键词">
				 </div>
			</div>
			<div class="form-group">
			 <label for="webdesc" class="col-sm-2 control-label">网站描述:</label>
				 <div class="col-sm-4">
					<textarea class="form-control" rows="3"  name="webdesc"><?php echo (C("webdesc")); ?></textarea>
				 </div>
			</div>
			<div class="form-group">
			 <label for="beian" class="col-sm-2 control-label">网站备案号:</label>
				 <div class="col-sm-4">
					<input type="beian" name="beian" value="<?php echo (C("beian")); ?>" class="form-control"  placeholder="网站备案号">
				 </div>
			</div>
			<div class="form-group">
			 <label for="tel" class="col-sm-2 control-label">联系电话:</label>
				 <div class="col-sm-4">
					<input type="tel" name="tel" value="<?php echo (C("tel")); ?>" class="form-control"  placeholder="联系电话">
				 </div>
			</div>
			<div class="form-group">
			 <label for="qq" class="col-sm-2 control-label">在线QQ:</label>
				 <div class="col-sm-4">
					<input type="qq" name="qq" value="<?php echo (C("qq")); ?>" class="form-control"  placeholder="在线QQ">
				 </div>
			</div>
			<div class="form-group">
			 <label for="email" class="col-sm-2 control-label">电子邮箱:</label>
				 <div class="col-sm-4">
					<input type="email" name="email" value="<?php echo (C("email")); ?>" class="form-control"  placeholder="电子邮箱">
				 </div>
			</div>
			<div class="form-group">
			 <label for="adress" class="col-sm-2 control-label">公司地址:</label>
				 <div class="col-sm-4">
					<input type="adress" name="adress" value="<?php echo (C("adress")); ?>" class="form-control"  placeholder="公司地址">
				 </div>
			</div>
			<div class="form-group">
			 <label for="copyright" class="col-sm-2 control-label">版权信息:</label>
				 <div class="col-sm-4">
					<input type="copyright" name="copyright" value="<?php echo (C("copyright")); ?>" class="form-control"  placeholder="版权信息">
				 </div>
			</div>
			<div class="form-group">
			 <label for="logo" class="col-sm-2 control-label">网站LOGO:</label>
				 <div class="col-sm-4">
					<input type="logo" name="logo" value="<?php echo (C("logo")); ?>" id="pcpic" class="form-control"  placeholder="网站LOGO">
				<iframe src="__GROUP__/Index/pcupload" height="40"  frameborder="0" scrolling="no" ></iframe>
				</div>
				 
			</div>
			<button type="button" class="btn btn-primary btn-lg" id="post">保 存</button>
			</form>
			</div>
			</div>
<script type="text/javascript">
$("#post").click(function(){
	commonAjaxSubmit();
});
</script>
</body>
</html>