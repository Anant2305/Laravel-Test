<?php
ob_start();
include("includes/header.php");
$link = dbopen();
$courseID = $_REQUEST['courseID'];
/*
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
*/
if(isset($courseID) && $courseID > 0){
	
	$query = "Select * from courses where id=$courseID limit 1";
	$courseResult = safe_query($query);
	
	while($row=mysql_fetch_array($courseResult)) {
		$counter = 0;
		
		$courseID = $row[$counter++];
		$courseTitle = $row[$counter++];
		$courseSumm = $row[$counter++];
		$courseDesc = $row[$counter++];
		$courseCost = $row[$counter++];
		$courseStart = date("d M y",strtotime($row[$counter++]));
		$courseEnd = date("d M y",strtotime($row[$counter++]));
		$courseStudents = $row[$counter++];
		$courseStatus = $row[$counter++];
		$courseType = $row[$counter++];
		$courseDetails = $row[$counter++];
		$courseTarget = $row[$counter++];
		$courseCertificate = $row[$counter++];
		$courseEntryReq = $row[$counter++];
		$courseDuration = $row[$counter++];
		
	}
	
}
?>

        <div id="page-wrapper">

            <div class="container-fluid">


        <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-12">
            <h1 class="page-header">Add Courses</h1>
      <form action="./includes/savetoDB.php">
      <table class="col-xs-12 col-md-8">
      <tr><td>
    <div class="form-group">
    <label for="courseTitle">Title</label>
    <input type="text" class="form-control" id="courseTitle" name="courseTitle" value="<?=$courseTitle?>" placeholder="Course Title" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseSummary">Summary</label>
    <input type="text" class="form-control" id="courseSummary" name="courseSummary" value="<?=$courseSumm?>" placeholder="Enter Course Summary" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseDesc">Description</label>
    <textarea class="form-control" id="courseDesc" name="courseDesc" value="<?=$courseDesc?>" placeholder="Enter Course Description"></textarea>
    </div>
    </td></tr>
            
    <tr><td>
    <div class="form-group">
    <label for="courseTarget">Course Target</label>
    <textarea class="form-control" id="courseTarget" name="courseTarget" value="<?=$courseTarget?>" placeholder="Enter Course Target"></textarea>
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseCert">Course Certifiate</label>
    <textarea class="form-control" id="courseCert" name="courseCert" value="<?=$courseCert?>" placeholder="Enter Course Certificate"></textarea>
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseEntryReq">Course Entry Requirements</label>
    <textarea class="form-control" id="courseEntryReq" name="courseEntryReq" value="<?=$courseEntryReq?>" placeholder="Enter Course Entry Requirements"></textarea>
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseDuration">Course Duration</label>
    <textarea class="form-control" id="courseDuration" name="courseDuration" value="<?=$courseDuration?>" placeholder="Enter Course Duration"></textarea>
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseCost">Cost</label>
    <input type="text" class="form-control" id="courseCost" name="courseCost" value="<?=$courseCost?>" placeholder="Enter Course Cost" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseStart">Start Date</label>
   <input type="text" class="form-control" id="courseStart" name="courseStart" value="<?=$courseStart?>" placeholder="Enter Course Start Date" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseEnd">End Date</label>
    <input type="text" class="form-control" id="courseEnd" name="courseEnd" value="<?=$courseEnd?>" placeholder="Enter Course End Date" />
    </div>
    </td></tr>
    
      <tr><td>
    <div class="form-group">
    <label for="courseEnd">Class Size</label>
    <input type="text" class="form-control" id="courseStudents" name="courseStudents" value="<?=$courseStudents?>" placeholder="Enter Class Size" />
    </div>
    </td></tr>

    <tr><td>
    <div class="form-group">
    <label for="courseType">Type</label>
    <select type="text" class="form-control" id="courseType" name="courseType">
    <option value=''= ></option>
    <option value='Food Allergy' <?if ($courseType=="Food Allergy"){echo "selected";}?> >Food Allergy</option>
    <option value='Food Hygiene' <?if ($courseType=='Food Hygiene'){echo 'selected';}?>>Food Hygiene</option>
    <option value='HACCP' <?if ($courseType=='HACCP'){echo 'selected';}?>>HACCP</option>
    <option value='Apprenticeship' <?if ($courseType=='Apprenticeship'){echo 'selected';}?>>Apprenticeship</option> 
    <option value='Other'<?if ($courseType=='Other'){echo 'selected';}?> >Other</option>    
    </select>
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseStatus">Status</label>
    <select type="text" class="form-control" id="courseStatus" name="courseStatus">
    <option value='' ></option>
    <option value='New' <?if ($courseStatuse=='New'){echo 'selected';}?>>New</option>
    <option value='Active' <?if ($courseStatus=='Active'){echo 'selected';}?>>Active</option>
    <option value='Ended' <?if ($courseStatus=='Ended'){echo 'selected';}?>>Ended</option>    
    </select>
    </div>
    </td></tr>
    <tr><td colspan="2">
    <? if ($courseID > 0){ ?>
    	 <input type="hidden" name="action" value ="editCourse" />
         <input type="hidden" name="courseID" value="<?=$courseID?>" />
    <? }else{ ?>                 
	     <input type="hidden" name="action" value ="addCourse" />
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
