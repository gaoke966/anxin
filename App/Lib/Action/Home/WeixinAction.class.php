<?php
class WeixinAction extends Action
{
    private $token;
    private $fun;
    private $data = array();
    private $my = '小猪猪';
    public function index()
    {
        //$this->token = $this->_get('token');
		include_once("Wechat.class.php");
		//define("TOKEN", "aaa");
        //$wechatObj = new wechatCallbackapiTest();
		//$wechatObj->valid();
		//$wechatObj->responseMsg('34343434');
		
		echo 2222;
	}
}
?>