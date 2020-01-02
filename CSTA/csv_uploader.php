<?php

if($_REQUEST["submit"]){

$row = 1;
if (($handle = fopen("test.csv", "r")) !== FALSE) {
	
	$headers = fgetcsv($handle, 256, ';');
	
	echo "<pre>";
	print_r($headers);
	echo "</pre>";
	
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		echo array_combine($headers,$data);
	echo "<pre>";
	print_r($data);
	echo "</pre>";
        $num = count($data);
		
		$row++;
        for ($c = 0; $c < $num; $c++) {
            $array[] = $data[$c] . "<br />\n";
		}
		
    }
    fclose($handle);
}

echo "<pre>";
	print_r($array);
	echo "</pre>";
	
$place = explode(" ,", $array);
	echo "<pre>";
	print_r($place);
	echo "</pre>";
}

?>
<html>
<head>
<title>File Upload Form</title>
</head>
<body>
<form action="<?=$PHP_SELF?>" method="post"><br>
Type (or select) Filename: <input type="file" name="uploadFile">
<input type="submit" name="submit" value="Upload File">
</form>
</body>
</html>