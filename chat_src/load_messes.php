<?php
//Подключаемся к БД
include("bd.php");
//Выбираем все сообщения
$res=mysql_query("SELECT * FROM `messages` ORDER BY `id` ");
//Выводим все сообщения на экран
while($d=mysql_fetch_array($res))
{	
	echo "<b><font color='orange'>".$d['login'].":&nbsp;</font></b>".$d['message']."<br>";
}
?>