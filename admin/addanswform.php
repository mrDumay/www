<?php
/***************************************************************************
 *                              addanswform.php
 *                            -------------------
 *   begin                : Monday, Feb 28, 2005
 *   copyright            : (C) 2004 The ZCI Group
 *   email                : zcinc@mail.ru
 *
 *   $Id: addanswform.php,v 2.17.0.1 2005/03/1  Exp $
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
 
 $query_post = "SELECT * FROM guestbook_posts WHERE id_post=".$_GET['id_post'];
 if($sql_post = mysql_query($query_post)) {
	$post = mysql_fetch_array($sql_post); 
	$post_body = $post['post_body'];
	$post_answer = $post['post_answer'];
	$id_post = $post['id_post'];
 }else {
 	puterror("Ошибка при выводе соощения");
 }			
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Гостевая книга :: Ответ пользователю</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body>
<link href="../utils/guestbook.css" rel="stylesheet" type="text/css">
<ul id="globalnav-helpmenu">
		<li><a href="../license.php">License</a></li>
		<li><a href="../readme.php">About</a></li>
		<li><a href="../index.php">Guest Book</a></li>
</ul>
<div id="pagecell"> 
  <img alt="" src="../utils/images/tl_curve_white.gif" height="6" width="6" id="tl"> <img alt="" src="../utils/images/tr_curve_white.gif" height="6" width="6" id="tr"> 
  <div id="breadCrumb"> 
    <a href="../index.php">Index</a> /  <a href="../admin/index.php">Admin</a> / <a href="../addanswform.php">Add Answer Form</a>
  </div>
  <div id="pageName"> 
    <h2>Гостевая книга :: Ответ пользователю</h2> 
	<img src="../utils/images/logo_mac.gif" alt="">	
  </div>
  <div id="content">
<div class="story"> 
      <table width="100%" cellpadding="0" cellspacing="0"> 
        <tr valign="top"> 
          <td class="storyLeft"> <p> 
				<form action="addansw.php" method="post">
					<table align="center">
						<tr>
							<td>
								<textarea cols="70" rows="13" name="post_body"><? echo "$post_body"; ?></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<textarea cols="70" rows="13" name="post_answer"><? echo "$post_answer"; ?></textarea>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input type="submit" name="answer" value="Ответить" class="button">
								<input type="hidden" name="id_post" value="<? echo "$id_post"; ?>">
							</td>
						</tr>
					</table> 
				</form>
			</p></td> 			
        </tr> 
      </table> 
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
 
