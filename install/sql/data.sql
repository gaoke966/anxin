/*
MySQL Data Transfer
Source Host: localhost
Source Database: diy_free_test
Target Host: localhost
Target Database: diy_free_test
Date: 2014/5/30 10:38:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for lanrendiy_admin
-- ----------------------------
CREATE TABLE `lanrendiy_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `ip` char(15) NOT NULL,
  `logtime` varchar(255) NOT NULL,
  `wx_name` varchar(30) NOT NULL DEFAULT '',
  `wx_id` varchar(30) NOT NULL DEFAULT '',
  `wx_number` varchar(30) NOT NULL,
  `wap_template` varchar(50) NOT NULL DEFAULT '',
  `pc_template` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_book
-- ----------------------------
CREATE TABLE `lanrendiy_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_cate
-- ----------------------------
CREATE TABLE `lanrendiy_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(255) DEFAULT NULL,
  `cateurl` varchar(255) DEFAULT NULL,
  `catetitle` varchar(255) DEFAULT NULL,
  `catekey` varchar(255) DEFAULT NULL,
  `catedesc` varchar(255) DEFAULT NULL,
  `catetem` varchar(255) DEFAULT NULL,
  `catepage` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT '0',
  `catelogo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_comment
-- ----------------------------
CREATE TABLE `lanrendiy_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `homepage` varchar(255) DEFAULT NULL,
  `reply` text,
  `connent` text,
  `url` varchar(255) DEFAULT NULL,
  `isshow` int(11) DEFAULT NULL,
  `replytime` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_info
-- ----------------------------
CREATE TABLE `lanrendiy_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tags` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `classtitle` varchar(255) DEFAULT NULL,
  `cateid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `istop` int(11) NOT NULL DEFAULT '0',
  `isrec` int(11) NOT NULL DEFAULT '0',
  `isshow` int(11) NOT NULL DEFAULT '1',
  `isrev` int(11) NOT NULL DEFAULT '0',
  `infotitle` varchar(255) DEFAULT NULL,
  `infokey` varchar(255) DEFAULT NULL,
  `infodesc` varchar(255) DEFAULT NULL,
  `content` text,
  `ispic` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `revs` int(11) DEFAULT NULL,
  `hits` bigint(20) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `phoneurl` varchar(255) DEFAULT NULL,
  `pcurl` varchar(255) DEFAULT NULL,
  `infotemp` varchar(255) DEFAULT NULL,
  `custom_url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_link
-- ----------------------------
CREATE TABLE `lanrendiy_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `remak` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_page
-- ----------------------------
CREATE TABLE `lanrendiy_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `infotitle` varchar(255) DEFAULT NULL,
  `infokey` varchar(255) DEFAULT NULL,
  `infodesc` varchar(255) DEFAULT NULL,
  `content` text,
  `pcpic` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `pagetem` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `outurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_search
-- ----------------------------
CREATE TABLE `lanrendiy_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `hits` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_weixin
-- ----------------------------
CREATE TABLE `lanrendiy_weixin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(255) DEFAULT NULL,
  `event` int(255) DEFAULT '1',
  `num` int(11) DEFAULT NULL,
  `keys` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_weixin_menu
-- ----------------------------
CREATE TABLE `lanrendiy_weixin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT '100',
  `name` char(48) DEFAULT NULL,
  `type` char(20) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `text` text,
  `event` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `button` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_weixin_menu_set
-- ----------------------------
CREATE TABLE `lanrendiy_weixin_menu_set` (
  `id` int(11) NOT NULL DEFAULT '0',
  `appid` varchar(255) DEFAULT NULL,
  `secret` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lanrendiy_wximage
-- ----------------------------
CREATE TABLE `lanrendiy_wximage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT '0',
  `revs` int(11) DEFAULT '0',
  `isshow` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `lanrendiy_admin` VALUES ('1', 'hu', '18bd9197cb1d833bc352f47535c00320', '59.175.223.115', '2014-05-30 09:37:22', '', '', '', 'lanren', 'lanren');
INSERT INTO `lanrendiy_cate` VALUES ('5', '常见问题', 'cjwt', '常见问题', '常见问题', '常见问题', 'blog', '20', '1', '');
INSERT INTO `lanrendiy_comment` VALUES ('11', '湖北省武汉市', 'dfdfdf333@qq.com', '0', '3333333中国', 'fffffffffffffffffff', '/cjwt-lrDIYnjdhynxygj.html', '1', '2014-05-10 10:55:32', '2014-05-10');
INSERT INTO `lanrendiy_comment` VALUES ('12', '湖北省武汉市', 'dfdfdf333@qq.com', '0', null, 'xxxxxxxxxxxx', '/cjwt-lrDIYnjdhynxygj.html', '1', null, '2014-05-10');
INSERT INTO `lanrendiy_info` VALUES ('32', null, '懒人diy如何更换主题（并且分别更换手机主题和pc主题）', '/cjwt-lrdiyrhghztbqfbghsjzthpczt.html', '常见问题', '5', '1', '0', '0', '1', '1', '懒人diy如何更换主题（并且分别更换手机主题和pc主题）', '更换主题', '懒人diy如何更换主题（并且分别更换手机主题和pc主题）', '懒人diy如何更换主题（并且分别更换手机主题和pc主题）？<br />\r\n<p>\r\n	1、PC模板目录<br />\r\n<img src=\"Public/Uploads/image/20140519/20140519225138_57697.png\" alt=\"\" /><br />\r\n2、wap手机模板目录<br />\r\n<img src=\"Public/Uploads/image/20140519/20140519225252_59457.png\" alt=\"\" /><br />\r\n以上是模板存放路径，急切两个模板名字一定要一样；<br />\r\n然后在后台填写新模板主题<br />\r\n<img src=\"Public/Uploads/image/20140519/20140519225351_36202.jpg\" alt=\"\" /><br />\r\n后台填写主题填写最新模板名字即可。但是要两个填写一样。\r\n</p>', '/Public/Uploads/mid/m_1400655470.png', '懒人DIY', '原创', '0', '859', '2014-05-19 22:49:06', '', '', 'post', '');
INSERT INTO `lanrendiy_info` VALUES ('31', null, '懒人diy手机域名如何设置？', '/cjwt-lrdiysjymrhsz.html', '常见问题', '5', '1', '0', '0', '1', '1', '懒人diy手机域名如何设置？', '手机域名', '懒人diy手机域名如何设置？', '懒人diy手机域名如何设置？是不是要先申请域名，然后申请二级域名绑定服务器才能设置。<br />\r\n<p>\r\n	答：不需要购买域名喔，只需要在您有的域名基础上，解析一个二级域名绑定解析到懒人diy安装根目录即可。<br />\r\n备注：如果你安装懒人diy在二级目录，解析二级手机域名时候，也只需要解析绑定到根目录即可。\r\n</p>', '/Public/Uploads/mid/m_1400655485.jpg', '懒人DIY', '原创', '0', '815', '2014-05-19 22:43:34', '', '', 'post', '');
INSERT INTO `lanrendiy_info` VALUES ('29', null, '请问懒人DIY支持二级，目录使用吗？', '/cjwt-qwlrDIYzcejmlsym.html', '常见问题', '5', '1', '0', '1', '1', '1', '请问懒人DIY支持二级目录使用吗？', '懒人DIY,支持二级目录', '请问懒人DIY支持二级，目录使用吗？', '懒人diy是支持，二级目录使用的喔，而且是免费手机网站系统。希望大家喜欢！', '/Public/Uploads/mid/m_1399623557.jpg', '懒人diy', '原创', '0', '398', '2014-05-09 16:16:32', '', '', 'post', '');
INSERT INTO `lanrendiy_info` VALUES ('30', null, '懒人DIY你觉得还有那些需要改进？', '/cjwt-lrDIYnjdhynxygj.html', '常见问题', '5', '1', '0', '1', '1', '1', '懒人DIY你觉得还有那些需要改进？', '懒人DIY', '懒人DIY你觉得还有那些需要改进？', '懒人DIY你觉得还有那些需要改进？可以跟我们提出来喔！', '/Public/Uploads/mid/m_1400655499.jpg', '懒人DIY', '原创', '0', '1087', '2014-05-09 21:08:56', '', '', 'post', '');
INSERT INTO `lanrendiy_info` VALUES ('33', null, '懒人diy v3.0新功能之关注微信自动回复', '/cjwt-lrdiyv30xgnzgzwxzdhf.html', '常见问题', '5', '1', '0', '0', '1', '1', '懒人diy v3.0新功能之关注微信自动回复', '关注自动回复', '', '<img src=\"/Public/Uploads/image/20140530/20140530094906_67477.png\" alt=\"\" />', '', '懒人DIY', '原创', '0', '469', '2014-05-30 09:42:38', '', '', 'about', '');
INSERT INTO `lanrendiy_info` VALUES ('34', null, '懒人diy v3.0新功能之自定义关键词触发', '/cjwt-lrdiyv30xgnzzdygjccf.html', '常见问题', '5', '1', '0', '0', '1', '1', '懒人diy v3.0新功能之自定义关键词触发', '自定义关键词触发', '懒人diy v3.0新功能之自定义关键词触发', '<img src=\"/Public/Uploads/image/20140530/20140530095234_65796.png\" alt=\"\" />', '', '懒人DIY', '原创', '0', '988', '2014-05-30 09:51:41', '', '', 'about', '');
INSERT INTO `lanrendiy_info` VALUES ('35', null, '懒人diy v3.0新功能之新增42套手机网站模板', '/cjwt-lrdiyv30xgnzxz42tsjwzmb.html', '常见问题', '5', '1', '0', '0', '1', '1', '懒人diy v3.0新功能之新增42套手机网站模板', '手机模板', '懒人diy v3.0新功能之新增42套手机网站模板', '<img src=\"/Public/Uploads/image/20140530/20140530100526_41234.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100528_11551.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100531_59773.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100533_77662.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100534_34851.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100536_18923.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100538_13927.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100539_58578.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100552_30401.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100554_57057.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100555_81109.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100557_29476.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100558_33139.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100602_44755.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100607_55041.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100609_16053.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100611_79359.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100614_93303.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100616_64961.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530100617_23029.jpg\" alt=\"\" /><img src=\"/Public/Uploads/image/20140530/20140530101201_65621.jpg\" alt=\"\" /><br />', '', '懒人DIY', '原创', '0', '637', '2014-05-30 10:04:17', '', '', 'about', '');
INSERT INTO `lanrendiy_page` VALUES ('2', '关于我们', '关于我们', '关于我们', '关于我们', '<p style=\"color:#666666;font-family:\'Microsoft Yahei\', Verdana, Arial, Helvetica, sans-serif;\">\r\n	<br />\r\n&nbsp; &nbsp; &nbsp;仁裕元科技有限公司：专业从事高端网站建设、网站制作、网络营销、手机网站建设、微信公众平台开发等移动互联网相关业务服务，专业的开发团队，优秀的产品质量，贴心的售后服务，以服务客户为己任，为您和您的企业节省研发成本和时间。高效、快速的开发出您所需要的产品，所开发软件安全可靠，优化全面，运行流畅，帮客户实现品牌价值,达到既定的商业目标。<br />\r\n<br />\r\n团队宣言<br />\r\n我们团队有这个传说中80后的固执、叛逆与冲动。您的意见我们可能不能全盘接受，您的想法也可能会被我们否定，我们可能会犯错，我们可能冒犯到您。<br />\r\n但是请您相信，我们所做的每一分努力，都是源于对IT事业的热爱；我们的每一份坚持，最终目的都是为了作品价值得到最大的体现。<br />\r\n<br />\r\n我们可能不会妥协，直到为您找到更为出色的创意方案与解决办法。我们希望把有限的精力更多地投入到创作，能够帮助客户提升价值的优秀作品中去。<br />\r\n<br />\r\n因此我们不进行无为的低价竞争。我们相信，只有绝对的互相信任，才能创造出更好的作品，成就彼此的价值。<br />\r\n<br />\r\n&nbsp;技精求胜，聚慧存力<br />\r\n保持技术核心竞争力，汇集智慧之师，潜心专研，突破自我！<br />\r\n<br />\r\n服务至胜，方战天下<br />\r\n７*２４在线专业客服团队，全天热情，周到，贴心服务<br />\r\n<br />\r\n汇：专业团队精英<br />\r\n专业技术核心团队、专业商务营销顾问<br />\r\n<br />\r\n武汉仁裕元科技有限公司<br />\r\n<br />\r\n公司地址：湖北省武汉市武昌区紫阳东路东路77号<br />\r\n<br />\r\n邮编：430100<br />\r\n<br />\r\n全国统一服务热线：18164081140<br />\r\n<br />\r\n电子邮箱：524076166@qq.com\r\n</p>\r\n<div>\r\n	<br />\r\n</div>\r\n<p>\r\n	<br />\r\n</p>', '', '懒人DIY', '3171', '2013-12-26 23:23:40', 'about', '/page-gywm.html', '');
INSERT INTO `lanrendiy_page` VALUES ('6', '公司优势', '公司优势', '公司优势', '公司优势', '完整八大网络营销专业团队配合<br />\r\n①策划部：思想来自[策划部]，以客户为本，调研策划为网站整体建设运营提纲制领②设计部： 创意延展自[设计部]点线面红黄蓝，静止视觉动态效果，用无限思维呈现有限空间 技术部： 致心研发的[技术部]以客户需求为导向，用专业的心，制作程序必达③研发部： 理想是力量，意志是力量，知识是力量。④网络部： 远眺于际的[网络部]注册域名，搭建服务器空间、畅行e世界⑤营销部： 合作是[维护部]的精髓所在，维护签约网站，优化网站内容，运用SEO技术、软文推广等为企业带来大量价值客户⑥运营部： 力行而为 [运营部] 深知好的团队不仅是最专业的亦是最敬业的，合力而行更是企业的前行动力⑦客服部： 用心来自[客服部]面对所有客户的无限协作，旨在达成客户所愿，您的微笑，是我们最大收获。⑧商务部： 通洽源于[商务部] 拓展公司建站客户，以客户为导向，为客户取得最高价值提供最适合产品。<br />\r\n<br />\r\n零风险客户合作模式<br />\r\n率先推出 零风险客户合作模式 ，侧重以结果为服务导向。我们不青睐于向您虚夸我们的设计能力，如果为您量身设计的作品让您满意，我们有理由相信合作的基础会更加夯实。这也是德迅科技实力和自信的最佳体现。我们承诺：让您只为满意的服务成果买单。<br />\r\n<br />\r\n精于设计，但不仅仅只是设计<br />\r\n自公司创立以来，始终坚持设计至上的发展方向。我们认为设计不仅仅只是满足于视觉上的审美依赖，更多对于传播与营销的思考，设计应是有目的的创作行为，只有目的性清晰的设计，才能使设计获得成功。我们精于设计，但更擅长于您的品牌传播之道。<br />\r\n<br />\r\n以传播为核心，做有价值的网络服务<br />\r\n我们的网站建设业务，以 传播 为核心，无论是整体架构策划与视觉设计均以此为依据。我们不想让您的网站淹没于浩瀚的网海里，处于守株待兔的被动阅读地位。我们建立科学专业的网站传播计划，以网络传播为起点，为您提供最有价值的网络服务。<br />\r\n<br />\r\n拥有完善的项目管理标准及服务流程体系<br />\r\n建立了先进的项目管理标准及服务流程体系，并不断的认真总结经验，导入到管理执行标准之中。我们深知规范化的服务标准对客户有多重要，使得项目成果更加成功，并节约大量的宝贵时间。与和君设计合作过的客户对此感受颇深，至少他们的选择能说明这个问题。<br />\r\n<br />\r\n卓越的业界资源整合能力<br />\r\n与徐悲鸿艺术学院、北大青鸟、沃伦学院等专业院校人才机构建立长期的顾问合作关系、并与百度、新浪网、万网、腾讯、优酷、UEC数据提供商达成多年的战略合作伙伴关系，形成结构互补、实践互补的组合优势，和传播资源整合群。使得我们能轻而易举地满足客户的各种服务需求。<br />', '', '懒人DIY', '4495', '2014-05-17 14:47:29', 'about', '/page-gsys.html', '');
INSERT INTO `lanrendiy_page` VALUES ('7', '设计理念', '设计理念', '设计理念', '设计理念', '“创造一流的设计”是仁裕元公司不倦追求的目标，创造性的设计更是理想公司的生命线。仁裕元公司坚信创造创新是设计的灵魂，历来拒绝生产流水线作品！我们追求大气、简约的国际化设计风格，我们设计真正有生命力、有灵魂、能百年传承的艺术精品，致力于以专业的服务为客户创造更大的价值，实现和客户的共赢发展！<br />\r\n&nbsp;<br />\r\n理想观点<br />\r\n优秀的人才和配合默契的团队是我们成功的基石！<br />\r\n理想定位 － 中国设计先行者、领跑者。<br />\r\n理想目标 － 为塑造国际品牌而奋斗。<br />\r\n设计观 － 用作品说话，让创意闪光！<br />\r\n质量观 － 态度决定一切，在我手中不出错。<br />\r\n工作观 － 莫以善小而不为，莫以事小而马虎。<br />\r\n合作观 － 五只手指有长短，互助合作效率高。<br />\r\n人生观 － 好作品是个人品牌的储蓄卡。<br />\r\n&nbsp;<br />\r\n我们是顾问，是参谋，我们将阶段性地帮助客户建立和改善形象，为客户的成长提供意见和帮助。<br />\r\n诚信是我们的原则，利润不是我们追逐的唯一目标。<br />\r\n设计需要细致的观察和缜密的思考。<br />\r\n为数百家客户服务的经验，知名大型企业对我们的认可，是理想走到今天的基础。<br />\r\n优秀的人才和配合默契的团队是我们成功的基石。<br />\r\n我们重视设计创作中的灵感，这好比葡萄园重视阳光、空气、土壤、水一样，期望出色的创意能为客户培育出好的果实！<br />', '', '懒人DIY', '8559', '2014-05-17 14:52:10', 'about', '/page-sjln.html', '');
INSERT INTO `lanrendiy_page` VALUES ('8', '加入仁裕元', '加入仁裕元', '加入仁裕元', '加入仁裕元', '加入仁裕元<br />\r\n仁裕元需要的是一群有创业梦想的合伙人<br />\r\n共用仁裕元平台，整合，共享，发展<br />\r\n仁裕元之员工梦想<br />\r\n员工的梦想就是仁裕元的梦想<br />\r\n事业为梦——让仁裕元战士实现自我价值<br />\r\n家庭为想——让仁裕元家人实现幸福生活<br />\r\n职业发展<br />\r\n为了仁裕元共同的企业目标\"共建平台，共享事业，共赢未来\"，<br />\r\n我们采取双通道的职业发展模式，每个员工即可按照技术通道<br />\r\n设计自己的职业发展规划，也可按业务通道设计自己的职业发<br />\r\n展规划，走向仁裕元合伙人模式，共同携手创造未来财富。<br />\r\n欢迎你加盟仁裕元，一起实现自己的梦想！<br />', '', '懒人DIY', '2007', '2014-05-17 14:59:16', 'about', '/page-jrryy.html', '');
INSERT INTO `lanrendiy_page` VALUES ('9', '联系我们', '联系我们', '联系我们', '联系我们', '公司总部<br />\r\n总部地址：湖北省武汉市武昌区紫阳东路东路77号（伟鹏大厦5层14号）<br />\r\n业务热线：18164081140<br />\r\n技术热线：15071323282<br />\r\n电子邮箱：524076166@qq.com<br />\r\n官 网：http://www.ryynet.com<br />\r\n邮　　编：430100<br />', '', '懒人DIY', '8885', '2014-05-17 14:59:52', 'about', '/page-lxwm.html', '');
INSERT INTO `lanrendiy_page` VALUES ('10', '仁裕元梦', '仁裕元梦', '仁裕元梦', '仁裕元梦', '仁裕元梦<br />\r\n——缔造一个员工幸福、客户满意的服务平台&nbsp;<br />\r\n员工与客户构成培育联科的沃壤<br />\r\n每一刻思考、每一轮合作、每一次交流、每一个要求......<br />\r\n都因全心全意的投入而勾勒出成长的轮廓<br />\r\n也因此<br />\r\n我们坚信：不久的将来，我们必将立木成林<br />\r\n<br />\r\n仁裕元之员工梦想<br />\r\n事业为梦——让仁裕元战士实现自我价值<br />\r\n家庭为想——让仁裕元家人实现幸福生活<br />\r\n<br />\r\n仁裕元人才观<br />\r\n我们是经营未来的人<br />\r\n我们努力耕耘<br />\r\n每一份汗水都在为未来去累积经验和能力<br />\r\n我们不会只坐着去羡慕那些已经成功的人<br />\r\n而是一步一步以团结的行动去赢得未来<br />\r\n成功如同登山，在路上总会遇到山间云雾<br />\r\n当我们爬到山顶，才发现雾只是我们脚底下的一道风景<br />\r\n我们现在的辛苦付出，是因为我们是经营未来的人<br />', '', '懒人DIY', '9233', '2014-05-17 15:03:24', 'about', '/page-ryym.html', '');
INSERT INTO `lanrendiy_weixin` VALUES ('1', '感谢大家一直以来对我们懒人模板、懒人diy、微懒人关注与支持！', '1', '4', '');
INSERT INTO `lanrendiy_weixin` VALUES ('5', '', '4', '1', '中');
INSERT INTO `lanrendiy_weixin` VALUES ('12', '', '2', '1', '推荐信息');
INSERT INTO `lanrendiy_weixin` VALUES ('16', 'http://www.ryynet.com', '10', null, '首页dddd');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('24', '0', '1', '网站分类', '', '', '', null, null, '1');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('25', '24', '10', '亲子乐园', 'view', 'http://diy.lanrenmb.com', null, null, null, '0');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('26', '24', '2', '趣味测试', 'view', 'http://diy.lanrenmb.com', null, null, null, '0');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('27', '24', '3', '经典语录', 'view', 'http://diy.lanrenmb.com', null, null, null, '0');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('28', '24', '4', '健康养生', 'view', 'http://diy.lanrenmb.com', null, null, null, '0');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('29', '24', '5', '热门专题', 'view', 'http://diy.lanrenmb.com', null, null, null, '0');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('30', '0', '2', '娱乐功能', '', '', '', null, null, '1');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('31', '30', '100', '今日运势', 'view', 'http://diy.lanrenmb.com', null, null, null, '0');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('32', '30', '100', '微信图片墙', 'view', 'http://diy.lanrenmb.com', null, null, null, '0');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('33', '0', '100', '随机内容', 'click', null, null, '6', '5', '0');
INSERT INTO `lanrendiy_weixin_menu` VALUES ('34', '30', '100', '赞一下', 'click', null, '就知道赞，赞能干吗', null, null, '0');
INSERT INTO `lanrendiy_weixin_menu_set` VALUES ('1', 'wxb483ac6793442c70', '054f5b3d106ec8cdd6bb2cd2f1227342');
