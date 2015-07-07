<?php
// 本类由系统自动生成，仅供测试用途
class UpimgAction extends Action {
		public function _initialize() {
header("Content-type: text/html; charset=utf-8");
		if(session('username')==false){
			//$this->display('App/Tpl/Admin/index.html');
		//	die( json_encode(array('status' => 0, 'info' => "非法操作", 'url' => 'index.php?s=/Admin/Index/Login')));	
			$this->error('非法操作','__GROUP__/Login');
		}
		} 
		Public function upload(){
		 import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Uploads/';// 设置附件上传目录
		 if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		 }else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		
		 }
		 // 保存表单数据 包括附件数据
		$picurl=$info[0]['savepath'].$info[0][savename];		
		$picurl = __ROOT__ .'/'. $picurl;  // by wang 2014/5/8
		
		$User = M("info"); // 实例化User对象	
		$ispic['ispic']=$picurl; // 保存上传的照片根据需要自行组装
		$count=$User->add($ispic); // 写入用户数据到数据库
		if($count>0){
			$this->success('数据保存成功','backup');
			}else{
				$this->error('添加失败','U(Admin/index/upimg)');
			}

		 }
		public function backup(){
		$info=M('info');
		$ispic=$info->select();
		$this->assign('ispic',$ispic);
		$this->display('App/Tpl/Admin/backup.html');
		}
}
 ?>