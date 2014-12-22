<?
	if(isset($_COOKIE['id']))
{
include_once('mysql.php');
 $post = $_GET['p_id'];
 $uid = $_COOKIE['id'];
 mysql_query('DELETE FROM wall WHERE id = "'.$post.'"');
	header('Location: index.php');


}


?>
