<?php
 
if(!preg_match("|^[\d]*$|",$_GET['id'])) exit();
 
// подключение к базе данных
// (возможно, вам придется настроить имя хоста, имя пользователя и пароль)
$dbh = new mysqli("localhost", "root", "", "kurs2");
 
if(mysqli_connect_errno())
{
  exit("Ошибка подключения к базе данных MySQL: Сервер база данных не доступен!<br>
  Проверте параметры подключения к базе данных.");
}
 
$query = "SELECT bin_data,filetype from cars WHERE id=".$_GET['id'];
$result = $dbh->query($query);

if(!$result) exit("Ошибка выполнения SQL запроса!");
 
$row = $result->fetch_array();
 
Header( "Content-type: ".$row['filetype']."");
echo $row['bin_data'];

?>
