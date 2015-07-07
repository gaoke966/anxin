<?php
// 本类由系统自动生成，仅供测试用途
class AdsaAction extends Action {
	public function _initialize() {
	
		if(session('username')==false){
			//$this->display('App/Tpl/Admin/index.html');
		//	die( json_encode(array('status' => 0, 'info' => "非法操作", 'url' => 'index.php?s=/Admin/Index/Login')));	
			$this->error('非法操作','__GROUP__/Login');
		}
		}

	public function addads(){
			
			if($this->isPost()){
					
					$webconfig = fopen('Public/Ads/'.$_POST['adname'].'.html',w);
					if($webconfig){
						$fwite=fwrite($webconfig,trim(stripslashes($_POST['remak'] )));
					}
					if($fwite!=false){
					header('Content-Type:application/json; charset=utf-8');
					die( json_encode(array('status' => 1, 'info' => "添加成功", 'url' => 'index.php?s=/Admin/Adsa/addads')));				
					}else{
					header('Content-Type:application/json; charset=utf-8');
					die( json_encode(array('status' => 0, 'info' => "添加失败，检查Public/Ads目录是否可写", 'url' => 'index.php?s=/Admin/Adsa/addads')));
					}
				}
			else{
			}
			
			$this->display('App/Tpl/Admin/addads.html');
	
			}
	public function diao(){
	
		if($this->ispost()){
		
				$webconfig = fopen('Public/Ads/'.$_POST['adname'].'.html',w);
					if($webconfig){
						$fwite=fwrite($webconfig,trim(stripslashes($_POST['remak'] )));
					}
					if($fwite!=false){						
						$this->success('修改成功');									
					}else{
					$this->error('修改失败，检查Public/Ads目录是否可写');
					}
		
		}else{
				
		$name = str_replace('.html',"",$_GET[fils]);
		$url=C('weburl').'/Public/Ads/'.$_GET[fils];		
		$this->assign('neirong',file_get_contents($url));			
		$this->assign('name',$name);			
		$this->assign("diao","<include file="."&#34;"."./Public/Ads/".$_GET[fils]."&#34;"." />");
		$this->display('App/Tpl/Admin/diao.html');
	}
	}
	public function delad(){
	
		$fils = './Public/Ads/'.$_GET[fils];
		
		if(file_exists($fils)){			
			if(unlink($fils)){
		
			$this->success('删除成功');
		
		}else{
			
			$this->error('删除失败，检查文件是否有');
			
		}
		}else{
		
			$this->error('删除失败，检查文件是否有');
		}
		
	
	}
	
	}

		