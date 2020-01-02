        
                <!-- Blog Categories Well -->
        <div class="well">
                    
                    <div class="row">
                    	<h4> Categories</h4>
                        <div class="col-sm-12">
                            <ul class="list-unstyled">
                                <li><a href="listings.php?type=Food Hygiene">Food Hygiene</a>
                                </li>
                                <li><a href="listings.php?type=Food Allergy">Food Allergy</a>
                                </li>
                                <li><a href="listings.php?type=HACCP">HACCP</a>
                                </li>
                                <li><a href="listings.php?type=Apprenticeship">Apprenticeship</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <h4>Enquires</h4>
                        <div class="col-sm-12">
                        	
                            <form action="./includes/create_email.php">
                            <table class="col-xs-12">
                            <tr><td>
                            <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Enter Name" required>
  </div>
                            
                            </td></tr>
                            <tr><td><div class="form-group">
    <label for="exampleInputPassword1">Phone No</label>
    <input type="text" class="form-control" id="studentPhone" name="studentPhone" placeholder="Enter Contact Number">
  </div></td></tr>
                            <tr><td><div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input type="email" class="form-control" id="studentEmail" name="studentEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  </td></tr>
                            <tr><td><div class="form-group">
    <label for="exampleTextarea">Comments</label>
    <textarea class="form-control" id="enquiryComments" name="enquiryComments" rows="3"></textarea>
  </div></textarea> </td></tr>
                            <tr><td colspan="2"> <input type="hidden" name="courseID" value="<?=$courseID?>" /> 
                            <input type="hidden" name="action" value="enquiry" /> 
                            <input type="submit" name="submitForm" value="SUBMIT" /></td></tr>
                            </table>
                            </form>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Get in Touch</h4>
                    <p>Tel: 0161 999 9999</p>
                    <p>Email: <a href="mailto:csta@gmail.com">csta@gmail.com</a></p>
                   
                </div>

            </div>