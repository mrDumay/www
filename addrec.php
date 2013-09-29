<?php
/***************************************************************************
 *                              addrecform.php
 *                            -------------------
 *   begin                : Monday, Feb 28, 2005
 *   copyright            : (C) 2004 The ZCI Group
 *   email                : zcinc@mail.ru
 *
 *   $Id: addrecform.php,v 2.17.0.1 2005/03/1  Exp $
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
 include "./utils/kernel.php";
 $error = "";
 $action = $HTTP_POST_VARS["action"];
 if ($action != "") {
    $lenmsg = strlen($post_body);
    $templen = 0;
    $temp = strtok($post_body, " ");
    if(strlen($post_body)>60) {
        while($templen<$lenmsg) {
            if(strlen($temp)>60) {
                $action = "";
                $error = $error."<li>Текст сообщения содержит слишком много символов без пробелов";
                break;
            }else {
                $templen = $templen + strlen($temp) + 1;
            }
            $temp = strtok(" ");
        }
    }
    $author_name = trim($author_name);
    $post_body = trim($post_body);
    if(empty($post_body)) {
        $action = "";
        $error = $error."<li>Вы не ввели сообщение";
    }
    if(empty($author_name)) {
        $action = "";
        $error = $error."<li>Вы не ввели имя";
    }
    if(!empty($author_email)) {
        if(!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $author_email)) {
            $action = "";
            $error = $error."<li>Неверно введён e-mail. Введите e-mail в виде <i>something@server.com</i>";
        }
    }
    $post_body = $_POST['post_body'];
    $post_body = is_correct($post_body);
    $author_name = $_POST['author_name'];
    $author_name = is_correct($author_name);
    $author_city = $_POST['author_city'];
    $author_city = is_correct($author_city);
    $author_icq = $_POST['author_icq'];
    $author_icq = is_correct($author_icq);
    $author_email = $_POST['author_email'];
    $author_email = is_correct($author_email);      
    if(empty($error)) {
        $post_body = nl2br($post_body);
        $post_body = str_replace("[u]", "<u>", $post_body);
        $post_body = str_replace("[U]", "<U>", $post_body);
        $post_body = str_replace("[i]", "<i>", $post_body);
        $post_body = str_replace("[I]", "<I>", $post_body);
        $post_body = str_replace("[b]", "<b>", $post_body);
        $post_body = str_replace("[B]", "<B>", $post_body);
        $post_body = str_replace("[sub]", "<sub>", $post_body);
        $post_body = str_replace("[SUB]", "<SUB>", $post_body);
        $post_body = str_replace("[sup]", "<sup>", $post_body);
        $post_body = str_replace("[SUP]", "<SUP>", $post_body);
        $post_body = str_replace("[/u]", "</u>", $post_body);
        $post_body = str_replace("[/U]", "</U>", $post_body);
        $post_body = str_replace("[/i]", "</i>", $post_body);
        $post_body = str_replace("[/I]", "</I>", $post_body);
        $post_body = str_replace("[/b]", "</b>", $post_body);
        $post_body = str_replace("[/B]", "</B>", $post_body);
        $post_body = str_replace("[/sub]", "</sub>", $post_body);
        $post_body = str_replace("[/SUB]", "</SUB>", $post_body);
        $post_body = str_replace("[/sup]", "</sup>", $post_body);
        $post_body = str_replace("[/SUP]", "</SUP>", $post_body);
        $post_body = eregi_replace("(.*)\\[url\\](.*)\\[/url\\](.*)","\\1<a href=\\2>\\2</a>\\3",$post_body);
        $query_post = mysql_query("INSERT INTO guestbook_posts VALUES(0, '$post_body', '-', 'show', NOW())");
        $query_select = mysql_query("SELECT * FROM guestbook_posts WHERE post_body='$post_body'");
        if($query_select) {
                $select = mysql_fetch_array($query_select);
                $id_post = $select['id_post'];
        }
        $query_author = "INSERT INTO guestbook_authors VALUES(0,'$id_post', '$author_name', '$author_city', '$author_icq', '$author_email')";
        if(mysql_query($query_author)) {
            if($mail) {
                $header = "content=text/html; charset=koi8-r\r\n\r\n";
                $mail_body  = "Новое сообщение в вашей гостевой книге\r\n";
                $mail_body .= "Сообщение:\r\n\r\n";
                $mail_body .= $post_body."\r\n";
                $mail_subject = "Новое сообщение на ".$_SERVER['HTTP_HOST']."";
                $mail_subject = convert_cyr_string($mail_subject, "w", "k");
                $mail_body  = convert_cyr_string($mail_body, "w", "k");
                $author_name = convert_cyr_string($author_name, "w", "k");
                $post_body  = convert_cyr_string($post_body, "w", "k");
                mail($m_addr, $mail_subject, $mail_body, $header);
                exit();
                // Блок обновился и теперь в письме выводятся 
                // сообщения и хост на котором находится 
                // гостевая книга
                // Обновление произошло в версии 2.1.8
            }   
            print"<HTML><HEAD>\n";
            print"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=./index.php'>\n";
            print"</HEAD></HTML>";
        }
        else {
            echo "<a href=index.php>Вернуться</a>";
            echo "Ошибка при добавлении сообщения";
            exit();
        }
    }
}
if(empty($action)) {                                                
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Гостевая книга :: Добавление сообщенияs</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="./utils/guestbook.css" rel="stylesheet" type="text/css">
</head>
<body>
<ul id="globalnav-helpmenu">
        <li><a href="./license.php">License</a></li>
        <li><a href="./readme.php">About</a></li>
        <li><a href="./index.php">Guest Book</a></li>
</ul>
<div id="pagecell"> 
  <img alt="" src="./utils/images/tl_curve_white.gif" height="6" width="6" id="tl"> <img alt="" src="./utils/images/tr_curve_white.gif" height="6" width="6" id="tr">
  <div id="breadCrumb"> 
    <a href="./index.php">Index</a> / <a href="./addrec.php">Addrec</a>
  </div>
  <div id="pageName"> 
    <h2>Гостевая книга :: Добавление сообщения</h2>
    <img src="./utils/images/logo_mac.gif" alt="">  
  </div>
<div id="content">
    <div class="story">
        <br><br><br><br><br><br>
        <form action="addrec.php" method="post">
        <input type="hidden" name="action" value="post">
        <p><table align="center"><tr><td>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td>Имя:<span class="important">*</span></td><td><Input name="author_name" type="text" size="32"></td>
                </tr>
                <tr>
                    <td>Город:</td><td><input name="author_city" type="text" size="32"></td>
                </tr>
                <tr>
                    <td>e-mail:</td><td><input name="author_email" type="text" size="32"></td>
                </tr>
                <tr>
                    <td>Icq:</td><td><input name="author_icq" type="text" size="32"></td>
                </tr>
                <tr>
                    <td>Сообщение:<span class="important">*</span></td>
                </tr>
                <tr>
                    <td colspan="2"><textarea cols="50" rows="7" name="post_body"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit" name="add_post" value="Добавить сообщение"></td>
                </tr>
            </table>
            <td>
                <table border="0" cellspacing="1" cellpadding="4">
                <tr align="left"><td><span class="important">*</span> -<i><b><nobr>Обязательные для заполнения поля</nobr></b></i></u></td></tr>
                <tr><td><nobr>[b]<b>Жирный</b>[/b]</nobr></td></tr>
                <tr><td><nobr>[i]<i>Наклонный</i>[/i]</nobr></td></tr>
                <tr><td><nobr>[u]<u>Подчеркнутый</u>[/u]</nobr></td></tr>
                <tr><td><nobr>[sup]<sup>Верхний индекс</sup>[/sup]</nobr></td></tr>
                <tr><td><nobr>[sub]<sub>Нижний индекс</sub>[/sub]</nobr></td></tr> 
                <tr><td><nobr>[url]<a href="#">Ссылка</a>[/url]</td></tr>  
                </table>
            </td>   
        </td></tr></table></p>
        </form>
        <br><br><br><br><br>
    </div>
</div>
<div id="siteInfo">     
    <a href="./readme.php">About Us</a> |   <a href="./license.php">License</a> | &copy;2005 IT-студия ZCI
</div>
</div>
</body>
</html>
<?php
    if(!empty($error)) {
        echo "Во время добавления сообщения произошли следующие ошибки:";
        echo "<ul>\n";
        echo "$error";
        echo "</ul>\n";
    }
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