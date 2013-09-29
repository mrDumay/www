
<?php 
include "config.php";

if ($_POST['name']=="") exit(" <META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?error=$e_name'> ");
if ($_POST['email']=="") exit(" <META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?error=$e_mail'> ");
if ($_POST['msg']=="") exit(" <META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?error=$e_msg'> ");

$today = date("Y-m-d H:i:s"); //в таком формате записывается дата

$name=$_POST['name'];
$email=$_POST['email'];
$msg=$_POST['msg'];

echo "$name<br>";
echo "$email<br>";
echo "$msg<br>";
echo "$today<br>";
echo "<br>";


if((!empty($_POST['name']))&&(!empty($_POST['email']))&&(!empty($_POST['msg'])))
{
$name = htmlspecialchars(substr($_POST['name'], 0, 10)); 
$email = htmlspecialchars(substr($_POST['email'], 0, 10)); 
$msg = nl2br(htmlspecialchars(substr($_POST['msg'], 0, 600))); 
$name = trim($name);
$email = trim($email);
$msg= trim($msg);

$msg = str_replace(":smile:","<img src='images/smile.gif'>",$msg);
$msg = str_replace(":wink:","<img src='images/wink.gif'>",$msg);
$msg = str_replace(":wassat:","<img src='images/wassat.gif'>",$msg);
$msg = str_replace(":tongue:","<img src='images/tongue.gif'>",$msg);
$msg = str_replace(":laughing:","<img src='images/laughing.gif'>",$msg);
$msg = str_replace(":sad:","<img src='images/sad.gif'>",$msg);
$msg = str_replace(":angry:","<img src='images/angry.gif'>",$msg);
$msg = str_replace(":crying:","<img src='images/crying.gif'>",$msg);
$msg = str_replace("[B]","<b>",$msg);
$msg = str_replace("[/B]","</b>",$msg);
$msg = str_replace("[I]","<i>",$msg);
$msg = str_replace("[/I]","</i>",$msg);
$msg = str_replace("[U]","<u>",$msg);
$msg = str_replace("[/U]","</u>",$msg);
$msg = str_replace("[S]","<s>",$msg);
$msg = str_replace("[/S]","</s>",$msg);
$msg = str_replace("[CENTER]","<center>",$msg);
$msg = str_replace("[/CENTER]","</center>",$msg);
$msg = str_replace("[COLOR=red]","<font color=red>",$msg);
$msg = str_replace("[COLOR=blue]","<font color=blue>",$msg);
$msg = str_replace("[COLOR=purple]","<font color=purple>",$msg);
$msg = str_replace("[COLOR=orange]","<font color=orange>",$msg);
$msg = str_replace("[COLOR=yellow]","<font color=yellow>",$msg);
$msg = str_replace("[COLOR=gray]","<font color=gray>",$msg);
$msg = str_replace("[COLOR=green]","<font color=green>",$msg);
$msg = str_replace("[/COLOR]","</font>",$msg);
$msg = str_replace("[QUOTE]","<blockquote style='border: 1px solid #4D6D91; background: #F4F4F4;'>",$msg);
$msg = str_replace("[/QUOTE]","</blockquote>",$msg);
$msg = wordwrap($msg, 30, " ", 1); // Большие слова разделяем пробелом!
$msg=str_replace("\r\n","<br>",$msg); 
$msg=str_replace("\n","<br>",$msg);

	if (mysql_query("INSERT INTO `guestbook` VALUES ('', '$name', '$email', '$msg', '$today');")) 
	{ 
	echo "Ваша запись успешно добавлена"; 
	} 
	else 
	{ 
	exit(mysql_error()); 
	} 

}



?>

<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>
