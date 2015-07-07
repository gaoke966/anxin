<?php

class WeixinAction extends Action {
	
	public function _initialize() {
		
		if((session('username') && session('pwd'))==false){
			$this->error('非法操作','__GROUP__/Login');
		}

		$this->error('需要升级vip版才有该功能！','__GROUP__/Index/home');
	}

	
	
	
}

	