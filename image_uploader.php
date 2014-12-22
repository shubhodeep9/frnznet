    <?php
     
    session_start();
    $session_id= $_COOKIE['id']; // User session id
    $path = "images/";
     
    $valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    {
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
	$n2 = $name;
    if(strlen($name))
    {
    list($txt, $ext) = explode(".", $name);
    if(in_array($ext,$valid_formats))
    {
    if($size<(1024*1024)) // Image size max 1 MB
    {
    $actual_image_name = $session_id."_".time().".".$ext;
    $tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($_FILES["file"]["tmp_name"],
      "/root/desktop" . $_FILES["file"]["name"]);
   
    }
    else
    echo "Image file size max 1 MB";
    }
    else
    echo "Invalid file format..";
    }
    else
    echo "Please select image..!";
    exit;
    }
    ?>

