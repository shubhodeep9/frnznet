<?php
if(isset($_COOKIE['id']))
{

$pid = $_GET['id'];
include_once('mysql.php');
$id = $_COOKIE['id'];
$r = mysql_query('SELECT * FROM users WHERE id ="'.$id.'"');
while($t = mysql_fetch_array($r)){
$name1 = $t['f_name'].' '.$t['l_name'];}

$rel = mysql_query('SELECT * FROM users WHERE id = "'.$pid.'"') or die();

while($f = mysql_fetch_array($rel))
{
$name = $f['f_name'].' '.$f['l_name'];
$email = $f['email'];
$birth = $f['bod'].' '.$f['mob'].','.$f['yob'];
$sex = $f['sex'];
$img = $f['img'];
}
?>
<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="main.css">



<title><?php echo $name; ?></title>





</head>

<body>

	<header class="body">
<? include_once('header.php'); ?>
<br />
<table><tr><td><? if($pid == $id){ ?><a href="image_up.php?id=<? echo $id; ?>">
<img src="images/<?php echo $img; ?>" width=150px></a><? } else { ?><img src="images/<?php echo $img; ?>" width=150px><? } ?></td><td><h2> <?php echo $name; ?></h2>

<h5><b>Contact :</b>&nbsp;<?php echo $email; ?></h5>
<h5><b>Date of birth :</b>&nbsp;<?php echo $birth; ?></h5>
<h5><b>Gender :</b>&nbsp;<?php echo $sex; ?></h5>



</td></tr>

</table>	
        
    </header>
<section class="body">
    
    	    
        <form method="post" action="">
        
           
            
            <label>&nbsp;</label><textarea name="wall" placeholder="Post something!" style="width: 446px; height: 46px;"></textarea>
            
            
            <input id="submit" name="submit" type="submit" value="Submit">
        
        </form><br />
<table>
<?php
$rel = mysql_query('SELECT * FROM wall WHERE u_id = "'.$pid.'" ORDER BY time DESC') or die();
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

?><tr><td><img src="images/<? echo $img; ?>" width=50px height=50px >&nbsp;&nbsp;</td><td><strong><a href="profile.php?id=<?echo $uid; ?>" style="text-decoration :none"><? echo $name; ?></a></strong><br /><? echo$post; ?><br /><font size="2"><? echo $time; ?>&nbsp;<? if($uid==$id){ ?><a href="post_del.php?p_id=<? echo $p_id; ?>" style="text-decoration :none" >Delete</a>&nbsp;<? } ?><a href="" style="text-decoration :none">Like</a></font><br /><hr></td></tr><?
}

}
?>
</table>
</section> 	

</body></html>
<?
}
else
header('Location: login.php');
?>
