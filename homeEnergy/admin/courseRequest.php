<?php
ob_start();
include("includes/header.php");
$courseID = $_REQUEST['courseID'];
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
    <label for="courseTitke">Title</label>
    <input type="text" class="form-control" id="courseTitle" name="courseTitle" placeholder="Course Title" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseSummary">Summary</label>
    <input type="text" class="form-control" id="courseSummary" name="courseSummary" placeholder="Enter Course Summary" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseDesc">Description</label>
    <textarea class="form-control" id="courseDesc" name="courseDesc" placeholder="Enter Course Description"></textarea>
    </div>
    </td></tr>
             
    <tr><td>
    <div class="form-group">
    <label for="courseCost">Cost</label>
    <input type="text" class="form-control" id="courseCost" name="courseCost" placeholder="Enter Course Cost" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseStart">Start Date</label>
   <input type="text" class="form-control" id="courseStart" name="courseStart" placeholder="Enter Course Start Date" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseEnd">End Date</label>
    <input type="text" class="form-control" id="courseEnd" name="courseEnd" placeholder="Enter Course End Date" />
    </div>
    </td></tr>

    <tr><td>
    <div class="form-group">
    <label for="courseType">Status</label>
    <select type="text" class="form-control" id="courseType" name="courseType">
    <option value=''= ></option>
    <option value='Food Allergy'= >Food Allergy</option>
    <option value='Food Hygiene'= >Food Hygiene</option>
    <option value='HACCP'= >HACCP</option> 
    <option value='Other'= >Other</option>    
    </select>
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="courseStatus">Status</label>
    <select type="text" class="form-control" id="courseStatus" name="courseStatus">
    <option value=''= ></option>
    <option value='New'= >New</option>
    <option value='Active'= >Active</option>
    <option value='Ended'= >Ended</option>    
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
