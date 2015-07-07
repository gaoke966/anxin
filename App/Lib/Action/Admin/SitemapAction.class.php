<?php
class SitemapAction extends Action {

		public function _initialize() {
	
		if(session('username')==false){
			//$this->display('App/Tpl/Admin/index.html');
		//	die( json_encode(array('status' => 0, 'info' => "非法操作", 'url' => 'index.php?s=/Admin/Index/Login')));	
			$this->error('非法操作','__GROUP__/Login');
		}
		} 

		public function index(){
			if($this->ispost()){
			$webinfo=M('webinfo')->select();			
				$webconfig = fopen('sitemap.xml',w);
			if($webconfig){
			$fwite=fwrite($webconfig,trim(stripslashes($_POST['sitemap'] )));
			if($fwite!=false){
				echo "<a href='".__ROOT__."/sitemap.xml'>sitemap.xml</a>";
			}else{
				$this->error('修改失败');
			}
		}
			}else{
			$webinfo=M('webinfo')->select();
			//print_r($webinfo);
			$cate=M('cate')->select();
			//print_r($cate);
			$info=M('info')->select();
			//print_r($info);
			$page=M('page')->select();
			//print_r($page);	
		
			$this->assign('cate',$cate);
			$this->assign('web',$webinfo[0]['weburl']);
			$this->assign('info',$info);
			$this->assign('page',$page);
			$this->display('App/Tpl/Admin/sitemap.html');
			}
			
		}
		public function cahe(){
		
			$con=deldir('App/Runtime');
			if($con>0){
				$this->success('删除成功');
			}else{			
				$this->error('删除失败');
			}
		}
	
		
	}
?>