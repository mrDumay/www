<?php
$dblocation = "localhost";
$dbname = "gb";
$dbuser = "root";
$dbpasswd = "";
$dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
if (!$dbcnx) 
{
  echo( "<P>� ��������� ������ ������ ���� ������ �� ��������, ������� 
            ���������� ����������� �������� ����������.</P>" );
  exit();
}
if (!@mysql_select_db($dbname, $dbcnx)) 
{
  echo( "<P>� ��������� ������ ���� ������ �� ��������, �������
            ���������� ����������� �������� ����������.</P>" );
  exit();
}
?>

<?php
$ath = mysql_query("select * from guestbook;");
if($ath)
{
  $author = mysql_fetch_array($ath);
  echo "<br>��� = ".$author['id']."<br>";
  echo "������ = ".$author['name']."<br>";
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
