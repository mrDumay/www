<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
include "config.php";
?>

<?php
switch($_GET['error'])
{
      case "":
      echo "";
      break;
      case "ne_pravelnoe_milo":
      echo "Введите реальное мыло";
      break;
      case "netu_msg":
      echo "Введите сообщение";
      break;
      case "netu_imeni":
      echo "Введите имя";
      break;
      case "netu_mail":
      echo "Введите мыло";
      break;
      default:
      echo "Не надо эксперементировать с адресом, тут ты не найдёш дырок, ты не что посравнению с Panker Guest book";
      break;
}
?>

    <center>
     <form action=submit.php method=post>
     <input type=hidden name=action value=post>
        name <input type=text name=name maxlength=32 value=''><br>
        e-mail <input type=text name=email maxlength=32 value=''><br>
        <textarea cols=50 rows=8 name=msg>текст сообщения</textarea>
		<input type=submit value='Добавить'>
  </form>



<?php
$ath = mysql_query("SELECT *, DATE_FORMAT(`date`, '%e.%m.%Y %T') `date` FROM guestbook;");
if($ath)
{
  // Определяем таблицу и заголовок
  echo "<table border=1>";
  echo "<tr><td>id</td><td>name</td><td>e-mail</td><td>msg</td><td>date</td></tr>";
  // Так как запрос возвращает несколько строк, применяем цикл
  while($author = mysql_fetch_array($ath))
  {
    echo "
	<tr>
	<td>".$author['id']."&nbsp;</td>
	<td>".$author['name']."&nbsp </td>
	<td>".$author['e-mail']."&nbsp;</td>
	<td>".$author['msg']."&nbsp;</td>
	<td>".$author['date']."&nbsp;</td>
	</tr>
	
	";
  }
  echo "</table>";
}
else
{
  echo "<p><b>Error: ".mysql_error()."</b><p>";
  exit();
}
?>



  </center>
