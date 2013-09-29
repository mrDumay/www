<?php
$dblocation = "localhost";
$dbname = "gb";
$dbuser = "root";
$dbpasswd = "";
$dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
if (!$dbcnx) 
{
  echo( "<P>¬ насто€щий момент сервер базы данных не доступен, поэтому 
            корректное отображение страницы невозможно.</P>" );
  exit();
}
if (!@mysql_select_db($dbname, $dbcnx)) 
{
  echo( "<P>¬ насто€щий момент база данных не доступна, поэтому
            корректное отображение страницы невозможно.</P>" );
  exit();
}
?>

<?php
$ath = mysql_query("select * from guestbook;");
if($ath)
{
  $author = mysql_fetch_array($ath);
  echo "<br>им€ = ".$author['id']."<br>";
  echo "пароль = ".$author['name']."<br>";
  echo "e-mail = ".$author['e-mail']."<br>";
  echo "url = ".$author['msg']."<br>";
  echo "ICQ = ".$author['date']."<br>";
}
else
{
  echo "<p><b>Error: ".mysql_error()."</b></p>";
  exit();
}
?>
