<?php 
class WeixinAction extends CommAction{


	
	
	public function index(){
					
					$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];	
					if (!empty($postStr)){                
					$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
					$fromUsername = trim($postObj->FromUserName);
					$toUsername = trim($postObj->ToUserName);
					$keyword = trim($postObj->Content);
					$image = trim($postObj->PicUrl);
					$Location_X = trim($postObj->Location_X);
					$Location_Y = trim($postObj->Location_Y);
					$Scale = trim($postObj->Scale);
					$Label = trim($postObj->Label);
					$Title = trim($postObj->Title);
					$Description = trim($postObj->Description);
					$Url = trim($postObj->Url);
					if( trim($postObj->Content)){				
					    $Msgtype = "text";					
					}
					if(trim($postObj->PicUrl)){						
						$Msgtype = "image";						
					}
					if(trim($postObj->Recognition)){						
						$Msgtype = "voice";
					}
					if(trim($postObj->ThumbMediaId)){						
						$Msgtype = "video";
					}
					if(trim($postObj->Label)){						
						$Msgtype = "location";						
					}
					if(trim($postObj->Url)){						
						$Msgtype = "link";						
					}					
					$time = trim($postObj->CreateTime);
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
				$picwall = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[你的图片已发送到微乐园的图片墙]]></Title> 
							<Description><![CDATA[进入微乐园的图片墙可以查看更多微信网友分享的图片！]]></Description>
							<PicUrl><![CDATA[".trim($postObj->PicUrl)."]]></PicUrl>
							<Url><![CDATA[http://i.diywap.cn/Weixin/picwall]]></Url>
							</item>
							</Articles>
							</xml> ";
				if($Msgtype=='image'){
					
					$wximage['image'] = $image;
					$wximage['userid'] = $fromUsername;
					$wximage['time'] = time();
					$wximage['hits'] = rand(0,999);
					$wximage['isshow'] = 0;
					$wximage['revs'] = 0;
					M('wximage')->add($wximage);
						
				}
//事件推送------------------------------------------------------------------------------------------------
				$ev = $postObj->Event;
				if($ev == "subscribe")
				{
					$event_h = M('weixin')->where("id=1")->find();
			
					if($event_h['event']==1){
						$msgType = "text";
						$contentStr = $event_h['post'];
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
						echo $resultStr;
					}
					if($event_h['event']==2){
						
						$recinfowx=M('info')->where(array('isrec'=>'1' , 'cid'=>'0' , 'isshow'=>'1'))->order('id desc')->limit($event_h['num'])->select();//推荐信息
						$newsxml = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>".$event_h['num']."</ArticleCount><Articles>%s</Articles></xml>";
						$itemxml = "";
						foreach ($recinfowx as $key => $value) {
							$itemxml .= "<item>";
							$itemxml .= "<Title><![CDATA[{$value['title']}]]></Title><Description><![CDATA[{$value['infodesc']}]]></Description><PicUrl><![CDATA[".C('weburl')."{$value['ispic']}]]></PicUrl><Url><![CDATA[".C('weburl').'/index.php?s='."{$value['url']}]]></Url>";
							$itemxml .= "</item>";
						}
						$resultStr = sprintf($newsxml, $itemxml);
						echo $resultStr;
						
					}
					if($event_h['event']==3){
							
						$topinfowx=M('info')->where(array('istop'=>'1' , 'cid'=>'0' , 'isshow'=>'1'))->order('id desc')->limit($event_h['num'])->select();//置顶信息
						$newsxml = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>".$event_h['num']."</ArticleCount><Articles>%s</Articles></xml>";
						$itemxml = "";
						foreach ($topinfowx as $key => $value) {
							$itemxml .= "<item>";
							$itemxml .= "<Title><![CDATA[{$value['title']}]]></Title><Description><![CDATA[{$value['infodesc']}]]></Description><PicUrl><![CDATA[".C('weburl')."{$value['ispic']}]]></PicUrl><Url><![CDATA[".C('weburl').'/index.php?s='."{$value['url']}]]></Url>";
							$itemxml .= "</item>";
						}
						$resultStr = sprintf($newsxml, $itemxml);
						echo $resultStr;
						
					}
					if($event_h['event']==4){
													
						$recpicwx=M('info')->where(array('isrec'=>'1' , 'cid'=>'1' ,'isshow'=>'1'))->order('id desc')->limit($event_h['num'])->select();//推荐图片
						$newsxml = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>".$event_h['num']."</ArticleCount><Articles>%s</Articles></xml>";
						$itemxml = "";
						foreach ($recpicwx as $key => $value) {
							$itemxml .= "<item>";
							$itemxml .= "<Title><![CDATA[{$value['title']}]]></Title><Description><![CDATA[{$value['infodesc']}]]></Description><PicUrl><![CDATA[".C('weburl')."{$value['ispic']}]]></PicUrl><Url><![CDATA[".C('weburl').'/index.php?s='."{$value['url']}]]></Url>";
							$itemxml .= "</item>";
						}
						$resultStr = sprintf($newsxml, $itemxml);
						echo $resultStr;
						
					}
					if($event_h['event']==5){
													
						$toppicwx=M('info')->where(array('istop'=>'1' , 'cid'=>'1' ,'isshow'=>'1'))->order('id desc')->limit($event_h['num'])->select();//置顶图片
						$newsxml = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>".$event_h['num']."</ArticleCount><Articles>%s</Articles></xml>";
						$itemxml = "";
						foreach ($toppicwx as $key => $value) {
							$itemxml .= "<item>";
							$itemxml .= "<Title><![CDATA[{$value['title']}]]></Title><Description><![CDATA[{$value['infodesc']}]]></Description><PicUrl><![CDATA[".C('weburl')."{$value['ispic']}]]></PicUrl><Url><![CDATA[".C('weburl').'/index.php?s='."{$value['url']}]]></Url>";
							$itemxml .= "</item>";
						}
						$resultStr = sprintf($newsxml, $itemxml);
						echo $resultStr;
						
					}
					
				}	

//关键字--------------------------------------------------------------------------------------------------					
				if(trim($postObj->PicUrl)){
				
					$msgType = "news";	
                	$contentStr = "";
                	$resultStr = sprintf($picwall, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				
				}
				if($keyword)
                {
					$huifu = M('weixin')->where(array('keys'=>$keyword))->find();
						
					
						if($huifu){
							if($huifu['event']==1){
								$msgType = "text";
								$contentStr = $event_h['post'];
								$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
								echo $resultStr;
							}
							if($huifu['event']==2){					
								
														
								$recinfowx=M('info')->where(array('isrec'=>'1' , 'cid'=>'0' , 'isshow'=>'1'))->order('id desc')->limit($huifu['num'])->select();//推荐信息
								$newsxml = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>".$huifu['num']."</ArticleCount><Articles>%s</Articles></xml>";
								$itemxml = "";
								foreach ($recinfowx as $key => $value) {
									$itemxml .= "<item>";
									$itemxml .= "<Title><![CDATA[{$value['title']}]]></Title><Description><![CDATA[{$value['infodesc']}]]></Description><PicUrl><![CDATA[".C('weburl')."{$value['ispic']}]]></PicUrl><Url><![CDATA[".C('weburl').'/index.php?s='."{$value['url']}]]></Url>";
									$itemxml .= "</item>";
								}
								$resultStr = sprintf($newsxml, $itemxml);
								echo $resultStr;
								
							}
							if($huifu['event']==3){
								
							
								$topinfowx=M('info')->where(array('istop'=>'1' , 'cid'=>'0' , 'isshow'=>'1'))->order('id desc')->limit($huifu['num'])->select();//置顶信息
								$newsxml = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>".$huifu['num']."</ArticleCount><Articles>%s</Articles></xml>";
								$itemxml = "";
								foreach ($topinfowx as $key => $value) {
									$itemxml .= "<item>";
									$itemxml .= "<Title><![CDATA[{$value['title']}]]></Title><Description><![CDATA[{$value['infodesc']}]]></Description><PicUrl><![CDATA[".C('weburl')."{$value['ispic']}]]></PicUrl><Url><![CDATA[".C('weburl').'/index.php?s='."{$value['url']}]]></Url>";
									$itemxml .= "</item>";
								}
								$resultStr = sprintf($newsxml, $itemxml);
								echo $resultStr;
								
							}
							if($huifu['event']==4){								
									
								$recpicwx=M('info')->where(array('isrec'=>'1' , 'cid'=>'1' ,'isshow'=>'1'))->order('id desc')->limit($huifu['num'])->select();//推荐图片
								$newsxml = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>".$huifu['num']."</ArticleCount><Articles>%s</Articles></xml>";
								$itemxml = "";
								foreach ($recpicwx as $key => $value) {
									$itemxml .= "<item>";
									$itemxml .= "<Title><![CDATA[{$value['title']}]]></Title><Description><![CDATA[{$value['infodesc']}]]></Description><PicUrl><![CDATA[".C('weburl')."{$value['ispic']}]]></PicUrl><Url><![CDATA[".C('weburl').'/index.php?s='."{$value['url']}]]></Url>";
									$itemxml .= "</item>";
								}
								$resultStr = sprintf($newsxml, $itemxml);
								echo $resultStr;
								
							}
							if($huifu['event']==5){								
															
								$toppicwx=M('info')->where(array('istop'=>'1' , 'cid'=>'1' ,'isshow'=>'1'))->order('id desc')->limit($huifu['num'])->select();//置顶图片
								$newsxml = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>".$huifu['num']."</ArticleCount><Articles>%s</Articles></xml>";
								$itemxml = "";
								foreach ($toppicwx as $key => $value) {
									$itemxml .= "<item>";
									$itemxml .= "<Title><![CDATA[{$value['title']}]]></Title><Description><![CDATA[{$value['infodesc']}]]></Description><PicUrl><![CDATA[".C('weburl')."{$value['ispic']}]]></PicUrl><Url><![CDATA[".C('weburl').'/index.php?s='."{$value['url']}]]></Url>";
									$itemxml .= "</item>";
								}
								$resultStr = sprintf($newsxml, $itemxml);
								echo $resultStr;
								
							}
								
						
						}else{
						
								//禁止缓存
								header("Expires:Mon,26Jul199705:00:00GMT");
								header("Pragma:no-cache");

								//设置编码
								header("Content-Type:text/html;charset=utf-8");

								//获取远程文件内容
								function readtemp($tempurl){
								$opts=array('http'=>array('method'=>'GET','timeout'=>500));
								$context=stream_context_create($opts);
								@$temphtml=curl_file_get_contents($tempurl,false,$context) or die("文件不存在：".$tempurl);
								return $temphtml;
								}
								//输出内容
								$str=readtemp('http://api.ajaxsns.com/api.php?key=free&appid=0&msg='.urlencode($keyword));
								$arr=json_decode($str,true);						
								$msgType = "text";
								$contentStr = str_replace('{br}','  ' ,$arr[content]);
								$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
								echo $resultStr;
						}
					
                }

        }

	}

		
		
		public function picwall(){
			
			import("ORG.Util.Page");
			$count= M('wximage')->where(array('isshow'=>'1'))->count();
			$Page= new Page($count,25);			
			$picwall=M('wximage')->where(array('isshow'=>'1'))->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();	
			//$Page->url = $_GET[cateurl];		
			$show= $Page->show();
			$this->assign("page",$show);			
			$this->assign("picwall",$picwall);
			$this->display();
		
		}
		
		
		public function picshow(){
			
			$id=$_GET['id'];
			$weixin	=	M('wximage')->where("id='$id'")->find();
			
			$after=M('wximage')->where("id<'$id' and Msgtype='image'")->order('id desc')->limit(1)->find();
			$before=M('wximage')->where("id>$id and Msgtype='image'")->order('id asc')->limit(1)->find();
			
			
			
			M('wximage')->where("id=$id")->setInc('hits');//点击加1
			
			$ipadresss = get_client_ip();//IP
			import('ORG.Net.IpLocation');// 导入IpLocation类
			$Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
			$area = $Ip->getlocation($ipadresss); // 获取某个IP地址所在的位置
		
			$commentlist=M('comment')->where("isshow='1' and url='$id'")->select();		
			$this->assign('commentlist',$commentlist);
		
			$this->assign('country',$area['country']);
			$this->assign('next',$after);
			$this->assign('prev',$before);
			$this->assign('id',$id);
			$this->assign("FromUserName",$weixin['userid']);
			$this->assign("name",$weixin['name']);
			$this->assign("image",$weixin['image']);
			$this->assign("time",date('Y-m-d H:i:s', $weixin['time']));
			$this->assign("hits",$weixin['hits']);
			$this->assign("revs",$weixin['revs']);
			$this->display();

			
		}
		public function textwall(){
			
			import("ORG.Util.Page");
			$count= M('weixin')->where(array('MsgType'=>'text'))->count();
			$Page= new Page($count,24);
			
			$picwall=M('weixin')->where(array('MsgType'=>'text'))->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();	
			//$Page->url = $_GET[cateurl];		
			$show= $Page->show();
			$this->assign("page",$show);
			
			$this->assign("picwall",$picwall);
			$this->display();
		
		}
		
		
		public function textshow(){
			
			$id=$_GET['id'];
			$weixin	=	M('weixin')->where("id='$id'")->find();
			
			$after=M('weixin')->where("id<'$id' and Msgtype='text'")->order('id desc')->limit(1)->find();
			$before=M('weixin')->where("id>$id and Msgtype='text'")->order('id asc')->limit(1)->find();
			
			
			
			M('weixin')->where("id=$id")->setInc('hits');//点击加1
			
			$ipadresss = get_client_ip();//IP
			import('ORG.Net.IpLocation');// 导入IpLocation类
			$Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
			$area = $Ip->getlocation($ipadresss); // 获取某个IP地址所在的位置
		
			$commentlist=M('comment')->where("isshow='1' and url='$id'")->select();		
			$this->assign('commentlist',$commentlist);
		
			$this->assign('country',$area['country']);
			$this->assign('next',$after);
			$this->assign('prev',$before);
			$this->assign('id',$id);
			$this->assign("FromUserName",$weixin['FromUserName']);
			$this->assign("text",$weixin['Content']);
			$this->assign("CreateTime",date('Y-m-d H:i:s', $weixin['CreateTime']));
			$this->assign("hits",$weixin['hits']);
			$this->assign("revs",$weixin['revs']);
			$this->display();

			
		}
		
		
		}
		
		
	  //	}
/*
	public function index()
	{
		$echoStr = $_GET["echostr"];
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];					
		$token = 'luojiaming';
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
*/
//}
?>