<?php
ob_start();
include("includes/header.php");

$link = dbopen();
$query = "select c.id, c.courseTitle, c.courseSummary, c.courseDesc, c.courseCost, c.courseStart, c.courseEnd, c.courseStudentNo, c.courseStatus, c.courseType, c.courseDetails, c.courseTarget, c.courseCertificate, c.courseEntryReq, c.courseDuration from courses c where c.courseStatus!='Dead'";
	//echo $query;
	$faqs = safe_query($query);
	
	while($row=mysql_fetch_array($faqs)) {
		$counter = 0;
		
		$courseID = $row[$counter++];
		$courseTitle = $row[$counter++];
		$courseSummary = $row[$counter++];
		$courseDesc = $row[$counter++];
		$courseCost = $row[$counter++];
		$courseStart = $row[$counter++];
		$courseEnd = $row[$counter++];
		$courseStudentNo = $row[$counter++];
		$courseStatus = $row[$counter++];
		$courseType = $row[$counter++];
		$courseDetails = $row[$counter++];
		$courseTarget = $row[$counter++];
		$courseCertificate = $row[$counter++];
		$courseEntryReq = $row[$counter++];
		
		$stuTD .= "<tr><td>$courseTitle</td><td>$courseSummary</td><td><a href='addCourse.php?courseID=$courseID'>Edit</a></td></tr>"; 
	
	}

?>
        <div id="page-wrapper">

            <div class="container-fluid">


        <div class="row">
 <!-- Blog Entries Column -->
           
            <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-12">
	            <h1 class="page-header">Courses</h1>
				<a href="addCourse.php" target="_self">Add Course</a>
 				<table>
                <thead>
                <th>Course</th><th>Summary</th><th>Edit Course</th>
				</thead>
                <tbody>
                <?=$stuTD?>
                </tbody>
                
                </table>
            </div>
       
        </div>
        <!-- /.row -->

</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include("includes/footer.php");?>
