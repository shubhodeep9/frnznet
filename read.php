<?php

if(isset($_COOKIE['id']))
{
$id = $_COOKIE['id'];
include_once('mysql.php');
$r = mysql_query('SELECT * FROM users WHERE id ="'.$id.'"');
while($t = mysql_fetch_array($r)){
$name1 = $t['f_name'].' '.$t['l_name'];}

$m_id = $_GET['id'];

if(isset($_POST['submit']))
{
$post = htmlentities($_POST['wall']);
$uid = $_COOKIE['id'];
$time = time();
if(!empty($post))
{
mysql_query('INSERT INTO wall (u_id,post,time) VALUES ("'.$uid.'","'.$post.'","'.$time.'")') or die('error');
}
}


?>

<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Messages</title>

<link type="text/css" rel="stylesheet" href="main.css">

</head>

<body> <header class="body">
 <? include_once('header.php'); ?>
	</header>

<section class="body">

<table>
<?
 $mess = mysql_query('SELECT * FROM messages WHERE s_id = "'.$


 ?>
</table>


</section>



<? } ?>
