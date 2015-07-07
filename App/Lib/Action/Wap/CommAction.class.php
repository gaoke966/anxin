<?php
/**
* 继承类
*/
class CommAction extends Action{
	public function _initialize(){


		$user=M('admin');
		$userinfo=$user->select();
		$info['wap_template']=$userinfo[0]['wap_template'];
		if($info['wap_template']){
			C('DEFAULT_THEME',$info['wap_template']);
			C('THEME_LIST',$info['wap_template']);
		}


		//网站基本信息变量
		//$webinfo=M('webinfo');
		//$web=M('webinfo')->select();	
		//echo C('webname');
		
		$suijiinfo = M('info')->where(array('isshow'=>'1'))->order('rand()')->select();	
		$this->assign('suijiinfo',$suijiinfo);
		$this->assign('webname',C('webname'));//网站名
		$this->assign('webkey',C('webkey'));//首页关键词
		$this->assign('webdesc',C('webdesc'));//首页描述
		$this->assign('seotitle',C('seotitle'));//首页SEO标题
		$this->assign('domain',C('weburl'));//域名
		$this->assign('beian',C('beian'));//备案信息
		$this->assign('tel',C('tel'));//电话
		$this->assign('qq',C('qq'));//QQ
		$this->assign('email',C('email'));//邮箱
		$this->assign('adress',C('adress'));//地址
		$this->assign('copyright',C('copyright'));//版权
		
		$this->assign('logo',C('logo'));//LOGO
		//分类信息		
		$url=$_GET['cateurl'];	
		//print_r($url);exit;			
		//$cateinfo=M('cate');	
		$catelist=M('cate')->where("cateurl='$url'")->find();
		//print_r($piclist);	
		$textcate=M('cate')->where('class=0')->select();
		$piccate=M('cate')->where('class=1')->select();
		$this->assign('catename',$catelist['catename']);//分类名
		$this->assign('catetitle',$catelist['catetitle']);//分类SEO标题
		$this->assign('cateurl',$catelist['cateurl']);//分类URL
		$this->assign('catekey',$catelist['catekey']);//分类关键词
		$this->assign('catedesc',$catelist['catedesc']);//分类描述
		$this->assign('catelogo',$catelist['catelogo']);//分类描述
		$this->assign('textcate',$textcate);//文字分类
		$this->assign('piccate',$piccate);//图片分类		
		$help=M('info')->where("classtitle='常见问题'")->limit(5)->select();
		$this->assign('help',$help);
		
		$recpic=M('info')->where(array('isrec'=>'1' , 'cid'=>'1' ,'isshow'=>'1'))->order('id desc')->select();	//推荐图片
		$newpic=M('info')->where(array('cid'=>'1' ,'isshow'=>'1'))->order('id desc')->select();	//最新图片
		$hotpic=M('info')->where(array('cid'=>'1' , 'isshow'=>'1'))->order('hits desc')->select();	//热门图片按点击	
		$hotrevpic=M('info')->where(array('cid'=>'1' ,'isshow'=>'1'))->order('revs desc')->select();	//热门图片按评论	
		$toppic=M('info')->where(array('istop'=>'1', 'cid'=>'1' ,'isshow'=>'1'))->order('id desc')->select();	//置顶图片
		$newinfo=M('info')->where(array('cid'=>'0' ,'isshow'=>'1'))->order('id desc')->select();	//最新信息		
		$recinfo=M('info')->where(array('isrec'=>'1' , 'cid'=>'0' , 'isshow'=>'1'))->order('id desc')->select();//推荐信息
		$topinfo=M('info')->where(array('istop'=>'1' , 'cid'=>'0' , 'isshow'=>'1'))->order('id desc')->select();//置顶信息
		$hotinfo=M('info')->where(array('cid'=>'0' , 'isshow'=>'1'))->order('hits desc')->select();	//热门信息按点击	
		$hotrevinfo=M('info')->where(array('cid'=>'0' , 'isshow'=>'1'))->order('revs desc')->select();	//热门信息按评论
		//print_r($hotrevinfo);
		$this->assign('newpic',$newpic);//最新图片	
		$this->assign('recpic',$recpic);//推荐图片	
		$this->assign('toppic',$toppic);//置顶图片列表
		$this->assign('hotpic',$hotpic);//热门图片点击列表
		$this->assign('hotrevpic',$hotrevpic);//热门图片点击列表按评论
		$this->assign('newinfo',$newinfo);//最新信息列表
		$this->assign('recinfo',$recinfo);//推荐信息列表
		$this->assign('topinfo',$topinfo);//置顶信息列表
		$this->assign('hotinfo',$hotinfo);//热门信息按点击
		$this->assign('hotrevinfo',$hotrevinfo);//热门信息按评论
		
		//单页列表
		$pagelist=M('page')->select();
		$this->assign('pagelist',$pagelist);
		
		// 友情链接
		$link=M('link')->select();
		$this->assign('link',$link);
		//最新评论
		$comment = M('comment')->order('id desc')->select();
		$this->assign('comment',$comment);
		//搜索词
		
		
		
		$hotsearch = M('search')->order('hits desc')->select();
		$this->assign("hotkey",$hotsearch);
		
			if($echoStr = $_GET["echostr"]){
				$echoStr = $_GET["echostr"];
				$signature = $_GET["signature"];
				$timestamp = $_GET["timestamp"];
				$nonce = $_GET["nonce"];					
				$token = 'diywap';
				$tmpArr = array($token, $timestamp, $nonce);
				sort($tmpArr);
				$tmpStr = implode( $tmpArr );
				$tmpStr = sha1( $tmpStr );
				//valid signature , option
				if($tmpStr == $signature){
					echo $echoStr;
					exit;
				}
			}
			
	
}


}
?>