<?php
ob_start();
include("includes/header.php");
$link = dbopen();
$studentID = $_REQUEST['studentID'];

if($studentID > 0){
	$query = "SELECT s.stuID, s.stuName, s.stuEmail, s.stuStatus, s.stuNotes, s.stuAdd1, s.stuAdd2, s.stuAdd3, s.stuAdd4, s.stuPostcode, s.stuPhone, s.stuMobile FROM students s WHERE s.stuID=$studentID limit 1";
	
	$student = safe_query($query);
	
	while($row=mysql_fetch_array($student)) {
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
	}

}

?>

        <div id="page-wrapper">

            <div class="container-fluid">


        <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-12">
            <h1 class="page-header">Add/Edit Student</h1>
      <form action="./includes/savetoDB.php">
      <table class="col-xs-12 col-md-8">
      <tr><td>
    <div class="form-group">
    <label for="studentName">Name</label>
    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Student Name" value="<?=$stuName?>" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="studentEmaily">studentEmail</label>
    <input type="text" class="form-control" id="studentEmail" name="studentEmail" placeholder="Student Email" value="<?=$stuEmail?>" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="studentAdd1" >Address</label>
    <input type="text" class="form-control" id="studentAdd1" name="studentAdd1" placeholder="Address Line 1" value="<?=$stuAdd1?>" >
    </div>
    </td></tr>
             
    <tr><td>
    <div class="form-group">
    <input type="text" class="form-control" id="studentAdd2" name="studentAdd2" placeholder="Address Line 2" value="<?=$stuAdd2?>" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
   <input type="text" class="form-control" id="studentAdd3" name="studentAdd3" placeholder="Address Line 3" value="<?=$stuAdd3?>" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <input type="text" class="form-control" id="studentAdd4" name="studentAdd4" placeholder="Address line 4" value="<?=$stuAdd4?>" />
    </div>
    </td></tr>

	<tr><td>
    <div class="form-group">
    <label for="studentPostcode" >Postcode</label>
    <input type="text" class="form-control" id="studentPostcode" name="studentPostcode" placeholder="Postcode" value="<?=$stuPhone?>" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="studentPhone" >Phone Numbers</label>
    <input type="text" class="form-control" id="studentPhone" name="studentPhone" placeholder="Phone Number" value="<?=$stuPhone?>" />
    </div>
    </td></tr>
    
        <tr><td>
    <div class="form-group">
    <label for="studentPhone" >Mobile Numbers</label>
    <input type="text" class="form-control" id="studentMobile" name="studentMobile" placeholder="Mobile Number" value="<?=$stuMobile?>" />
    </div>
    </td></tr>
	
   <tr><td>
    <div class="form-group">
    <label for="studentNotes" >Notes</label>
		<textarea class="form-control" id="studentNotes" name="studentNotes" placeholder="Notes" value="<?=$stuNotes?>" ></textarea>
    </div>
    </td></tr>

    <tr><td>
    <div class="form-group">
    <label for="studentStatus">Status</label>
    <select type="text" class="form-control" id="studentStatus" name="studentStatus">
    <option value=0 >Not Active</option>
    <option value=1 >Active</option> 
    </select>
    </div>
    </td></tr>
    
    <tr><td colspan="2">
    <? if ($courseID > 0){ ?>
    	 <input type="hidden" name="action" value ="editStudent" />
         <input type="hidden" name="studentID" value="<?=$studentID?>" />
    <? }else{ ?>                 
	     <input type="hidden" name="action" value ="addStudent" />
    <? } ?>
    <input type="submit" name="submitForm" value="SUBMIT" />
    </td></tr>
    </table>
    </form>  
            </div>
           
        </div>
        <!-- /.row -->

</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include("includes/footer.php");?>
