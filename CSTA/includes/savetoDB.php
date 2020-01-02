<?php

include("inc_db.php");
$link = dbopen();

$action = $_REQUEST['action'];
 
 if ($action == "addCourse"){

	$courseTitle = $_REQUEST['courseTitle'];
	$courseSummary = $_REQUEST['courseSummary'];
	$courseDesc = $_REQUEST['courseDesc'];
	$courseCost = $_REQUEST['courseCost'];
	$courseStart = $_REQUEST['courseStart'];
	$courseEnd = $_REQUEST['courseEnd'];
	$courseLevel = $_REQUEST['courseLevel'];
	$courseStatus = $_REQUEST['courseStatus'];
 
 
 $query = "insert into courses (courseTitle,courseSummary,courseDesc, courseCost,courseStart,courseEnd,courseStudentNo,courseStatus) values ";
 $query .= "('$courseTitle','$courseSummary','$courseDesc','$courseCost', '$courseStart', '$courseEnd', '$courseLevel', '$courseStatus')";
 
 safe_query($query);
 
 }
?>