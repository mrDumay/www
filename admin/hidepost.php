<?php
/***************************************************************************
 *                              hidepost.php
 *                            -------------------
 *   begin                : Monday, Feb 28, 2005
 *   copyright            : (C) 2004 The ZCI Group
 *   email                : zcinc@mail.ru
 *
 *   $Id: hidepost.php,v 2.17.0.1 2005/03/1  Exp $
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
 
$query_post = "UPDATE guestbook_posts SET post_hide='hide' WHERE id_post=".$_GET['id_post'];
if(mysql_query($query_post)) {
  print "<HTML><HEAD>\n";
  print "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>\n";
  print "</HEAD></HTML>\n";
 }else {
 	puterror("Произошла ошибка при удалении сообщения");
}
?>
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
