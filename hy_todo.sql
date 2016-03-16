/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : hy_todo

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-03-02 23:28:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for td_backwards
-- ----------------------------
DROP TABLE IF EXISTS `td_backwards`;
CREATE TABLE `td_backwards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` char(100) CHARACTER SET utf8 DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  `deadline` int(10) unsigned DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL,
  `status` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of td_backwards
-- ----------------------------
INSERT INTO `td_backwards` VALUES ('1', '4', '姐姐的婚礼', '姐姐要结婚了O(∩_∩)O~', '1446549784', '1451491200', '1446650751', '1');
INSERT INTO `td_backwards` VALUES ('2', '4', '云南旅游', '要和朋友一起去云南啦！耶耶耶！', '1446549784', '1489608100', '1446651202', '1');
INSERT INTO `td_backwards` VALUES ('3', '4', '高考', '距离2016年的高考时间', '1446540784', '1450972800', '1446540784', '1');
INSERT INTO `td_backwards` VALUES ('8', '4', '服务外包现场赛', '我们要是宜春啦~\\(≧▽≦)/~啦啦啦', '1446646941', '1448195501', '1446646941', '1');
INSERT INTO `td_backwards` VALUES ('9', '4', '要交展板', '交展板给老师！', '1446653034', '1446825828', '1446653404', '1');

-- ----------------------------
-- Table structure for td_details
-- ----------------------------
DROP TABLE IF EXISTS `td_details`;
CREATE TABLE `td_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT '1',
  `content` longtext,
  `user_id` int(10) unsigned DEFAULT NULL,
  `level_id` int(10) unsigned DEFAULT NULL COMMENT '紧急程度',
  `is_finished` tinyint(1) unsigned DEFAULT NULL COMMENT '是否做完',
  `create_time` int(10) unsigned DEFAULT NULL,
  `do_time` int(10) unsigned DEFAULT NULL COMMENT '做的时间',
  `due_to_time` int(10) unsigned DEFAULT NULL COMMENT '到期时间',
  `status` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of td_details
-- ----------------------------
INSERT INTO `td_details` VALUES ('3', '请问', '1', '123', '2', '1', '1', '1444227908', null, null, '1');
INSERT INTO `td_details` VALUES ('4', '阿萨德', '1', '123', '2', '2', '1', '1444227908', '1446301937', null, '1');
INSERT INTO `td_details` VALUES ('5', '大纲', '1', '大纲', '2', '2', '1', '1444227908', '1446344154', null, '1');
INSERT INTO `td_details` VALUES ('6', '感觉', '1', '123', '2', '2', '1', '1444227908', null, null, '1');
INSERT INTO `td_details` VALUES ('7', '科目', '1', '123', '2', '4', '1', '1444227908', null, null, '1');
INSERT INTO `td_details` VALUES ('8', '而非', '1', '而非', '2', '4', '1', '1444227908', '1446729270', null, '1');
INSERT INTO `td_details` VALUES ('9', 'vfr1', '2', '123', '2', '4', '1', '1444227908', null, null, '1');
INSERT INTO `td_details` VALUES ('20', 'ccccccccccccccccccccccccccc', '2', 'ccccccccccccccccccccccccccc', '2', '4', '0', '1446298450', '1446298452', null, '1');
INSERT INTO `td_details` VALUES ('21', 'ccccccccccccccccccccccccccc', '2', 'ccccccccccccccccccccccccccc', '2', '4', '1', '1446298450', '1446298452', null, '1');
INSERT INTO `td_details` VALUES ('22', 'ccccccccccccccccccccccccccc', '2', 'ccccccccccccccccccccccccccc', '2', '3', '1', '1446298450', '1446298452', null, '1');
INSERT INTO `td_details` VALUES ('23', 'ccccccccccccccccccccccccccc', '2', 'ccccccccccccccccccccccccccc', '2', '4', '0', '1446298450', '1446298452', null, '1');
INSERT INTO `td_details` VALUES ('24', 'ccccccccccccccccccccccccccc', '2', 'ccccccccccccccccccccccccccc', '2', '4', '0', '1446298450', '1446298452', null, '1');
INSERT INTO `td_details` VALUES ('25', 'ccccccccccccccccccccccccccc', '2', 'ccccccccccccccccccccccccccc', '2', '4', '1', '1446298450', '1446298452', null, '1');
INSERT INTO `td_details` VALUES ('26', 'ccccccccccccccccccccccccccc', '2', 'ccccccccccccccccccccccccccc', '2', '4', '1', '1446298450', '1446298452', null, '1');
INSERT INTO `td_details` VALUES ('27', '123123', '2', '123123', '2', '4', '1', '1446306560', '1446306562', null, '1');
INSERT INTO `td_details` VALUES ('28', '水电费水电费', '2', '水电费水电费水电费', '2', '2', '0', '1446353202', '1447822005', null, '1');
INSERT INTO `td_details` VALUES ('29', '才踩踩踩从踩踩踩', '1', '玩儿玩儿玩儿', '2', '3', '1', '1446374298', '1446374300', null, '1');
INSERT INTO `td_details` VALUES ('30', '123', '1', '123', '2', '1', '0', '1446375230', '1446375232', null, '1');
INSERT INTO `td_details` VALUES ('32', 'sssssssssss', '1', 'ssssssssssss', '2', '3', '0', '1446469622', '1446469625', null, '1');
INSERT INTO `td_details` VALUES ('33', 'ccccccccccc', '1', 'ccccccccccccccc', '2', '3', '0', '1446469674', '1446469676', null, '1');
INSERT INTO `td_details` VALUES ('34', 'sssssss', '1', 'ssssssssssssssssss', '2', '2', '1', '1446732702', '1446732708', null, '1');
INSERT INTO `td_details` VALUES ('35', 'tttttttt', '1', 'tttttttt', '2', '1', '1', '1446733494', '1446733532', null, '1');
INSERT INTO `td_details` VALUES ('36', 'jjjjjjjjjj', '2', 'jjjjjjjjjj', '2', '4', '0', '1446733701', '1446733727', null, '1');
INSERT INTO `td_details` VALUES ('37', '凄凄切切凄凄切切QQ群', '3', '凄凄切切凄凄切切QQ群', '2', '4', '0', '1446780212', '1446780236', null, '1');
INSERT INTO `td_details` VALUES ('38', '12312', '2', '12312', '2', '2', '0', '1447911280', '1447911284', null, '1');
INSERT INTO `td_details` VALUES ('39', '啊啊啊啊啊啊啊啊啊啊啊', '2', '请问鹅鹅鹅鹅鹅鹅', '2', '1', '0', '1447911915', '1447911925', null, '1');
INSERT INTO `td_details` VALUES ('40', '啊飒飒大师大师的', '2', '啊飒飒大师大师的', '2', '1', '1', '1447912025', '1447912036', null, '1');

-- ----------------------------
-- Table structure for td_frame_access
-- ----------------------------
DROP TABLE IF EXISTS `td_frame_access`;
CREATE TABLE `td_frame_access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `action_id` int(10) unsigned NOT NULL,
  `model` char(50) DEFAULT '',
  `status` tinyint(1) unsigned DEFAULT '1',
  `remark` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `action_role` (`role_id`,`action_id`),
  KEY `action_id` (`action_id`) USING BTREE,
  KEY `role_id` (`role_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2420 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of td_frame_access
-- ----------------------------

-- ----------------------------
-- Table structure for td_frame_action
-- ----------------------------
DROP TABLE IF EXISTS `td_frame_action`;
CREATE TABLE `td_frame_action` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned DEFAULT '0',
  `type` char(10) DEFAULT '',
  `title` char(20) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `options` varchar(255) DEFAULT '',
  `rank` int(3) unsigned DEFAULT '500',
  `status` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2002 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of td_frame_action
-- ----------------------------
INSERT INTO `td_frame_action` VALUES ('100000', '0', 'nav', '首页', 'System/Index/index', 'icon-home', '990', '1');
INSERT INTO `td_frame_action` VALUES ('210000', '0', 'nav', '栏目管理', '', ' icon-directions', '800', '1');
INSERT INTO `td_frame_action` VALUES ('210100', '210000', 'menu', '栏目设置', 'Category/Category/all', ' icon-direction', '500', '1');
INSERT INTO `td_frame_action` VALUES ('210101', '210100', 'url', '列表', 'Category/Category/ajax?q=list', '', '500', '1');
INSERT INTO `td_frame_action` VALUES ('210102', '210100', 'url', '新增', 'Category/Category/ajax?q=insert', '', '500', '1');
INSERT INTO `td_frame_action` VALUES ('210103', '210100', 'url', '更新', 'Category/Category/ajax?q=update', '', '500', '1');
INSERT INTO `td_frame_action` VALUES ('210104', '210100', 'url', '删除', 'Category/Category/ajax?q=delete', '', '500', '1');
INSERT INTO `td_frame_action` VALUES ('210105', '210100', 'url', '编辑', 'Category/Category/ajax?q=edit', '', '500', '1');

-- ----------------------------
-- Table structure for td_frame_alert
-- ----------------------------
DROP TABLE IF EXISTS `td_frame_alert`;
CREATE TABLE `td_frame_alert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `to_users` longtext NOT NULL,
  `read_users` longtext,
  `category` varchar(255) DEFAULT '',
  `icon` varchar(255) DEFAULT '',
  `message` varchar(255) DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT '',
  `creator_id` int(10) unsigned DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  `context` varchar(255) DEFAULT '',
  `status` int(10) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of td_frame_alert
-- ----------------------------

-- ----------------------------
-- Table structure for td_frame_file
-- ----------------------------
DROP TABLE IF EXISTS `td_frame_file`;
CREATE TABLE `td_frame_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `name` char(255) NOT NULL DEFAULT '' COMMENT '原始文件名',
  `savename` char(255) NOT NULL DEFAULT '' COMMENT '保存名称',
  `savepath` char(255) NOT NULL DEFAULT '' COMMENT '文件保存路径',
  `ext` char(5) NOT NULL DEFAULT '' COMMENT '文件后缀',
  `mime` char(255) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `location` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '文件保存位置',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '远程地址',
  `create_time` int(10) unsigned NOT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_md5` (`md5`)
) ENGINE=MyISAM AUTO_INCREMENT=352 DEFAULT CHARSET=utf8 COMMENT='文件表';

-- ----------------------------
-- Records of td_frame_file
-- ----------------------------

-- ----------------------------
-- Table structure for td_frame_log
-- ----------------------------
DROP TABLE IF EXISTS `td_frame_log`;
CREATE TABLE `td_frame_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `module` varchar(20) DEFAULT NULL,
  `controller` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `post` text,
  `sql` text,
  `description` text,
  `ip` varchar(20) DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  `status` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`controller`)
) ENGINE=MyISAM AUTO_INCREMENT=143299 DEFAULT CHARSET=utf8 COMMENT='操作日志表';

-- ----------------------------
-- Records of td_frame_log
-- ----------------------------

-- ----------------------------
-- Table structure for td_frame_notice
-- ----------------------------
DROP TABLE IF EXISTS `td_frame_notice`;
CREATE TABLE `td_frame_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `creator_id` int(10) unsigned DEFAULT NULL,
  `file_id` int(10) unsigned DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL,
  `status` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of td_frame_notice
-- ----------------------------

-- ----------------------------
-- Table structure for td_frame_role
-- ----------------------------
DROP TABLE IF EXISTS `td_frame_role`;
CREATE TABLE `td_frame_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(20) DEFAULT '',
  `title` varchar(20) DEFAULT '',
  `table` varchar(20) DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户角色表';

-- ----------------------------
-- Records of td_frame_role
-- ----------------------------
INSERT INTO `td_frame_role` VALUES ('10', '0', 'public', '公共', '', '1');
INSERT INTO `td_frame_role` VALUES ('31', '10', 'admin', '管理员', 'admin', '1');
INSERT INTO `td_frame_role` VALUES ('21', '10', 'user', '用户', 'user', '1');

-- ----------------------------
-- Table structure for td_frame_session
-- ----------------------------
DROP TABLE IF EXISTS `td_frame_session`;
CREATE TABLE `td_frame_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expire` int(10) unsigned NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of td_frame_session
-- ----------------------------
INSERT INTO `td_frame_session` VALUES ('kg6fj0qeo9lve3vqjr70aqnla3', '1443189580', 0x4C4F47494E5F4B45597C733A33323A223738353032303364393537663935616464326131326639653033666665666138223B555345525F4147454E547C733A3130393A224D6F7A696C6C612F352E30202857696E646F7773204E5420362E333B20574F57363429204170706C655765624B69742F3533372E333620284B48544D4C2C206C696B65204765636B6F29204368726F6D652F34322E302E323331312E313532205361666172692F3533372E3336223B484F4D5949545F424153455F415554485F434F554E5445527C693A36303234303437383B484F4D5949545F424153455F415554485F534545447C733A33323A223963653464646162376166306438353232393836343838663162666535316631223B7573657249647C733A323A223138223B757365724E616D657C733A31303A22E7AEA1E79086E5919831223B61766174617246696C657C733A34363A222F7369735F6A786E752F5075626C69632F6173736574732F676C6F62616C2F696D672F757365727069632E676966223B726F6C6549644172727C613A333A7B693A303B733A323A223232223B693A313B733A323A223332223B693A323B733A323A223331223B7D726F6C6549647C733A323A223332223B726F6C655377697463687C613A333A7B733A39383A22656E63727970745F6163742D544944436E594F564163326A424C395A6B5051505034744B6A53396B4E4C623268306838525552696D58396B3869324F5F4B376E35614A7137336335384B562D6D6551586245654C55736F4F67455834387744686F77223B733A31353A22E8B685E7BAA7E7AEA1E79086E59198223B733A39383A22656E63727970745F6163742D6132574267324E4753666C612D30744E665A594570714E384E7A38435A433668336D5941672D78485868583636337436336675777367495A7A7352664B65667A2D4557557679654D475834485A614230505249745751223B733A393A22E7AEA1E79086E59198223B733A39383A22656E63727970745F6163742D446745726E61736E654C4967363268494A7A4244726949554941627648554455503143536664716E4A6B7259726A675236364C7A466D71396D594C4F346A6C61544843516175426464445142586664575F2D62587851223B733A363A22E69599E5B7A5223B7D726F6C655469746C657C733A31353A22E8B685E7BAA7E7AEA1E79086E59198223B73747564656E747C623A303B746561636865727C623A313B726F6C65737C733A383A2233322C33312C3130223B6B656570547279436F756E7465727C693A363B);

-- ----------------------------
-- Table structure for td_frame_setting
-- ----------------------------
DROP TABLE IF EXISTS `td_frame_setting`;
CREATE TABLE `td_frame_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` char(30) DEFAULT NULL,
  `value` char(255) DEFAULT NULL,
  `remark` char(50) DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of td_frame_setting
-- ----------------------------
INSERT INTO `td_frame_setting` VALUES ('1', 'SITE_STATUS', '1', '访问状态（开启：1，禁止：0）', '1379469346', '0');
INSERT INTO `td_frame_setting` VALUES ('2', 'SITE_ADMIN_TITLE', '江西师范大学 土豆鸡块管理系统', '管理后台显示的站点名称', '1438678475', '1');
INSERT INTO `td_frame_setting` VALUES ('3', 'SITE_ADMIN_DESCRIPTION', '宏奕工作室开发！欢迎洽谈Web开发业务！', '站点简称', '1398053294', '0');
INSERT INTO `td_frame_setting` VALUES ('5', 'SITE_CIRCULATING_CAPITAL', '0', '团队流动资金（元）', '1408115071', '1');
INSERT INTO `td_frame_setting` VALUES ('4', 'SITE_ICP', '浙ICP备10204966号-3', 'ICP备案号', '1438005762', '1');
INSERT INTO `td_frame_setting` VALUES ('13', 'SITE_BANNER', '国际教育欢迎您', '横幅', '1438005755', '1');

-- ----------------------------
-- Table structure for td_level
-- ----------------------------
DROP TABLE IF EXISTS `td_level`;
CREATE TABLE `td_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of td_level
-- ----------------------------
INSERT INTO `td_level` VALUES ('1', 'red', '1', '1444227908');
INSERT INTO `td_level` VALUES ('2', 'orange', '2', '1444227908');
INSERT INTO `td_level` VALUES ('3', 'yellow', '3', '1444227908');
INSERT INTO `td_level` VALUES ('4', 'green', '4', '1444227908');

-- ----------------------------
-- Table structure for td_user
-- ----------------------------
DROP TABLE IF EXISTS `td_user`;
CREATE TABLE `td_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `roles` char(20) DEFAULT '',
  `user_no` char(15) DEFAULT NULL,
  `password` char(150) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `login_last_time` int(10) unsigned DEFAULT NULL,
  `login_times` int(10) unsigned DEFAULT '0',
  `status` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of td_user
-- ----------------------------
INSERT INTO `td_user` VALUES ('2', '123', '', '123', '4297f44b13955235245b2497399d7a93', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('4', 'xzq', '', '321', '4297f44b13955235245b2497399d7a93', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('5', '111', '', '111', '4297f44b13955235245b2497399d7a93', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('6', '444', '', '444', '4297f44b13955235245b2497399d7a93', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('8', '12', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('9', 'aaaaaaaaaaaaaaa', '', '123123', '202cb962ac59075b964b07152d234b70', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('10', '123', '', '32', '202cb962ac59075b964b07152d234b70', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('11', '123', '', '213', 'c4ca4238a0b923820dcc509a6f75849b', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('12', '1212', '', '121212', 'a01610228fe998f515a72dd730294d87', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('13', '1231', '', '1231', '6c14da109e294d1e8155be8aa4b1ce8e', '男', null, null, null, '0', '1');
INSERT INTO `td_user` VALUES ('14', 'xzq', '', '112', '4297f44b13955235245b2497399d7a93', '男', null, null, null, '0', '1');
