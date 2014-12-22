<?


	$tmp = $_FILE['file']['tmp_name'];
	$name = $_FILE['file']['name'];
	echo $tmp;
	 move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $_FILES["file"]["name"]);








?>
