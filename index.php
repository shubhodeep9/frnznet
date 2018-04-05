<?php

if(!isset($_COOKIE['id']))
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

<title>frnz^net</title>

<link type="text/css" rel="stylesheet" href="main.css">

</head>

<body> <header class="body">
 <? include_once('header.php'); ?>
	</header>
    <section class="body">
    
    	    
        <form method="post" action="">
       
           
            
            <label>&nbsp;</label>
            <textarea name="wall" placeholder="What's on your mind" style="width: 446px; height: 46px;"></textarea>
            
        
            
            
            
            <input id="submit" name="submit" type="submit" value="Submit">
        
        </form>
	<br /><br /><hr>
        
    
<table>
    
    
<?
$rel = mysql_query("SELECT * FROM wall ORDER BY time DESC") or die();
if(mysql_num_rows($rel)==0)
{
echo 'No post :(';
}
else
{
while($fetch = mysql_fetch_assoc($rel))
{
$uid = $fetch['u_id'];
$tid = $fetch['t_id'];
$time = date("d.m.y",$fetch['time']);
$post = $fetch['post'];
$p_id = $fetch['id'];


$rel2 = mysql_query('SELECT * FROM users WHERE id = "'.$uid.'" ');
while($f = mysql_fetch_assoc($rel2))
{
	$name = $f['f_name'].' '.$f['l_name'];
	$img = $f['img'];
}
if($tid>0){
$res = mysql_query('SELECT * FROM users WHERE id = "'.$tid.'" ');
while($to = mysql_fetch_array($res))
$namet = $to['f_name'].' '.$to['l_name'];}

?><tr><td><img src="images/<? echo $img; ?>" width=50px height=50px >&nbsp;&nbsp;</td><td><strong><a href="profile.php?id=<?echo $uid; ?>" style="text-decoration :none"><? echo $name; ?></a><? if($tid>0){ ?>&nbsp;::&nbsp;<a href="profile.php?id=<? echo $tid; ?>" style="text-decoration :none"><?  echo $namet; ?></a><? }?></strong><br /><? echo$post; ?><br /><font size="2"><? echo $time; ?>&nbsp;<? if($uid==$id){ ?><a href="post_del.php?p_id=<? echo $p_id; ?>" style="text-decoration :none" >Delete</a>&nbsp;<? } ?><a href="" style="text-decoration :none">Like</a></font><br /><hr></td></tr><?
}

}


?>


</table></section>
</body></html>
<?php

 }
else
    header('Location: login.php');
?>
