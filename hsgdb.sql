-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2014 at 11:38 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hsgdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `imageurl` varchar(500) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `target` varchar(500) DEFAULT NULL,
  `displaypage` varchar(50) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `imageurl`, `link`, `target`, `displaypage`, `position`) VALUES
(8, 'Project Barnabas', 'f2yq4kba.png', '', '_self', 'Missions', 2),
(32, 'Home', 'gkd09y7g.png', '', '_self', 'Home', 1),
(34, 'Testimonies ', 'b14cim2m.png', '', '_self', 'Testimonies', 1),
(36, 'Congregation', 'g04dbir4.png', '', '_self', 'About', 4),
(37, 'Carecell', 'k92h7saj.png', '', '_self', 'Functions', 2),
(41, 'Theme 2014', 'y4x3bp5l.png', '', '_self', 'Home', 3),
(42, 'Theme 2014', 'y4x3bp5l.png', '', '_self', 'About', 1),
(45, 'Theme 2014', 'y4x3bp5l.png', '', '_self', 'Functions', 3),
(46, 'Testimony 2', 'ojey751q.png', '', '_self', 'Testimonies', 2),
(47, 'Real People Real Miracles', 'k25cegdl.png', '', '_self', 'Testimonies', 3),
(48, 'Interpersonal', '9m638lg4.png', 'https://www.facebook.com/HsgTrainingTrack', '_blank', 'Home', 2),
(49, 'Interpersonal', '9m638lg4.png', 'https://www.facebook.com/HsgTrainingTrack', '_blank', 'About', 1),
(50, 'Interpersonal', '9m638lg4.png', 'https://www.facebook.com/HsgTrainingTrack', '_blank', 'Functions', 1),
(51, 'Interpersonal', '9m638lg4.png', 'https://www.facebook.com/HsgTrainingTrack', '_blank', 'Missions', 1),
(52, 'Re-Imagine', 'v1s9jl23.png', 'http://issuu.com/hsgmedia/docs/reimagine2014/1', '_blank', 'Home', 1),
(53, 'Re-Imagine', 'v1s9jl23.png', 'http://issuu.com/hsgmedia/docs/reimagine2014/1', '_blank', 'Missions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  `timestart` time NOT NULL,
  `timeend` time NOT NULL,
  `title` varchar(500) NOT NULL,
  `summary` varchar(1000) NOT NULL,
  `imageurl` varchar(500) NOT NULL,
  `venue` varchar(500) NOT NULL,
  `linktype` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `datestart`, `dateend`, `timestart`, `timeend`, `title`, `summary`, `imageurl`, `venue`, `linktype`, `link`, `status`) VALUES
(2, '2013-04-30', '2013-04-30', '17:00:00', '19:00:00', 'Easter Exchange KL (Saturday)', 'An event you don''t want to miss! What MYSTERY GIFT, you ask? Get a hold of the invite, fill in your details and bring it to His Sanctuary of Glory during Easter to exchange for your mystery gift.', 'xchg.jpg', 'HSG Hall 3', 'modalbox', '<p> This event is open to all and admission is FREE! Even if you do not have a copy of our Exchange card, you can get one from our counters during the event. That\\''s right, everyone can bring home a <b>mystery gift!</b></p><br> 	<center> <img src="/hsgmalaysia/images/events/xchgcard.jpg" width="500px"></center>', 1),
(3, '2013-03-31', '2013-03-31', '10:00:00', '12:00:00', 'Easter Exchange KL (Sunday)', 'An event you don''t want to miss! What MYSTERY GIFT, you ask? Get a hold of the invite, fill in your details and bring it to His Sanctuary of Glory during Easter to exchange for your mystery gift.', 'xchg.jpg', 'HSG Sanctuary', 'modalbox', '#', 1),
(6, '2014-08-06', '2014-08-08', '14:30:00', '19:30:00', 'Three Day Conference with Dr. Caroline Leaf', 'The conference has been postponed until further notice. Apologies for any inconvenience caused.', 'vr7vtmc9.png', 'His Sanctuary of Glory', 'modalbox', '&nbsp;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eventsmodalbox`
--

CREATE TABLE IF NOT EXISTS `eventsmodalbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventid` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `eventsmodalbox`
--

INSERT INTO `eventsmodalbox` (`id`, `eventid`, `content`) VALUES
(1, 1, '<p> It is time to give back to the community! </p>\n\n<p>Your one drop of blood can save thousands of lives</p>\n<center>\n<img src="images/events/chc2.png" width="400px"/>\n</center>'),
(2, 2, '<p> This event is open to all and admission is FREE! Even if you do not have a copy of our Exchange card, you can get one from our counters during the event. That\\''s right, everyone can bring home a <b>mystery gift!</b></p><br/>\n	<center> <img src="images/events/xchgcard.jpg"/ width="500px"></center>');

-- --------------------------------------------------------

--
-- Table structure for table `homecontent`
--

CREATE TABLE IF NOT EXISTS `homecontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `homecontent`
--

INSERT INTO `homecontent` (`id`, `title`, `content`, `status`) VALUES
(1, 'Welcome to HSG', '<img src="http://hsgmalaysia.org/images/home/welcome.jpg" alt="" width="390px"><br><br>Warm greetings from the family of His Sanctuary of Glory!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `homesmallads`
--

CREATE TABLE IF NOT EXISTS `homesmallads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `imageurl` varchar(10000) NOT NULL,
  `link` varchar(500) NOT NULL,
  `target` varchar(500) NOT NULL,
  `introline` varchar(500) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `homesmallads`
--

INSERT INTO `homesmallads` (`id`, `title`, `imageurl`, `link`, `target`, `introline`, `position`) VALUES
(1, 'Social Media', 'include(''library/facebooktwitter.php'');', '', '_self', 'Find us on Facebook and Twitter to keep up with our latest updates.', 1),
(2, 'Carecell', 'carecell.jpg', 'functions.php?id=13', '_self', 'Don''t miss out on the fun and love of our carecells! Join us today!', 2),
(3, 'Dr. Caroline Leaf', 'j81h45t7.png', 'http://hsgmalaysia.org/functions.php?id=14#focusanchor', '_blank', 'The conference has been postponed until further notice. Apologies for any inconvenience caused.', 3),
(4, 'Find Us', 'findus.jpg', 'about.php?id=5', '_self', 'Not familiar with the directions? No worries, get maps and directions here!', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hsatbw`
--

CREATE TABLE IF NOT EXISTS `hsatbw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `multiplier` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hsatbw`
--

INSERT INTO `hsatbw` (`id`, `multiplier`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `miracles`
--

CREATE TABLE IF NOT EXISTS `miracles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `author` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `imageurl` varchar(500) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `miracles`
--

INSERT INTO `miracles` (`id`, `title`, `author`, `date`, `imageurl`, `summary`, `content`, `status`) VALUES
(1, 'GOD FIXED MY BROKEN FAMILY', 'Grace Chin', '2011-12-01', 'yn23xpfu.png', 'I soon discovered that as I persevered in prayer, my husband gradually began to change. He has now become a much kinder person. ', '<p>My children and I used to be victims of my husband''s bad temper. His every word was a command and he would be verbally abusive whenever he spoke to me. I could do nothing except to remain silent. Feeling helpless and all alone, I kept quiet for the sake of my children. I often sobbed when no one was looking. Over time, bitterness and resentment towards my husband grew in my heart.</p>\r\n\r\n<p>This was the atmosphere in my life and family before I knew Christ.</p>\r\n\r\n<p> My first encounter with God was when I started attending my sister''s carecell in November 2010. Initially I was quite reluctant to go but after numerous invitations, I decided to try it out. </p>\r\n\r\n<p>While I was there, I was surprised to find a sense of belonging that I had been yearning for a long time. The comfort, peace and joy that I felt was beyond description.</p> \r\n<br>\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/2q1tm1bg.png" width="200px">\r\n</center>\r\n<br>\r\n<p><span style="font-size:18px;">There was so much warmth, love and encouragement all around and I soon found myself eagerly looking forward to this enjoyable gathering every week.</span></p>\r\n<br>\r\n<p>Shortly after attending the carecell a few more times, I accepted Jesus Christ as my personal Lord and Savior. Sharing and learning together with others in the carecell made me wiser and more confident while bringing positive changes to my life. I learnt how to read Bible and pray every day. The importance of obeying God''s word and most of all, the importance of forgiveness.</p><br>\r\n\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/cszn2wb9.png" width="200px">\r\n</center>\r\n<br>\r\n<p>I soon discovered that as I persevered in prayer, my husband slowly began to become a kinder person. As I started attending church, my son also accepted Christ and now he is attending a youth carecell. Recently he was awarded by his school for his outstanding performance in his studies. It is a clear indication of God''s blessing in his life.</p>\r\n\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/ox0z6cyg.png" width="200px">\r\n</center>\r\n\r\n<p>All these little miracles that God has done in my life had turned my entire life around and I feel so blessed.</p> \r\n\r\n<p>Now my prayer is that I will see all of my family members and loved ones come to receive God''s love and miracle and experience His blessing in their lives too.</p>\r\n<br><br><br>\r\n<p>Grace Chin (Self Employed)</p>', 1),
(2, 'HEALED FROM INCURABLE SICKNESS', 'Sharon Teoh', '2011-12-01', 'lvkzbp1c.png', 'God had indeed been good to me. I am ever grateful to Jesus Christ for having healed me and answered our prayers.', '<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/fgjv9f88.png" width="200px">\r\n</center>\r\n\r\n\r\n<p> In my early 20s, I was suffering from bouts of terrible menstrual cramps. It was so bad that I would be on medical leave and spending most of my day rolling in bed or curling up into a ball, all the while groaning in pain. Oftentimes I would fall asleep out of sheer pain and exhaustion.</p>\r\n\r\n<p>Your usual pain killer is 500mg but the pain for me was so excruciating that I was taking 750mg pain killers which kept me pain free for only 30 minutes. I was advised to take a maximum of 4 tablets a day.\r\n</p>\r\n\r\n<p>A visit to a non-regular gynecologist revealed that I had Polycystic Ovary Syndrome (PCOS).</p>\r\n\r\n<p>Multiple pea-sized ulcers were scattered across both my ovaries.</p>\r\n\r\n<p>Despite being diagnosed as benign, I was at risk of being barren and suffer more pain if the ulcers were left to spread. The only way of removal was a laser operation that would burn off the ulcers which cost RM6000 with no guarantee of non-recurrence. To prevent further spreading, the gynecologist placed me on hormone pills, assuring me of no major irreversible side effects except that I may lose some hair or gain some weight.\r\n</p>\r\n\r\n<p>During the 2 years period of consuming this drug, I prayed, asking God for complete healing.</p>\r\n\r\n<p>In 2008, a regular check-up with another gynecologist strangely revealed that I had no traces of PCOS at all. During the scan, the doctor''s exact words were: "What PCOS? Nothing." The scan result showed that both my ovaries were completely unspotted unlike the previous scan. I was so thrilled and exclaimed that the medication must have cured me, but the doctor explained that PCOS could not be cured by any medication.\r\n</p>\r\n\r\n<p>He confirmed that it could only be treated by laser operation. Then it dawned on me that our prayers had been answered and God had indeed miraculously healed me!</p>\r\n<br>\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/jzmnbpg5.png" width="200px">\r\n</center><br>\r\n\r\n<p>Today I have a beautiful 2-year old daughter Shervon and a 7-month old son, Reynold. Praise God!</p>\r\n\r\n<p>God had indeed been good to me.</p>\r\n\r\n<p>I am ever grateful to Jesus Christ for having healed me.\r\n</p>\r\n<br>\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/dc5x6y2k.png" width="200px">\r\n</center>\r\n\r\n<br><br><br>\r\n<p>Sharon Teoh (Trustee For Private Debt Securities)</p>', 1),
(3, 'BEYOND AN ORDINARY STUDENT', 'Sarah Loke', '2011-12-01', 'a2wrjflg.png', 'Colossians 3:23 Whatever you do, work at it with all your heart, as working for the Lord, not for men. ', '<p>Growing up in an environment where I was taught nothing is impossible made me an optimistic person with bubbly personality and BIG DREAMS.</p>\r\n\r\n<p>Throughout my school life, I have always managed to go to church every weekend, be very involved in extra-curricular activities, and still excel in my studies. No matter how busy, weekend is church time and I will be either serving in the youth ministry, the worship team or leading a carecell.</p>\r\n\r\n<p>2009 came along, and I had to sit for SPM (Sijil Pelajaran Malaysia). While my friends began spending their weekends preparing for the exams, I had to choose between God... and my textbooks.</p>\r\n\r\n<p>I chose both.</p>\r\n\r\n<p>I wanted to be a role model for my carecell members-I cannot put God on hold while I study for a test. At the same time, I also wanted to do well so that I can make my parents proud.</p>\r\n\r\n<br>\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/8lpl5oon.png" width="200px">\r\n</center>\r\n<p><span style="font-size:10px;">Sarah''s target for SPM</span></p>\r\n<br>\r\n<p>Holding on to God''s promise that He will honor those who honor Him, I continued to serve in church on weekends; and during the weekdays, I would spend as much time as I could to study and prepare for the exams.</p>\r\n\r\n<p>As the months went by, I realized that my study sessions were always productive as God helped me memorize and absorb facts faster and more effectively.</p>\r\n<br>\r\n<p><span style="font-size:20px;">NOTHING IS IMPOSSIBLE WHEN GOD IS INVOLVED!</span></p>\r\n<br>\r\n<p>When results day came, I was so excited to see straight As on my results slip; but God did not stop there-I found out that I was among the top performing students in Malaysia, and I was even featured in the newspaper!</p>\r\n\r\n<br>\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/ipm4dac8.png" width="200px">\r\n</center>\r\n<p><span style="font-size:10px;">Sarah and other top scorers appearing on the news</span></p>\r\n<br>\r\n<p>There was an immense sense of satisfaction as I knew that all has paid off-by holding on to God''s promises, I have seen His rewards poured into my life.</p>\r\n\r\n<br>\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/im1sd1i7.png" width="200px">\r\n</center>\r\n<p><span style="font-size:10px;">Sarah with her result slip</span></p>\r\n<br>\r\n<p>With God in my life, I achieved so much more than I normally could.\r\n</p><p>\r\nI could obtain the results I desired and be a good carecell leader at the same time. \r\n</p><p>\r\nOn top of that, when I applied to further my studies, I got into the college of my choice with no hassle, and they even rewarded me with a scholarship!\r\n</p><p>\r\nTruly, nothing is impossible when God is involved! \r\n</p><p>\r\nI have experienced it!\r\n</p>\r\n\r\n<br><br><br>\r\n<p>Sarah Loke (College Student)</p>', 1),
(4, 'MIRACLE OF FINANCIAL FREEDOM', 'Albert Pang', '2011-12-01', 'v8ipt3ce.png', 'Matthew 6:33 But seek first his kingdom and his righteousness, and all these things will be given to you as well.', '<p>Going from earning 4-figure salaries to financial freedom in just 4 years; <br>my life now is so exciting and fulfilling!\r\n</p>\r\n\r\n<p>I totally understand how it feels like struggling to make ends meet, thinking twice before treating yourself to a good meal and wishing you can do more for your family, because I was there before.</p>\r\n\r\n<p>Just four years ago, I was a sales manager in a small company, earning a small salary. I found myself in a constant challenge and frustration to feed a family of four and also provide the best for them.</p>\r\n\r\n<br>\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/6sjhxrwl.png" width="200px">\r\n</center>\r\n<p><span style="font-size:10px;"> Albert''s family</span></p>\r\n<br>\r\n\r\n\r\n<p>However, in spite of all the difficulties I was facing, I never gave up on life and most importantly, I never gave up on God.</p>\r\n\r\n<p>Despite my dire financial circumstances, I remembered God''s promise that He will take care of my life when I put Him first and trust in Him. I continued to serve faithfully in church, prayed and asked God to give me the ability to financially bless the church and also to be a blessing to those I love.</p>\r\n\r\n<p>In my prayer, I specifically asked for a business with 5-figure monthly profits.</p>\r\n\r\n<br>\r\n<p><span style="font-size:20px;">In spite of all the difficulties I was facing, I never gave up on life and most importantly, I never gave up on God.</span></p>\r\n<br>\r\n\r\n\r\n<p>Shortly after, I was offered the prospect of a new business venture in health-related products. <br>This was to be the turning point in my financial life.</p>\r\n\r\n<p>In the 4th month working part-time in the business, I managed to earn RM4000 and in the 8th month, RM18,000. The following month I brought in more than RM20,000!</p>\r\n\r\n<p>I have since resigned from my job as a sales manager and I am now focusing on my new business.</p>\r\n\r\n<p>This financial freedom has enabled me to spend more quality time with my family including taking them for vacations that we could only yearn for before.</p>\r\n\r\n<br>\r\n<center>\r\n<img src="http://hsgmalaysia.org/images/miracles/iyktgbc0.png" width="300px">\r\n</center>\r\n<p><span style="font-size:10px;"> Albert''s family now</span></p>\r\n<br>\r\n\r\n\r\n<p>This success has made me feel more confident and so much happier. I am thankful to the people and for the values and principles I received from His Sanctuary of Glory which has led me to where I am today.</p>\r\n\r\n<p>God has given me financial prosperity, improved the relationships within my family and enabled me to do all that I could only dream of previously.</p>\r\n\r\n<p>This miracle that God has done for me, He will do for you too.</p>\r\n<br><br><br>\r\n<p>Albert Pang (Businessman)</p>\r\n\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsupdate`
--

CREATE TABLE IF NOT EXISTS `newsupdate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `newsupdate`
--

INSERT INTO `newsupdate` (`id`, `date`, `message`, `status`) VALUES
(35, '2014-03-06 08:40:59', 'Pre-registration for Dr. Caroline Leaf''s  2014 Conference @ HSG is now available!', 0),
(37, '2014-03-06 08:44:14', 'Our landscaping project is progressing really well.. Exciting times ahead!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `submenupages`
--

CREATE TABLE IF NOT EXISTS `submenupages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentmenu` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `leftcontent` varchar(10000) NOT NULL,
  `rightcontent` varchar(10000) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `submenupages`
--

INSERT INTO `submenupages` (`id`, `parentmenu`, `title`, `leftcontent`, `rightcontent`, `position`) VALUES
(1, 'about', 'Our Story', '<contenttitle style="color:#00387A">OUR STORY</contenttitle>\r\n<br>\r\n<center><img src="http://hsgmalaysia.org/images/about/ourstory.png" width="400px"></center>\r\n<br><br>\r\n\r\nWith a two-pronged strategy of Spiritual Restoration and Economic Empowerment, His Sanctuary of Glory believes that spirituality and prosperity are not conflicting but complementary in the pursuit of a quality life and personal destiny in God. <br><br>\r\n\r\nWe are committed to build and better the lives of others and to help them live their dreams.', '<br><br><br><br>\r\n<div class="homesmalladstitlebg" style="width:220px"><div class="homesmalladstitle" style="width:60px">contact</div></div>\r\n<br><center><img src="http://hsgmalaysia.org/images/about/contact_phone.jpg" width:150px=""></center><br>\r\nPlease contact us if you have any inquiries.<br><br>\r\n<b>\r\nCall us at +603 7980 5001<br>\r\nFax us at +603 7980 5404<br><br>\r\n</b>\r\n<div class="homesmalladstitlebg" style="width:220px"></div>', 1),
(2, 'about', 'Our Vision', '<contenttitle style="color:#00387A">OUR MISSION</contenttitle> <br> <br>  <br> \r\nTo build a strong local Church where people become members who are nourished and equipped in the Word of God to serve others in love through a Biblical Christian lifestyle.\r\n<br><br> <br> \r\n<contenttitle style="color:#00387A">OUR VISION</contenttitle> <br> <br>  <br> \r\n\r\n<table width="600" border="0" cellpadding="5px" style="font-family:Georgia, \\" times="" new="" roman\\",="" times,="" serif;"="">\r\n  <tbody><tr>\r\n    <td width="100px" style="text-align:center;"><img src="http://hsgmalaysia.org/images/about/growing_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;"><b>A Growing &amp; Glorious</b> Church</span><br>Growing without compromise<br></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n   \r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="http://hsgmalaysia.org/images/about/loving_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;"><b>A Loving &amp; Caring</b> Church</span><br>Every disciple a minister for Jesus Christ<br></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n\r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="http://hsgmalaysia.org/images/about/missiongiving_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;"><b>A Mission Giving</b> Church</span><br>Living for Jesus Christ by reaching out to the lost<br></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n   \r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="http://hsgmalaysia.org/images/about/worship_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;"><b>A Worshipping</b> Church</span><br>Loving God with all our heart, strength and mind<br></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n   \r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="http://hsgmalaysia.org/images/about/citywide_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;"><b>A City Wide</b> Church</span><br>Meeting in Carecells across the city<br></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n   \r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="http://hsgmalaysia.org/images/about/global_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;"><b>A Global </b> Church</span><br>Building strong local churches for Christ locally and globally<br></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>    \r\n</tbody></table>', '<br>', 2),
(3, 'about', 'Our Pastors', '<contenttitle style="color:#00387A">OUR SENIOR PASTORS</contenttitle><br><br><br><span style="font-size:15px;">"There are no walls of limitation in ministry or experience in Christ except that which you build"</span><br><br>\r\n<center><img src="http://hsgmalaysia.org/images/about/pastors2.jpg"></center>\r\n<br><br>\r\nRev Daniel Cheah and his wife, Rev Deborah Ong obtained their Theological Education at The Bible College of Malaysia &amp; Life Christian University, USA. Presently both are ordained ministers of The Assemblies of God of Malaysia, as well as successful entrepreneurs.<br><br>\r\n\r\nTheir heart is to reach the world with the love of God and to reveal God''s dynamic purpose to them. Many lives have been changed and radically transformed by the power of the Holy Spirit through their ministry as they taught in seminars, conferences and churches around the world.<br><br>\r\n\r\nVisionaries in heart and in action, they inspire and encourage the church to rise to their God-given potential and destiny; motivating and leading them into action for the Lord Jesus Christ.<br>', '<br>', 3),
(4, 'about', 'Our Culture', '<contenttitle style="color:#00387A">OUR CULTURE</contenttitle> <br> <br>  <br> \r\n\r\n\r\n<table width="600" border="0" cellpadding="5px" style="font-family:Georgia, \\" times="" new="" roman\\",="" times,="" serif;"="">\r\n  <tbody><tr>\r\n    <td width="100px" style="text-align:center;"><img src="images/about/excellence_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;">Pursuit of Excellence</span></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n\r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="images/about/excellence_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;">Belief in People</span></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n\r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="images/about/generosity_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;">Joyful Generosity</span></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n\r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="images/about/enthusiasm_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;">Contagious Enthusiasm</span></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n\r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="images/about/loyalty_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;">Undivided Loyalty</span></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n\r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="images/about/vision_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;">Exciting Vision</span></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n\r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="images/about/faith_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;">Vibrant Faith</span></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td width="100px" style="text-align:center;"><img src="images/about/prayer_icon.jpg"></td>\r\n    <td width="450px"><span style="font-size:25px;">Belief in Prayer</span></td>\r\n  </tr>\r\n  <tr height="20px">\r\n    <td width="100px"></td>\r\n    <td width="450px"></td>\r\n  </tr>\r\n  \r\n</tbody></table>', '', 4),
(5, 'about', 'Our Location', '<contenttitle style="color:#00387A">OUR LOCATION</contenttitle> <br><br><br> \r\n\r\n<b>Address:</b><br>\r\nNo. 10, Jalan Awan Berarak, Taman Yarl, 58200 Kuala Lumpur, Malaysia<br><br>\r\n\r\n<b>Google maps:</b><br>\r\n<a href="http://bit.ly/hsgklmap" target="_blank">http://bit.ly/hsgklmap</a><br><br><br>\r\n<center><img src="http://hsgmalaysia.org/images/about/map.jpg" width="500px"></center>\r\n<br><br>\r\n\r\n<h1><b>Getting There by Road</b></h1>\r\n\r\n<b>By Road from KL City Centre</b><br>\r\nProceed to Jalan Syed Putra and then on to Jalan Klang Lama. About 8km from the City, you will pass by Pearl International Hotel which will be on your left and come to Taman Overseas Union. Enter into this housing area and after passing OUG Plaza, turn right at the traffic light into Jalan Awan Besar. Then turn right into Jalan Awan Jawa and go straight until the end of the road, past a few shoplots, and turn left into Jalan Awan Berarak. HSG is located along Jalan Awan Berarak.<br><br>\r\n\r\n<b>By Road from PJ Town Centre</b><br>\r\nProceed to Jalan Templer and head towards KL City using Jalan Klang Lama. Enter into Jalan Puchong (Landmark: Petaling Police Station). Along the left side of Jalan Puchong you will see the building of Pure Life Society. Turn left into Jalan Tan Yew Lai when you come to a traffic light immediately after this building. Proceed along this road until you come to a Electric Sub-power Station. Turn to the left and you will come to Jalan Awan Berarak. HSG is located along Jalan Awan Berarak.<br><br>\r\n\r\n<h1><b>Getting There by Public Transport</b></h1><br>\r\n\r\n<span style="color:#141F97;"><b>By Light Rapid Transit System</b></span><br><br>\r\n\r\n<b>Using STAR LRT</b><br>\r\nProceed to Sri Petaling LRT Station. Take a feeder bus to Taman Overseas Union and get down at the BP petrol kiosk next to the MCA community hall. From this point, you will need to take a 15 minute walk to HSG. Proceed to Jalan Awan Jawa 1 (landmark: A1 minimart). At the end of this road, proceed to Jalan Awan Berarak. HSG is located along Jalan Awan Berarak.<br><br>\r\n\r\n<b>Using PUTRA LRT</b><br>\r\nProceed to Jalan Masjid India Station. At this LRT station, you will need to proceed to the STAR LRT station. Proceed to Sri Petaling LRT Station. Take a feeder bus to Taman Overseas Union and get down at the BP petrol kiosk next to the MCA community hall. From this point, you will need to take a 15 minute walk to HSG. Proceed to Jalan Awan Jawa 1 (landmark: A1 minimart). At the end of this road, proceed to Jalan Awan Berarak. HSG is located along Jalan Awan Berarak.<br><br>\r\n\r\n<span style="color:#141F97;"><b>By BUS from KL City Centre (Kelang Bus Terminal)</b></span><br><br>\r\n\r\n<b>CityLiner 209</b><br>\r\nThis bus will bring you to OG Heights using the Jalan Puchong. After going through Taman Tan Yew Lai, please get down at the Jalan Awan Cina bus stop. From this point, you will need to take a 5 minute walk to HSG. Proceed back along this road and turn right into Jalan Awan Berarak. HSG is located along Jalan Awan Berarak.<br><br>\r\n\r\n<b>CityLiner 65</b><br>\r\nThis bus will bring you to Taman Overseas Union. Please get down at the BP petrol kiosk next to the MCA community hall. From this point, you will need to take a 15 minute walk to HSG. Proceed to Jalan Awan Jawa 1 (landmark: A1 minimart). At the end of this road, proceed to Jalan Awan Berarak. HSG is located along Jalan Awan Berarak.<br><br>\r\n\r\n<b>Intrakota 69, CityLiner 55 and Metrobus 19</b><br>\r\nThis bus will bring you to Jalan Puchong. Please get down at the bus stop near the Pure Life Society building. From this point, you will need to take a 10 minute walk to HSG. Enter into Taman Tan Yew Lai using Jalan Tan Yew Lai. Proceed along this road until you come to a Electric Sub-power Station. Turn to the left and you will come to Jalan Awan Berarak. HSG is located along Jalan Awan Berarak.<br>', '<br><br><br><br> <div class="homesmalladstitlebg" style="width:220px"><div class="homesmalladstitle" style="width:50px">FIND US</div></div> <br><center><img src="http://hsgmalaysia.org/images/home/findus.jpg" width="220px"></center><br> Not familiar with the directions? No worries, get maps and directions <a href="https://plus.google.com/100434915857106408027/about?gl=US&amp;hl=en" target="_blank">here!</a><br><br> <div class="homesmalladstitlebg" style="width:220px"></div>', 5),
(6, 'Missions', 'Overview', '<contenttitle style="color:#961b6F">OVERVIEW</contenttitle><br><br> \r\n<center><img src="http://hsgmalaysia.org/images/missions/overviewmap.jpg" width="500px"></center><br><br>  \r\n<span style="text-align:center;font-size:15px;"> His Sanctuary of Glory Global Ministries (HSGGM) is about re-imagining the possibilities and\r\ninvolvement in global mission in a fresh and significant way. <br>Our goal is to raise families of spiritually vibrant and economically empowered churches which are able to fulfill their God-given mandate and dreams in their countries.<br><br>\r\nThey will become churches which connect the people with the message of the Kingdom of God and give them the\r\ninspiration to build a quality life for themselves and help create a better world around them.\r\n</span><br><br>\r\n\r\n<h1>Our Story:</h1>  During a conference in 1989 in the United States of America, a prophecy was given to Rev. Daniel Cheah, that God would open up the nations of Southeast Asia and beyond to HSG. Following that, the church launched actively into missions to the surrounding countries.<br><br>   Then in 1995, through a vision God confirmed the prophecy to Rev. Daniel. In that vision, he saw ships sailing across the oceans, and the Holy Spirit said:<br><br>  <center> <img src="http://hsgmalaysia.org/images/missions/ship.jpg" width="500px"></center><br>   <span style="text-align:center;font-size:15px;"> "You are a Man of War. As these ships sailed the oceans of the world, so will I take you to the nations... and where you go, I will release the treasures of the nations."</span><br><br>   From that point, HSG Global Ministries expanded as God began to open up doors of ministry across the world. After millions of dollars in giving, the Global Ministries of HSG now spans over 10 nations, comprising of a few hundred churches and a global congregation numbering over ten thousand believers.<br><br>  <h1>Our Mission:</h1>  Taking the message of Spiritual Restoration and Economic Empowerment to the Nations by Building and Networking Strong Local Churches<br><br>  <h1>Our Vision:</h1>  One Church in Many Locations<br><br>  <h1>Strategies:</h1>  Our strategies to fulfil the vision of building strong local churches<br> <ul> <li>Develop strong and effective leaders and organisational structures</li> <li>Committed discipleship and equipping programmes to transform members into ministers</li> <li>Promote and inculcate positive church culture and spirit</li> <li>Implant and impart visionary thinking and concepts</li><br> </ul>', '<br><br><br><br> <div class="homesmalladstitlebg" style="width:220px"><div class="homesmalladstitle" style="width:80px">contribute</div></div> <br><center><img src="http://hsgmalaysia.org/images/missions/contributelogo.jpg" width:90px=""></center><br><br> Please contact our treasurer,<br> Ms. Sylvia Ho, if you wish to make contributions to the missions fund.<br><br>  <b>Contact no.  +603 7980 5001</b><br><br> <div class="homesmalladstitlebg" style="width:220px"></div>', 1),
(7, 'Missions', 'Logo', ' <contenttitle style="color:#961b6F">LOGO</contenttitle><br><br> <center><img src="http://hsgmalaysia.org/images/missions/hsggmlogo.jpg" width="300px"></center><br><br><br>  \r\n<span style="text-align:center;font-size:15px;"> The HSGGM logo represents two flowing waves merging (B) and a dove (A). </span>\r\n<br><br>It symbolizes the twin messages of Spiritual Restoration and Economic Empowerment sweeping across the nations like a wave powered by the Holy Spirit. The 8 strokes forming the wings of the logo represents the 8 Cultures of our Church (Pursuit of Excellence, Belief in People, Joyful Generosity, Contagious Enthusiasm, Undivided Loyalty, Exciting Vision, Vibrant Faith &amp; Belief in Prayer).', '<br>', 2),
(8, 'Missions', 'B.O.D.', '<contenttitle style="color:#961b6F">BOARD OF DIRECTORS</contenttitle><br><br> <img src="http://hsgmalaysia.org/images/missions/bod.jpg" width="500px"><br>', '<br>', 3),
(9, 'Missions', 'Contact Us', '<contenttitle style="color:#961b6F">CONTACT US</contenttitle><br><br> \r\nIf you are pastoring a church and would like to get connected or know more about us,<br> please contact: <br><br>\r\n<b>Wong Lee Chu<br>\r\n(lcwong7@unifi.my)<br>\r\nNational Missions Director</b><br>\r\nfor ministries within Malaysia\r\n<br><br>\r\n<b>Richard Tan<br>\r\n(bigrichtan@gmail.com)<br>\r\nInternational Missions Director</b><br>\r\nfor ministries beyond Malaysia.<br><br>\r\n\r\nFind out the schedules of our mission trips and join us in building the nations.<br> We are pleased to assist should you be interested in contributing your stories and experiences or simply to learn more about us. <br><br>\r\n\r\nPlease contact <br><br>\r\n<b>Nancy @ +603 7980 5001</b><br><br>\r\nor write in to us at<br><br>\r\n<b>hsg.globalministries@gmail.com\r\n<br><br>\r\nHSG Global Ministries</b><br>\r\nNo.10, Jalan Awan Berarak, Taman Yarl, 58200 KL, Malaysia.<br><br>\r\nContact No.: +603 7980 5001\r\n', '<br>', 4),
(11, 'Functions', 'HSG KL', '<contenttitle style="color:#4c00b7">HSG KL</contenttitle><br><br><br>\r\n\r\nHere at HSG, come and experience God''s unbelievable presence, His power and His unending love.<br><br>\r\n\r\nNo matter who you are, we believe God wants to speak into your life.<br><br>\r\n\r\nOur vibrant and inspirational worship services cater for everyone. And we mean everyone - from children to teenager, working adults, right up to parents of all ages and yes even you. We have a service for you.<br><br>\r\n\r\nJoin us and experience a betterment of your life and your family today!<br><br>\r\n<br>\r\n\r\n<div style="width:500px; text-align:right;">\r\n<img class="needhovereffect" src="http://hsgmalaysia.org/images/functions/function_banner1.png" width="450px">\r\n<br>\r\nSUNDAYS SANCTUARY @ 10AM&#8195;&#8195;\r\n</div>\r\n<br><br>\r\n<div style="width:500px; text-align:right;">\r\n<img class="needhovereffect" src="http://hsgmalaysia.org/images/functions/00tqlp9x.png" width="450px">\r\n<br>\r\nSUNDAYS HALL 1 @ 10AM; 1st SUNDAYS SANCTUARY @ 10AM&#8195;&#8195;\r\n</div>\r\n<br><br>\r\n<div style="width:500px; text-align:right;">\r\n<img class="needhovereffect" src="http://hsgmalaysia.org/images/functions/72a8frb1.png" width="450px">\r\n<br>\r\nSUNDAYS HALL 2 @ 10AM&#8195;&#8195;\r\n</div>\r\n<br><br>\r\n\r\n<div style="width:500px; text-align:right;">\r\n<img class="needhovereffect" src="http://hsgmalaysia.org/images/functions/ct61wgpn.png" width="450px">\r\n<br>\r\nSATURDAYS HALL 3 @ 5PM&#8195;&#8195;\r\n</div>\r\n<br><br>', '<br>', 1),
(12, 'Functions', 'Local', '<contenttitle style="color:#4c00b7">LOCAL</contenttitle><br><br><br>\r\n\r\nIf you are not in Kuala Lumpur and would like to attend our services, we are also located at Kajang and Penang.<br><br><br>\r\n\r\n<div style="width:500px; text-align:right;">\r\n<img class="needhovereffect" src="http://hsgmalaysia.org/images/functions/function_local_banner1.png" width="450px">\r\n<br>\r\n10TH FLOOR, SUNTECH@PENANG CYBERCITY&#8195;&#8195;<br>\r\nSUNDAY @ 10.30AM&#8195;&#8195;\r\n</div>\r\n<br><br>\r\n<div style="width:500px; text-align:right;">\r\n<img class="needhovereffect" src="http://hsgmalaysia.org/images/functions/function_local_banner2.png" width="450px">\r\n<br>\r\nBLOK A-19-1, TAMAN KAJANG SENTRAL&#8195;&#8195;<br>\r\nSUNDAY @ 9.45PM&#8195;&#8195;\r\n</div>\r\n<br><br>', '<br>', 2),
(13, 'Functions', 'Carecells', '<contenttitle style="color:#4c00b7">CARECELLS</contenttitle><br><br><br>\r\n\r\n<script>\r\nfunction MM_swapImgRestore() { //v3.0\r\n  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;\r\n}\r\nfunction MM_preloadImages() { //v3.0\r\n  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();\r\n    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)\r\n    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}\r\n}\r\n\r\nfunction MM_findObj(n, d) { //v4.01\r\n  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {\r\n    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}\r\n  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];\r\n  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);\r\n  if(!x && d.getElementById) x=d.getElementById(n); return x;\r\n}\r\n\r\nfunction MM_swapImage() { //v3.0\r\n  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)\r\n   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}\r\n}\r\n</script>   \r\n\r\n\r\n <div style="float: left;">\r\n       <img src="images/functions/carecells_word.png"> \r\n   </div>\r\n            <div style="float: left; margin-left:40px; position: relative; ">   \r\n                <img style="margin-left: -40px;" id="hoverimg" src="images/functions/carecells_banner1.png" name="c1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage(''c1'','''',''images/functions/carecells_banner1h.png'',1)">\r\n                <br>\r\n                <img style="margin-left: -115px; margin-top: 10px;" src="images/functions/carecells_banner2.png" name="c2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage(''c2'','''',''images/functions/carecells_banner2h.png'',1)"> \r\n                <br>\r\n                <img style="margin-left: -190px; margin-top: 10px;" src="images/functions/carecells_banner3.png" name="c3" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage(''c3'','''',''images/functions/carecells_banner3h.png'',1)">\r\n            </div>\r\n            <div style="float: left; margin-left: -20px; margin-top:70px; position: relative;">      \r\n                <img style="margin-left: -60px;" src="images/functions/carecells_banner4.png" name="c4" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage(''c4'','''',''images/functions/carecells_banner4h.png'',1)">\r\n                <br>\r\n                <img style="margin-left: -135px; margin-top: 10px;" src="images/functions/carecells_banner5.png" name="c5" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage(''c5'','''',''images/functions/carecells_banner5h.png'',1)">\r\n                <br>\r\n                <img style="margin-left: -210px; margin-top: 10px;" src="images/functions/carecells_banner6.png" name="c6" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage(''c6'','''',''images/functions/carecells_banner6h.png'',1)">\r\n               </div>\r\n           \r\n<div style="clear: both;">\r\n<br><br>			\r\n<span style="font-size:19px">Here at HSG, we want you to experience God''s unbelievable presence, His power and His unending love via carecells!</span>\r\n<br><br>\r\nNo matter who you are, we believe there is a carecell just for you.<br>\r\nJoin a carecell today and experience a betterment of your life and your family.<br>\r\n</div> ', '<br><br><br><br> <div class="homesmalladstitlebg" style="width:220px"><div class="homesmalladstitle" style="width:75px">transport</div></div> <br><center><img src="http://hsgmalaysia.org/images/functions/car.jpg" width="150px"></center><br><br> Please contact our office and tell us your location so that we can make the arrangements.<br><br><b>Call us at +603 7980 5001</b> <br><br><div class="homesmalladstitlebg" style="width:220px"></div>', 3),
(14, 'Functions', 'Events', 'include(''library/callevent.php'');', '', 4),
(15, 'Testimonies', 'Real People.Real Miracles', 'include(''library/calltestimony.php'');', '<br>', 2),
(16, 'Testimonies', 'It Can Happen to You Too', '<center>\r\n<h2>\r\n<b>Two things you should know:<br>\r\n1. God''s promises are real<br>\r\n2. God does answer prayers<br>\r\n</b>\r\n</h2>\r\n</center>\r\n<br>\r\n\r\nThe stories you have just read are only a drop in the ocean, the tip of an iceberg compared to the things you will experience when you begin to partner with God in your journey through life. If you have been blessed by these real life stories, and would like to receive Jesus Christ as Lord and Savior, just say this simple prayer:<br><br><br>\r\n\r\n<i>"Dear God, I believe that Jesus died on the cross for me and rose again on the third day. Please forgive me of all my sins. Thank you for taking away all my sins. Please come into my life and be my Lord and Savior. In Jesus''s name, Amen."</i><br><br><br>\r\n\r\nIf you have prayed this prayer, or you have a need and would like to have someone pray together with you, we are here to help you experience God''s blessings and miracles. <br><br>\r\nPlease contact <b>Pastor Patrica Tan at +603 7980 5001.</b><br><br>\r\n\r\nIf you have a beautiful testimony about your experience with God''s grace or miracle in your life and would like to bless others by sharing your story, please do not hesitate to let us know or send us your testimony at <b>testimonies.hsg@gmail.com</b>.<br><br>\r\n\r\nGod bless you.\r\n', '<br>', 3),
(17, 'Testimonies', 'Miracles Are Real', '<span style="font-size:20px;">\r\nFOR EVERY MOUNTAIN, THERE IS A MIRACLE. </span><br>\r\nRobert H. Schuller <br><br><br>\r\n\r\nMiracles are easily dismissed as mere coincidences, strokes of luck or even good fortune.<br><br>\r\n\r\nRather than to accept that something beyond our comprehension has occurred, it is far easier to say that miracles do not exist... until one experiences it firsthand.<br><br>\r\n\r\nReal people. Real lives.<br><br>\r\n\r\nThese individuals featured are living proof that miracles are real, and they affect us in very real ways. From academic achievement to financial freedom; from transformed characters to restored families. It is our desire that these stories will inspire you, encourage you and prove to you that God is real.. and He wants to be on your side!&nbsp;<br><br>\r\n\r\n<a href="testimonies.php?id=15#focusanchor" style="text-decoration:none;">\r\n<div class="button" style="color:#FFF;font-weight:bold;">\r\nContinue\r\n</div>\r\n</a>', '<br>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rank` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rank`) VALUES
(33, 'masteradmin', 'c0a9dff168485ea56640b36eb19077d7b8f87f4f', 'master'),
(36, 'dataadmin', 'e5b429a5964b3076de9d9896048459a004f26b32', 'dataentry');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
