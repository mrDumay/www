<?php
/***************************************************************************
 *                              kernel.php
 *                            -------------------
 *   begin                : Monday, Feb 28, 2005
 *   copyright            : (C) 2004 The ZCI Group
 *   email                : zcinc@mail.ru
 *
 *   $Id: kernel.php,v 1.27.2.2 2005/03/1  Exp $
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
 
 /**************************************************************************
 *
 *  Соединение с базой данных MySQL для дальнейшей работы с записями    
 *
 ***************************************************************************/
  // Имя сервера базы данных, например $dblocation = "mysql28.noweb.ru"
  // сейчас выставлен сервер локальной машины
  $dblocation = "localhost";
  // Имя базы данных, на хостинге или локальной машине
  $dbname = "bh5484_guestbook";
  // Имя пользователя базы данных
  $dbuser = "bh5484_planernay";
  // Пароль
  $dbpasswd = "Qwertasd1";
  // Количество сообщений, выводимых на странице
  // все новости
  $pnumber = 5;
  // Версия Web-приложения
  $version = "2.1.8";
  // Отправка уведомлений адм-ору
  $mail = false;
  // Адрес e-mail администратора
  $m_addr = "root@localhost";
  
  // Соединяемся с сервером базы данных
  $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx)
  {
    echo( "<P>В настоящий момент сервер базы данных не доступен, поэтому корректное отображение страницы невозможно.</P>" );
    exit();
  }
  // Выбираем базу данных
  if (! @mysql_select_db($dbname,$dbcnx) )
  {
    echo( "<P>В настоящий момент база данных не доступна, поэтому корректное отображение страницы невозможно.</P>" );
    exit();
  }

  
 /**************************************************************************
 *
 *  Функции необходимые для работы гостевой книги   
 *
 ***************************************************************************/
 
  function puterror($message) {
    echo("<p>$message</p>");
    exit();
  }
  
  function is_correct($text) {
    $text = htmlspecialchars(stripslashes(trim($text)));
    return $text;
  } 
    
?>