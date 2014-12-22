<?php

$id = $_COOKIE['id'];

setcookie('id',$id,time()-3600);

header('Location: login.php');

?>
