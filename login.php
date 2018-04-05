<?php
if(!isset($_COOKIE['id']))
{
?>

<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Log^In</title>

<link type="text/css" rel="stylesheet" href="main.css">

</head>

<body>

    <header class="body">

        <h1><a href="index.php" style="text-decoration :none"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></h1>
New to frnz^net!! Join now ::
<a href="register.php" style="text-decoration :none">Sign^Up</a>

    </header>

    <section class="body">


        <form method="post" action="">



            <label>Email</label>
            <input name="email" type="email" placeholder="Type Here">

            <label>Password</label>
            <input name="pass" type="password" placeholder="Type Here">

            <label>*What is 2+2? (Anti-spam)</label>
            <input name="human" placeholder="Type Here">

            <input id="submit" name="submit" type="submit" value="Submit">

        </form>

    </section>



</body>
</html>
<?php
    include_once('mysql.php');
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $human = $_POST['human'];
        if(isset($email)&&isset($pass)&&$human==4)
        {

            $rel = mysql_query('SELECT id FROM users WHERE email = "'.$email.'" AND pass = "'.$pass.'" ') ;
            if(mysql_num_rows($rel)==0)
            {
                echo 'Wrong email OR password ';
            }
            else
            {
                while($r = mysql_fetch_array($rel))
                {
                    $id = $r['id'];
                    setcookie('id',$id,time()+36000000);
                    header('Location: index.php');
                }
            }
        }
    }}
    else
        header('Location: index.php');
?>
