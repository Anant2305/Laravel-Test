 <?php
ob_start();
//include("./header.php");
include("INC_db.php");
$link = dbopen();
 //echo "<pre>";
 //print_r($_REQUEST);
 //echo "</pre>";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
 $courseID = $_REQUEST['courseID'];
 $studentName = $_REQUEST['studentName'];
 $studentPhone = $_REQUEST['studentPhone'];
 $studentEmail = $_REQUEST['studentEmail'];
 $enquiryComments = $_REQUEST['enquiryComments'];

$query = "select stuID from students where stuEmail = '$studentEmail'";
//echo $query;
$result = safe_query($query);

if(mysql_num_rows($result)>0){
	//echo 1;
	$stuRow = mysql_fetch_array($result);
	$stuID = $stuRow[0];
	
}else{
	echo 2;
	$query = "insert into students (stuName, stuPhone, stuEmail) values ('$studentName', '$studentPhone', '$studentEmail');";
	safe_query($query);
	$stuID = mysql_insert_id();
}

 if($courseID){
	 
	 $insertEnq="insert into enquiries (courseID, stuID) values ($courseID, $stuID)";
	 safe_query($insertEnq);
	 
	 $query = "select courseTitle, courseStart from courses where id=$courseID";
	 $result = safe_query($query);
	 
	 $row=mysql_fetch_array($result);
	 $columnCounter = 0;
	 $courseTitle = $row[$columnCounter++];
	 $courseDate = $row[$columnCounter++];
	 
	 $newDate = date("d-m-Y", strtotime($courseDate));
	 //echo $newDate;
 }else{
	 $courseTitle = "General Enquiry";
	 $courseDate = date("d-m-Y");
 }
 
$to = "me@anant-chohan.me.uk, anantchohan@hotmail.com";
$subject = "$courseTitle - $courseDate";

$message = "Please find attached details Of Student Details <br /><br />$courseTitle - $courseDate<br /><br /> Student - $studentName<br />Phone No - $studentPhone<br />Student Eamil - $studentEmail<br /> Comments - $enquiryComments";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: me@anant-chohan.me.uk' . '\r\n';

mail($to,$subject,$message,$headers);

//header('location: http://anant-chohan.me.uk/Test/CSTA/index.php');
echo '<script type="text/javascript">
           window.location = "http://anant-chohan.me.uk/Test/CSTA"
      </script>';
?>