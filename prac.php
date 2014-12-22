<html>
<form action="" method="post">
Name :<input type="text" name="name">
<input type="submit" name="sub"><br />
</html>
<?php
$con = mysql_connect('localhost','root','deep') or die();
mysql_select_db('ubuntu',$con) or die();
if(isset($_POST['sub']))
{

$name = $_POST['name'];
mysql_query('INSERT INTO name (name) VALUES ("'.$name.'")') or die();


}
$rel = mysql_query('SELECT * FROM name') or die();

while($naam = mysql_fetch_array($rel))
{
echo $naam['name'].'<br />';
}
?>
