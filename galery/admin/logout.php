<?php 
ob_start();
require_once("includes/header.php");
	$session->logout();
	echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";  
	redirect("login.php");
?>