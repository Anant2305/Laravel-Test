<?php
ob_start();
include("includes/header.php");

$link = dbopen();
$query = "select s.stuID, s.stuName, s.stuEmail, s.stuStatus, s.stuNotes, s.stuAdd1, s.stuAdd2, s.stuAdd3, s.stuAdd4, s.stuPostcode, s.stuPhone, s.stuMobile from students s where s.stuStatus !=0";
	//echo $query;
	$faqs = safe_query($query);
	
	while($row=mysql_fetch_array($faqs)) {
		$counter = 0;
		
		$stuID = $row[$counter++];
		$stuName = $row[$counter++];
		$stuEmail = $row[$counter++];
		$stuStatus = $row[$counter++];
		$stuNotes = $row[$counter++];
		$stuAdd1 = $row[$counter++];
		$stuAdd2 = $row[$counter++];
		$stuAdd3 = $row[$counter++];
		$stuAdd4 = $row[$counter++];
		$stuPostcode = $row[$counter++];
		$stuPhone = $row[$counter++];
		$stuMobile = $row[$counter++];
		
		$stuTD .= "<tr><td>$stuName</td><td>$stuEmail</td><td><a href='addStudent.php?studentID=$stuID'>Edit</a></td></tr>"; 
	
	}

?>


?>
        <div id="page-wrapper">

            <div class="container-fluid">


        <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-12">
	            <h1 class="page-header">LIST STUDENT's</h1><br />
				<a href="addStudent.php" target="_self">Add Student</a>
 				<table>
                <thead>
                <th>Name</th><th>Email</th><th>Edit Student</th>
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
