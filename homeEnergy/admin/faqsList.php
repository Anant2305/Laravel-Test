<?php
ob_start();
include("includes/header.php");
$link = dbopen();
$query = "select f.faqID, f.faqTitle, f.faqDetail from faqs f where f.faqTitle !=''";
	//echo $query;
	$faqs = safe_query($query);
	
	while($row=mysql_fetch_array($faqs)) {
		$counter = 0;
		
		$faqID = $row[$counter++];
		$faqTitle = $row[$counter++];
		$faqDetail = $row[$counter++];
		//echo $faqTitle;
		
		$faqTD .= "<tr><td>$faqTitle</td><td>$faqDetail</td><td><a href='addFAQs.php?faqID=$faqID'>Edit</a></td></tr>"; 
	
	}

?>

        <div id="page-wrapper">

            <div class="container-fluid">


        <div class="row">
 <!-- Blog Entries Column -->
            <div class="col-md-12">
	            <h1 class="page-header">LIST FAQ's</h1><br />
				<a href="addFAQs.php" target="_self">Add FAQs</a>	            
 				<table>
                <thead>
                <th>Title</th><th>Detail</th><th>Edit FAQ</th>
				</thead>
                <tbody>
                <?=$faqTD?>
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
