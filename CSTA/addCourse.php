<?php include("includes/header.php"); ?>

        <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-8">
            <div class="col-md-12">
      <form action="./includes/savetoDB.php?action=addCourse">
      <table class="col-md-12">
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
    <label for="courseLevel">Course Level</label>
    <input type="text" class="form-control" id="courseLevel" name="courseLevel" placeholder="Enter Course Level" />
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
    <input type="submit" name="submitForm" value="SUBMIT" />
    </td></tr>
    </table>
    </form>  
            </div>
            </div>



            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>


			</div>
        </div>
        <!-- /.row -->

<div id='statusDateDiv'>
<!--/* John's Calendar */-->
</div>

        <?php include("includes/footer.php"); ?>
