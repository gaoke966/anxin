<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>


<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->


<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->


<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->


   <head>


      <meta charset="utf-8">


      <title><?php echo ($seotitle); ?>-<?php echo ($webname); ?></title>


      <meta name="description" content="<?php echo ($webdesc); ?>">


      <meta name="keywords" content="<?php echo ($webkey); ?>">


      <!-- Mobile Metas -->


      <meta name="viewport" content="width=device-width, initial-scale=1.0">


            <!-- Google Fonts  -->      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>      <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>      <!-- Library CSS -->      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/bootstrap.css">      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/fonts/font-awesome/css/font-awesome.css">      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/animations.css" media="screen">      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/superfish.css" media="screen">      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/revolution-slider/css/settings.css" media="screen">      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/prettyPhoto.css" media="screen">      <!-- Theme CSS -->      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/style.css">      <!-- Skin -->      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/colors/blue.css" id="colors">      <!-- Responsive CSS -->      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/theme-responsive.css">      <!-- Switcher CSS -->     <link href="__ROOT__/App/Tpl/Home/lanren/css/switcher.css" rel="stylesheet">     <link href="__ROOT__/App/Tpl/Home/lanren/css/spectrum.css" rel="stylesheet">      <!-- Favicons -->      <link rel="shortcut icon" href="http://xinghuo.yixin.com/images/favicon.ico"/>      <link rel="apple-touch-icon" href="__ROOT__/App/Tpl/Home/lanren/img/ico/apple-touch-icon.png">      <link rel="apple-touch-icon" sizes="72x72" href="__ROOT__/App/Tpl/Home/lanren/img/ico/apple-touch-icon-72.png">      <link rel="apple-touch-icon" sizes="114x114" href="__ROOT__/App/Tpl/Home/lanren/img/ico/apple-touch-icon-114.png">      <link rel="apple-touch-icon" sizes="144x144" href="__ROOT__/App/Tpl/Home/lanren/img/ico/apple-touch-icon-144.png">      <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->      <!--[if lt IE 9]>      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>      <script src="__ROOT__/App/Tpl/Home/lanren/js/respond.min.js"></script>      <![endif]-->      <!--[if IE]>      <link rel="stylesheet" href="__ROOT__/App/Tpl/Home/lanren/css/ie.css">      <![endif]-->

 
      <link rel="stylesheet" href="/xinghuo_files/shopTemplate.css">

   </head>


   <body class="home">


      


         <SCRIPT LANGUAGE="JavaScript">



function mobile_device_detect(url)

{



        var thisOS=navigator.platform;



        var os=new Array("iPhone","iPod","iPad","android","Nokia","SymbianOS","Symbian","Windows Phone","Phone","Linux armv71","MAUI","UNTRUSTED/1.0","Windows CE","BlackBerry","IEMobile");



	for(var i=0;i<os.length;i++)

        {



	if(thisOS.match(os[i]))

        {			

		window.location=url; 

	}

		

	}





	//因为相当部分的手机系统不知道信息,这里是做临时性特殊辨认

	if(navigator.platform.indexOf('iPad') != -1)

        {

		window.location=url;

	}



	//做这一部分是因为Android手机的内核也是Linux 

	//但是navigator.platform显示信息不尽相同情况繁多,因此从浏览器下手，即用navigator.appVersion信息做判断

	 var check = navigator.appVersion;



	 if( check.match(/linux/i) )

          {

		 //X11是UC浏览器的平台 ，如果有其他特殊浏览器也可以附加上条件

		 if(check.match(/mobile/i) || check.match(/X11/i)) 

                 { 

			window.location=url;

		 }   

	}



	//类in_array函数

	Array.prototype.in_array = function(e)

	{ 

		for(i=0;i<this.length;i++)

		{

			if(this[i] == e)

			return true;

		}

		return false;

	}

}


<?php
 $aa = C("APP_SUB_DOMAIN_RULES"); $domain = ''; $aa = array_keys($aa); if(is_array($aa)){ $wap = $aa[0]; $domain = preg_replace('/([^\.]+)\.(.+)/i', $wap.".$2", $_SERVER['SERVER_NAME']); echo 'mobile_device_detect("http://'.$domain.'");'; } ?>






</SCRIPT>



<div class="wrap">

         <!-- Header Start -->

         <header id="header">

            <!-- Header Top Bar Start -->

            <div class="top-bar">

               <div class="slidedown collapse">

                  <div class="container">

                     <div class="phone-email pull-left">

                        <a><i class="icon-volume-up icon-2x"></i> 欢迎来到<?php echo ($webname); ?>!</a>


                     </div>

                     <div class="pull-right">

                        <ul class="social pull-left">

                          <div class="bdsharebuttonbox"><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_mshare" data-cmd="mshare" title="分享到一键分享"></a><a href="#" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a></div>

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

                        </ul>

                       

                     </div>

                  </div>

               </div>

            </div>

            <!-- Header Top Bar End -->

           
               </div>

            </div>

            <!-- Main Header End -->

         </header>





         <!-- Header End --> 


         <!-- Content Start -->


         <div id="main">


   

            <!-- Latest Posts start --> 


            <div class="latest-posts">


               <div class="container">

                      <div class="row">
            

<div class="divider"></div>

<h1 class="title">宜信星火 优质债权产品</h3>

                        
 <!-- Product -->    
        <div class="shopTemp_border">
            <div class="container">
                <ul class="PM_product">
                    <li class="clear">
                        <label class="tit1">服务名称<i class="bo1"></i></label>
                        <label class="tit2"><b class="ic1"></b>预期年化收益率<i class="bo2"></i></label>
                        <label class="tit3"><b class="ic2"></b>到期日<i class="bo3"></i></label>
                        <label class="tit4"><b class="ic3"></b>起投金额<i class="bo4"></i></label>
                        <label class="tit5"><i class="bo5"></i></label>
                    </li>
                  <div id="listBody">
 <li class="clear">
                            <i class="pc1" title="">
                                     <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733555/2015-07-24/15074124/1" target="_blank">
                                        新手专享
                                     </a>
                            </i>
                            <i class="pc2">
                              8.80%
                           
                            </i>
                            <i class="pc3">2015 /07 /24</i>
                            <i class="pc4">1,000</i>
                            <!--
                            <i class="pc4">1000-200000</i>-->
                            <i class="pc5">
                                    <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733555/2015-07-24/15074124/1" target="_blank" class="circular_4 btn">立即购买</a>
                            </i>
                        </li>
                        <li class="clear">
                            <i class="pc1" title="">
                                     <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733807/2015-08-10/15084480/1" target="_blank">
                                        缤纷夏日 
                                     </a>
                            </i>
                            <i class="pc2">
                               6.00%
                           
                            </i>
                            <i class="pc3">2015 /08 /10</i>
                            <i class="pc4">1,000</i>
                            <!--
                            <i class="pc4">1000-500000</i>-->
                            <i class="pc5">
                                    <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733807/2015-08-10/15084480/1" target="_blank" class="circular_4 btn">立即购买</a>
                            </i>
                        </li>
                        <li class="clear">
                            <i class="pc1" title="">
                                     <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733811/2016-07-11/16074485/1" target="_blank">
                                        星火燎原D005 
                                     </a>
                            </i>
                            <i class="pc2">
                               10.00%
                           
                            </i>
                            <i class="pc3">2016 /07 /11</i>
                            <i class="pc4">1,000</i>
                            <!--
                            <i class="pc4">1000-500000</i>-->
                            <i class="pc5">
                                    <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733811/2016-07-11/16074485/1" target="_blank" class="circular_4 btn">立即购买</a>
                            </i>
                        </li>
                        <li class="clear">
                            <i class="pc1" title="">
                                     <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733810/2016-03-31/16034484/1" target="_blank">
                                        星火燎原C005 
                                     </a>
                            </i>
                            <i class="pc2">
                               9.00%
                           
                            </i>
                            <i class="pc3">2016 /03 /31</i>
                            <i class="pc4">1,000</i>
                            <!--
                            <i class="pc4">1000-500000</i>-->
                            <i class="pc5">
                                    <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733810/2016-03-31/16034484/1" target="_blank" class="circular_4 btn">立即购买</a>
                            </i>
                        </li>
                        <li class="clear">
                            <i class="pc1" title="">
                                     <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733809/2016-01-04/16014483/1" target="_blank">
                                        星火燎原B005 
                                     </a>
                            </i>
                            <i class="pc2">
                               8.00%
                           
                            </i>
                            <i class="pc3">2016 /01 /04</i>
                            <i class="pc4">1,000</i>
                            <!--
                            <i class="pc4">1000-500000</i>-->
                            <i class="pc5">
                                    <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733809/2016-01-04/16014483/1" target="_blank" class="circular_4 btn">立即购买</a>
                            </i>
                        </li>
                        <li class="clear">
                            <i class="pc1" title="">
                                     <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733808/2015-10-09/15104482/1" target="_blank">
                                        星火燎原A005 
                                     </a>
                            </i>
                            <i class="pc2">
                               7.00%
                           
                            </i>
                            <i class="pc3">2015 /10 /09</i>
                            <i class="pc4">1,000</i>
                            <!--
                            <i class="pc4">1000-500000</i>-->
                            <i class="pc5">
                                    <a href="http://xinghuo.yixin.com/product/dm/Ng%3D%3D/11733808/2015-10-09/15104482/1" target="_blank" class="circular_4 btn">立即购买</a>
                            </i>
                        </li>
                    </div>

                </ul>
                
                
            </div>
        </div>




                     <div class="clearfix"></div>


                     <div class="blog-showcase col-lg-12 col-md-12 col-sm-12 col-xs-12 animate_afb d1">


                        <ul>











<?php if(is_array($newpic)): $i = 0; $__LIST__ = array_slice($newpic,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$help): $mod = ($i % 2 );++$i;?><li class="">


                              <div class="blog-showcase-thumb col-lg-4">


                                 <div class="post-body">


                                    <a class="post-item-link" href="<?php echo ($help["ispic"]); ?>" data-rel="prettyPhoto" width="257px"  height="193px" ><span class="post-item-hover"></span><span class="fullscreen"><i class="icon-search"></i></span><img alt="" src="<?php echo ($help["ispic"]); ?>" width="257px"  height="193px"></a>


                                 </div>


                              </div>


                              <div class="blog-showcase-extra-info col-lg-4">


                                 <span><a href="__GROUP__<?php echo ($help["url"]); ?>"><?php echo ($help["time"]); ?></a></span>


                                 <h4><a href="__GROUP__<?php echo ($help["url"]); ?>" class="title"><?php echo ($help["title"]); ?></a></h4>


                                 <p><?php echo ($help["infodesc"]); ?></p>


                                 <a href="__GROUP__<?php echo ($help["url"]); ?>">Read more <i class="icon-double-angle-right"></i></a>


                              </div>


                           </li><?php endforeach; endif; else: echo "" ;endif; ?>


















                        </ul>


                        <div class="clearfix"></div>


                     </div>


                  </div>


                  <div class="divider"></div>


               </div>


            </div>


           


         </div>


         <!-- Content End -->


         





<!-- Footer Start -->
         <footer id="footer">
            <!-- Footer Top Start -->
            <div class="footer-top">
               <div class="container">
                  <div class="row">
                     <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-one">
                        <h3>关于</h3>
                        <p> 
                           <?php echo ($webdesc); ?>
                        </p>
                     </section>
                     <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-two">
                        <h3>重要声明 </h3>

  <p> <?php echo ($copyright); ?>  </p>

                     </section>
                     <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-three">
                        <h3>联系我们</h3>
                        <ul class="contact-us">
                           <li>
                              <i class="icon-map-marker"></i>
                              <p> 
                                 <strong>地址:</strong> <?php echo ($adress); ?>
                              </p>
                           </li>
                           <li>
                              <i class="icon-phone"></i>
                              <p><strong>电话:</strong> <?php echo ($tel); ?></p>
                           </li>
                           <li>
                              <i class="icon-envelope"></i>
                              <p><strong>Email:</strong><a href="mailto:<?php echo ($email); ?>"><?php echo ($email); ?></a></p>
                           </li>
                        </ul>
                     </section>
                     <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-four">
                        <h3>在线支持</h3>
                        <ul  class="thumbs">
						

<li>服务咨询：<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=582325688&amp;site=qq&amp;menu=yes" target="_blank" class="a2"><img border="0" src="http://wpa.qq.com/pa?p=2:1330407081:46" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></li>
						
						
						</ul>
                     </section>
                  </div>
               </div>
            </div>
            <!-- Footer Top End --> 
  <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?29f64c718bbcec009e9c852b9838fdd2";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

         </footer>


		


         <!-- Scroll To Top --> 


         <a href="#" class="scrollup"><i class="icon-angle-up"></i></a>


      </div>


          <!-- The Scripts -->


      <script src="/App/Tpl/Home/lanren/js/jquery.min.js"></script>


      <script src="/App/Tpl/Home/lanren/js/bootstrap.js"></script>


      <script src="/App/Tpl/Home/lanren/js/jquery.parallax.js"></script> 


      <script src="/App/Tpl/Home/lanren/js/modernizr-2.6.2.min.js"></script> 


      <script src="/App/Tpl/Home/lanren/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>


      <script src="/App/Tpl/Home/lanren/js/jquery.nivo.slider.pack.js"></script>


      <script src="/App/Tpl/Home/lanren/js/jquery.prettyPhoto.js"></script>


      <script src="/App/Tpl/Home/lanren/js/superfish.js"></script>


      <script src="/App/Tpl/Home/lanren/js/tytabs.js"></script>


      <script src="/App/Tpl/Home/lanren/js/jquery.gmap.min.js"></script>


      <script src="/App/Tpl/Home/lanren/js/circularnav.js"></script>


      <script src="/App/Tpl/Home/lanren/js/jquery.sticky.js"></script>


      <script src="/App/Tpl/Home/lanren/js/jflickrfeed.js"></script>


      <script src="/App/Tpl/Home/lanren/js/imagesloaded.pkgd.min.js"></script>


      <script src="/App/Tpl/Home/lanren/js/waypoints.min.js"></script>


      <script src="/App/Tpl/Home/lanren/js/spectrum.js"></script>


      <script src="/App/Tpl/Home/lanren/js/switcher.js"></script>


      <script src="/App/Tpl/Home/lanren/js/custom.js"></script>





</body>


</html>