<?php
$connection =@ mysql_connect('localhost','root','qweqwe') or die('bad connection');
$dbSelect =@ mysql_select_db('mvc',$connection) or die('bad connection or select db');

$sql = "SELECT id FROM `grafo_table` WHERE link_url = 'grafo_2'";

$result = mysql_query($sql);
$row = mysql_fetch_array($result);

print_r($row);