<?php
ob_start();
include("includes/header.php");
include("includes/INC_db.php");
$link = dbopen();


$query = "select f.faqID, f.faqTitle, f.faqDetail from faqs f where f.faqTitle!=''";
$faqs = safe_query($query);

$faqRef = 0;
while($row=mysql_fetch_array($faqs)) {
	$counter = 0;
	
	$faqID = $row[$counter++];
	$faqTitle = $row[$counter++];
	$faqDesc = $row[$counter++];
	
	$faqRef++;
	
	if ($faqRef==1){
		$faqIN = 'in';
	}else{
		$faqIN = '';
	}
	
	$faqDiv .= '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $faqRef . '"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i>'. 
$faqTitle . '</a></h4></div><div id="collapse' . $faqRef . '" class="panel-collapse collapse ' . $faqIN .'"><div class="panel-body">' . $faqDesc . '</div></div></div>';

}
?>


        <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-8">
           <div class="col-md-12">
           <h4>FAQ's</h4>
              </div>    
 <div class="col-md-12">
 <br /><br />
 
<div class="panel-group" id="accordion">
 
<?=$faqDiv?>    
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
