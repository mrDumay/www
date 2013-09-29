



<?php 
include "config.php";
if (mysql_query("INSERT INTO `guestbook` VALUES ('', 'Admin', 'mail@mail.ru', 'Первое сообщение', '2005-03-07 17:33:48');")) 
{ 
echo "Таблица успешно создана"; 
} 
else 
{ 
exit(mysql_error()); 
} 
?> 