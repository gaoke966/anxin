<?php
// ������ϵͳ�Զ����ɣ�����������;
class CodeAction extends Action {
    public function index(){
	import('ORG.Util.Image');
    Image::buildImageVerify(4,1,'png',80,31,'code');
    }
}