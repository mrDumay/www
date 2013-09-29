<?php
/***************************************************************************
 *                              index.php
 *                            -------------------
 *   begin                : Monday, Feb 28, 2005
 *   copyright            : (C) 2004 The ZCI Group
 *   email                : zcinc@mail.ru
 *
 *   $Id: index.php,v 2.17.0.1 2005/03/1  Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/
 
 define('IN_ZCGUESTBOOK', TRUE);
 include "../utils/kernel.php";
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Гостевая книга :: Администрирование</title>
<link href="../utils/guestbook.css" rel="stylesheet" type="text/css">
<ul id="globalnav-helpmenu">
		<li><a href="../license.php">License</a></li>
		<li><a href="../readme.php">About</a></li>
		<li><a href="../index.php">Guest Book</a></li>
</ul>
<div id="pagecell"> 
  <img alt="" src="../utils/images/tl_curve_white.gif" height="6" width="6" id="tl"> <img alt="" src="../utils/images/tr_curve_white.gif" height="6" width="6" id="tr">
  <div id="breadCrumb"> 
    <a href="../index.php">Index</a> / <a href="../admin/index.php">Admin</a> /
  </div>
  <div id="pageName"> 
    <h2>Гостевая книга :: Администрирование</h2>
	<img src="../utils/images/logo_mac.gif" alt="">  
  </div>
<div id="content">
	<div class="story">
		<?php
			if(empty($start)) $start=0;
			if($start<0) $start=0;
			$tot = mysql_query("SELECT count(*) FROM guestbook_posts WHERE post_hide='show';");
			$totalposts = mysql_fetch_array($tot);
			$count = $totalposts['count(*)'];
			$query_posts = "SELECT * FROM guestbook_posts ORDER BY post_putdate DESC LIMIT ".$start.", ".$pnumber.";";
			if($start>0) echo "<img src=../utils/images/backpage.gif>&nbsp;<a href=index.php?start=".($start - $pnumber).">Предыдущие</a>&nbsp;&nbsp;";
			if($count>$start + $pnumber) echo "<a href=index.php?start=".($start + $pnumber).">Следующие</a>&nbsp;<img src=../utils/images/nextpage.gif>";
			if($sql_posts = mysql_query($query_posts)) {
			
				while($post = mysql_fetch_array($sql_posts)) {
				
					$id_post = $post['id_post'];
					$post_body = $post['post_body'];
					$post_answer = $post['post_answer'];
					$post_putdate = $post['post_putdate'];
					$post_hide = $post['post_hide'];
					
					$query_authors = "SELECT * FROM guestbook_authors WHERE id_post=".$id_post;
					if($sql_authors = mysql_query($query_authors)) {
						
						while($author = mysql_fetch_array($sql_authors)) {
							
							$id_author = $author['id_author'];
							$author_name = $author['author_name'];
							$author_city = $author['author_city'];
							$author_icq = $author['author_icq'];
							$author_email = $author['author_email'];
						}
						}else {
							puterror("Произошла ошибка при выводе сообщений.");
						}
		?>	
			<br><br>
			<table border="0" cellpadding="0" cellspacing="0" width="90%" align="center">
				<tr bgcolor="#C5D7DB">
					<td rowspan="1" height="20">&nbsp;<b><? if(empty($post_answer) || $post_answer == '-') echo "<img src=../utils/images/new.gif>&nbsp;&nbsp;";?><? echo "$author_name"; ?></b>&nbsp;(<? echo "$author_city"; ?>)</td>
					<td width="100%" valign="bottom" align="right"><span class="postputdate">от: <b><? echo "$post_putdate"; ?></b></span></td>
				</tr>
				<tr>
					<td></td>
					<td bgcolor="gray" height="1"><img src="../utils/images/gb_bottom.gif" border="0" width="1" height="1" alt=""></td>
				</tr>
				<tr valign="top">
   					<td rowspan="2" colspan="2" height="25">
						<a href="mailto:<? echo "$author_email"; ?>"><? echo "$author_email"; ?></a>&nbsp;&nbsp;&nbsp;|
					</td>
				</tr>
				<tr>
   					<td height="10"><nop></td>
				</tr>
				<tr valign="top">
					<td colspan="2">
						<span class="postbody"><? echo "$post_body"; ?></span>
							<br><br>
	<?php
        if (!empty($post_answer) && $post_answer != "-" ) 
        {
           echo "<span class=postanswer>Администратор:&nbsp".$post_answer."</span>&nbsp";
        } else{
			echo "";
		}	           
    ?>
		</td>
	</tr>
</table>
<?php
		echo "<table style='margin-left:40px;'><tr>";	
		echo "<td><a href=./addanswform.php?id_post=".$id_post.">Ответить</a></td>";
		echo "<td><a href=./delpost.php?id_post=".$id_post.">Удалить</a></td>";
		if($post_hide == 'show') echo "<td><a href=./hidepost.php?id_post=".$id_post.">Скрыть</a></td>";
		if($post_hide == 'hide') echo "<td><a href=./showpost.php?id_post=".$id_post.">Отобразить</a></td>";
		echo "</tr></table>";
?>
<br><br>
	<?php
		}
	}	
	?>  	
    </div>
</div>
<div id="siteInfo">	    
	<a href="../readme.php">About Us</a> |	<a href="../license.php">License</a> | &copy;2005 IT-студия ZCI
</div>
</div>
</body>
</html>
<?php
/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/
?>
