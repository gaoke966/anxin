<?php 
	class LoginAction extends Action {
		public function index(){		
			if($this->isPost()){
			
				header('Content-Type:application/json; charset=utf-8');
				$user=M('Admin');
				$login['username']=addslashes($this->_post('username','htmlspecialchars,strip_tags,stripslashes',0));
				$login['pwd']=MD5(addslashes($this->_post('pwd','htmlspecialchars,strip_tags,stripslashes',0)));
				//$code=MD5($_POST['code']);
				if($_SESSION['code']!= md5($_POST['code'])){
					
					die( json_encode(array('status' => 0, 'info' => "验证码错", 'url' => '')));		
				}
				$count=$user->where($login)->count();							
				if($count>0){							
				//$_SESSION['username']=$login['username'];
				$userinfo=$user->select();
				$info['id']=$userinfo[0]['id'];
				$info['username']=$userinfo[0]['username'];
				$info['pwd']=$userinfo[0]['pwd'];	
				$info['ip']=$_SERVER["REMOTE_ADDR"];	
				$info['logtime']=date("Y-m-d H:i:s",time());	
				$user->save($info);
				session('username',MD5($userinfo[0]['username']));	
				session('pwd',MD5($userinfo[0]['pwd']));	
				
				die( json_encode(array('status' => 1, 'info' => "用户登陆成功", 'url' => 'index.php?s=Admin/Index/home')));
				
		
				
				}else{
				if(cookie('ip')==get_client_ip()){
				
				die( json_encode(array('status' => 0, 'info' => "骚年，别试了，我已经记住你的IP了！喝杯水等60秒吧！", 'url' => '')));	
			
				}
				//cookie('ip',get_client_ip(),60);
				die( json_encode(array('status' => 0, 'info' => "用户名或密码错误！", 'url' => '')));	
						
				}
			}else{
			$this->display('App/Tpl/Admin/index.html');
			}	
		}
		public function logout(){
		
			   session(null);
				 echo '<script>alert("成功退出");window.location.href="/"</script>';
		}
}
?>