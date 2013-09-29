CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `e-mail` text NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) AUTO_INCREMENT=0;# MySQL ������� ������ ��������� (�.�. ���� �����).


-- 
-- ���� ������ ������� `guestbook_authors`
-- 

INSERT INTO `guestbook` VALUES (1, 'Admin', 'mail@mail.ru', '������ ���������', '2005-03-07 17:33:48');# ��������� 1 ������.



CREATE TABLE `guestbook_authors` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `msg` text NOT NULL,
  `post_putdate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_author`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;

-- 
-- ���� ������ ������� `guestbook_authors`
-- 

INSERT INTO `guestbook_authors` VALUES (1, 'Admin', 'mail@mail.ru', '������ ���������', '2005-03-07 17:33:48');

-- --------------------------------------------------------

-- 
-- ��������� ������� `guestbook_posts`
-- 

CREATE TABLE `guestbook_posts` (
  `id_post` int(11) NOT NULL auto_increment,
  `post_body` text NOT NULL,
  `post_answer` text NOT NULL,
  `post_hide` enum('show','hide') NOT NULL default 'show',
  `post_putdate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_post`)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=5 ;

-- 
-- ���� ������ ������� `guestbook_posts`
-- 

INSERT INTO `guestbook_posts` VALUES (1, '��� ������ ��������� � ����� �������� �����.', '� ��� ������ ��������� � ����� �������� �����.', 'show', '2005-03-07 17:33:48');
        
        