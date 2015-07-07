<?php
// 本类由系统自动生成，仅供测试用途
class CodeAction extends Action {
    public function index(){
	import('ORG.Util.Image');
    Image::buildImageVerify(4,1,'png',80,31,'code');
    }
}