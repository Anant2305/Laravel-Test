<?php
ob_start();
include("includes/header.php");
$link = dbopen();
$faqID = $_REQUEST['faqID'];
//echo $faqID;
if(isset($faqID) && $faqID > 0){
	$query = "select f.faqID, f.faqTitle, f.faqDetail from faqs f where f.faqID=$faqID Limit 1";
	//echo $query;
	$faqs = safe_query($query);
	
	while($row=mysql_fetch_array($faqs)) {
		$counter = 0;
		
		$faqID = $row[$counter++];
		$faqTitle = $row[$counter++];
		$faqDetail = $row[$counter++];
		//echo $faqTitle;
	}

}

?>
        <div id="page-wrapper">

            <div class="container-fluid">


        <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-12">
            <h1 class="page-header">Add/Edit FAQ's</h1>
      <form action="./includes/savetoDB.php">
      <table class="col-xs-12 col-md-8">
      <tr><td>
    <div class="form-group">
    <label for="faqTitle">Title</label>
    <input type="text" class="form-control" id="faqTitle" name="faqTitle" value="<?=$faqTitle?>" placeholder="FAQ Title" />
    </div>
    </td></tr>
    
    <tr><td>
    <div class="form-group">
    <label for="faqDetail">Description</label>
    <input type="text" class="form-control" id="faqDetail" name="faqDetail"  value="<?=$faqDetail?>" placeholder="Enter FAQ Details" />
    </div>
    </td></tr>
    
    
    <tr><td colspan="2">
    <? if ($faqID > 0){ ?>
    	 <input type="hidden" name="action" value ="editFAQ" />
         <input type="hidden" name="faqID" value="<?=$faqID?>" />
    <? }else{ ?>                 
	     <input type="hidden" name="action" value ="addFAQ" />
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
