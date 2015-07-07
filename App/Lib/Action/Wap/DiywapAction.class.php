<?php
// 本类由系统自动生成，仅供测试用途
class DiywapAction extends CommAction {
    public function index(){
		
		$this->display();
    }
	public function azlist(){
	
	
		$url=$_GET['cateurl'];		
		$cate=M('cate')->where("cateurl='$url'")->find();
		if($cate){		
		
		import("ORG.Util.Page");
		$count= M('info')->where(array('isshow'=>'1','cateid'=>$cate['id']))->count();
		$Page= new Page($count,$cate['catepage']);
		$azlist=M('info')->where(array('cateid'=>$cate['id'],'isshow'=>'1'))->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();	
		$Page->url = $_GET[cateurl];		
		$show= $Page->show();	
		
		$this->assign('page',$show);
		$this->assign('list',$azlist);
			if($cate['class']==1){
				 $this->nav = 'list';
				$this->display($cate['catetem']);
			}
			if($cate['class']==0){	
				 $this->nav = 'pic';
				$this->display($cate['catetem']);
			}
	}
	else{
		 header("HTTP/1.0 404 Not Found");
		 $this->display('404');
		}
	}
	public function azshow(){
		$this->nav = 'azshow';
		$url=$_GET['url'];	
		//print_r($url);		
		$pageshow=M('page')->where("url='/$url'")->find();
		$azshow=M('info')->where("url='/$url'")->find();
		if($pageshow=='' && $azshow==''){
			header("HTTP/1.0 404 Not Found");
			$this->display('404');
		}else{
		if($pageshow){
			$pagetem=$pageshow['pagetem'];
			$this->assign('title',$pageshow['title']);
			$this->assign('seotitle',$pageshow['infotitle']);
			$this->assign('pagekey',$pageshow['infokey']);
			$this->assign('pagedesc',$pageshow['infodesc']);
			$this->assign('content',$pageshow['content']);
			$this->assign('pic',$pageshow['pcpic']);
			$this->assign('author',$pageshow['author']);
			$this->assign('hits',$pageshow['hits']);
			$this->assign('time',$pageshow['time']);
			$this->display("$pagetem");
			}
		 if($azshow){
			
			$up=M('cate')->where(array('catename'=>$azshow['classtitle']))->find();
			
			M('info')->where("url='/$url'")->setInc('hits');//点击加1
		
			$infoid=$azshow['id'];
			$after=M('info')->where("id<$infoid")->order('id desc')->limit(1)->find();
			$before=M('info')->where("id>$infoid")->order('id asc')->limit(1)->find();
			$ipadresss = get_client_ip();//IP
			import('ORG.Net.IpLocation');// 导入IpLocation类
			$Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
			$area = $Ip->getlocation($ipadresss); // 获取某个IP地址所在的位置
			
			//print_r($area);
			
			$this->assign('country',$area['country']);
			$this->assign('next',$after);
			$this->assign('prev',$before);
			$commentlist=M('comment')->where("isshow='1' and url='/$url'")->select();		
			$this->assign('commentlist',$commentlist);
			$this->assign('upcateurl',$up['cateurl']);//上一级
			$this->assign('tags',get_keywords($azshow['tags']));
			$this->assign('title',$azshow['title']);
			$this->assign('classtitle',$azshow['classtitle']);
			$this->assign('seotitle',$azshow['infotitle']);
			$this->assign('infokey',$azshow['infokey']);
			$this->assign('infodesc',$azshow['infodesc']);
			$this->assign('content',$azshow['content']);
			$this->assign('ispic',$azshow['ispic']);
			$this->assign('from',$azshow['from']);
			$this->assign('revs',$azshow['revs']);
			$this->assign('isrev',$azshow['isrev']);
			$this->assign('author',$azshow['author']);
			$this->assign('hits',$azshow['hits']);
			$this->assign('time',$azshow['time']);	
			$this->assign('url',$azshow['url']);	
			$this->assign('pcurl',$azshow['pcurl']);	
			$this->assign('phoneurl',$azshow['phoneurl']);	
		if($azshow['cid']==1){		
			$this->display($azshow[infotemp]);		
		}else{		
			$this->display($azshow[infotemp]);
		}
		}
		}
		
	}
	
	public function lianxi(){
		 $this->nav = 'lianxi';
		if($this->isPost()){
			if(cookie('ip')==get_client_ip()){
				die( "亲，您的留言我们已经收到不用重复留言！如果你还有要补充请等待60秒");
			}
			if($this->_post('name','htmlspecialchars,strip_tags',0)==false){
				die( "请填写您的称呼！");
			}
			$date['name']=$this->_post('name','htmlspecialchars,strip_tags',0);
			if($this->_post('tel','htmlspecialchars,strip_tags',0)==false){
				die( "请填写您的电话号！");
			}
			$date['tel']=$this->_post('tel','htmlspecialchars,strip_tags',0);
			if($this->_post('email','htmlspecialchars,strip_tags',0)==false){
				die( "请填写您的邮箱");
			}
			if(stristr($this->_post('email','htmlspecialchars,strip_tags',0),'@')==false){
				die('请填写正确的邮箱！');	
			}
			$date['email']=$this->_post('email','htmlspecialchars,strip_tags',0);		
			if($this->_post('content','htmlspecialchars,strip_tags',0)==false){
				die('请填写内容！');
			}
			$date['content']=$this->_post('content','htmlspecialchars,strip_tags',0);
			$date['time']=date('Y-m-d h:i:s',time());
			if($_SESSION['code']!= md5($_POST['code'])){
				die('验证码错误！');			
			}
			$con=M('book')->add($date);
			if($con>0){				
				send_mail(C('email'),$_POST['tel'],$_POST['name'],"有人留言了，留言内容如下：<br />联系人：".$_POST['name']."<br /> 电话：".$_POST['tel']."<br />邮箱：".$_POST['email']."<br />留言内容：".$_POST['content']);
				cookie('ip',get_client_ip(),60);
				echo '留言成功，我们会尽快跟你取得联系！';
				
			}
		}else{
		$this->display('contact');
	
		}
	}
	public function comment(){
			$ip = get_client_ip();
				
		
			if(cookie('ip')==$ip){
				//$this->error('亲，别刷了！再刷下去我的服务器要爆了！等60秒再发吧！！！');
				die( "亲，别刷了！再刷下去我的服务器要爆了！等60秒再发吧！！！");	
			}
			if($this->_post('name','htmlspecialchars,strip_tags',0)==false){
				//$this->error('用户名不能为空！');
				die( "用户名不能为空！");	
			}
			$date['name']=$this->_post('name','htmlspecialchars,strip_tags',0);
			if($this->_post('email','htmlspecialchars,strip_tags',0)==false){
			//$this->error('邮箱不能为空！');
			die( "邮箱不能为空！");
			}
			if(stristr($this->_post('email','htmlspecialchars,strip_tags',0),'@')==false){
				die("请使用正常的邮箱");
				}
		    $date['email']=$this->_post('email','htmlspecialchars,strip_tags',0);
			//$date['email']=0;
			$date['homepage']=$this->_post('homepage','htmlspecialchars,strip_tags',0);
			$date['homepage']=0;
			
			if($_SESSION['code']!= md5($_POST['code'])){
			die("验证码错误");	
				}
			if($this->_post('connent','htmlspecialchars,strip_tags',0)==false){
				//$this->error('内容不能为空！');
			
				die("内容不能为空！");	
			}
			$date['connent']=$this->_post('connent','htmlspecialchars,strip_tags',0);
			
			
			$infourl=$date['url']=$this->_post('url');
			
		
			$date['time']=date('Y-m-d',time());
			$date['isshow']=0;			
		//	print_r($date);
			//exit;
		
			$url=$date['url'];
			$con=M('comment')->add($date);
			$webemail=C('email');
			$weburl=C('weburl');
			//print_r($weburl);exit;
			if($con>0){
				send_mail(C('email'),$_POST['email'],$_POST['name'],"有新评论了<a href=".$weburl.$url.">这篇文章</a>"."<br />"."评论内容：".$_POST['connent']);
				cookie('ip',get_client_ip(),60);
				echo "你的评论已成功添加，等待管理员审核！";	
				
				
				M('info')->where("url='$url'")->setInc('revs');//评论加+1
				
				M('wximage')->where("id='$url'")->setInc('revs');//评论加+1
			
			}else{
					die( json_encode(array('status' =>0, 'info' => "添加失败", 'url' => '')));	
			}			
			
	}
	
	public function sitemap(){
			$this->display('sitemap');
	}
	public function search(){
		cookie('ip',get_client_ip(),60);
		$ip = get_client_ip();		
			if(cookie('ip')==$ip){
			//	$this->error('亲，别刷了！再刷下去我的服务器要爆了！等60秒再发吧！！！');
				
			}
		
		$getkey = addslashes($this->_get('key','htmlspecialchars,strip_tags,stripslashes',0));
		
		if(!$getkey){
			die('关键词不能为空');
		}
		$map['title'] = $getkey;
		$map['content'] = $getkey;	
		$search['key'] = $getkey;
		$search['time'] = time();
		$con = M('search')->where(array('key'=>$getkey))->find();
			if($con){
				M('search')->where(array('key'=>$getkey))->setInc('hits');//总搜索+1							
			}else{		
				M('search')->add($search);
			}
		import("ORG.Util.Page");
		$count= M('info')->where($map)->count();
		$Page= new Page($count,10);
		$searchlist=M('info')->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();	
		//$Page->url = "search/p/p";		
		$show= $Page->show();		
		$this->assign('page',$show);
		$this->assign('key',$getkey);
		$this->assign('list',$searchlist);
		$this->display();
			
	
	
	}

}