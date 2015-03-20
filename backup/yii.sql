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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`role_id`,`role_value`,`action`,`role_desc`,`parent_role_id`,`related_role_id`) values (1,'all','all','全部权限',0,NULL),(2,'users','','用户管理权限',1,NULL),(3,'users_list','','查看用户权限',2,NULL),(4,'users_del','','删除用户权限',2,3),(5,'users_add','','添加用户权限',2,3),(6,'users_update','','修改用户权限',2,3),(7,'users_type','','用户类型管理权限',2,NULL),(8,'users_type_list','','查看用户类型权限',7,NULL),(9,'users_type_del','','删除用户类型权限',7,8),(10,'users_type_add','','添加用户类型权限',7,8),(11,'users_type_update','','修改用户类型权限',7,8);

/*Table structure for table `user_style` */

DROP TABLE IF EXISTS `user_style`;

CREATE TABLE `user_style` (
  `style_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `style_value` varchar(50) NOT NULL,
  `roles` varchar(255) NOT NULL,
  PRIMARY KEY (`style_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `user_style` */

insert  into `user_style`(`style_id`,`style_value`,`roles`) values (1,'admin','1'),(2,'user_editor','2');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`password`,`email`,`phone`,`addtime`,`updatetime`,`logintimes`,`lastip`,`status`,`style_id`) values (1,'xiaomi','$2a$13$fPCWoOuuofr3GEC1kc6MsOt7ij13BHx61Sp8XrLNHA8mFImdyRCfe','outshadow@sina.com','','1425613543','1425613543',1,'127.0.0.1',1,1),(2,'dadade','$2a$13$zlTeYO3fbJiib8tng63pm.3UMlAPN3qu4XeWKyTcdid.XIXjvu/JW','dadade@me.com','13767960832','1426064987','1426064987',1,'127.0.0.1',1,2),(3,'xiaoxiao','$2a$13$aa66HfmjOTGSS7Iq0fGwcettO/DIehEx5raQtw/rFGSuuqtlo9DnS','xiaoxiao@sina.com','13767960831','1426211500','1426211500',1,'127.0.0.1',1,1),(4,'aaa','$2a$13$br9I2BO1MbFiUW9cCCGpte/N/MfTADYGLgexB5eU6rX0lX5UxtMVm','aaa@sina.com','13769685623','1426831986','1426831986',1,'127.0.0.1',1,1),(5,'bbb','$2a$13$RHZnfxmxN2jYsBoam5yEOetbOV/vsvYTnle6wHbQwSmePGF8lc9Im','bbb@sina.com','13767596823','1426832177','1426832177',1,'127.0.0.1',1,1),(6,'ccc','$2a$13$lcy/A5bCJ1.wbROe2M7tBeDPwe0C6tC/YVNHPRI7QZthGn00HIWpi','ccc@sina.com','13767968039','1426840609','1426840609',1,'127.0.0.1',1,1),(7,'ddd','$2a$13$lGQ/JC.e2B6OMATmelxHvuSNnan1XhF3qRXaBt7PLb8HqWE8K4Nhy','ddd@sina.com','13767968031','1426840653','1426840653',1,'127.0.0.1',1,1),(8,'eee','$2a$13$wCcnt3jLVT4hJd8ZiwYEAOJn8fCOGcOH9K8bC2hTCEt4oHHKQaPWy','eee@sina.com','13767596828','1426841122','1426841122',1,'127.0.0.1',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
