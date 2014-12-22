<?php
if(!isset($_COOKIE['id']))
{


?>
<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Sign^Up</title>

<link type="text/css" rel="stylesheet" href="main.css">

</head>

<body>
<header class="body">
    	
        <h1><a href="index.php" style="text-decoration :none"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></h1>
Now you can 
<a href="login.php" style="text-decoration :none">Log^In</a>!!
        
    </header>
<section class="body">

<form action="" method="post">

<label>First Name :</label>
<input type="text" placeholder="Type Here" name="f_name">
<label>Last Name :</label>
<input type="text" name="l_name" placeholder="Type Here">
<label>E-mail :</label>
<input type="text" name="email" placeholder="Type Here">
<label>Choose Password :</label>
<input type="password" name="pass" placeholder="Type Here">
<label>Confirm Password :</label>
<input type="password" name="pass" placeholder="Type Here">
<label>Date of Birth :</label>
<select name="dob"><option value=""> Date^ </option>
<?php
	for($i=1;$i<32;$i++)
	{ echo '<option value="'.$i.'">'.$i.'</option>'; }

?>
</select><select name="mob"><option value="">Month^</option>
<option value="January">Jan</option>
<option value="February">Feb</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">Aug</option>
<option value="September">September</option>
<option value="October">Oct</option>
<option value="November">Nov</option>
<option value="December">Dec</option></select>
<select name="yob"><option value="">Year^</option>
<?php
	for($i=date("Y")-6;$i>1945;$i--)
	{
	echo '<option value="'.$i.'">'.$i.'</option>';
	}
?></select>

<label>Gender :</label><select name="gen"><option value="Male">Male</option><option value="Female">Female</option></select><br />
<input id="submit" name="submit" type="submit" value="Submit">
</form></section></body>
</html>
<?php
	include_once('mysql.php');

	if(isset($_POST['submit']))
	{
			$f_name = $_POST['f_name'];
			$l_name = $_POST['l_name'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$dob = $_POST['dob'];
			$mob = $_POST['mob'];
			$yob = $_POST['yob'];
			$sex = $_POST['gen'];
	

	
		$rel = mysql_query('SELECT * FROM users WHERE email = "'.$email.'"') or die();
		if(mysql_num_rows($rel)>0)
		{
			echo 'I think you have registered already.';
			header('Location: register.php');
		}
		else {
			mysql_query('INSERT INTO users (f_name,l_name,email,pass,dob,mob,yob,sex) VALUES ("'.$f_name.'","'.$l_name.'","'.$email.'","'.$pass.'","'.$dob.'","'.$mob.'","'.$yob.'","'.$sex.'")') or die();
	
	
}
	
	
}

}
else
header('Location: index.php');	


?>
