-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 03:20 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club`
--

-- --------------------------------------------------------

--
-- Table structure for table `academy`
--

CREATE TABLE `academy` (
  `academy_id` int(11) NOT NULL,
  `academy_title` varchar(100) NOT NULL,
  `academy_images` varchar(100) NOT NULL,
  `academy_pros` text NOT NULL,
  `academy_price_m` int(11) NOT NULL,
  `academy_price_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academy`
--

INSERT INTO `academy` (`academy_id`, `academy_title`, `academy_images`, `academy_pros`, `academy_price_m`, `academy_price_y`) VALUES
(1, 'اكاديميه كره القدم', '10_1525640453.jpg', '<p>تجعلك مميزا في كره القدم</p>\r\n', 200, 499);

-- --------------------------------------------------------

--
-- Table structure for table `achive`
--

CREATE TABLE `achive` (
  `achive_id` int(11) NOT NULL,
  `achive_title` varchar(100) NOT NULL,
  `achive_description` text NOT NULL,
  `achive_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achive`
--

INSERT INTO `achive` (`achive_id`, `achive_title`, `achive_description`, `achive_images`) VALUES
(1, 'بطوله الجمهوريه للااسكواش', '<p>فاز اللاعب فلان الفلاني ببطوله الاسكواش علي مستوي الجمهوريه وقام السيد رئيس النادي بتكريم اللاعب في موتمر صحفي</p>\r\n', 'image7_1525569919.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `activite_id` int(11) NOT NULL,
  `activite_title` varchar(100) NOT NULL,
  `activite_description` text NOT NULL,
  `activite_date` date NOT NULL,
  `activite_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`activite_id`, `activite_title`, `activite_description`, `activite_date`, `activite_images`) VALUES
(1, 'ندوه ادبيه ', '<p>قام اعضاء فريق كوره القدم باقامه ندوه ادبيه لتبادل الافكار و المقترحات في اطار تطوير النادي</p>\r\n', '2018-05-15', 't-full-window-for-pc_1525564708.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `activites_section`
--

CREATE TABLE `activites_section` (
  `id` int(11) NOT NULL,
  `kind` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `champ`
--

CREATE TABLE `champ` (
  `champ_id` int(11) NOT NULL,
  `champ_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `champ`
--

INSERT INTO `champ` (`champ_id`, `champ_title`) VALUES
(1, 'الكاس');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactus_id` int(11) NOT NULL,
  `contactus_name` varchar(100) NOT NULL,
  `contactus_email` varchar(100) NOT NULL,
  `contactus_phone` int(11) NOT NULL,
  `contactus_dess` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_title` varchar(100) NOT NULL,
  `gallery_description` text NOT NULL,
  `gallery_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_title`, `gallery_description`, `gallery_images`) VALUES
(2, 'gtgtrggtr', '<p>dfjkfefkerjfjre</p>\r\n', 'a:1:{i:0;s:58:\"Owl-simple-background-abstract-hd-wallpaper_1525202331.jpg\";}'),
(3, 'ththtr', '<p>tghtrhgffghfgh</p>\r\n', 'a:1:{i:0;s:58:\"Owl-simple-background-abstract-hd-wallpaper_1525204942.jpg\";}'),
(5, 'fffffffffff', '<p>ffffffffffffffff</p>\r\n', 'a:2:{i:0;s:16:\"2_1525538683.png\";i:1;s:16:\"7_1525538683.jpg\";}'),
(8, 'images', '<p>hfhdbs chbs xxbshxb ssxsxjb sxbc cyec bhscb xbxshxb</p>\r\n', 'a:2:{i:0;s:16:\"3_1525538288.png\";i:1;s:16:\"4_1525538288.png\";}');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `game_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `game_title`) VALUES
(1, 'كره القدم');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `main_id` int(11) NOT NULL,
  `main_title` varchar(100) NOT NULL,
  `main_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `matches_id` int(11) NOT NULL,
  `matches_aganist` varchar(100) NOT NULL,
  `matches_aganist_image` varchar(100) NOT NULL,
  `matches_team` int(11) NOT NULL,
  `matches_champ` int(11) NOT NULL,
  `matches_place` varchar(100) NOT NULL,
  `matches_date` date NOT NULL,
  `matches_time` varchar(100) NOT NULL,
  `matches_aganist_result` varchar(100) NOT NULL,
  `matches_team_result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`matches_id`, `matches_aganist`, `matches_aganist_image`, `matches_team`, `matches_champ`, `matches_place`, `matches_date`, `matches_time`, `matches_aganist_result`, `matches_team_result`) VALUES
(1, 'الشمس الرياضي', '6_1525735705.jpg', 1, 1, 'استاد القاهره ', '2018-04-30', '00:30', '1', '2'),
(2, 'الاهلي', '4_1525738326.jpg', 1, 1, 'برج العرب', '2018-05-17', '02:30', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_description` text NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `news_section` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_date` date NOT NULL,
  `news_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_description`, `news_image`, `news_section`, `user_id`, `news_date`, `news_views`) VALUES
(1, 'تهاهل ليفربول للنهائي', '<p>تلىقلتلى تلقلىقفل ىللاقلا ىللتقلىف لىقفتلىفقتل ىلللقتفلىتف</p>\r\n\r\n<p>لىتفلىفتلى فتىلتفىلفقتل تلىفقتلىقل تىلقتفلقل لىتقتلىقتل لىقتفلىلقل</p>\r\n\r\n<p>قلبىىقثلقثتلىثقتلى ثقل تىقثتلىثت تىثقتلىث قتىبقثتلى</p>\r\n', 'Owl-simple-background-abstract-hd-wallpaper_1525179597.jpg', '1', 0, '0000-00-00', 0),
(2, 'تهائل ريال مدير للنهائي', '<p>تللل تىبتى ىربتبىر بترىتبيرى بىرتبيىر رىبرى برىب</p>\r\n', '1_1525355410.jpg', '1', 2, '2018-05-03', 0),
(3, 'خروج الاهلي من كاس مصر ', '<p>اللارتبيرى ثايبتسيابتيبي تبيتباسب تبباقثعب بايعباقثعب يتبايعبا تبعقالعق اعيابعث باثعابقثعب ابعقابقعب ثبايعبا</p>\r\n', 'g9_1525444225.jpg', '1', 2, '2018-05-04', 0),
(4, 'اقتصاد مصر', '<p>بقبىقى ىقىبق بتىبىبق ىبتقىب ىيى ؤيتؤىي ىثب3 ثىتث</p>\r\n', '11_1525543884.jpg', '2', 2, '2018-05-05', 0),
(5, 'تعادل ريال مدريد وبرشلونه', '<p>تعادل فريق ريال مدريد وبرشلونه بنتيجه 2/2 في المباراه التي اقيمت بينهما علي استاد الكامب نو&nbsp;</p>\r\n', '5_1525700807.jpg', '1', 2, '2018-05-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_section`
--

CREATE TABLE `news_section` (
  `section_id` int(11) NOT NULL,
  `section_title` varchar(100) NOT NULL,
  `section_description` text NOT NULL,
  `section_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_section`
--

INSERT INTO `news_section` (`section_id`, `section_title`, `section_description`, `section_images`) VALUES
(1, 'sport', 'hhhhhhh', 'head_1525186514.jpg'),
(2, 'الاقتصاد', '<p>قسم يهتم بالاقتصاد</p>\r\n', 'Owl-simple-background-abstract-hd-wallpaper_1525201311.jpg'),
(3, 'ggggg', '<p>ghthtrhtrhtyhj</p>\r\n', 'head_1525204849.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `party_id` int(11) NOT NULL,
  `party_title` varchar(100) NOT NULL,
  `party_description` text NOT NULL,
  `party_images` varchar(100) NOT NULL,
  `party_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `party_title`, `party_description`, `party_images`, `party_date`) VALUES
(1, 'حفله راس السنه ', '<p>تنظم ادراه الحفلات في النادي حفل راس السنه ويحي الحفل عدد من نجوم الغناء والفن</p>\r\n', 'pic4_1525566814.jpg', '2018-05-25'),
(2, 'الهوبا لاا لاا', '<p>ىقلتقىل&nbsp; للقلقلال تلقتللا بلابي&nbsp; بتبلابلار&nbsp; برلابرلا يتري تريت&nbsp;</p>\r\n', 'g1_1525568418.jpg', '2018-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(122) UNSIGNED NOT NULL,
  `user_type` varchar(250) DEFAULT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `user_type`, `data`) VALUES
(1, 'admin', '{\"users\":{\"own_create\":\"1\",\"own_read\":\"1\",\"own_update\":\"1\",\"own_delete\":\"1\",\"all_create\":\"1\",\"all_read\":\"1\",\"all_update\":\"1\",\"all_delete\":\"1\"}}'),
(2, 'Member', '{\"users\":{\"own_create\":\"1\",\"own_read\":\"1\",\"own_update\":\"1\",\"own_delete\":\"1\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(100) NOT NULL,
  `project_description` text NOT NULL,
  `project_image` varchar(100) NOT NULL,
  `project_section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_title`, `project_description`, `project_image`, `project_section`) VALUES
(1, 'ملعب كوره القدم', '<p>قام اعضاء النادي بانشاء ملعب كوره القدم الجديد علي مساحه 15 فدان ليكون اول ملعب كوره قدم ف النادي</p>\r\n', '6_1525551587.jpeg', 1),
(2, 'ملعب الهوكي ', '<p>وعد السيد الرئيس فلان الفلاني رئيس النادي بانشاء ملعب للهوكي في النادي علي ان يتم افتتتاحه في خلال العام القادم&nbsp;</p>\r\n', '3_1525551815.jpg', 2),
(3, 'اي حاجه ', '<p>اي حاجه في اي حاجه بس بس بس</p>\r\n', '1_1525557829.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_section`
--

CREATE TABLE `project_section` (
  `section_id` int(11) NOT NULL,
  `section_title` varchar(100) NOT NULL,
  `section_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_section`
--

INSERT INTO `project_section` (`section_id`, `section_title`, `section_images`) VALUES
(1, 'منشئات النادي', 'user.png'),
(2, 'المشاريع الجديده', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `rank_id` int(11) NOT NULL,
  `rank_rank` int(11) NOT NULL,
  `rank_team` int(11) NOT NULL,
  `rank_champ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`rank_id`, `rank_rank`, `rank_team`, `rank_champ`) VALUES
(1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `against` varchar(100) NOT NULL,
  `team_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `result` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(122) UNSIGNED NOT NULL,
  `keys` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `keys`, `value`) VALUES
(1, 'website', 'El sead sport club'),
(2, 'logo', 'logo_1525299098.png'),
(3, 'favicon', 'logo2_1525299098.png'),
(4, 'SMTP_EMAIL', ''),
(5, 'HOST', ''),
(6, 'PORT', ''),
(7, 'SMTP_SECURE', ''),
(8, 'SMTP_PASSWORD', ''),
(9, 'mail_setting', 'simple_mail'),
(10, 'company_name', 'Company Name'),
(11, 'crud_list', 'users,User'),
(12, 'EMAIL', ''),
(13, 'UserModules', 'yes'),
(14, 'register_allowed', '1'),
(15, 'email_invitation', '1'),
(16, 'admin_approval', '0'),
(17, 'user_type', '[\"admin\"]');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_game` varchar(100) NOT NULL,
  `team_title` varchar(100) NOT NULL,
  `team_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_game`, `team_title`, `team_image`) VALUES
(1, '1', 'الصيد الرياضي', '1_1525649241.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(121) UNSIGNED NOT NULL,
  `module` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `html` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `module`, `code`, `template_name`, `html`) VALUES
(1, 'forgot_pass', 'forgot_password', 'Forgot password', '<html xmlns=\"http://www.w3.org/1999/xhtml\"><head>\n\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n\n  <style type=\"text/css\" rel=\"stylesheet\" media=\"all\">\n\n    /* Base ------------------------------ */\n\n    *:not(br):not(tr):not(html) {\n\n      font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\n\n      -webkit-box-sizing: border-box;\n\n      box-sizing: border-box;\n\n    }\n\n    body {\n\n      \n\n    }\n\n    a {\n\n      color: #3869D4;\n\n    }\n\n\n\n\n\n    /* Masthead ----------------------- */\n\n    .email-masthead {\n\n      padding: 25px 0;\n\n      text-align: center;\n\n    }\n\n    .email-masthead_logo {\n\n      max-width: 400px;\n\n      border: 0;\n\n    }\n\n    .email-footer {\n\n      width: 570px;\n\n      margin: 0 auto;\n\n      padding: 0;\n\n      text-align: center;\n\n    }\n\n    .email-footer p {\n\n      color: #AEAEAE;\n\n    }\n\n  \n\n    .content-cell {\n\n      padding: 35px;\n\n    }\n\n    .align-right {\n\n      text-align: right;\n\n    }\n\n\n\n    /* Type ------------------------------ */\n\n    h1 {\n\n      margin-top: 0;\n\n      color: #2F3133;\n\n      font-size: 19px;\n\n      font-weight: bold;\n\n      text-align: left;\n\n    }\n\n    h2 {\n\n      margin-top: 0;\n\n      color: #2F3133;\n\n      font-size: 16px;\n\n      font-weight: bold;\n\n      text-align: left;\n\n    }\n\n    h3 {\n\n      margin-top: 0;\n\n      color: #2F3133;\n\n      font-size: 14px;\n\n      font-weight: bold;\n\n      text-align: left;\n\n    }\n\n    p {\n\n      margin-top: 0;\n\n      color: #74787E;\n\n      font-size: 16px;\n\n      line-height: 1.5em;\n\n      text-align: left;\n\n    }\n\n    p.sub {\n\n      font-size: 12px;\n\n    }\n\n    p.center {\n\n      text-align: center;\n\n    }\n\n\n\n    /* Buttons ------------------------------ */\n\n    .button {\n\n      display: inline-block;\n\n      width: 200px;\n\n      background-color: #3869D4;\n\n      border-radius: 3px;\n\n      color: #ffffff;\n\n      font-size: 15px;\n\n      line-height: 45px;\n\n      text-align: center;\n\n      text-decoration: none;\n\n      -webkit-text-size-adjust: none;\n\n      mso-hide: all;\n\n    }\n\n    .button--green {\n\n      background-color: #22BC66;\n\n    }\n\n    .button--red {\n\n      background-color: #dc4d2f;\n\n    }\n\n    .button--blue {\n\n      background-color: #3869D4;\n\n    }\n\n  </style>\n\n</head>\n\n<body style=\"width: 100% !important;\n\n      height: 100%;\n\n      margin: 0;\n\n      line-height: 1.4;\n\n      background-color: #F2F4F6;\n\n      color: #74787E;\n\n      -webkit-text-size-adjust: none;\">\n\n  <table class=\"email-wrapper\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"\n\n    width: 100%;\n\n    margin: 0;\n\n    padding: 0;\">\n\n    <tbody><tr>\n\n      <td align=\"center\">\n\n        <table class=\"email-content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\n\n      margin: 0;\n\n      padding: 0;\">\n\n          <!-- Logo -->\n\n\n\n          <tbody>\n\n          <!-- Email Body -->\n\n          <tr>\n\n            <td class=\"email-body\" width=\"100%\" style=\"width: 100%;\n\n    margin: 0;\n\n    padding: 0;\n\n    border-top: 1px solid #edeef2;\n\n    border-bottom: 1px solid #edeef2;\n\n    background-color: #edeef2;\">\n\n              <table class=\"email-body_inner\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\" width: 570px;\n\n    margin:  14px auto;\n\n    background: #fff;\n\n    padding: 0;\n\n    border: 1px outset rgba(136, 131, 131, 0.26);\n\n    box-shadow: 0px 6px 38px rgb(0, 0, 0);\n\n       \">\n\n                <!-- Body content -->\n\n                <thead style=\"background: #3869d4;\"><tr><th><div align=\"center\" style=\"padding: 15px; color: #000;\"><a href=\"{var_action_url}\" class=\"email-masthead_name\" style=\"font-size: 16px;\n\n      font-weight: bold;\n\n      color: #bbbfc3;\n\n      text-decoration: none;\n\n      text-shadow: 0 1px 0 white;\">{var_sender_name}</a></div></th></tr>\n\n                </thead>\n\n                <tbody><tr>\n\n                  <td class=\"content-cell\" style=\"padding: 35px;\">\n\n                    <h1>Hi {var_user_name},</h1>\n\n                    <p>You recently requested to reset your password for your {var_website_name} account. Click the button below to reset it.</p>\n\n                    <!-- Action -->\n\n                    <table class=\"body-action\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"\n\n      width: 100%;\n\n      margin: 30px auto;\n\n      padding: 0;\n\n      text-align: center;\">\n\n                      <tbody><tr>\n\n                        <td align=\"center\">\n\n                          <div>\n\n                            <!--[if mso]><v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" href=\"{{var_action_url}}\" style=\"height:45px;v-text-anchor:middle;width:200px;\" arcsize=\"7%\" stroke=\"f\" fill=\"t\">\n\n                              <v:fill type=\"tile\" color=\"#dc4d2f\" />\n\n                              <w:anchorlock/>\n\n                              <center style=\"color:#ffffff;font-family:sans-serif;font-size:15px;\">Reset your password</center>\n\n                            </v:roundrect><![endif]-->\n\n                            <a href=\"{var_varification_link}\" class=\"button button--red\" style=\"background-color: #dc4d2f;display: inline-block;\n\n      width: 200px;\n\n      background-color: #3869D4;\n\n      border-radius: 3px;\n\n      color: #ffffff;\n\n      font-size: 15px;\n\n      line-height: 45px;\n\n      text-align: center;\n\n      text-decoration: none;\n\n      -webkit-text-size-adjust: none;\n\n      mso-hide: all;\">Reset your password</a>\n\n                          </div>\n\n                        </td>\n\n                      </tr>\n\n                    </tbody></table>\n\n                    <p>If you did not request a password reset, please ignore this email or reply to let us know.</p>\n\n                    <p>Thanks,<br>{var_sender_name} and the {var_website_name} Team</p>\n\n                   <!-- Sub copy -->\n\n                    <table class=\"body-sub\" style=\"margin-top: 25px;\n\n      padding-top: 25px;\n\n      border-top: 1px solid #EDEFF2;\">\n\n                      <tbody><tr>\n\n                        <td> \n\n                          <p class=\"sub\" style=\"font-size:12px;\">If you are having trouble clicking the password reset button, copy and paste the URL below into your web browser.</p>\n\n                          <p class=\"sub\"  style=\"font-size:12px;\"><a href=\"{var_varification_link}\">{var_varification_link}</a></p>\n\n                        </td>\n\n                      </tr>\n\n                    </tbody></table>\n\n                  </td>\n\n                </tr>\n\n              </tbody></table>\n\n            </td>\n\n          </tr>\n\n        </tbody></table>\n\n      </td>\n\n    </tr>\n\n  </tbody></table>\n\n\n\n\n\n</body></html>'),
(3, 'users', 'invitation', 'Invitation', '<p>Hello <strong>{var_user_email}</strong></p>\n\n\n\n<p>Click below link to register&nbsp;<br />\n\n{var_inviation_link}</p>\n\n\n\n<p>Thanks&nbsp;</p>\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `trip_id` int(11) NOT NULL,
  `trip_title` varchar(100) NOT NULL,
  `trip_description` text NOT NULL,
  `trip_images` varchar(100) NOT NULL,
  `trip_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`trip_id`, `trip_title`, `trip_description`, `trip_images`, `trip_date`) VALUES
(1, 'رحله الاقصر واسوان', '<p>نظمت ادراه الرحلات في النادي رحله مميزه الي الاقصر واسوان لزياره اهم المعالم هناك علي ان تكون سعر التزكره للفرد 200 جنيه شامله الاقانه ةالانتقالات</p>\r\n', '1_1525570711.jpg', '2018-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(121) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `var_key` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `user_id`, `var_key`, `status`, `is_deleted`, `name`, `password`, `email`, `profile_pic`, `user_type`) VALUES
(2, '1', NULL, 'active', '0', 'hr', '$2y$10$9OaC2bHONfjqKXhlR7aSUe.A7yYF2ezrU9LJaQyWM/cDab/6mbzA.', 'hr@hr.com', 'user.png', 'admin'),
(3, '1', NULL, 'active', '0', 'vf', '$2y$10$3Yg4VEVByfzXgULzxNKHBumEaGcwhoUR5bakYIiNavbVkMonhkQiC', 'vf@vv.vvv', 'user.png', 'Member'),
(4, '1', NULL, 'active', '0', 'bbb', '$2y$10$4QjJzkwBvc3.sqfj8A79eegxywyW48hskyqkt8iQpAIu7MQBF2LXq', 'bb@bb.bb', 'user.png', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videos_id` int(11) NOT NULL,
  `videos_title` varchar(100) NOT NULL,
  `videos_description` text NOT NULL,
  `videos_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videos_id`, `videos_title`, `videos_description`, `videos_link`) VALUES
(1, 'تتالا', '<p>للبلؤلؤلؤل</p>\r\n', 'https://www.youtube.com/watch?v=xNikAkGsyp0'),
(2, 'الهوبا لاا لاا ', '<p>قتلق بن ببتل بتق ىببيتر س س</p>\r\n', 'https://www.youtube.com/watch?v=HusPg2mvIq0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academy`
--
ALTER TABLE `academy`
  ADD PRIMARY KEY (`academy_id`);

--
-- Indexes for table `achive`
--
ALTER TABLE `achive`
  ADD PRIMARY KEY (`achive_id`);

--
-- Indexes for table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`activite_id`);

--
-- Indexes for table `activites_section`
--
ALTER TABLE `activites_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `champ`
--
ALTER TABLE `champ`
  ADD PRIMARY KEY (`champ_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactus_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`main_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`matches_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_section`
--
ALTER TABLE `news_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_section`
--
ALTER TABLE `project_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academy`
--
ALTER TABLE `academy`
  MODIFY `academy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `achive`
--
ALTER TABLE `achive`
  MODIFY `achive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activite`
--
ALTER TABLE `activite`
  MODIFY `activite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activites_section`
--
ALTER TABLE `activites_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `champ`
--
ALTER TABLE `champ`
  MODIFY `champ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `main_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `matches_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_section`
--
ALTER TABLE `news_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(122) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_section`
--
ALTER TABLE `project_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(122) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(121) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(121) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
