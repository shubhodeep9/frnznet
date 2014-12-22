<?php

if(isset($_COOKIE['id']))
{
$id = $_COOKIE['id'];
include_once('mysql.php');
$r = mysql_query('SELECT * FROM users WHERE id ="'.$id.'"');
while($t = mysql_fetch_array($r)){
$name1 = $t['f_name'].' '.$t['l_name'];}

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
<h2> Messages </h2>
<table>

<? 
	$messages = mysql_query('SELECT * FROM messages WHERE s_id = "'.$id.'" OR r_id = "'.$id.'" ');
	while($show = mysql_fetch_array($messages)){
$sender = $show['s_id'];
$reciever = $show['r_id'];
$thread = $show['message'];
$time = date("d.m.y",$show['time']);
$read = $show['read'];
$m_id = $show['id'];

$res = mysql_query('SELECT * FROM users WHERE id = "'.$sender.'"');
while($info = mysql_fetch_array($res))
{ $fimg = $info['img'];
$fname = $info['f_name'].' '.$info['l_name'];
}

?>
<tr<? if($read == "no" && $reciever == $id){ ?> bgcolor=#50EBEC <?} ?> ><td><a  href="read.php?id=<? echo $m_id; ?>" style="text-decoration :none"><img src="images/<? echo $fimg; ?>" width=50px height=50px ></a></td><td><a  href="read.php?id=<? echo $m_id; ?>" style="text-decoration :none"><strong><? echo $fname; ?></strong><br /><? if($sender == $id)
{?>&nbsp;=>&nbsp;<? } echo $thread; ?><br /><font size="2"><? echo $time; ?></a></td></tr>

<?


}

?>
</table></section></body></html>
<? } ?>
