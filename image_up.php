<?php
if(isset($_COOKIE['id']))
{

$pid = $_GET['id'];
include_once('mysql.php');
$id = $_COOKIE['id'];
$r = mysql_query('SELECT * FROM users WHERE id ="'.$id.'"');
while($t = mysql_fetch_array($r)){
$name1 = $t['f_name'].' '.$t['l_name'];}?>
<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="main.css">



<title><?php echo $name; ?></title>





</head>

<body>

	<header class="body">

    	
       <h1><a href="index.php" style="text-decoration :none"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></h1><a href="index.php" style="text-decoration :none">Home</a>&nbsp;|&nbsp;<a  href="profile.php?id=<?php echo $_COOKIE['id']; ?>" style="text-decoration :none"><?php echo $name1; ?></a>&nbsp;|&nbsp;
	<a href="logout.php" style="text-decoration :none">Log^Out</a><br />
</header>

<section class="body">
    
    	    
        <form action="image_uploader.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />

<input id="submit" name="submit" type="submit" value="Submit">
</form>

</body></html>
<? } ?>
