<?php

class IndexAction extends Action {
	
	public function _initialize() {
		
		if((session('username') && session('pwd'))==false){
			die('非法操作！');
		}
	} 

	public function home(){		
		$tongzhi=file_get_contents("http://www.lanrenmb.com/diywap/tongzhi.php");
		$diywapad = file_get_contents("http://www.lanrenmb.com/diywap/ad.php");
		$this->assign('diywapad',$diywapad);			
		$this->assign('tongzhi',$tongzhi);			
		$this->display('App/Tpl/Admin/home.html');
		
	}
	public function webset(){	
		if($this->isPost()){
			$url="http://diy.lanrenmb.com/tongji?domain=".$_POST[weburl]."&tel=".$_POST[tel]."&qq=".$_POST[qq]."&email=".$_POST['email']."&time=".date('Y-m-d H:i:s');			
			
			file_get_contents($url);
		if(F('webset',$_POST,CONF_PATH)){
			header('Content-Type:application/json; charset=utf-8');
			die( json_encode(array('status' => 1, 'info' => "修改成功", 'url' => 'index.php?s=/Admin/Index/webset')));
			
		//	$this->success('修改成功','__GROUP__/Index/webset');
			
		}else{
			header('Content-Type:application/json; charset=utf-8');
			die( json_encode(array('status' => 0, 'info' => "修改失败检查APP/conf目录是否可写", 'url' => 'index.php?s=/Admin/Index/webset')));
		}	
		}else{
		$webinfo=M('webinfo');
		$info=$webinfo->select();	
		$this->assign('info',$info);
		$this->display('App/Tpl/Admin/webset.html');	
		}
	}
	
	public function zhuti(){
		if($this->isPost()){
			if(F('zhuti',$_POST,CONF_PATH)){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}	
			
		}else{
				$this->display('App/Tpl/Admin/zhuti.html');
		}
	}


	public function appTemplate(){	
		$this->error('需要升级vip版才有该功能！','__GROUP__/Index/home');
	}
	
		
	public function user(){
		if($this->isPost()){
		$user=M('admin');
		$userinfo=$user->select();
		$info['id']=$userinfo[0]['id'];
		
		$info['username']=$_POST['username'];
		if(empty($_POST['pwd'])){
		$info['pwd']=$userinfo[0]['pwd'];
			
		}else{
		$info['pwd']=MD5($_POST['pwd']);	
		}
		$info['ip']=$_SERVER["REMOTE_ADDR"];	
		$info['logtime']=date("Y-m-d H:i:s",time());
		$user->save($info);
		$this->success('修改成功','__GROUP__/Index/home');	
		}else{
		$user=M('admin');
		$userinfo=$user->select();
		$this->assign('user',$userinfo);
		$this->display('App/Tpl/Admin/userset.html');	
		}
	}

	public function cate(){
		if($this->isPost()){
		$cateinfo=M('cate');		
		$cate['catename']=$_POST['catename'];	
		if($_POST['cateurl']){				
		preg_match_all("/[a-zA-Z0-9]/i",$_POST['cateurl'], $enurl);		
		$purl=implode ('',$enurl[0]);			
		$cate['cateurl']=$purl;
		}else{	
		preg_match_all("/[a-zA-Z0-9]/i", pinyin($_POST['catename']), $chinese);		
		$posturl=implode ('',$chinese[0]);	
		$cate['cateurl']=$posturl;
		}
		$cate['catetitle']=$_POST['catetitle'];
		$cate['catekey']=$_POST['catekey'];
		$cate['catedesc']=$_POST['catedesc'];	
		$cate['catepage']=$_POST['catepage'];
		$cate['class']=$_POST['class'];
		if($_POST['catetem']){	
		$cate['catetem']=$_POST['catetem'];			
		}else{
		if($_POST['class']==0){
		$cate['catetem']='text_list';
		}if($_POST['class']==1){
		$cate['catetem']='pic_list';
		}		
		}		
		$cate['catelogo']=$_POST['catelogo'];		
		$count=$cateinfo->add($cate);
		if($count>0){
		$this->success('添加成功','__GROUP__/Index/seecate');
		}else{
		$this->error('添加失败','__GROUP__/Index/cate');
		}	
		}else{
		$this->display('App/Tpl/Admin/cate.html');		
		}
	}

	public function seecate(){
		$cate=M('cate');
		$cateinfo=$cate->select();		
		$this->assign('cate',$cateinfo);
		$this->display('App/Tpl/Admin/seecate.html');
	}
	public function xcate(){
		if($this->isPost()){
			$cateinfo=M('cate');
		$cate['id']=$_POST['id'];
		$cate['catename']=$_POST['catename'];
		if($_POST['cateurl']){				
		preg_match_all("/[a-zA-Z0-9]/i",$_POST['cateurl'], $enurl);		
		$purl=implode ('',$enurl[0]);			
		$cate['cateurl']=$purl;
		}else{	
		preg_match_all("/[a-zA-Z0-9]/i", pinyin($_POST['catename']), $chinese);		
		$posturl=implode ('',$chinese[0]);	
		$cate['cateurl']=$posturl;
		}
		
		$cate['catetitle']=$_POST['catetitle'];
		$cate['catekey']=$_POST['catekey'];
		$cate['catedesc']=$_POST['catedesc'];	
		$cate['catepage']=$_POST['catepage'];
		$cate['class']=$_POST['class'];
		if(!empty($_POST['catetem'])){	
			$cate['catetem']=$_POST['catetem'];			
		}elseif($_POST['class']==0){		
		$cate['catetem']='text_list';
		}elseif($_POST['class']==1){
		$cate['catetem']='pic_list';
		}		
				
		$cate['catelogo']=$_POST['catelogo'];
		//print_r($cate);exit;
		$count=$cateinfo->save($cate);
		if($count>0){
		$this->success('修改成功','__GROUP__/Index/seecate');
		}else{
		$this->error('修改失败','__GROUP__/Index/seecate');
		}
		}else{
		$cateinfo=M('cate');
		$where['id']=$_GET['id'];
		$cate=$cateinfo->where($where)->find();
		$this->assign('cate',$cate);
		$this->display('App/Tpl/Admin/xcate.html');	
		}
	}

	public function delcate(){
		$id=$_GET['id'];		
		$cate=M('cate');		
		$count=$cate->delete($id);
		if($count>0){
		$this->success('删除成功','__GROUP__/Index/seecate');
		}else{
		$this->error('删除失败','__GROUP__/Index/seecate');
		}
	}
	public function info(){
		if($this->isPost()){		
		$intoinfo['title']=$_POST['title'];
		$intoinfo['classtitle']=$_POST['classtitle'];
		if(!$_POST['classtitle']){
			$this->error('请选择分类！');
		}
		$showcate=M('cate')->where("catename='$_POST[classtitle]'")->find();
		//print_r($showcate);exit;
		if($_POST['infotemp']){
			$intoinfo['infotemp']=$_POST['infotemp'];
		}else{
		if($showcate['class']==1){		
		$intoinfo['infotemp']='pic_show';
		}
		if($showcate['class']==0){
		$intoinfo['infotemp']='text_show';
		}
		}	
		$intoinfo['cid']=$showcate['class'];
		$intoinfo['cateid']=$showcate['id'];
		if(empty($_POST['istop']))$_POST['istop']=0;
		$intoinfo['istop']=$_POST['istop'];
		if(empty($_POST['isrec']))$_POST['isrec']=0;		
		$intoinfo['isrec']=$_POST['isrec'];
		if(empty($_POST['isshow']))$_POST['isshow']=0;	
		$intoinfo['isshow']=$_POST['isshow'];
		if(empty($_POST['isrev']))$_POST['isrev']=0;	
		$intoinfo['isrev']=$_POST['isrev'];
		$intoinfo['infotitle']=$_POST['infotitle'];
		$intoinfo['infokey']=$_POST['infokey'];
		$intoinfo['custom_url']=$_POST['custom_url'];
		$intoinfo['infodesc']=$_POST['infodesc'];	
		$intoinfo['content']=trim(stripslashes($_POST['content']));
		if(!$_POST['content']){
			$this->error('内容不能为空');
		}
		$intoinfo['ispic']=$_POST['ispic'];
		$intoinfo['tags']=$_POST['tags'];
		$intoinfo['author']=$_POST['author'];
		$intoinfo['from']=$_POST['from'];
		$intoinfo['hits']=$_POST['hits'];
		$intoinfo['time']=$_POST['time'];
		
	
		
		if($_POST['url']){
			preg_match_all("/[a-zA-Z0-9]/i",$_POST['url'], $pourl);		
				$posturl=implode ('',$pourl[0]);	
			$intoinfo['url']='/'.$showcate['cateurl'].'-'.$posturl.'.html';
		}else{
				preg_match_all("/[a-zA-Z0-9]/i", pinyin($_POST['title']), $infourl);		
				$infourlp=implode ('',$infourl[0]);	
		
			$intoinfo['url']='/'.$showcate['cateurl'].'-'.$infourlp.'.html';
		}
		$intoinfo['revs']=0;
		$intoinfo['pcurl']=$_POST['pcurl'];
		$intoinfo['phoneurl']=$_POST['phoneurl'];
		
		//print_r($intoinfo); exit;
		$info=M('info');
		$count=$info->add($intoinfo);
		if($count>0){
		$this->success('添加成功','__GROUP__/Index/seeinfo');
		}else{
		$this->error('添加失败','__GROUP__/Index/info');
		}
		}else{
		$cate=M('cate');
		$showcate=$cate->select();
		$this->assign('showcate',$showcate);
		$webinfo=M('webinfo');
		$showwebinfo=$webinfo->select();
		$time=date("Y-m-d H:i:s",time());
		$hits=rand(1,999);
		$this->assign('showwebinfo',$showwebinfo);
		$this->assign('time',$time);
		$this->assign('hits',$hits);
		$this->display('App/Tpl/Admin/info.html');
		}	
	}
	public function seeinfo(){
		$info=M('info');
		$class['classtitle']=$_GET['classtitle'];
		$class['istop']=$_GET['istop'];
		$class['isrec']=$_GET['isrec'];
		$class['isrev']=$_GET['isrev'];
		$class['cid']=$_GET['cid'];
		import('ORG.Util.Page');// 导入分页类		
		//$seeinfo=$info->order('id DESC')->select();
		$count      = $info->count();// 查询满足要求的总记录数
		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->url = 'Admin/Index/seeinfo/p';
		$show       = $Page->show();// 分页显示输出
		
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		if($class['classtitle']){
		$list = $info->where(array(
				'classtitle'=>$_GET['classtitle'],
		
		))->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		elseif($class['istop']){
		$list = $info->where(array(
				'istop'=>$_GET['istop'],
		
		))->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		elseif($class['isrec']){
		$list = $info->where(array(
				'isrec'=>$_GET['isrec'],
		))->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		elseif($class['isrev']){
		$list = $info->where(array(
				'isrev'=>$_GET['isrev'],
		))->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		elseif($class['cid']){
		$list = $info->where(array(
				'cid'=>$_GET['cid'],
		
		))->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		}	else{	
		$list = $info->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		//$this->assign('info',$count);
		$this->display('App/Tpl/Admin/seeinfo.html');
	}
	public function xinfo(){
		if($this->isPost()){
		$infourl=M('info')->where("id='$_POST[id]'")->find();
		//print_r($infourl);exit;
		$intoinfo['title']=htmlspecialchars($_POST['title']);
		$intoinfo['classtitle']=$_POST['classtitle'];
		$showcate=M('cate')->where("catename='$_POST[classtitle]'")->find();
		//print_r($showcate);exit;
		$intoinfo['cid']=$showcate['class'];
		$intoinfo['cateid']=$showcate['id'];
		$intoinfo['istop']=$_POST['istop'];		
		$intoinfo['isrec']=$_POST['isrec'];	
		$intoinfo['isshow']=$_POST['isshow'];	
		$intoinfo['isrev']=$_POST['isrev'];
		$intoinfo['infotitle']=$_POST['infotitle'];
		$intoinfo['infokey']=$_POST['infokey'];
		$intoinfo['custom_url']=$_POST['custom_url'];
		$intoinfo['infodesc']=$_POST['infodesc'];
		$intoinfo['content']=trim(stripslashes($_POST['content']));
		$intoinfo['ispic']=$_POST['ispic'];
		$intoinfo['tags']=$_POST['tags'];
		$intoinfo['author']=$_POST['author'];
		$intoinfo['from']=$_POST['from'];
		$intoinfo['hits']=$_POST['hits'];
		$intoinfo['time']=$_POST['time'];
			if($_POST['url']!=$infourl['url']){
				preg_match_all("/[a-zA-Z0-9]/i",pinyin($_POST['title']), $pourl);		
				$posturl=implode ('',$pourl[0]);	
				$intoinfo['url']='/'.$showcate['cateurl'].'-'.$posturl.'.html';			
			}
			if($_POST['url']==$infourl['url']){
				$intoinfo['url']=$_POST['url'];
			}

		$intoinfo['revs']=0;
		$intoinfo['pcurl']=$_POST['pcurl'];
		$intoinfo['phoneurl']=$_POST['phoneurl'];
		$intoinfo['id']=$_POST['id'];
		if($_POST['infotemp']!='pic_show' && $_POST['infotemp']!='text_show'){
			$intoinfo['infotemp']=$_POST['infotemp'];
		}else{
			if($showcate['class']==1){		
			$intoinfo['infotemp']='pic_show';
			}
			if($showcate['class']==0){
			$intoinfo['infotemp']='text_show';
		}
		}
		
	
		//print_r($intoinfo); exit;
		$info=M('info');
		$count=$info->save($intoinfo);
		if($count>0){
		$this->success('修改成功','__GROUP__/Index/seeinfo');
		}else{
		$this->error('修改失败','__GROUP__/Index/seeinfo');
		}
		}else{
		$info=M('info');
		$where['id']=$_GET['id'];
		$xinfo=$info->where($where)->find();
		$cate=M('cate');
		$showcate=$cate->select();
		$time=date("Y-m-d H:i:s",time());
		$this->assign('time',$time);
		$this->assign('showcate',$showcate);		
		$this->assign('xinfo',$xinfo);
		$this->display('App/Tpl/Admin/xinfo.html');	
		}	
	}
	public function delinfo(){
		$id=$_GET['id'];		
		$info=M('info');		
		$count=$info->delete($id);
		if($count>0){
		$this->success('删除成功','__GROUP__/Index/seeinfo');
		}else{
		$this->error('删除失败','__GROUP__/Index/seeinfo');
		}
	
	}
	public function upimg(){		
			$this->display('App/Tpl/Admin/upimg.html');
	}
	public function pcupload(){
			if ($this->isPost()){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3223145728 ;// 设置附件上传大小
			$upload->saveRule  = 'time' ;// 设置重命名
			//$upload->thumbRemoveOrigin = true;// 设置删除原图
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			//$upload->thumb = true;
			//$upload->thumbPrefix = 'm_,s_';
			//$upload->thumbMaxWidth = '400,80';			
			//$upload->thumbMaxHeight = '300,60';
			$upload->savePath =  './Public/Uploads/pic/';// 设置附件上传目录
			 if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			 }else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();		
			$midpic=str_replace('.','',$info[0]['savepath']).$info[0]['savename'];

			$postname='pcpic';
			$this->assign('postname',$postname);
			$this->assign('midpic',__ROOT__.$midpic);  //by wang 2014/5/8
			//echo "<script type='text/javascript'>parent.document.getElementById('ispic').value='".$midpic."';</script>";
			//echo "<img src='$midpic'>";
			$this->display('App/Tpl/Admin/imgshow.html');
			$this->success('上传成功');
			}
			}else{
			$this->display('App/Tpl/Admin/pcupload.html');
			}
	}
	
	public function uppic(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = C('pic_size');// 设置附件上传大小
			$upload->saveRule  = 'time' ;// 设置重命名
			$upload->thumbRemoveOrigin = true;// 设置删除原图
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->thumb = true;
		
			$upload->thumbPrefix = 'm_';
			$upload->thumbMaxWidth = C('pic_withe');			
			$upload->thumbMaxHeight = C('pic_height');
			$upload->savePath =  './Public/Uploads/mid/';// 设置附件上传目录
			 if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			 }else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();		
			$midpic=str_replace('.','',$info[0]['savepath']).'m_'.$info[0]['savename'];
			$postname='ispic';
			$this->assign('postname',$postname);
			$this->assign('midpic',__ROOT__.$midpic);  //by wang 2014/5/8

			$this->display('App/Tpl/Admin/imgshow.html');
			$this->success('上传成功');			
			 }
		
			
		}
	
	public function chuang(){
		if($this->isPost()){
			if(F('imageconfig',$_POST,CONF_PATH)){
					$this->success('修改成功');
			}
			else{
				$this->error('修改失败');
			}
		}else{
		
			$this->display('App/Tpl/Admin/chuang.html');
		}
			
	}
		
	public function backup(){
		$info=M('info');
		$ispic=$info->select();
		$this->assign('ispic',$ispic);
		$this->display('App/Tpl/Admin/backup.html');
		}
	
	public function page(){
		if($this->isPost()){
		$intoinfo['title']=$_POST['title'];
		$intoinfo['infotitle']=$_POST['infotitle'];
		$intoinfo['infokey']=$_POST['infokey'];
		$intoinfo['infodesc']=$_POST['infodesc'];
		$intoinfo['pcpic']=$_POST['pcpic'];
		$intoinfo['content']=trim(stripslashes($_POST['content']));
		$intoinfo['author']=$_POST['author'];
		$intoinfo['hits']=$_POST['hits'];
		$intoinfo['time']=$_POST['time'];		
		if($_POST['url']){
			preg_match_all("/[a-zA-Z0-9]/i",$_POST['url'], $pageurl);		
				$postpageurl=implode ('',$pageurl[0]);	
			$intoinfo['url']='/page-'.$postpageurl.'.html';
		}else{
			preg_match_all("/[a-zA-Z0-9]/i",pinyin($_POST['title']), $ptitlelurl);		
			$pagetitleurl=implode ('',$ptitlelurl[0]);	
		$intoinfo['url']='/page-'.$pagetitleurl.'.html';
		}
		$intoinfo['outurl']=$_POST['outurl'];
		if($_POST['pagetem']){
		$intoinfo['pagetem']=$_POST['pagetem'];
		}else{
		$intoinfo['pagetem']='page';
		}
		//print_r($intoinfo); exit;
		$info=M('page');
		$count=$info->add($intoinfo);
		if($count>0){
		$this->success('添加成功','__GROUP__/Index/seepage');
		}else{
		$this->error('添加失败','__GROUP__/Index/page');
		}	
		}else{
		$time=date("Y-m-d H:i:s",time());
		$hits=rand(1,9999);
		$this->assign('time',$time);		
		$this->assign('hits',$hits);
		$this->display('App/Tpl/Admin/page.html');
		}
	}
	public function seepage(){
		$info=M('page');	
		import('ORG.Util.Page');// 导入分页类		
		//$seeinfo=$info->order('id DESC')->select();
		$count      = $info->count();// 查询满足要求的总记录数
		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->url = 'Admin/Index/seepage/p';
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性		
		$list = $info->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();	
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		//$this->assign('info',$count);
		$this->display('App/Tpl/Admin/seepage.html');
	}
	public function xpage(){			
		if($this->isPost()){
		$pageurl=M('page')->where("id=$_POST[id]")->find();
		
		$intoinfo['id']=$_POST['id'];
		$intoinfo['title']=htmlspecialchars($_POST['title']);		
		$intoinfo['infotitle']=$_POST['infotitle'];
		$intoinfo['infokey']=$_POST['infokey'];
		$intoinfo['infodesc']=$_POST['infodesc'];
		$intoinfo['content']=trim(stripslashes($_POST['content']));
		$intoinfo['pcpic']=$_POST['pcpic'];
		$intoinfo['author']=$_POST['author'];
		$intoinfo['hits']=$_POST['hits'];
		$intoinfo['time']=$_POST['time'];
		if($_POST['url']!=$pageurl['url']){
				preg_match_all("/[a-zA-Z0-9]/i",pinyin($_POST['title']), $ptitlelurl);		
				$pagetitleurl=implode ('',$ptitlelurl[0]);
				$intoinfo['url']='/page-'.$pagetitleurl.'.html';
		}
		if($_POST['url']==$pageurl['url']){
			$intoinfo['url']=$_POST['url'];	
		}
		$intoinfo['outurl']=$_POST['outurl'];	
		$intoinfo['pagetem']=$_POST['pagetem'];
		//print_r($intoinfo); exit;
		$info=M('page');
		$count=$info->save($intoinfo);
		if($count>0){
		$this->success('修改成功','__GROUP__/Index/seepage');
		}else{
		$this->error('修改失败','__GROUP__/Index/seepage');
		}
		}else{
		$info=M('page');
		$where['id']=$_GET['id'];
		$xinfo=$info->where($where)->find();	
		$time=date("Y-m-d H:i:s",time());
		$this->assign('time',$time);			
		$this->assign('xinfo',$xinfo);
		$this->display('App/Tpl/Admin/xpage.html');	
		}
	}
	public function delpage(){
	
		$id=$_GET['id'];		
		$info=M('page');		
		$count=$info->delete($id);
		if($count>0){
		$this->success('删除成功');
		}else{
		$this->error('删除失败');
		}
	
	}
	public function comment(){
		
		import('ORG.Util.Page');// 导入分页类		
		//$seeinfo=$info->order('id DESC')->select();
		$count      = M('comment')->count();// 查询满足要求的总记录数
		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数				$Page->url = 'Admin/Index/comment/p';			
		$Page->url = 'Admin/Index/comment/p';
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性		
		$commentlist = M('comment')->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();			$this->assign('commentlist',$commentlist);
		$this->assign('page',$show);// 赋值分页输出	
		
		$this->display('App/Tpl/Admin/comment.html');
		
	}
	public function reply(){
		if($this->isPost()){			
			$reply['reply']=$_POST['reply'];
			$reply['id']=$_POST['id'];
			$reply['isshow']=$_POST['isshow'];
			$reply['email']=$_POST['email'];
			$reply['name']=$_POST['name'];
			$reply['time']=$_POST['time'];
			$reply['homepage']=$_POST['homepage'];
			$reply['connent']=$_POST['connent'];
			$reply['url']=$_POST['url'];
			$reply['replytime']=date('Y-m-d h:i:s',time());
			$info=M('webinfo')->select();
			$title=M('info')->where("url='$_POST[url]'")->find();
			$con=M('comment')->save($reply);
			if($con>0){
				$this->success('回复成功','__GROUP__/Index/comment');
				send_mail($_POST['email'],C('email'),"你的评论有了管理员的回复",
				"亲爱的"."<font color=red>".$_POST['name']."</font>：<br />".$_POST['time']."你发表的评论:<br /> "."<font color=red>".$_POST['connent']."</font><br />有了管理员的回复，回复内容如下:<br />".
				"<font color=red>".$_POST['reply']."</front><br />原文：<a href=".C('weburl').$_POST['url'].">".$title['title']."</a><br />"."<font color=red>".C('webname')."</font>发邮件提醒");
			}else{
				$this->error('回复失败');
			}
		}else{
		
		$commen=M('comment')->find($_GET['id']);
		//print_r($commen);
		$this->assign('commen',$commen);		
		$this->display('App/Tpl/Admin/reply.html');
		}
	}
	public function showreply(){
		$id=$_GET['id'];
		$reply=M('comment')->where("id='$id'")->find();
			$reply['isshow']=1;
			$con=M('comment')->save($reply);
			if($con>0){
				$this->success('验证成功','__GROUP__/Index/comment');
			}else{
				$this->error('验证失败','__GROUP__/Index/comment');
			}
			
	}
	public function delreply(){
		$id=$_GET['id'];
		$reply=M('comment')->where("id='$id'")->delete($id);
		if($reply>0){
			$this->success('删除成功','__GROUP__/Index/comment');
			}else{
				$this->error('删除失败','__GROUP__/Index/comment');
		}
	
	}
	public function email(){
		if($this->isPost()){
			$peizhi="<?php 
				return array(
				'SYSTEM_EMAIL' => array (
				'smtp_host' => '$_POST[smtp_host]',
				'smtp_port' => '$_POST[smtp_port]', 
				'from_email' => '$_POST[from_email]',
				'from_name' => '$_POST[from_name]',
				'smtp_user' => '$_POST[smtp_user]',
				'smtp_pass' => '$_POST[smtp_pass]',
				'reply_email' => '$_POST[smtp_user]',
				'reply_name' => '$_POST[from_name]',
								
		),
		);";
		$confpath = './App/Conf/mailconfig.php';
		$webconfig = fopen($confpath,w);
		if($webconfig){
			$fwite=fwrite($webconfig,$peizhi );
			if($fwite!=false){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}
		
		
		}else{
			$this->assign('host',C('SYSTEM_EMAIL.smtp_host'));
			$this->assign('smtp_port',C('SYSTEM_EMAIL.smtp_port'));
			$this->assign('from_email',C('SYSTEM_EMAIL.from_email'));
			$this->assign('from_name',C('SYSTEM_EMAIL.from_name'));
			$this->assign('smtp_user',C('SYSTEM_EMAIL.smtp_user'));
			$this->assign('smtp_pass',C('SYSTEM_EMAIL.smtp_pass'));
			$this->display('App/Tpl/Admin/email.html');
		}
	}
	public function mysql(){
		if($this->isPost()){
		
			if(F('mysqlconf',$_POST,CONF_PATH)){
					$this->success('修改成功');
			}
			else{
				$this->error('修改失败');
			}
		}else{
			$this->display('App/Tpl/Admin/mysql.html');
		}
	}
	public function url(){
		if($this->isPost()){		
		$peizhi="<?php 
				return array(
				'URL_MODEL'=>$_POST[mode], 
				);";
		$confpath = './App/Conf/urlconfig.php';
		$webconfig = fopen($confpath,w);
		if($webconfig){
			$fwrite=fwrite($webconfig,$peizhi );
			
			if($fwrite > 0){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}			
		}else{
			$this->display('App/Tpl/Admin/url.html');
		}
	}
	public function phone(){
		if($this->isPost()){		
		$peizhi="<?php 
				return array(
				'APP_SUB_DOMAIN_DEPLOY'=>true,  
				'APP_SUB_DOMAIN_RULES'=>array(   
				'$_POST[domain]'=>array('Wap/'), 
				),
				);";
		$confpath = './App/Conf/phoneconfig.php';
		$webconfig = fopen($confpath,w);
		if($webconfig){
			$fwrite=fwrite($webconfig,$peizhi );
			
			if($fwrite > 0){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}			
		}else{
			$wap=C("APP_SUB_DOMAIN_RULES");
			$new_arr = array();
			foreach($wap as $k=>$v)
			{
				 $new_arr[$k] = $v->Wap;
			}
			$wapname=array_keys($new_arr);
			
			$this->assign('wapname',$wapname[0]);
			
			$this->display('App/Tpl/Admin/phone.html');
		}
	}
	public function book(){	
		import('ORG.Util.Page');// 导入分页类		
		//$seeinfo=$info->order('id DESC')->select();
		$count      = M('book')->count();// 查询满足要求的总记录数
		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性		
		$booklist = M('book')->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();	
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('booklist',$booklist);
		$this->display('App/Tpl/Admin/book.html');
	
	}
	public function delbook(){
		$con=M('book')->where("id='$_GET[id]'")->delete();
		if($con>0){
			$this->success('删除成功');
		}
	
	}
	public function moban(){
	
		$this->display('App/Tpl/Admin/moban.html');
	
	}
	public function fenzu(){
	
		$user=M('admin');
		$userinfo=$user->select();
		$info['wap_template']=$userinfo[0]['wap_template'];
		$info['pc_template']=$userinfo[0]['pc_template'];
		$this->assign('wap_template',$info['wap_template']);
		$this->assign('pc_template',$info['pc_template']);

		$this->display('App/Tpl/Admin/fenzu.html');	
	}
	public function moremoban(){
		$this->display('App/Tpl/Admin/moremoban.html');
	}
	public function htmlmoban(){
		if($this->isPost()){
		$tplurl=$_POST['path'];		
		//echo  str_replace('__GROUP__','{$azan}',trim(stripslashes($_POST['moban'])));exit;
		$webconfig = fopen($tplurl,w);
		if($webconfig){
			$fwite=fwrite($webconfig,str_replace('__AZAN__','__GROUP__',trim(stripslashes($_POST['moban']))));
			if($fwite!=false){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}
		}else{
		$this->display('App/Tpl/Admin/htmlmoban.html');	
		}
	}
	public function cssmoban(){
		if($this->isPost()){
		$tplurl=$_POST['path'];		
		//echo $_POST['moban'];exit;
		$webconfig = fopen($tplurl,w);
		if($webconfig){
			$fwite=fwrite($webconfig,trim(stripslashes($_POST['moban'] )));
			if($fwite!=false){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}
		}else{
		$this->display('App/Tpl/Admin/cssmoban.html');	
		}
	}
	public function link(){
		if($this->isPost()){
			$intolink['url']=$_POST['url'];
			$intolink['name']=$_POST['name'];
			$intolink['remak']=$_POST['remak'];
			$intolink['time']=date('Y-m-d');
			$con=M('link')->add($intolink);
			if($con>0){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}			
		}
		$this->display('App/Tpl/Admin/link.html');
	
	}
	public function seelink(){
	
		$linklist=M('link')->select();
		$this->assign('link',$linklist);
		$this->display('App/Tpl/Admin/seelink.html');
	}
	public function xlink(){
		if($this->isPost()){
			$xlink['id']=$_POST['id'];
			$xlink['url']=$_POST['url'];
			$xlink['name']=$_POST['name'];
			$xlink['remak']=$_POST['remak'];
			$xlink['time']=date('Y-m-d');
			$con=M('link')->save($xlink);
			if($con>0){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
			
		}else{
		$id=$_GET['id'];
		$xlink=M('link')->where(array('id'=>$id))->find();
		$this->assign('xlink',$xlink);	
		$this->display('App/Tpl/Admin/xlink.html');
		}
	}
	
	public function dellink(){
		$id=$_GET['id'];
		$con=M('link')->where(array('id'=>$id))->delete();
		if($con>0){
			$this->success('删除成功');
		}else{
				$this->error('删除失败');
		}
			
	}	
	
   public function weixinpic(){
	
		if($this->ispost()){
		
			
			$wxpicc['id']=$_POST['id'];
			$wxpicc['image']=$_POST['image'];
			$wxpicc['name']=$_POST['name'];
			$wxpicc['userid']=$_POST['userid'];
			$wxpicc['revs']=$_POST['revs'];
			$wxpicc['hits']=$_POST['hits'];
			$wxpicc['isshow']=$_POST['isshow'];
			$wxpicc['time']=time();
			$con = M('wximage')->save($wxpicc);
			if($con>0){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		
		}else{
   
		import('ORG.Util.Page');// 导入分页类		
		//$seeinfo=$info->order('id DESC')->select();
		$count      = M('wximage')->count();// 查询满足要求的总记录数
		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->url = 'Admin/Index/weixinpic/p';
		$show       = $Page->show();// 分页显示输出
		$weixinpic = M('wximage')->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('weixinpic',$weixinpic);
		$this->display('App/Tpl/Admin/weixinpic.html');
		}
   }
   public function delweixinpic(){
   
		$id = $_GET['id'];
		$con=M('wximage')->where(array('id'=>$id))->delete();
		if($con>0){
			$this->success('删除成功');
		}else{
				$this->error('删除失败');
		}
	
   }
   public function wxshow(){
   
			$wxshow['id'] = $_GET['id'];
			$wxshow['isshow'] = 1;
			$con = M('wximage')->save($wxshow);
			if($con>0){			
				$this->success('验证通过！');
			}else{
				$this->error('验证失败');
			}
	
	
   }
	
	
}
?>