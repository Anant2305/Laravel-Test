<?php

if(isset($_POST['submit'])) {

	//echo "<pre>";
	//print_r($_FILES['file_upload']);
	//echo "</pre>";
	
	$upload_errors = array(

UPLOAD_ERR_OK			=> "THERE IS NO ERROR",
UPLOAD_ERR_INI_SIZE		=> "THE UPLOAD FILE EXCEEDS THE UPLOAD_MAX_FILESIZE DIRECTIVE",
UPLOAD_ERR_FORM_SIZE	=> "THE UPLOAD FILE EXCEEDS THE MAX_FILE_SIZE DIRECTIVE",
UPLOAD_ERR_PARTIAL		=> "THE UPLOAD FILE WAS ONLY PARTIALLY UPLOADED",
UPLOAD_ERR_NO_FILE		=> "NO FILE WAS UPLOADED",
UPLOAD_ERR_NO_TMP_DIR	=> "MISSING A TEMPORARY FOLDER",
UPLOAD_ERR_CANT_WRITE	=> "FAILED TO WRITE TO DISK",
UPLOAD_ERR_EXTENSION	=> "A PHP EXTENSION STOPPED THE FILE UPLOAD"
	
);


	$temp_name = $_FILES['file_upload']['tmp_name'];
	$the_file = $_FILES['file_upload']['name'];
	
	$directory = "uploads";
	
	if (move_uploaded_file($temp_name, $directory . "/" . $the_file)) {
		$the_message =  "File uploaded successfully";
	}else{
		$the_error = $_FILES['file_upload']['error'];
		$the_message = $upload_errors[$the_error] ;
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
<body>

<form action="upload.php" enctype="multipart/form-data" method="post">
	<h2>
	<?
		if(!empty($upload_errors)) {
			echo $the_message;
		}
	?>
    </h2>
<input type="file" name="file_upload"><br>

<input type="submit" name="submit">

</body>
</html>