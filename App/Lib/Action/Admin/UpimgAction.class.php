<?php
// ������ϵͳ�Զ����ɣ�����������;
class UpimgAction extends Action {
		public function _initialize() {
header("Content-type: text/html; charset=utf-8");
		if(session('username')==false){
			//$this->display('App/Tpl/Admin/index.html');
		//	die( json_encode(array('status' => 0, 'info' => "�Ƿ�����", 'url' => 'index.php?s=/Admin/Index/Login')));	
			$this->error('�Ƿ�����','__GROUP__/Login');
		}
		} 
		Public function upload(){
		 import('ORG.Net.UploadFile');
		$upload = new UploadFile();// ʵ�����ϴ���
		$upload->maxSize  = 3145728 ;// ���ø����ϴ���С
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// ���ø����ϴ�����
		$upload->savePath =  './Public/Uploads/';// ���ø����ϴ�Ŀ¼
		 if(!$upload->upload()) {// �ϴ�������ʾ������Ϣ
		$this->error($upload->getErrorMsg());
		 }else{// �ϴ��ɹ� ��ȡ�ϴ��ļ���Ϣ
		$info =  $upload->getUploadFileInfo();
		
		 }
		 // ��������� ������������
		$picurl=$info[0]['savepath'].$info[0][savename];		
		$picurl = __ROOT__ .'/'. $picurl;  // by wang 2014/5/8
		
		$User = M("info"); // ʵ����User����	
		$ispic['ispic']=$picurl; // �����ϴ�����Ƭ������Ҫ������װ
		$count=$User->add($ispic); // д���û����ݵ����ݿ�
		if($count>0){
			$this->success('���ݱ���ɹ�','backup');
			}else{
				$this->error('���ʧ��','U(Admin/index/upimg)');
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