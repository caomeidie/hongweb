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

/*Table structure for table `hws_admin` */

DROP TABLE IF EXISTS `hws_admin`;

CREATE TABLE `hws_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adminname` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `addtime` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  `logintimes` int(10) DEFAULT '1',
  `lastip` varchar(20) DEFAULT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '1',
  `style_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `hws_admin` */

insert  into `hws_admin`(`admin_id`,`adminname`,`password`,`email`,`phone`,`addtime`,`updatetime`,`logintimes`,`lastip`,`status`,`style_id`) values (1,'xiaomi','$2a$13$fPCWoOuuofr3GEC1kc6MsOt7ij13BHx61Sp8XrLNHA8mFImdyRCfe','outshadow@sina.com','','1425613543','1425613543',1,'127.0.0.1',1,1),(2,'dadade','$2a$13$zlTeYO3fbJiib8tng63pm.3UMlAPN3qu4XeWKyTcdid.XIXjvu/JW','dadade@me.com','13767960832','1426064987','1426064987',1,'127.0.0.1',1,2),(11,'bbb','$2a$13$vsjsn5bHMQKRjRXkkh2r6.BdH/opxVaL5Viow8d/qAHzCs6B.XgM.','bbbedit@sina.com','13767960831','1427266290','1427269073',1,'127.0.0.1',1,4),(12,'ddd','$2a$13$DZcGBhm13IlPHztNJUVlzuv7iHY7fQOuhkNIxDzUx7rZb93Us.BuC','ddd@sina.com','','1427266300','1427266300',1,'127.0.0.1',1,5),(6,'ccc','$2a$13$lcy/A5bCJ1.wbROe2M7tBeDPwe0C6tC/YVNHPRI7QZthGn00HIWpi','ccc@sina.com','13767968039','1426840609','1427268820',1,'127.0.0.1',1,4),(10,'aaa','$2a$13$ce0H5je.KpoXcTMK2wlZquPkACzbZe00r7i1s2pmtkZnGuC8maB9a','aaa@sina.com','13767596823','1427266274','1432887169',1,'127.0.0.1',1,4),(9,'小明','$2a$13$Pd7hfBlKrZU3YaPjX0w.7e4hYwMvYpBS1g/Rbzw5RnL3rSBlEv/C.','xiaoming@me.com','13768598456','1427092617','1427092617',1,'127.0.0.1',1,1),(14,'lalalla','$2a$13$gUjLXWQaHzE/5/M5kMLLdeAqNcOsTliK/zJyGAE9psK5l7YFglq0K','wojiwf@sina.com','13767895623','1432886001','1432886001',1,'127.0.0.1',1,1),(15,'刘三','$2a$13$8r5FwrIXxY/gxBRhQCvfgOEtvYhOght0fbHoANai7XObbDCwzg4kS','liusan@qq.com','13767962356','1432887216','1432887229',1,'127.0.0.1',1,3),(16,'孙思','$2a$13$WOQrykSt6q0hvnXdLaAwnu2/qR4VfEpfIbSDxPJIu2h6RoRzx.mUu','','','1432887254','1432887254',1,'127.0.0.1',1,1),(17,'琪琪','$2a$13$pyG8wFmyeBHfgcoR6ZM6fuihr/cUKnqnOGE37IOrocPO64Slx/.jq','','','1432887547','1432887547',1,'127.0.0.1',1,3);

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

insert  into `hws_article`(`article_id`,`ac_id`,`article_url`,`article_show`,`article_sort`,`article_title`,`article_content`,`article_time`) values (1,8,'www.baidu.com',0,255,'一季度各省份GDP出炉','<p style=\"text-align: center; margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">sdfafasfsafsadfsdafasfsdafdsfasdfsd</p><p style=\"text-align: center; margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\"><br /></p><p style=\"text-align: center; margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\"><img src=\"../data/upload/day_150525/201505251553052651.png\" alt=\"\" /><br /></p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">人民财经从各省(市、自治区)统计局网站和万得(wind)资讯获悉，今年一季度全国31个省(市、自治区)生产总值(GDP)数据近日已全部出炉。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　从经济增速来看，重庆以10.7%的增速领跑全国，GDP增速达到两位数增速的地区仅有3个，分别是重庆10.7%，贵州10.4%，西藏10%。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　与全国一季度GDP增速7%的数据相比，18个地区GDP增速跑赢全国，增速与全国持平的有3个地区，包括北京、上海在内的10个地区GDP增速没有达到7%。而辽宁增速仅为1.9%，成为一季度全国经济增速最低的省区。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　从GDP总量来看，一季度广东省以总量1.49万亿元位列全国第一，紧随其后的为江苏省1.46万亿元，位居第三的是山东省1.29万亿元。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　<strong>东北三省经济增速走低</strong></p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　从数据上看，2014年GDP增速位列全国倒数的东北三省，2015年一季度经济增速依然未见起色。辽宁省一季度GDP增速仅1.9%，黑龙江和吉林分别为4.8%和5.8%，三省GDP增速都远低于全国。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　中央财经大学中国企业研究中心主任刘姝威认为，东北三省正处于经济转型期的阵痛期之中，大量国有大中型企业正在或者已经寻找到了新的经济增长点。而且，随着深化改革的推进、企业制度的改革以及反腐因素的影响，东北三省的经济结构正在向着好的方向发展。另外，她还提出，在东北存在着大量“小而美”的企业和青年创业者，很多新业态和小型企业并未能进入传统统计范畴，但这些新型企业也正是东北未来经济的动力和方向所在。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　<strong>长江经济带沿线保持活力</strong></p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　长江经济带沿线11个地区依然保持了较高的经济增速。重庆和贵州两地增速均超过了10%，而江苏、浙江、江西、安徽、湖北、湖南的增速也超过了8%，相对增速较小的四川和云南增速分别达到了7.4%和7.2%，超过了全国水平。</p><p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; line-height: 2em; font-family: \'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;\">　　人大重阳研究院宏观研究部主任贾晋京认为，中部各省的制造业能力某种程度上已经取代了前些年的东部沿海地区，成为新的增长极，而之后一个阶段，中西部地区将继续发挥其优势，成为国内增速最快的地区之一。东部省份则更侧重于产业升级，在高新技术领域以及第三产业中表现突出。</p>',1432540398),(4,8,'www.sina.com.cn',1,255,'测试2','<span style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"></span><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\">这样就可以过滤掉所有的html标签了。</span></p><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\"><br /></span></p><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\">如果想过滤掉除了&lt;img src=&quot;&quot;&gt;之外的所有html标签，则可以这样写：</span></p><br />',1430289514),(5,8,'www.sina.com.cn',1,255,'测试3','<span style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"></span><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\"></span></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\">参数string为要操作的字符串<br /></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\">参数start为你要截取的字符串的开始位置，若start为负数时，则表示从倒数第start开始截取length个字符<br /></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\">可选参数length为你要截取的字符串长度，若在使用时不指定则默认取到字符串结尾。若length为负数时，则表示从start开始向右截取到末尾倒数第length个字符的位置<br /></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\">起初用这个函数时可能感觉到别扭，不过你要是把PHP&nbsp;substr函数的语法搞懂了，那他的功能比asp中的left和right，有过之无不及，非常好用。下面我们举例来看他的用法:</p><br />',1430289530),(7,8,'www.sina.com.cn',1,255,'测试5','<span style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"></span><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\"></span></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\"></p><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">php</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; //构造字符串</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str = &quot;ABCDEFGHIJKLMNOPQRSTUVWXYZ&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;原字符串：</span><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;.$str.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; //按各种方式进行截取</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str1 = substr($str,5);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;从第5个字符开始取至最后：&quot;.$str1.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str2 = substr($str,9,4);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;从第9个字符开始取4个字符：&quot;.$str2.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str3 = substr($str,-5);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;取倒数5个字符：&quot;.$str3.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str4 = substr($str,-8,4);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;从倒数第8个字符开始向后取4个字符：&quot;.$str4.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; $str5 = substr($str,-8,-2);</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp; echo &quot;从倒数第8个字符开始取到倒数第2个字符为止：&quot;.$str5.&quot;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&quot;;</span><br style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\" /><span style=\"font-family: 微软雅黑, Arial, sans-serif; line-height: 26px;\">&nbsp;?&gt;</span><br /><br />',1430289563),(8,8,'www.sina.com.cn',1,255,'测试6','<span style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"></span><p style=\"text-indent: 28px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px;\"><span style=\"text-indent: 0px;\"></span></p><p style=\"padding-bottom: 2px; font-size: 16px; line-height: 18px; color: rgb(51, 51, 51); font-family: \'Lucida Grande\', Verdana, Arial, \'Bitstream Vera Sans\', sans-serif, 微软雅黑;\"></p><p style=\"margin: 0px 0px 29px; padding: 0px; line-height: 28px; font-family: 宋体, Arial, sans-serif; font-size: 15.9995994567871px; text-indent: 2em;\">聂树斌案申诉代理人李树亭律师称，卷宗显示此案没有任何直接人证、物证证明聂树斌实施犯罪，河北方面判决主要依据聂树斌的口供作出，但聂树斌的口供内容先后互相矛盾，包括作案时间、地点、过程、杀人手段、受害人相貌、衣物特征、抛埋衣物地点等，不能自圆其说。比如，聂树斌对案发时被害人身穿连衣裙的外观有过多种不同表述。</p><p style=\"margin: 0px 0px 29px; padding: 0px; line-height: 28px; font-family: 宋体, Arial, sans-serif; font-size: 15.9995994567871px; text-indent: 2em;\">王书金多次供述在石家庄市西郊玉米地强奸杀人的犯罪事实，王书金供述的作案时间、地点、受害人相貌、衣物特征等，均得到受害人亲属证言、现场勘查照片及玉米地主人等相关证据印证。真正的凶手更多地指向了王书金而非聂树斌，即使不能确定王书金是此案真凶，也不能确认聂树斌是真凶。</p><p style=\"margin: 0px 0px 29px; padding: 0px; line-height: 28px; font-family: 宋体, Arial, sans-serif; font-size: 15.9995994567871px; text-indent: 2em;\">李树亭称，卷宗显示，现场勘查受害人左脚西侧偏南30cm处有一串钥匙</p><br />',1430289587),(9,8,'',1,255,'fegdfgds','full(完全) 默认方式',1432540327);

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

/*Table structure for table `hws_test` */

DROP TABLE IF EXISTS `hws_test`;

CREATE TABLE `hws_test` (
  `t_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `t_name` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `hws_test` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
