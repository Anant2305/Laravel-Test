<?php
ob_start();
include("includes/header.php");
include("includes/INC_db.php");
$link = dbopen();

$courseID = $_REQUEST['course'];

$query = "Select id,courseTitle,courseSummary,courseDesc,courseCost,courseStart,courseEnd,courseType from courses where id=$courseID";
$courses = safe_query($query);

while($row=mysql_fetch_array($courses)) {
	$counter = 0;
	
	$courseID = $row[$counter++];
	$courseTitle = $row[$counter++];
	$courseDesc = $row[$counter++];
	$courseCost= $row[$counter++];
	$courseStart = date("d M y",strtotime($row[$counter++]));
	$courseEnd = date("d M y",strtotime($row[$counter++]));
	$courseType = $row[$counter++];
	
	if($courseType == "HACCP"){
		$courseIcon = "fa-check-square-o";
		$mainDivClass = "csta-list-haccp";
		$titleDivClass = "csta-list-haccp-title";
	}elseif($courseType == "Food Hygiene"){
		$courseIcon = "fa-cutlery";
		$mainDivClass = "csta-list-hyg";
		$titleDivClass = "csta-list-hyg-title";
	}else{
		$courseIcon = "fa-exclamation-triangle";
		$mainDivClass = "csta-list-algy";
		$titleDivClass = "csta-list-algy-title";
	}
}
?>


        <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-8">
           <div class="col-md-12">
           <h1><?=$courseTitle?></h1>
           <h4>THIS IS A TEST ONLY</h4>
<?=$courseSumm?>
              </div>          
            <br /><br />
            <div class="col-md-12">
<?=$courseDesc?>
              </div>    
 <div class="col-md-12">
 <br /><br />
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i>
Course Detials</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i> Target Audience</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i> Certification</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i> Entry Requirements</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i> Duration</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
  </div> 
  </div>        
    </div>



            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>


			</div>
        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
