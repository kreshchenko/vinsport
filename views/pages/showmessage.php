<?php

require("db.php"); // Подключаем БД

$lastmes = $_POST['lastmes']; // Принимаем id последнего сообщения

$res = mysql_query ("SELECT text FROM messages WHERE message_id>{$lastmes}");
while ($write = mysql_fetch_assoc ($res)) {
	echo $write['text'];
}