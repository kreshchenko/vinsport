<?php

require("db.php"); // ���������� ��

$lastmes = $_POST['lastmes']; // ��������� id ���������� ���������

$res = mysql_query ("SELECT text FROM messages WHERE message_id>{$lastmes}");
while ($write = mysql_fetch_assoc ($res)) {
	echo $write['text'];
}