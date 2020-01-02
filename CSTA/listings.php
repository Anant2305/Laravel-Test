<?php
ob_start();
include("includes/header.php");
include("includes/INC_db.php");
$link = dbopen();

$type = $_REQUEST['type'];

$andType = "";
if($type){
	$andType = "and courseType='$type'";
}else{
	$andType = "and courseType not in ('Apprenticeship')";
}

$query = "Select id,courseTitle,courseSummary,courseStart,courseEnd, courseType from courses where courseStatus not in ('Dead') $andType";
$courses = safe_query($query);
//echo $query;
while($row=mysql_fetch_array($courses)) {
	$counter = 0;
	
	$courseID = $row[$counter++];
	$courseTitle = $row[$counter++];
	$courseSumm = $row[$counter++];
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
	}elseif($courseType == "Food Allergy"){
		$courseIcon = "fa-exclamation-triangle";
		$mainDivClass = "csta-list-algy";
		$titleDivClass = "csta-list-algy-title";
	}else{
		$courseIcon = "fa fa-graduation-cap";
		$mainDivClass = "csta-list-other";
		$titleDivClass = "csta-list-other-title";
	}
	
	
	$courseTable .= "<div class='col-xs-12 col-sm-3 col-lg-3 csta-listings $mainDivClass'><div class='csta-list-title $titleDivClass'><div style='text-align:center;' ><i class='fa $courseIcon fa-2x'></i></div> <div style='text-align:center;'>$courseTitle</div></div><div class='col-xs-12 csta-list-summary'>$courseSumm</div><div class='col-xs-6' style='padding: 0px !important'>$courseStart</div><div class='col-xs-6' style='padding: 0px !important'>$courseEnd</div><div class='col-xs-12' style='padding: 0px !important'><a href='details.php?course=$courseID' class='btn btn-lg btn-success col-xs-12'>View</a></div></div>";

}
?>
        <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-8 col-xs-12">
            <div>
            <h4>THIS IS A TEST ONLY ANANT</h4>
<?=$courseTable?>
              </div>    
            
            </div>



            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4 col-xs-12">

            
                 <?php include("includes/sidebar.php"); ?>


			</div>
        </div>
        
        <!-- /.row -->
        <?php include("includes/footer.php");?>