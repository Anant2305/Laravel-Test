<?php
include("INC_db.php");
$link = dbopen();
$action = $_REQUEST['action'];

 if ($action == "addCourse"){

	$courseTitle = $_REQUEST['courseTitle'];
	$courseSummary = $_REQUEST['courseSummary'];
	$courseDesc = $_REQUEST['courseDesc'];
	$courseCost = $_REQUEST['courseCost'];
	$courseStart = $_REQUEST['courseStart'];
	$courseEnd = $_REQUEST['courseEnd'];
	$courseStatus = $_REQUEST['courseStatus'];
	$courseType = $_REQUEST['courseType'];
	$courseTarget = $_REQUEST['courseTarget'];
	$courseCertificate = $_REQUEST['courseCertificate'];
	$courseEntryReq = $_REQUEST['courseEntryReq'];
	$courseDuration = $_REQUEST['courseDuration'];
	 
	if($courseStatus==""){
			$courseStatus = "New";
	}
	
	if($courseStart){
		$courseStartDate = date('Y-m-d', strtotime($courseStart));
	}
	
	if($courseEnd){
		$courseEndDate = date('Y-m-d', strtotime($courseEnd));
	}
 
 
 $query = "insert into courses (courseTitle,courseSummary,courseDesc, courseCost,courseStart,courseEnd,courseStatus, courseType, courseTarget, courseCertificate, courseEntryReq, courseDuration) values ";
 $query .= "('$courseTitle','$courseSummary','$courseDesc','$courseCost', '$courseStartDate', '$courseEndDate', '$courseStatus', '$courseType', '$courseTarget'', '$courseCertificate', '$courseEntryReq', '$courseDuration')";
 safe_query($query);

 }else if($action == "editCourse"){
	
	$courseID = $_REQUEST['courseID']; 
	$courseTitle = $_REQUEST['courseTitle'];
	$courseSummary = $_REQUEST['courseSummary'];
	$courseDesc = $_REQUEST['courseDesc'];
	$courseCost = $_REQUEST['courseCost'];
	$courseStart = $_REQUEST['courseStart'];
	$courseEnd = $_REQUEST['courseEnd'];
	$courseStatus = $_REQUEST['courseStatus'];
	$courseType = $_REQUEST['courseType'];
	$courseTarget = $_REQUEST['courseTarget'];
	$courseCertificate = $_REQUEST['courseCertificate'];
	$courseEntryReq = $_REQUEST['courseEntryReq'];
	$courseDuration = $_REQUEST['courseDuration'];
	 
	if($courseStatus==""){
			$courseStatus = "New";
	}
	
	if($courseStart){
		$courseStartDate = date('Y-m-d', strtotime($courseStart));
	}
	
	if($courseEnd){
		$courseEndDate = date('Y-m-d', strtotime($courseEnd));
	}
 
 
 $query = "update courses set courseTitle ='$courseTitle' ,courseSummary='$courseSummary',courseDesc='$courseDesc', courseCost=$courseCost, courseStart='$courseStartDate',courseEnd='$courseEndDate',courseStatus='$courseStatus', courseType='$courseType', courseTarget='$courseTarget', courseCertificate='$courseCertificate', courseEntryReq='$courseEntryReq', courseDuration='$courseDuration' where id=$courseID limit 1";
 safe_query($query);
	 
 }else if ($action == "addFAQ"){

	$faqTitle = $_REQUEST['faqTitle'];
	$faqDetail = $_REQUEST['faqDetail'];
	
 
 $query = "insert into faqs (faqTitle, faqDetail) values ('$faqTitle','$faqDetail')";
 safe_query($query);

 }else if($action == "editFAQ"){
	
	$faqID = $_REQUEST['faqID'];
	$faqTitle = $_REQUEST['faqTitle'];
	$faqDetail = $_REQUEST['faqDetail'];
 
 $query = "update faqs set faqTitle='$faqTitle', faqDetail='$faqDetail' where faqID=$faqID limit 1";
 safe_query($query);
	 
 }else if ($action == "addStudent"){

	$stuName = $_REQUEST['studentName'];
	$stuEmail = $_REQUEST['studentEmail'];
	$stuStatus = $_REQUEST['studentStatus'];
	$stuNotes = $_REQUEST['studentNotes'];
	$stuAdd1 = $_REQUEST['studentAdd1'];
	$stuAdd2 = $_REQUEST['studentAdd2'];
	$stuAdd3 = $_REQUEST['studentAdd3'];
	$stuAdd4 =$_REQUEST['studentAdd4'];
	$stuPostcode = $_REQUEST['studentPostcode'];
	$stuPhone = $_REQUEST['studentPhone'];
	$stuMobile = $_REQUEST['studentMobile'];
    
 
 
 $query = "insert into courses (stuName,stuEmail, stuStatus, stuNotes, stuAdd1, stuAdd2, stuAdd3, stuAdd4, stuPostcode, stuPhone, stuMobile) values ";
 $query .= "('$stuName','$stuEmail', $stuStatus, '$stuNotes'', '$stuAdd1', '$stuAdd2', '$stuAdd3', '$stuAdd4', '$stuPostcode', '$stuPhone', '$stuMobile')";
 safe_query($query);

 }else if($action == "editStudent"){
	 
	$stuID = $_REQUEST['studentID']; 
	$stuName = $_REQUEST['studentName'];
	$stuEmail = $_REQUEST['studentEmail'];
	$stuStatus = $_REQUEST['studentStatus'];
	$stuNotes = $_REQUEST['studentNotes'];
	$stuAdd1 = $_REQUEST['studentAdd1'];
	$stuAdd2 = $_REQUEST['studentAdd2'];
	$stuAdd3 = $_REQUEST['studentAdd3'];
	$stuAdd4 =$_REQUEST['studentAdd4'];
	$stuPostcode = $_REQUEST['studentPostcode'];
	$stuPhone = $_REQUEST['studentPhone'];
	$stuMobile = $_REQUEST['studentMobile'];
 
 
 $query = "update courses set stuName='$stuName',stuEmail='$stuEmail', stuStatus=$stuStatus, stuNotes='$stuNotes', stuAdd1='$stuAdd1', stuAdd2='$stuAdd2', stuAdd3='$stuAdd3', stuAdd4='$stuAdd4', stuPostcode='$stuPostcode', stuPhone='$stuPhone', stuMobile='$stuMobile' where stuID=$studentID limit 1";
 safe_query($query);
	 
 }
 
 header("location: ../index.php");
 
?>