/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.6.17 : Database - hws
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hws` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `hws`;

/*Table structure for table `hws_address` */

DROP TABLE IF EXISTS `hws_address`;

CREATE TABLE `hws_address` (
  `address_id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址ID',
  `member_id` mediumint(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `true_name` varchar(50) NOT NULL COMMENT '会员姓名',
  `area_id` mediumint(10) unsigned NOT NULL DEFAULT '0' COMMENT '地区ID',
  `city_id` mediumint(9) DEFAULT NULL COMMENT '市级ID',
  `area_info` varchar(255) NOT NULL DEFAULT '' COMMENT '地区内容',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `zip_code` char(6) DEFAULT NULL COMMENT '邮编',
  `tel_phone` varchar(20) DEFAULT NULL COMMENT '座机电话',
  `mob_phone` varchar(15) DEFAULT NULL COMMENT '手机电话',
  PRIMARY KEY (`address_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='顾客地址信息表';

/*Data for the table `hws_address` */

/*Table structure for table `hws_admin` */

DROP TABLE IF EXISTS `hws_admin`;

CREATE TABLE `hws_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `addtime` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  `logintimes` int(10) DEFAULT '1',
  `lastip` varchar(20) DEFAULT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '1',
  `style_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `UNIQUE` (`admin_name`,`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `hws_admin` */

insert  into `hws_admin`(`admin_id`,`admin_name`,`password`,`email`,`phone`,`addtime`,`updatetime`,`logintimes`,`lastip`,`status`,`style_id`) values (1,'xiaomi','$2a$13$fPCWoOuuofr3GEC1kc6MsOt7ij13BHx61Sp8XrLNHA8mFImdyRCfe','outshadow@sina.com','','1425613543','1425613543',1,'127.0.0.1',1,1),(2,'dadade','$2a$13$zlTeYO3fbJiib8tng63pm.3UMlAPN3qu4XeWKyTcdid.XIXjvu/JW','dadade@me.com','13767960832','1426064987','1426064987',1,'127.0.0.1',1,2),(11,'bbb','$2a$13$vsjsn5bHMQKRjRXkkh2r6.BdH/opxVaL5Viow8d/qAHzCs6B.XgM.','bbbedit@sina.com','13767960831','1427266290','1427269073',1,'127.0.0.1',1,4),(12,'ddd','$2a$13$DZcGBhm13IlPHztNJUVlzuv7iHY7fQOuhkNIxDzUx7rZb93Us.BuC','ddd@sina.com','','1427266300','1427266300',1,'127.0.0.1',1,5),(6,'ccc','$2a$13$lcy/A5bCJ1.wbROe2M7tBeDPwe0C6tC/YVNHPRI7QZthGn00HIWpi','ccc@sina.com','13767968039','1426840609','1427268820',1,'127.0.0.1',1,4),(10,'aaa','$2a$13$ce0H5je.KpoXcTMK2wlZquPkACzbZe00r7i1s2pmtkZnGuC8maB9a','aaa@sina.com','13767596823','1427266274','1432887169',1,'127.0.0.1',1,4),(9,'小明','$2a$13$Pd7hfBlKrZU3YaPjX0w.7e4hYwMvYpBS1g/Rbzw5RnL3rSBlEv/C.','xiaoming@me.com','13768598456','1427092617','1427092617',1,'127.0.0.1',1,1),(14,'lalalla','$2a$13$gUjLXWQaHzE/5/M5kMLLdeAqNcOsTliK/zJyGAE9psK5l7YFglq0K','wojiwf@sina.com','13767895623','1432886001','1432886001',1,'127.0.0.1',1,1),(15,'刘三','$2a$13$8r5FwrIXxY/gxBRhQCvfgOEtvYhOght0fbHoANai7XObbDCwzg4kS','liusan@qq.com','13767962356','1432887216','1432887229',1,'127.0.0.1',1,3),(16,'孙思','$2a$13$WOQrykSt6q0hvnXdLaAwnu2/qR4VfEpfIbSDxPJIu2h6RoRzx.mUu','','','1432887254','1432887254',1,'127.0.0.1',1,1),(17,'琪琪','$2a$13$pyG8wFmyeBHfgcoR6ZM6fuihr/cUKnqnOGE37IOrocPO64Slx/.jq','','','1432887547','1432887547',1,'127.0.0.1',1,3),(18,'管理员1','$2a$13$0uzSgrYBfhXEwCCsFuO5I.d4f/bYjDTKS7lo2Z68yuiktiSobDhGS','sjdfl@163.com','13767245345','1435671621','1435671621',1,'127.0.0.1',1,1);

/*Table structure for table `hws_admin_style` */

DROP TABLE IF EXISTS `hws_admin_style`;

CREATE TABLE `hws_admin_style` (
  `style_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `style_value` varchar(50) NOT NULL,
  `roles` varchar(255) NOT NULL,
  PRIMARY KEY (`style_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `hws_admin_style` */

insert  into `hws_admin_style`(`style_id`,`style_value`,`roles`) values (1,'admin','a:12:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";i:10;s:2:\"11\";i:11;s:2:\"14\";}'),(2,'editor','a:5:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"5\";i:4;s:1:\"6\";}'),(4,'service','a:5:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"5\";i:4;s:1:\"6\";}'),(3,'finance','a:4:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"8\";i:3;s:1:\"9\";}');

/*Table structure for table `hws_article` */

DROP TABLE IF EXISTS `hws_article`;

CREATE TABLE `hws_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引id',
  `ac_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `article_url` varchar(100) DEFAULT NULL COMMENT '跳转链接',
  `article_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示，0为否，1为是，默认为1',
  `article_sort` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `article_title` varchar(100) NOT NULL COMMENT '标题',
  `article_content` text COMMENT '内容',
  `article_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  PRIMARY KEY (`article_id`),
  KEY `ac_id` (`ac_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='文章表';

/*Data for the table `hws_article` */

insert  into `hws_article`(`article_id`,`ac_id`,`article_url`,`article_show`,`article_sort`,`article_title`,`article_content`,`article_time`) values (1,8,'www.baidu.com',0,255,'一季度各省份GDP出炉123','<p style=\"text-align: center; margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">sdfafasfsafsadfsdafasfsdafdsfasdfsd</p><p style=\"text-align: center; margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\"><br /></p><p style=\"text-align: center; margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\"><img src=\"../data/upload/day_150525/201505251553052651.png\" alt=\"\" /><br /></p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">人民财经从各省(市、自治区)统计局网站和万得(wind)资讯获悉，今年一季度全国31个省(市、自治区)生产总值(GDP)数据近日已全部出炉。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　从经济增速来看，重庆以10.7%的增速领跑全国，GDP增速达到两位数增速的地区仅有3个，分别是重庆10.7%，贵州10.4%，西藏10%。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　与全国一季度GDP增速7%的数据相比，18个地区GDP增速跑赢全国，增速与全国持平的有3个地区，包括北京、上海在内的10个地区GDP增速没有达到7%。而辽宁增速仅为1.9%，成为一季度全国经济增速最低的省区。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　从GDP总量来看，一季度广东省以总量1.49万亿元位列全国第一，紧随其后的为江苏省1.46万亿元，位居第三的是山东省1.29万亿元。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　<strong>东北三省经济增速走低</strong></p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　从数据上看，2014年GDP增速位列全国倒数的东北三省，2015年一季度经济增速依然未见起色。辽宁省一季度GDP增速仅1.9%，黑龙江和吉林分别为4.8%和5.8%，三省GDP增速都远低于全国。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　中央财经大学中国企业研究中心主任刘姝威认为，东北三省正处于经济转型期的阵痛期之中，大量国有大中型企业正在或者已经寻找到了新的经济增长点。而且，随着深化改革的推进、企业制度的改革以及反腐因素的影响，东北三省的经济结构正在向着好的方向发展。另外，她还提出，在东北存在着大量“小而美”的企业和青年创业者，很多新业态和小型企业并未能进入传统统计范畴，但这些新型企业也正是东北未来经济的动力和方向所在。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　<strong>长江经济带沿线保持活力</strong></p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　长江经济带沿线11个地区依然保持了较高的经济增速。重庆和贵州两地增速均超过了10%，而江苏、浙江、江西、安徽、湖北、湖南的增速也超过了8%，相对增速较小的四川和云南增速分别达到了7.4%和7.2%，超过了全国水平。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　人大重阳研究院宏观研究部主任贾晋京认为，中部各省的制造业能力某种程度上已经取代了前些年的东部沿海地区，成为新的增长极，而之后一个阶段，中西部地区将继续发挥其优势，成为国内增速最快的地区之一。东部省份则更侧重于产业升级，在高新技术领域以及第三产业中表现突出。</p>',1437636315),(4,8,'www.sina.com.cn',1,255,'测试2','<span style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"></span><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\">这样就可以过滤掉所有的html标签了。</span></p><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\"><br /></span></p><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\">如果想过滤掉除了&lt;img src=&quot;&quot;&gt;之外的所有html标签，则可以这样写：</span></p><br />',1430289514),(5,8,'www.sina.com.cn',1,255,'测试3','<span style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"></span><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\"></span></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\">参数string为要操作的字符串<br /></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\">参数start为你要截取的字符串的开始位置，若start为负数时，则表示从倒数第start开始截取length个字符<br /></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\">可选参数length为你要截取的字符串长度，若在使用时不指定则默认取到字符串结尾。若length为负数时，则表示从start开始向右截取到末尾倒数第length个字符的位置<br /></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\">起初用这个函数时可能感觉到别扭，不过你要是把PHP&nbsp;substr函数的语法搞懂了，那他的功能比asp中的left和right，有过之无不及，非常好用。下面我们举例来看他的用法:</p><br />',1430289530),(7,8,'www.sina.com.cn',1,255,'测试5','<span style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"></span><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\"></span></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\"></p><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">php</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; //构造字符串</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str = &quot;ABCDEFGHIJKLMNOPQRSTUVWXYZ&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;原字符串：</span><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;.$str.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; //按各种方式进行截取</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str1 = substr($str,5);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;从第5个字符开始取至最后：&quot;.$str1.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str2 = substr($str,9,4);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;从第9个字符开始取4个字符：&quot;.$str2.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str3 = substr($str,-5);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;取倒数5个字符：&quot;.$str3.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str4 = substr($str,-8,4);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;从倒数第8个字符开始向后取4个字符：&quot;.$str4.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str5 = substr($str,-8,-2);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;从倒数第8个字符开始取到倒数第2个字符为止：&quot;.$str5.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp;?&gt;</span><br /><br />',1430289563),(8,8,'www.sina.com.cn',1,255,'测试6','<span style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"></span><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\"></span></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\"></p><p style=\"margin: 0px 0px 29px; padding: 0px; line-height: 28px; font-family: 宋体, Arial, sans-serif; font-size: 15.9995994567871px; text-indent: 2em;\">聂树斌案申诉代理人李树亭律师称，卷宗显示此案没有任何直接人证、物证证明聂树斌实施犯罪，河北方面判决主要依据聂树斌的口供作出，但聂树斌的口供内容先后互相矛盾，包括作案时间、地点、过程、杀人手段、受害人相貌、衣物特征、抛埋衣物地点等，不能自圆其说。比如，聂树斌对案发时被害人身穿连衣裙的外观有过多种不同表述。</p><p style=\"margin: 0px 0px 29px; padding: 0px; line-height: 28px; font-family: 宋体, Arial, sans-serif; font-size: 15.9995994567871px; text-indent: 2em;\">王书金多次供述在石家庄市西郊玉米地强奸杀人的犯罪事实，王书金供述的作案时间、地点、受害人相貌、衣物特征等，均得到受害人亲属证言、现场勘查照片及玉米地主人等相关证据印证。真正的凶手更多地指向了王书金而非聂树斌，即使不能确定王书金是此案真凶，也不能确认聂树斌是真凶。</p><p style=\"margin: 0px 0px 29px; padding: 0px; line-height: 28px; font-family: 宋体, Arial, sans-serif; font-size: 15.9995994567871px; text-indent: 2em;\">李树亭称，卷宗显示，现场勘查受害人左脚西侧偏南30cm处有一串钥匙</p><br />',1430289587),(9,8,'',1,255,'fegdfgds','full(完全) 默认方式',1432540327);

/*Table structure for table `hws_article_class` */

DROP TABLE IF EXISTS `hws_article_class`;

CREATE TABLE `hws_article_class` (
  `ac_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `ac_code` varchar(20) DEFAULT NULL COMMENT '分类标识码',
  `ac_name` varchar(100) NOT NULL COMMENT '分类名称',
  `ac_parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `ac_sort` tinyint(1) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`ac_id`),
  KEY `ac_parent_id` (`ac_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

/*Data for the table `hws_article_class` */

insert  into `hws_article_class`(`ac_id`,`ac_code`,`ac_name`,`ac_parent_id`,`ac_sort`) values (7,'sysnotice','系统公告',6,255),(8,'platform','平台公告',6,255),(6,'notice','公告',0,1);

/*Table structure for table `hws_attachment` */

DROP TABLE IF EXISTS `hws_attachment`;

CREATE TABLE `hws_attachment` (
  `atta_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `related_id` int(11) unsigned DEFAULT NULL COMMENT '关联ID',
  `atta_name` varchar(100) NOT NULL COMMENT '文件名',
  `atta_thumb` varchar(100) DEFAULT NULL COMMENT '缩微图片路径',
  `atta_type` varchar(100) NOT NULL COMMENT '文件类型',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`atta_id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COMMENT='上传文件表';

/*Data for the table `hws_attachment` */

insert  into `hws_attachment`(`atta_id`,`related_id`,`atta_name`,`atta_thumb`,`atta_type`,`add_time`) values (79,NULL,'../data/upload/goods/2015/07/1438313611670.jpg','../data/upload/goods/2015/07/thumb_1438313611670.jpg','goods',1438313611),(80,NULL,'../data/upload/goods/2015/07/1438314168360.jpg','../data/upload/goods/2015/07/thumb_1438314168360.jpg','goods',1438314168),(81,NULL,'../data/upload/goods/2015/07/1438314489475.jpg','../data/upload/goods/2015/07/thumb_1438314489475.jpg','goods',1438314489),(82,NULL,'../data/upload/goods/2015/07/1438314597480.jpg','../data/upload/goods/2015/07/thumb_1438314597480.jpg','goods',1438314597),(83,NULL,'../data/upload/goods/2015/07/1438314878521.jpg','../data/upload/goods/2015/07/thumb_1438314878521.jpg','goods',1438314878),(84,NULL,'../data/upload/goods/2015/07/1438314878880.jpg','../data/upload/goods/2015/07/thumb_1438314878880.jpg','goods',1438314878),(85,NULL,'../data/upload/goods/2015/08/1439196360355.jpg','../data/upload/goods/2015/08/thumb_1439196360355.jpg','goods',1439196361),(86,NULL,'../data/upload/goods/2015/08/1439259758773.jpg','../data/upload/goods/2015/08/thumb_1439259758773.jpg','goods',1439259758),(87,NULL,'../data/upload/goods/2015/08/1439274434365.jpg','../data/upload/goods/2015/08/thumb_1439274434365.jpg','goods',1439274434),(88,NULL,'../data/upload/goods/2015/08/1439362370350.jpg','../data/upload/goods/2015/08/thumb_1439362370350.jpg','goods',1439362371),(89,NULL,'../data/upload/goods/2015/08/1439362401671.png','../data/upload/goods/2015/08/thumb_1439362401671.png','goods',1439362402),(90,NULL,'../data/upload/goods/2015/08/1439362402823.jpg','../data/upload/goods/2015/08/thumb_1439362402823.jpg','goods',1439362402),(96,NULL,'../data/upload/goods/2015/08/1439364641395.jpg','../data/upload/goods/2015/08/thumb_1439364641395.jpg','goods',1439364641),(104,18,'../data/upload/goods/2015/08/1439364641395.jpg','../data/upload/goods/2015/08/thumb_1439364641395.jpg','goods',1439365122),(105,18,'../data/upload/goods/2015/08/1439362402823.jpg','../data/upload/goods/2015/08/thumb_1439362402823.jpg','goods',1439365122),(103,18,'../data/upload/goods/2015/08/1439362401671.png','../data/upload/goods/2015/08/thumb_1439362401671.png','goods',1439365122);

/*Table structure for table `hws_goods` */

DROP TABLE IF EXISTS `hws_goods`;

CREATE TABLE `hws_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品索引id',
  `goods_name` varchar(100) NOT NULL COMMENT '商品名称',
  `gc_id` int(10) unsigned NOT NULL COMMENT '商品分类id',
  `brand_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品品牌id',
  `goods_num` int(11) DEFAULT NULL COMMENT '商品货号',
  `spec_open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品规格开启状态，1开启，0关闭',
  `attr_open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品属性开启状态，1开启，0关闭',
  `goods_image` varchar(100) NOT NULL DEFAULT '' COMMENT '商品默认封面图片',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `goods_max_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品最高价格',
  `goods_min_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品最低价格',
  `goods_storage` int(11) NOT NULL DEFAULT '999' COMMENT '商品库存',
  `goods_show` tinyint(1) NOT NULL COMMENT '商品上架',
  `goods_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品状态，1开启，0违规下架',
  `goods_recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品推荐，1推荐，0不推荐',
  `goods_add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品添加时间',
  `goods_starttime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布开始时间',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='商品表';

/*Data for the table `hws_goods` */

insert  into `hws_goods`(`goods_id`,`goods_name`,`gc_id`,`brand_id`,`goods_num`,`spec_open`,`attr_open`,`goods_image`,`goods_price`,`goods_max_price`,`goods_min_price`,`goods_storage`,`goods_show`,`goods_status`,`goods_recommend`,`goods_add_time`,`goods_starttime`) values (18,'男士T恤衫',1,6,3600012,1,1,'../data/upload/goods/2015/08/1439362401671.png','150.00','245.00','150.00',78,1,1,0,1439365122,1439365122),(2,'西瓜',8,0,100,0,0,'../data/upload/goods/2015/07/1438314878521.jpg','10.50','0.00','0.00',999,1,1,1,1438314910,1438314910),(14,'女士衬衫',1,4,360000001,1,1,'../data/upload/goods/2015/08/1439259758773.jpg','0.00','0.00','0.00',0,1,1,1,1439262959,1439262959),(16,'女士裙子',4,0,36000004,1,1,'../data/upload/goods/2015/08/1439274434365.jpg','36.00','36.00','36.00',0,0,1,1,1439274440,1439274440),(17,'女士裙子2',4,0,36000005,1,1,'../data/upload/goods/2015/08/1439274434365.jpg','34.00','48.00','34.00',138,1,1,1,1439274491,1439274491);

/*Table structure for table `hws_goods_attr` */

DROP TABLE IF EXISTS `hws_goods_attr`;

CREATE TABLE `hws_goods_attr` (
  `attr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(100) NOT NULL,
  `attr_value` varchar(255) NOT NULL,
  `attr_sort` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `hws_goods_attr` */

insert  into `hws_goods_attr`(`attr_id`,`attr_name`,`attr_value`,`attr_sort`) values (2,'衣服款式','a:5:{i:0;s:6:\"长袖\";i:1;s:6:\"短袖\";i:2;s:7:\"T恤衫\";i:3;s:6:\"衬衫\";i:4;s:6:\"卫衣\";}',NULL),(5,'衣服材质','a:4:{i:0;s:3:\"棉\";i:1;s:6:\"氨纶\";i:2;s:6:\"涤纶\";i:3;s:6:\"尼龙\";}',NULL),(6,'屏幕尺寸','a:7:{i:0;s:3:\"3.7\";i:1;s:3:\"4.0\";i:2;s:3:\"4.7\";i:3;s:3:\"5.0\";i:4;s:3:\"5.5\";i:5;s:3:\"6.0\";i:6;s:3:\"7.0\";}',NULL);

/*Table structure for table `hws_goods_attr_value` */

DROP TABLE IF EXISTS `hws_goods_attr_value`;

CREATE TABLE `hws_goods_attr_value` (
  `avalue_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) unsigned NOT NULL,
  `attr_id` int(11) unsigned NOT NULL,
  `attr_value` varchar(255) NOT NULL,
  PRIMARY KEY (`avalue_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `hws_goods_attr_value` */

insert  into `hws_goods_attr_value`(`avalue_id`,`goods_id`,`attr_id`,`attr_value`) values (2,14,2,'1'),(3,14,5,'0'),(4,15,5,'0'),(5,16,5,'0'),(6,17,5,'0'),(16,18,5,'0'),(15,18,2,'0');

/*Table structure for table `hws_goods_brand` */

DROP TABLE IF EXISTS `hws_goods_brand`;

CREATE TABLE `hws_goods_brand` (
  `brand_id` mediumint(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `brand_name` varchar(100) NOT NULL COMMENT '品牌名称',
  `brand_type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '品牌类型：0文字，1图片',
  `brand_pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `brand_sort` tinyint(3) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `UNIQUE` (`brand_name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='品牌表';

/*Data for the table `hws_goods_brand` */

insert  into `hws_goods_brand`(`brand_id`,`brand_name`,`brand_type`,`brand_pic`,`brand_sort`) values (1,'煌上煌',1,'../data/upload/file/2015/07/1437636217140.jpg',1),(2,'绿滋肴',1,'../data/upload/file/2015/07/1437469687322.jpg',1),(3,'周黑鸭',0,'',1),(4,'GXG',0,'',NULL),(5,'G2000',0,'',NULL),(6,'JACK JONES',0,'',NULL);

/*Table structure for table `hws_goods_class` */

DROP TABLE IF EXISTS `hws_goods_class`;

CREATE TABLE `hws_goods_class` (
  `gc_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `gc_name` varchar(100) NOT NULL COMMENT '分类名称',
  `type_id` int(10) unsigned NOT NULL COMMENT '类型id',
  `gc_parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `gc_sort` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `gc_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '前台显示，0为否，1为是，默认为1',
  PRIMARY KEY (`gc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

/*Data for the table `hws_goods_class` */

insert  into `hws_goods_class`(`gc_id`,`gc_name`,`type_id`,`gc_parent_id`,`gc_sort`,`gc_show`) values (1,'服装',1,0,2,1),(2,'测试',0,0,2,1),(3,'男装',1,1,0,1),(4,'女装',1,1,0,1),(5,'测试1',0,2,0,1),(7,'上衣',1,3,0,1),(8,'背心',0,7,0,1);

/*Table structure for table `hws_goods_spec` */

DROP TABLE IF EXISTS `hws_goods_spec`;

CREATE TABLE `hws_goods_spec` (
  `spec_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品规格索引id',
  `spec_name` varchar(255) NOT NULL COMMENT '规格名称',
  `spec_value` varchar(255) NOT NULL COMMENT '规格值',
  `spec_type` int(11) unsigned DEFAULT '1' COMMENT '规格类型：0系统自带，不可删除；1：用户添加，可删除',
  `spec_sort` tinyint(1) unsigned DEFAULT '1' COMMENT '规格索引',
  PRIMARY KEY (`spec_id`),
  UNIQUE KEY `UNIQUE` (`spec_name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品规格表';

/*Data for the table `hws_goods_spec` */

insert  into `hws_goods_spec`(`spec_id`,`spec_name`,`spec_value`,`spec_type`,`spec_sort`) values (1,'颜色','a:9:{i:0;s:6:\"白色\";i:1;s:6:\"黑色\";i:2;s:6:\"绿色\";i:3;s:6:\"蓝色\";i:4;s:6:\"红色\";i:5;s:6:\"黄色\";i:6;s:6:\"紫色\";i:7;s:6:\"橙色\";i:8;s:6:\"青色\";}',1,1),(6,'季节','a:4:{i:0;s:6:\"春季\";i:1;s:6:\"夏季\";i:2;s:6:\"秋季\";i:3;s:6:\"冬季\";}',1,NULL),(7,'人群','a:5:{i:0;s:6:\"婴儿\";i:1;s:6:\"幼儿\";i:2;s:6:\"儿童\";i:3;s:6:\"男装\";i:4;s:6:\"女装\";}',1,NULL);

/*Table structure for table `hws_goods_spec_value` */

DROP TABLE IF EXISTS `hws_goods_spec_value`;

CREATE TABLE `hws_goods_spec_value` (
  `svalue_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品id',
  `spec_goods_seri` text NOT NULL COMMENT '商品规格序列化',
  `spec_goods_price` decimal(10,2) NOT NULL COMMENT '规格商品价格',
  `spec_goods_storage` int(11) NOT NULL DEFAULT '999' COMMENT '规格商品库存',
  `spec_salenum` int(11) NOT NULL DEFAULT '0' COMMENT '订出数量',
  PRIMARY KEY (`svalue_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COMMENT='商品规格价格对照表';

/*Data for the table `hws_goods_spec_value` */

insert  into `hws_goods_spec_value`(`svalue_id`,`goods_id`,`spec_goods_seri`,`spec_goods_price`,`spec_goods_storage`,`spec_salenum`) values (9,14,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.1\";i:2;s:3:\"1.6\";}','52.00',120,0),(8,14,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.1\";i:2;s:3:\"1.1\";}','51.00',110,0),(7,14,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.1\";i:2;s:3:\"1.0\";}','50.00',100,0),(10,14,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.0\";i:2;s:3:\"1.0\";}','53.00',130,0),(11,14,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.0\";i:2;s:3:\"1.1\";}','54.00',140,0),(12,14,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.0\";i:2;s:3:\"1.6\";}','55.00',150,0),(13,15,'a:3:{i:0;s:3:\"7.2\";i:1;s:3:\"6.1\";i:2;s:3:\"1.3\";}','100.00',50,0),(14,15,'a:3:{i:0;s:3:\"7.2\";i:1;s:3:\"6.1\";i:2;s:3:\"1.5\";}','100.00',50,0),(15,15,'a:3:{i:0;s:3:\"7.2\";i:1;s:3:\"6.1\";i:2;s:3:\"1.6\";}','100.00',50,0),(16,15,'a:3:{i:0;s:3:\"7.1\";i:1;s:3:\"6.1\";i:2;s:3:\"1.3\";}','100.00',50,0),(17,15,'a:3:{i:0;s:3:\"7.1\";i:1;s:3:\"6.1\";i:2;s:3:\"1.5\";}','100.00',50,0),(18,15,'a:3:{i:0;s:3:\"7.1\";i:1;s:3:\"6.1\";i:2;s:3:\"1.6\";}','100.00',50,0),(19,16,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.1\";i:2;s:3:\"1.0\";}','36.00',46,0),(20,16,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.1\";i:2;s:3:\"1.1\";}','36.00',46,0),(21,16,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.1\";i:2;s:3:\"1.5\";}','36.00',46,0),(22,17,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.1\";i:2;s:3:\"1.0\";}','34.00',46,0),(23,17,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.1\";i:2;s:3:\"1.1\";}','36.00',46,0),(24,17,'a:3:{i:0;s:3:\"7.4\";i:1;s:3:\"6.1\";i:2;s:3:\"1.5\";}','48.00',46,0),(51,18,'a:3:{i:0;s:3:\"7.3\";i:1;s:3:\"6.2\";i:2;s:3:\"1.0\";}','245.00',13,0),(50,18,'a:3:{i:0;s:3:\"7.3\";i:1;s:3:\"6.2\";i:2;s:3:\"1.1\";}','230.00',12,0),(49,18,'a:3:{i:0;s:3:\"7.3\";i:1;s:3:\"6.2\";i:2;s:3:\"1.3\";}','222.00',10,0),(48,18,'a:3:{i:0;s:3:\"7.1\";i:1;s:3:\"6.2\";i:2;s:3:\"1.0\";}','178.00',15,0),(47,18,'a:3:{i:0;s:3:\"7.1\";i:1;s:3:\"6.2\";i:2;s:3:\"1.1\";}','168.00',12,0),(46,18,'a:3:{i:0;s:3:\"7.1\";i:1;s:3:\"6.2\";i:2;s:3:\"1.3\";}','150.00',16,0);

/*Table structure for table `hws_goods_type` */

DROP TABLE IF EXISTS `hws_goods_type`;

CREATE TABLE `hws_goods_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '类型id',
  `type_name` varchar(100) NOT NULL COMMENT '类型名称',
  `type_spec` varchar(255) DEFAULT NULL COMMENT '类型对应的规格',
  `type_brand` varchar(255) DEFAULT NULL COMMENT '类型对应的品牌',
  `type_attr` varchar(255) DEFAULT NULL COMMENT '类型对应的属性',
  `type_sort` tinyint(1) unsigned DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `UNIQUE` (`type_name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品类型表';

/*Data for the table `hws_goods_type` */

insert  into `hws_goods_type`(`type_id`,`type_name`,`type_spec`,`type_brand`,`type_attr`,`type_sort`) values (1,'服装','a:3:{i:0;s:1:\"1\";i:1;s:1:\"6\";i:2;s:1:\"7\";}','a:3:{i:0;s:1:\"4\";i:1;s:1:\"5\";i:2;s:1:\"6\";}','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}',1),(6,'手机','a:1:{i:0;s:1:\"1\";}','','a:1:{i:0;s:1:\"6\";}',1),(7,'aaa','a:1:{i:0;s:1:\"1\";}','','a:1:{i:0;s:1:\"6\";}',NULL);

/*Table structure for table `hws_link` */

DROP TABLE IF EXISTS `hws_link`;

CREATE TABLE `hws_link` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引id',
  `link_title` varchar(100) DEFAULT NULL COMMENT '标题',
  `link_url` varchar(100) DEFAULT NULL COMMENT '链接',
  `link_pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `link_sort` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='合作伙伴表';

/*Data for the table `hws_link` */

/*Table structure for table `hws_map` */

DROP TABLE IF EXISTS `hws_map`;

CREATE TABLE `hws_map` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '地图ID',
  `member_id` int(11) NOT NULL COMMENT '会员ID',
  `member_name` varchar(20) NOT NULL COMMENT '会员名称',
  `area_id` int(11) NOT NULL COMMENT '地区ID',
  `area_info` varchar(50) NOT NULL COMMENT '地区内容',
  `address` varchar(50) DEFAULT NULL COMMENT '地址',
  `point_lng` float NOT NULL DEFAULT '0' COMMENT '地理经度',
  `point_lat` float NOT NULL DEFAULT '0' COMMENT '地理纬度',
  `store_name` varchar(20) DEFAULT NULL COMMENT '餐厅名称',
  `store_id` int(11) DEFAULT '0' COMMENT '餐厅ID',
  `map_api` char(9) NOT NULL DEFAULT 'baidu' COMMENT '地图API(暂时只有baidu)',
  PRIMARY KEY (`map_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='地图表';

/*Data for the table `hws_map` */

/*Table structure for table `hws_member` */

DROP TABLE IF EXISTS `hws_member`;

CREATE TABLE `hws_member` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `member_name` varchar(50) NOT NULL DEFAULT '' COMMENT '会员名称',
  `member_passwd` varchar(64) NOT NULL COMMENT '会员密码',
  `member_truename` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `member_idcard` varchar(20) DEFAULT NULL COMMENT '身份证',
  `member_mobile` varchar(20) NOT NULL COMMENT '会员手机',
  `member_avatar` varchar(50) DEFAULT NULL COMMENT '会员头像',
  `member_sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '会员性别:0保密，1男，2女',
  `member_birthday` date DEFAULT NULL COMMENT '生日',
  `member_email` varchar(100) DEFAULT NULL COMMENT '会员邮箱',
  `member_login_num` int(11) unsigned DEFAULT '1' COMMENT '登录次数',
  `member_addtime` varchar(10) DEFAULT NULL COMMENT '会员注册时间',
  `member_logintime` varchar(10) DEFAULT NULL COMMENT '当前登录时间',
  `member_old_logintime` varchar(10) DEFAULT NULL COMMENT '上次登录时间',
  `member_loginip` varchar(20) DEFAULT NULL COMMENT '当前登录ip',
  `member_old_loginip` varchar(20) DEFAULT NULL COMMENT '上次登录ip',
  `member_points` int(11) NOT NULL DEFAULT '0' COMMENT '会员积分',
  `member_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员的开启状态 1为开启 0为关闭',
  `member_areaid` int(11) DEFAULT NULL COMMENT '地区ID',
  `member_cityid` int(11) DEFAULT NULL COMMENT '城市ID',
  `member_provinceid` int(11) DEFAULT NULL COMMENT '省份ID',
  `member_areainfo` varchar(255) DEFAULT NULL COMMENT '地区内容',
  `member_vip` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是vip：0不是，1是',
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `UNIQUE` (`member_name`,`member_mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员表';

/*Data for the table `hws_member` */

insert  into `hws_member`(`member_id`,`member_name`,`member_passwd`,`member_truename`,`member_idcard`,`member_mobile`,`member_avatar`,`member_sex`,`member_birthday`,`member_email`,`member_login_num`,`member_addtime`,`member_logintime`,`member_old_logintime`,`member_loginip`,`member_old_loginip`,`member_points`,`member_state`,`member_areaid`,`member_cityid`,`member_provinceid`,`member_areainfo`,`member_vip`) values (2,'xiaomi','$2a$13$EH2jR5wPh32XQrxYNhNKl.xqV5.DbMOaoW6tv7XPzmFdRq2RPD7sC','小米','37028219894567','13767960998',NULL,0,'1989-12-23','xiaomi@sina.com',1,'1435738005','1435738005','1435738005','127.0.0.1','127.0.0.1',0,1,NULL,NULL,NULL,NULL,0);

/*Table structure for table `hws_recommend` */

DROP TABLE IF EXISTS `hws_recommend`;

CREATE TABLE `hws_recommend` (
  `recommend_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `recommend_name` varchar(50) DEFAULT NULL COMMENT '名称',
  `recommend_code` varchar(255) NOT NULL COMMENT '推荐标识码',
  `recommend_desc` varchar(255) NOT NULL COMMENT '推荐描述',
  `recommend_config` varchar(255) DEFAULT NULL COMMENT '配置信息',
  PRIMARY KEY (`recommend_id`),
  UNIQUE KEY `recommend_code` (`recommend_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐类型表';

/*Data for the table `hws_recommend` */

/*Table structure for table `hws_recommend_goods` */

DROP TABLE IF EXISTS `hws_recommend_goods`;

CREATE TABLE `hws_recommend_goods` (
  `recommend_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '推荐ID',
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `sort` tinyint(1) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`recommend_id`,`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐商品表';

/*Data for the table `hws_recommend_goods` */

/*Table structure for table `hws_roles` */

DROP TABLE IF EXISTS `hws_roles`;

CREATE TABLE `hws_roles` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_value` varchar(150) NOT NULL,
  `action` varchar(765) DEFAULT NULL,
  `role_desc` varchar(765) DEFAULT NULL,
  `parent_role_id` int(11) unsigned NOT NULL,
  `related_role_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `hws_roles` */

insert  into `hws_roles`(`role_id`,`role_value`,`action`,`role_desc`,`parent_role_id`,`related_role_id`) values (1,'all','all','全部权限',0,NULL),(2,'users','','用户管理权限',1,NULL),(3,'users_list','','查看用户权限',2,NULL),(4,'users_del','','删除用户权限',2,3),(5,'users_add','','添加用户权限',2,3),(6,'users_update','','修改用户权限',2,3),(7,'users_type','','用户类型管理权限',1,NULL),(8,'users_type_list','','查看用户类型权限',7,NULL),(9,'users_type_del','','删除用户类型权限',7,8),(10,'users_type_add','','添加用户类型权限',7,8),(11,'users_type_update','','修改用户类型权限',7,8),(14,'users_type_test',NULL,'测试',7,8);

/*Table structure for table `hws_setting` */

DROP TABLE IF EXISTS `hws_setting`;

CREATE TABLE `hws_setting` (
  `setting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(50) NOT NULL,
  `setting_val` varchar(255) DEFAULT '',
  `type_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `hws_setting` */

insert  into `hws_setting`(`setting_id`,`setting_key`,`setting_val`,`type_id`) values (1,'site_logo','../data/upload/file/2015/05/1432865315972.png',1),(2,'site_name','fg3rtertegdf',1),(3,'site_phone','1376796831',1),(4,'site_email','outshadow@sina.com',1),(5,'icp_number','asfsafsdsd234',1),(6,'email_enable','1',2),(7,'email_host','smtp.163.com',2),(8,'email_port','25',2),(9,'email_addr','outshadow@163.com',2),(10,'email_user','outshadow',2),(11,'email_pass','awdcgy136!',2);

/*Table structure for table `hws_setting_type` */

DROP TABLE IF EXISTS `hws_setting_type`;

CREATE TABLE `hws_setting_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `hws_setting_type` */

insert  into `hws_setting_type`(`type_id`,`type_name`) values (1,'站点设置'),(2,'邮件设置'),(3,'SEO设置');

/*Table structure for table `hws_sms` */

DROP TABLE IF EXISTS `hws_sms`;

CREATE TABLE `hws_sms` (
  `sms_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '信息id',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `sms_type` varchar(20) NOT NULL COMMENT '发送模板类型：code(验证码), notice(充值通知), deal(消费通知)',
  `sms_status` int(2) NOT NULL COMMENT '发送状态：1为成功，0为失败',
  `sms_contents` varchar(250) NOT NULL COMMENT '信息内容',
  `sms_code` longtext COMMENT '验证码，当发送模板为code类型时使用',
  `sms_return` varchar(50) NOT NULL COMMENT '发送返回结果',
  `sms_send_time` varchar(50) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`sms_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `hws_sms` */

/*Table structure for table `hws_store` */

DROP TABLE IF EXISTS `hws_store`;

CREATE TABLE `hws_store` (
  `store_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '店铺索引id',
  `store_name` varchar(50) NOT NULL DEFAULT '' COMMENT '店铺名称',
  `store_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '店铺登录密码',
  `store_name_auth` tinyint(1) NOT NULL DEFAULT '0' COMMENT '店主认证',
  `grade_id` int(11) NOT NULL COMMENT '店铺等级',
  `store_owner_name` varchar(50) DEFAULT '' COMMENT '店主名',
  `store_owner_card` varchar(50) DEFAULT NULL COMMENT '身份证',
  `area_id` int(11) NOT NULL DEFAULT '0' COMMENT '地区id',
  `area_info` varchar(100) DEFAULT '' COMMENT '地区内容',
  `store_address` varchar(100) NOT NULL COMMENT '详细地区',
  `store_zip` varchar(10) NOT NULL COMMENT '邮政编码',
  `store_mobile` varchar(50) NOT NULL COMMENT '电话号码',
  `store_state` tinyint(1) NOT NULL DEFAULT '2' COMMENT '店铺状态，0关闭，1开启，2审核中',
  `store_close_info` varchar(255) DEFAULT NULL COMMENT '店铺关闭原因',
  `store_sort` int(11) DEFAULT '0' COMMENT '店铺排序',
  `store_time` varchar(10) NOT NULL COMMENT '店铺添加时间',
  `store_end_time` varchar(10) DEFAULT NULL COMMENT '店铺关闭时间',
  `store_logo` varchar(255) DEFAULT NULL COMMENT '店标',
  `store_workingtime` varchar(100) DEFAULT NULL COMMENT '工作时间',
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='店铺数据表';

/*Data for the table `hws_store` */

insert  into `hws_store`(`store_id`,`store_name`,`store_pass`,`store_name_auth`,`grade_id`,`store_owner_name`,`store_owner_card`,`area_id`,`area_info`,`store_address`,`store_zip`,`store_mobile`,`store_state`,`store_close_info`,`store_sort`,`store_time`,`store_end_time`,`store_logo`,`store_workingtime`) values (0,'小米的店','0192023a7bbd73250516f069df18b500',0,4,'xiaomi','370282198912282335',1,'','红谷大道111号','330000','13767960833',1,NULL,0,'1437371774',NULL,'../data/upload/file/2015/07/1437371774448.jpg',NULL),(15,'大刘的店','0192023a7bbd73250516f069df18b500',0,2,'大刘','370282198912282345',1,'','红谷大道111号','330000','13767960832',1,NULL,0,'1437371938',NULL,'../data/upload/file/2015/07/1437371938102.png',NULL);

/*Table structure for table `hws_store_grade` */

DROP TABLE IF EXISTS `hws_store_grade`;

CREATE TABLE `hws_store_grade` (
  `sg_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `sg_name` char(50) DEFAULT NULL COMMENT '等级名称',
  `sg_sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '级别，数目越大级别越高',
  PRIMARY KEY (`sg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='店铺等级表';

/*Data for the table `hws_store_grade` */

insert  into `hws_store_grade`(`sg_id`,`sg_name`,`sg_sort`) values (4,'黄金店铺',20),(2,'普通店铺',10),(3,'白银店铺',10);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
