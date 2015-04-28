/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.6.17 : Database - yii
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yii` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yii`;

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引id',
  `ac_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `article_url` varchar(100) DEFAULT NULL COMMENT '跳转链接',
  `article_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示，0为否，1为是，默认为1',
  `article_sort` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `article_title` varchar(100) DEFAULT NULL COMMENT '标题',
  `article_content` text COMMENT '内容',
  `article_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  PRIMARY KEY (`article_id`),
  KEY `ac_id` (`ac_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='文章表';

/*Data for the table `article` */

/*Table structure for table `article_class` */

DROP TABLE IF EXISTS `article_class`;

CREATE TABLE `article_class` (
  `ac_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `ac_code` varchar(20) DEFAULT NULL COMMENT '分类标识码',
  `ac_name` varchar(100) NOT NULL COMMENT '分类名称',
  `ac_parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `ac_sort` tinyint(1) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`ac_id`),
  KEY `ac_parent_id` (`ac_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

/*Data for the table `article_class` */

insert  into `article_class`(`ac_id`,`ac_code`,`ac_name`,`ac_parent_id`,`ac_sort`) values (6,'notice','公告',0,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_value` varchar(150) NOT NULL,
  `action` varchar(765) DEFAULT NULL,
  `role_desc` varchar(765) DEFAULT NULL,
  `parent_role_id` int(11) unsigned NOT NULL,
  `related_role_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`role_id`,`role_value`,`action`,`role_desc`,`parent_role_id`,`related_role_id`) values (1,'all','all','全部权限',0,NULL),(2,'users','','用户管理权限',1,NULL),(3,'users_list','','查看用户权限',2,NULL),(4,'users_del','','删除用户权限',2,3),(5,'users_add','','添加用户权限',2,3),(6,'users_update','','修改用户权限',2,3),(7,'users_type','','用户类型管理权限',1,NULL),(8,'users_type_list','','查看用户类型权限',7,NULL),(9,'users_type_del','','删除用户类型权限',7,8),(10,'users_type_add','','添加用户类型权限',7,8),(11,'users_type_update','','修改用户类型权限',7,8),(14,'users_type_test',NULL,'测试',7,8);

/*Table structure for table `user_style` */

DROP TABLE IF EXISTS `user_style`;

CREATE TABLE `user_style` (
  `style_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `style_value` varchar(50) NOT NULL,
  `roles` varchar(255) NOT NULL,
  PRIMARY KEY (`style_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `user_style` */

insert  into `user_style`(`style_id`,`style_value`,`roles`) values (1,'normal','a:5:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"5\";i:4;s:1:\"6\";}'),(2,'admin','a:12:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";i:10;s:2:\"11\";i:11;s:2:\"14\";}'),(3,'vip','a:4:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"8\";i:3;s:1:\"9\";}');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `addtime` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  `logintimes` int(10) DEFAULT '1',
  `lastip` varchar(20) DEFAULT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '1',
  `style_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`password`,`email`,`phone`,`addtime`,`updatetime`,`logintimes`,`lastip`,`status`,`style_id`) values (1,'xiaomi','$2a$13$fPCWoOuuofr3GEC1kc6MsOt7ij13BHx61Sp8XrLNHA8mFImdyRCfe','outshadow@sina.com','','1425613543','1425613543',1,'127.0.0.1',1,1),(2,'dadade','$2a$13$zlTeYO3fbJiib8tng63pm.3UMlAPN3qu4XeWKyTcdid.XIXjvu/JW','dadade@me.com','13767960832','1426064987','1426064987',1,'127.0.0.1',1,2),(11,'bbb','$2a$13$vsjsn5bHMQKRjRXkkh2r6.BdH/opxVaL5Viow8d/qAHzCs6B.XgM.','bbbedit@sina.com','13767960831','1427266290','1427269073',1,'127.0.0.1',1,4),(12,'ddd','$2a$13$DZcGBhm13IlPHztNJUVlzuv7iHY7fQOuhkNIxDzUx7rZb93Us.BuC','ddd@sina.com','','1427266300','1427266300',1,'127.0.0.1',1,5),(6,'ccc','$2a$13$lcy/A5bCJ1.wbROe2M7tBeDPwe0C6tC/YVNHPRI7QZthGn00HIWpi','ccc@sina.com','13767968039','1426840609','1427268820',1,'127.0.0.1',1,4),(10,'aaa','$2a$13$ce0H5je.KpoXcTMK2wlZquPkACzbZe00r7i1s2pmtkZnGuC8maB9a','aaa@sina.com','13767596823','1427266274','1427266274',1,'127.0.0.1',1,3),(9,'小明','$2a$13$Pd7hfBlKrZU3YaPjX0w.7e4hYwMvYpBS1g/Rbzw5RnL3rSBlEv/C.','xiaoming@me.com','13768598456','1427092617','1427092617',1,'127.0.0.1',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
