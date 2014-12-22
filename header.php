
	
<?
	$mess = mysql_query('SELECT * FROM messages WHERE r_id = "'.$id.'" ');
	$num = mysql_num_rows($mess);

 ?>
    	
        <h1><a href="index.php" style="text-decoration :none"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></h1><a href="index.php" style="text-decoration :none">Home</a>&nbsp;|&nbsp;<a  href="profile.php?id=<?php echo $id; ?>" style="text-decoration :none"><?php echo $name1; ?></a>&nbsp;|&nbsp;<a href="message.php" style="text-decoration :none">Messages(<? echo $num; ?>)</a>&nbsp;|&nbsp;
	<a href="logout.php" style="text-decoration :none">Log^Out</a>
        
    
