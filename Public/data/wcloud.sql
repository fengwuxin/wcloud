/*
SQLyog 企业版 - MySQL GUI v7.14 
MySQL - 5.6.14 : Database - wcloud
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `pre_blog` */

DROP TABLE IF EXISTS `pre_blog`;

CREATE TABLE `pre_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `article` text NOT NULL,
  `uid` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1-技术 2-生活 3-旅行',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pre_blog` */

insert  into `pre_blog`(`id`,`title`,`article`,`uid`,`type`,`time`) values (1,'用一生等待一个约定','s:5261:\"&lt;p&gt;小的时候，明亮温暖的下午，她会站在他家的窗下，高声喊着他的名字。然后他会从窗口探出小小的脑袋来回答她：“等一下，3分钟！”但她通常会等5分\r\n钟以上，因为他会躲在窗帘后面，看着她在开满花的树下一朵一朵的数着树上的梨花。当他看到分不清哪个是花，哪个是她的时候，才会慢吞吞的下楼去。她看到\r\n他，会说，你又迟到了。然后，他们就开始玩办家家，她是妈妈，他是爸爸，却没有孩子。她把掉下来的花瓣撕成细细的条，给自己的小丈夫作菜吃。&lt;/p&gt;&lt;p&gt;上中学的时候，她和他约定每天早晨7:00在巷口的早餐铺见面。她总是很准时的坐在最里边的位置，叫来两根油条。7:10分以后，他拖着黑色的书包\r\n出现在有些寒冷的阳光里。懒散的表情。脸上有时隐隐可见没擦干净的牙膏沫。她看到他，会说，你又迟到了。然后他坐下来开始吃早餐。她把他脏脏的书包放在自\r\n己的腿上。她把粗大的油条撕成细细的条，给他配着热腾腾的豆浆喝。&lt;/p&gt;&lt;p&gt;高中毕业典礼那一天，他们去了一家婚纱店。她指着一套婚纱对他说，她好喜欢那套婚纱。他看那套婚纱，它不是白色，而是深蓝色的。蓝得有些诡异，有些\r\n忧郁，就像新娘一个人站在教堂里，月光掉在她如花的脸上时，眼中落下的一滴泪。然后他轻声告诉她：“等你嫁给我的那一天，我把它买给你。”&lt;/p&gt;&lt;p&gt;大学他们分居两地，当她打电话询问他的信什么时候会到的，他常常回答她大概3天以后。而她接到信的时候，已经过了7天。于是她会在回信里包上新鲜的玫瑰花瓣，然后写道，你又迟到了。她把&lt;a href=&quot;http://www.duanwenxue.com/&quot;&gt;日记&lt;/a&gt;撕成细细的条，夹在信里寄过去。她想如果他细心的把那些碎条拼起来，就可以读到她在深夜对他的&lt;a href=&quot;http://www.duanwenxue.com/diary/sinian/&quot;&gt;思念&lt;/a&gt;。&lt;/p&gt;&lt;p&gt;毕业以后，他们有了各自的工作。有一天他说要来看她，于是朴素的她第一次化了妆，匆匆赶去车站。她看着空荡荡的铁道，觉得那是些&lt;a href=&quot;http://www.duanwenxue.com/diary/jimo/&quot;&gt;寂寞&lt;/a&gt;的\r\n钢轨，当火车从它身上走过，它会发出绝望的哭声。火车比预定时间晚了一个小时。她看到他变的比以往更加英俊，只是眼中少了一分懒散。接着她又看到他的身边\r\n有一个笑颜如花的女子，他介绍那是他的未婚妻。她只是说了一句，你又迟到了。那天晚上，她把他写过的信撕成了细细的条，让一团温柔的火苗轻轻舔拭着它们的\r\n身躯。&lt;/p&gt;&lt;p&gt;他结婚那天，也邀请了她。她看到新娘是如此的美丽，穿着一套洁白的婚纱。那婚纱白得十分刺目，像是在讥讽她的等待。没有人发觉她在晕眩。&lt;/p&gt;&lt;p&gt;第二天她就搬去了一个小城市，没有人知道她在哪里，她决心要从这个世界里蒸发，从他的&lt;a href=&quot;http://www.duanwenxue.com/jingdian/shenghuo/&quot;&gt;生活&lt;/a&gt;里蒸发。&lt;/p&gt;&lt;p&gt;他像大多数都市里小有成就的男人一样，经历了事业上的成功，失败，离婚，再婚，再离婚，再结婚，丧妻。在他的生命里路过了许许多多的女人，她们有些\r\n爱他，有些被他爱，有些伤害了他，有些被他深深的伤害。匆匆而来，又匆匆而去。当他恍惚记起曾经那个站在开满鲜花的树下一朵一朵数梨花的小女孩时，自己已\r\n经是七旬的老人了。&lt;/p&gt;&lt;p&gt;他寻访到了她的讯息，他认为自己应该带一点见面礼给她。后来，有人告诉他，她一直都没有结婚，她似乎在等待一个约定，只是这个约定的期限不知是在何\r\n时。于是，他知道自己该买些什么了。他花了很长时间去寻找一件深蓝色的婚纱，他的确找到了很多件，只是没有一件像当年那套一样，有着孤独新娘在月光下的第\r\n一滴眼泪感觉的深蓝色婚纱。终于，他从香港一位收集了很多套婚纱的太太手里买下了那样一件婚纱。那位太太听过他们之间的&lt;a href=&quot;http://www.duanwenxue.com/qinggan/gushi/&quot;&gt;故事&lt;/a&gt;后坚持不收钱，但他，还是付给了太太55元钱，那刚好是他们结下等她嫁给他他会买这套婚纱送她的约定之时，直到现在已经有55年。&lt;/p&gt;&lt;p&gt;他带着那套深蓝色的婚纱，匆忙赶到医院。他从不知道自己70多岁的身体居然可以跑的这样快。但是时间是最作弄人的东西，在他怀抱那堆深蓝色的轻纱踏进病房的那一刻，她停止了呼吸。他觉得这一幕是那么似曾相识，只不过不同的是，她不能再对他说一句，你又迟到了。&lt;/p&gt;&lt;p&gt;她一直都在等待约定的期限，尽管他总是迟到。&lt;/p&gt;&lt;p&gt;但她从没想过，那最后一个约定的期限，就是她一生的时间。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;\";',1,3,1378739012),(2,'我们在岁月里成长，岁月已把我们渐忘','s:5261:\"&lt;p&gt;小的时候，明亮温暖的下午，她会站在他家的窗下，高声喊着他的名字。然后他会从窗口探出小小的脑袋来回答她：“等一下，3分钟！”但她通常会等5分\r\n钟以上，因为他会躲在窗帘后面，看着她在开满花的树下一朵一朵的数着树上的梨花。当他看到分不清哪个是花，哪个是她的时候，才会慢吞吞的下楼去。她看到\r\n他，会说，你又迟到了。然后，他们就开始玩办家家，她是妈妈，他是爸爸，却没有孩子。她把掉下来的花瓣撕成细细的条，给自己的小丈夫作菜吃。&lt;/p&gt;&lt;p&gt;上中学的时候，她和他约定每天早晨7:00在巷口的早餐铺见面。她总是很准时的坐在最里边的位置，叫来两根油条。7:10分以后，他拖着黑色的书包\r\n出现在有些寒冷的阳光里。懒散的表情。脸上有时隐隐可见没擦干净的牙膏沫。她看到他，会说，你又迟到了。然后他坐下来开始吃早餐。她把他脏脏的书包放在自\r\n己的腿上。她把粗大的油条撕成细细的条，给他配着热腾腾的豆浆喝。&lt;/p&gt;&lt;p&gt;高中毕业典礼那一天，他们去了一家婚纱店。她指着一套婚纱对他说，她好喜欢那套婚纱。他看那套婚纱，它不是白色，而是深蓝色的。蓝得有些诡异，有些\r\n忧郁，就像新娘一个人站在教堂里，月光掉在她如花的脸上时，眼中落下的一滴泪。然后他轻声告诉她：“等你嫁给我的那一天，我把它买给你。”&lt;/p&gt;&lt;p&gt;大学他们分居两地，当她打电话询问他的信什么时候会到的，他常常回答她大概3天以后。而她接到信的时候，已经过了7天。于是她会在回信里包上新鲜的玫瑰花瓣，然后写道，你又迟到了。她把&lt;a href=&quot;http://www.duanwenxue.com/&quot;&gt;日记&lt;/a&gt;撕成细细的条，夹在信里寄过去。她想如果他细心的把那些碎条拼起来，就可以读到她在深夜对他的&lt;a href=&quot;http://www.duanwenxue.com/diary/sinian/&quot;&gt;思念&lt;/a&gt;。&lt;/p&gt;&lt;p&gt;毕业以后，他们有了各自的工作。有一天他说要来看她，于是朴素的她第一次化了妆，匆匆赶去车站。她看着空荡荡的铁道，觉得那是些&lt;a href=&quot;http://www.duanwenxue.com/diary/jimo/&quot;&gt;寂寞&lt;/a&gt;的\r\n钢轨，当火车从它身上走过，它会发出绝望的哭声。火车比预定时间晚了一个小时。她看到他变的比以往更加英俊，只是眼中少了一分懒散。接着她又看到他的身边\r\n有一个笑颜如花的女子，他介绍那是他的未婚妻。她只是说了一句，你又迟到了。那天晚上，她把他写过的信撕成了细细的条，让一团温柔的火苗轻轻舔拭着它们的\r\n身躯。&lt;/p&gt;&lt;p&gt;他结婚那天，也邀请了她。她看到新娘是如此的美丽，穿着一套洁白的婚纱。那婚纱白得十分刺目，像是在讥讽她的等待。没有人发觉她在晕眩。&lt;/p&gt;&lt;p&gt;第二天她就搬去了一个小城市，没有人知道她在哪里，她决心要从这个世界里蒸发，从他的&lt;a href=&quot;http://www.duanwenxue.com/jingdian/shenghuo/&quot;&gt;生活&lt;/a&gt;里蒸发。&lt;/p&gt;&lt;p&gt;他像大多数都市里小有成就的男人一样，经历了事业上的成功，失败，离婚，再婚，再离婚，再结婚，丧妻。在他的生命里路过了许许多多的女人，她们有些\r\n爱他，有些被他爱，有些伤害了他，有些被他深深的伤害。匆匆而来，又匆匆而去。当他恍惚记起曾经那个站在开满鲜花的树下一朵一朵数梨花的小女孩时，自己已\r\n经是七旬的老人了。&lt;/p&gt;&lt;p&gt;他寻访到了她的讯息，他认为自己应该带一点见面礼给她。后来，有人告诉他，她一直都没有结婚，她似乎在等待一个约定，只是这个约定的期限不知是在何\r\n时。于是，他知道自己该买些什么了。他花了很长时间去寻找一件深蓝色的婚纱，他的确找到了很多件，只是没有一件像当年那套一样，有着孤独新娘在月光下的第\r\n一滴眼泪感觉的深蓝色婚纱。终于，他从香港一位收集了很多套婚纱的太太手里买下了那样一件婚纱。那位太太听过他们之间的&lt;a href=&quot;http://www.duanwenxue.com/qinggan/gushi/&quot;&gt;故事&lt;/a&gt;后坚持不收钱，但他，还是付给了太太55元钱，那刚好是他们结下等她嫁给他他会买这套婚纱送她的约定之时，直到现在已经有55年。&lt;/p&gt;&lt;p&gt;他带着那套深蓝色的婚纱，匆忙赶到医院。他从不知道自己70多岁的身体居然可以跑的这样快。但是时间是最作弄人的东西，在他怀抱那堆深蓝色的轻纱踏进病房的那一刻，她停止了呼吸。他觉得这一幕是那么似曾相识，只不过不同的是，她不能再对他说一句，你又迟到了。&lt;/p&gt;&lt;p&gt;她一直都在等待约定的期限，尽管他总是迟到。&lt;/p&gt;&lt;p&gt;但她从没想过，那最后一个约定的期限，就是她一生的时间。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;\";',1,3,1378742175),(3,'','s:49:\"&lt;p&gt;这里写你的初始化内容&lt;/p&gt;\";',1,1,1380523333),(4,'','s:220:\"&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0026.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0027.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0018.gif&quot;/&gt;&lt;/p&gt;\";',1,1,1380523379);

/*Table structure for table `pre_feeling` */

DROP TABLE IF EXISTS `pre_feeling`;

CREATE TABLE `pre_feeling` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` text,
  `uid` int(11) DEFAULT NULL COMMENT '留言用户ip',
  `time` int(11) DEFAULT NULL COMMENT '时间',
  `uip` varchar(16) DEFAULT NULL COMMENT '注册ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pre_feeling` */

insert  into `pre_feeling`(`id`,`message`,`uid`,`time`,`uip`) values (2,'s:1111:\"&lt;p&gt;最初我想把这个博客做成自己记笔记的地方，就像现在用的evernote。但是比印象笔记好一点的就是可以让搜索引擎搜索到，然后变成大家寻找知识的宝\r\n库。 \r\n但是后来因为要做一个登陆注册模块，所以就在上面直接实验了。所以就有了现在的用户管理，个人中心，让所有访问到的朋友都可以注册一个属于自己的账号，拥\r\n有一个属于自己的天地。 \r\n今天听广播，偶尔听到了一个特别感人的故事。记录了一段北京爱情故事，想到是不是可以把这个博客做成情侣之间共同拥有的那种。当两个人确认了恋爱关系，就\r\n可以有机会来到这个网站开辟一块儿属于他们俩的天地。 虽然我没有谈过恋爱，没有过牵手，但是还是希望，那些幸福着的人儿能够永远得到幸福。 \r\n我想把他做成有声电台，让别人都可以听到他们的爱情故事，请注意，是听。就像我现在听的“左岸电台”。有相册，有视频，一点一滴，记录我们的“爱情”！&lt;/p&gt;\";',1,1385297038,'127.0.0.1'),(3,'s:282:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;\";',1,1385393959,'127.0.0.1'),(4,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385393998,'127.0.0.1'),(5,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394007,'127.0.0.1'),(6,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394021,'127.0.0.1'),(7,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394039,'127.0.0.1'),(8,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394048,'127.0.0.1'),(9,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394058,'127.0.0.1'),(10,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394068,'127.0.0.1'),(12,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394389,'127.0.0.1'),(13,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394395,'127.0.0.1'),(14,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394402,'127.0.0.1'),(15,'s:271:\"&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑,Microsoft YaHei;&quot;&gt;当初的梦想已经消磨殆尽，如今站在人生的十字路口，我该何去何从？？？&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0008.gif&quot;/&gt;&lt;/span&gt;&lt;/p&gt;\";',1,1385394413,'127.0.0.1');

/*Table structure for table `pre_feeling_reply` */

DROP TABLE IF EXISTS `pre_feeling_reply`;

CREATE TABLE `pre_feeling_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '回复用户id',
  `fid` int(11) DEFAULT NULL COMMENT '心情id',
  `content` text COMMENT '回复内容',
  `time` int(11) DEFAULT NULL COMMENT '回复时间',
  `praise` int(11) DEFAULT NULL COMMENT '赞数',
  `pid` int(11) DEFAULT NULL COMMENT '该条回复的父级id,最高级为0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pre_feeling_reply` */

insert  into `pre_feeling_reply`(`id`,`uid`,`fid`,`content`,`time`,`praise`,`pid`) values (1,1,2,'你好啊啊啊啊啊啊啊',1385448116,NULL,0),(2,1,2,'有相册，有视频，一点一滴，记录我们的“爱情”！',1385448744,NULL,0),(3,1,0,'最初我想把这个博客做成自己记笔记的地方，就像现在用的evernote。',1385456570,NULL,1);

/*Table structure for table `pre_user` */

DROP TABLE IF EXISTS `pre_user`;

CREATE TABLE `pre_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL COMMENT '昵称',
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `regip` varchar(32) DEFAULT NULL COMMENT '注册ip',
  `regtime` int(11) DEFAULT NULL COMMENT '注册时间',
  `status` int(1) DEFAULT '1' COMMENT '用户状态：1未激活；2：已激活；3：被禁用',
  `verify` varchar(32) DEFAULT NULL COMMENT '用来激活邮箱的标识',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pre_user` */

insert  into `pre_user`(`id`,`username`,`email`,`password`,`regip`,`regtime`,`status`,`verify`) values (1,'fengwuxin','751583294@qq.com','ca095fa82cb60d7b45b2dd90b16f41b4','172.19.12.90',1384767221,2,'294e285421944fd9b0771dc76b550211');

/*Table structure for table `pre_userinfo` */

DROP TABLE IF EXISTS `pre_userinfo`;

CREATE TABLE `pre_userinfo` (
  `uid` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `sex` int(1) DEFAULT '0' COMMENT '0保密；1男；2女',
  `age` int(3) DEFAULT NULL,
  `province` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `county` varchar(64) DEFAULT NULL,
  `street` text,
  `qq` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `marry` int(1) DEFAULT '0' COMMENT '是否单身：0保密；1单身；2已婚',
  `isopen` int(1) DEFAULT '0' COMMENT '是否公开信息：0保密；1公开',
  `introduction` text COMMENT '自我介绍',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pre_userinfo` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
