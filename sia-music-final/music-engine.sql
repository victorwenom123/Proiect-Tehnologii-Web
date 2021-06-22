/*
 Navicat Premium Data Transfer

 Source Server         : lexweb
 Source Server Type    : MySQL
 Source Server Version : 50734
 Source Host           : 192.168.1.69:3306
 Source Schema         : music-engine

 Target Server Type    : MySQL
 Target Server Version : 50734
 File Encoding         : 65001

 Date: 19/06/2021 00:17:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for social_wall
-- ----------------------------
DROP TABLE IF EXISTS `social_wall`;
CREATE TABLE `social_wall`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `post_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for songs
-- ----------------------------
DROP TABLE IF EXISTS `songs`;
CREATE TABLE `songs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `artist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `length` double NULL DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `comments` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mood` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `age_rating` double NULL DEFAULT NULL,
  `release_date` date NULL DEFAULT NULL,
  `education_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `habitat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `good_for_groups` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `location_refferences` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of songs
-- ----------------------------
INSERT INTO `songs` VALUES (1, 'Tears Dont Fall', 'Bullet For My Valentine', 5, 'tears,dont,fall,one,of,the,best,songs,metal,band,rock,alternative', 'metal', 'united,states,of,america', 'happy', 18, '2021-06-16', 'high', 'rural', 'yes', 'united,states,of,america', '2021-06-15 21:42:06');
INSERT INTO `songs` VALUES (2, 'Careless Whisper', 'George Michael', 4, 'saxophone,romantic,classicalpiece,epic', 'pop', 'one+of+the+best+songs+united,states,classic,los,angeles', 'romantic', 15, '1984-06-16', 'low', 'urban', 'yes', 'united,states,classic,los,angeles', '2021-06-15 21:53:02');
INSERT INTO `songs` VALUES (3, 'Enemy', 'Blue Stahli', 3, 'electronic,rock,hybrid', 'rock', 'united,states,classic,los,angeles', 'angry', 18, '2021-06-16', 'low', 'urban', 'yes', 'united,states,classic,los,angeles', '2021-06-15 21:59:05');
INSERT INTO `songs` VALUES (4, 'Heaven\'s A Lie', 'Lacuna Coil', 5, 'lacuna,coil,italian,band,symphinic,metal', 'metal', 'nothing+to+comment', 'angry', 17, '2021-06-16', 'low', 'urban', 'yes', 'italy', '2021-06-16 08:56:06');
INSERT INTO `songs` VALUES (5, 'Satelite', 'Starset', 3, 'starset,alternative,space,rock,epic', 'rock', 'starset+is+one+of+the+best+alternetive+bands+out+there+united,states,of,america', 'sad', 15, '2021-06-16', 'low', 'urban', 'yes', 'united,states,of,america', '2021-06-16 08:59:24');
INSERT INTO `songs` VALUES (7, 'Somebody That I Used To Know', 'Gotye', 4, 'gotye,band,good,sad,romantic', 'pop', 'gotye+song+united_states', 'sad', 17, '2016-06-21', 'low', 'urban', 'yes', 'united_states', '2021-06-16 10:42:56');
INSERT INTO `songs` VALUES (8, 'Vision Of Love', 'Mariah Carey', 3, 'romantic, classic,beatiful', 'pop', 'mariah+carey', 'sad', 18, NULL, 'low', 'urban', 'yes', 'united_states', NULL);
INSERT INTO `songs` VALUES (9, 'Heavens A Lie', 'Lacuna Coil', 5, 'lacuna,coil,italian,band,symphinic,metal', 'metal', 'nothing+to+comment', 'angry', 17, '2016-06-21', 'low', 'urban', 'yes', 'italy', '2021-06-17 07:16:18');
INSERT INTO `songs` VALUES (10, 'Sweet Child Of Mine', 'Guns N Roses', 3, 'rock,80s,guns,and,roses', 'rock', 'nothin+to+comment', 'happy', 18, '2021-06-16', 'low', 'urban', 'yes', 'united_states', '2021-06-17 07:16:19');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'email@something.com',
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NULL DEFAULT NULL,
  `user_rank` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'student',
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_romanian_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '344b7225844aec67416d239bd344ac814787ed8effdc92db1655e5f340da6a1eb96f759455e384cf91f066f0f3b906e273a72d80eee41bb8c28c3a0418abcafc', 'admin@localhost', 'Root', 'Administrator', 'admin', '1', '2021-03-24 14:18:09');
INSERT INTO `users` VALUES (3, 'testaccount1234', '17697c04814522a0ba9bb989661a53d145c825c87ed880b4a0dfeea4fe35fea6f4b552c43a095836b497f56653ac49666b89d3a7fccea15e0a50f977a0a74bb8', 'testaccount@gmail.com', 'Test', 'Account', 'user', '1', '2021-06-14 20:21:04');
INSERT INTO `users` VALUES (4, 'anotheraccount123', '873a28478c9157cf621daa9cc010c4f332fa15c26d99848f2f637110d733b62038592406bf8994e7391be35490f84e10fe73d12809f112595d8c209e9c4e5620', 'myaccount123@gmail.com', 'Another', 'Account', 'user', '1', '2021-06-15 10:02:10');
INSERT INTO `users` VALUES (5, 'username', 'dd4ea67a189de0333c170700c5719d1242fa5ae30e3812ccc931cbbf5fa854c672d98fd79570f9eca060bd17f26daccb72154687be9d89cb707b80fa8f29ea8b', 'victor_wenom@yahoo.com', 'nume1', 'nume2', 'user', '1', '2021-06-15 11:13:23');
INSERT INTO `users` VALUES (6, 'test123456', '94d04c9a884599f33c224f88951b838f40c547f8561b97e6f8d472799530125e955ef9c3ba3cc1872cd8d782b3230827693b371e3ac2a091cf8468a70e040631', 'test123456@gmail.com', 'Test', 'Account', 'user', '1', '2021-06-18 21:00:22');

SET FOREIGN_KEY_CHECKS = 1;
