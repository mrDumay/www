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
 *  ���������� � ����� ������ MySQL ��� ���������� ������ � ��������    
 *
 ***************************************************************************/
  // ��� ������� ���� ������, �������� $dblocation = "mysql28.noweb.ru"
  // ������ ��������� ������ ��������� ������
  $dblocation = "localhost";
  // ��� ���� ������, �� �������� ��� ��������� ������
  $dbname = "bh5484_guestbook";
  // ��� ������������ ���� ������
  $dbuser = "bh5484_planernay";
  // ������
  $dbpasswd = "Qwertasd1";
  // ���������� ���������, ��������� �� ��������
  // ��� �������
  $pnumber = 5;
  // ������ Web-����������
  $version = "2.1.8";
  // �������� ����������� ���-���
  $mail = false;
  // ����� e-mail ��������������
  $m_addr = "root@localhost";
  
  // ����������� � �������� ���� ������
  $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx)
  {
    echo( "<P>� ��������� ������ ������ ���� ������ �� ��������, ������� ���������� ����������� �������� ����������.</P>" );
    exit();
  }
  // �������� ���� ������
  if (! @mysql_select_db($dbname,$dbcnx) )
  {
    echo( "<P>� ��������� ������ ���� ������ �� ��������, ������� ���������� ����������� �������� ����������.</P>" );
    exit();
  }

  
 /**************************************************************************
 *
 *  ������� ����������� ��� ������ �������� �����   
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