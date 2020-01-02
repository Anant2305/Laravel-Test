  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="../js/query.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $("#courseStart").datepicker();
	$( "#courseStart" ).on( "change", function() {
			$( "#courseStart" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	});

	
    $("#courseEnd").datepicker();
	$( "#courseEnd" ).on( "change", function() {
			$( "#courseEnd" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	});
	
  });
  </script>

</body>

</html>
