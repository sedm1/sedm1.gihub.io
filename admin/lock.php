<?php

// Устанавливаем соединение с базой данных
require_once '../init.php';

//  echo  md5(mysql_escape_string('Admin112')); die;

// Если пользователь не авторизовался - авторизуемся
if( !isset( $_SERVER['PHP_AUTH_USER'] ) )
{
  Header( "WWW-Authenticate: Basic realm=\"Admin Page\"" );
  Header( "HTTP/1.0 401 Unauthorized" );
  exit();
}

// Утюжим переменные $_SERVER['PHP_AUTH_USER'] и $_SERVER['PHP_AUTH_PW'],
// чтобы мышь не проскочила
$_SERVER['PHP_AUTH_USER'] = mysql_escape_string( $_SERVER['PHP_AUTH_USER'] );
$_SERVER['PHP_AUTH_PW'] = mysql_escape_string( $_SERVER['PHP_AUTH_PW'] );

$query = "SELECT pass FROM userlist WHERE name='".$_SERVER['PHP_AUTH_USER']."'";
$lst = @mysql_query( $query );

// Если ошибка в SQL-запросе - выдаём окно
if( !$lst )
{
  Header( "WWW-Authenticate: Basic realm=\"Admin Page\"" );
  Header( "HTTP/1.0 401 Unauthorized" );
  exit();
}

// Если такого пользователя нет - выдаём окно
if( mysql_num_rows( $lst ) == 0 )
{
  Header( "WWW-Authenticate: Basic realm=\"Admin Page\"" );
  Header( "HTTP/1.0 401 Unauthorized" );
  exit();
}

// Если все проверки пройдены, сравниваем хэши паролей
$pass = @mysql_fetch_array( $lst );
if( md5( $_SERVER['PHP_AUTH_PW'] ) != $pass['pass'] )
{
  Header( "WWW-Authenticate: Basic realm=\"Admin Page\"" );
  Header( "HTTP/1.0 401 Unauthorized" );
  exit();
}

?>