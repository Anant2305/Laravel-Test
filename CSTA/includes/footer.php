
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/query.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $("#courseStart").datepicker();
    $("#courseEnd").datepicker();
  });
  </script>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var myCenter =  new google.maps.LatLng(53.547118, -2.123666);
  var mapOptions = { center:	myCenter, zoom: 18 };
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker=new google.maps.Marker({
  position:myCenter,
  icon:'./images/CSTA_LogoV2.jpg'
  });
  marker.setMap(map);
    
  
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD2ETb8NWKih5QsRBieFR-RxasHYHNSZU&callback=myMap"></script>


</body>

</html>
