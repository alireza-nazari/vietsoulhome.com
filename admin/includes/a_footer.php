<footer class="footer" style="position: absolute; bottom: 0; width: 100%">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span10"> &copy; VietSoul Restaurant 2016</div>
        <div class="span2"> Powered by: DucTruong</div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /footer-inner -->
</footer>
<!-- /footer -->
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- form validation js library -->
    <script src="../js/jquery.maskedinput.js"></script>
    <script src="../js/validation.js"></script>

<script type="text/javascript">

//image popover
$('a[rel=popover]').popover({

	html: true,

	trigger: 'hover',

	placement: 'left',

	content: function(){return '<img src="'+$(this).data('img') + '" style="width: 20em; height: 20em"/>';}

});
</script>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/chart.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>

<script src="js/base.js"></script>
<script>

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
        {
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            data: [28, 48, 40, 19, 96, 27, 100]
        }
      ]

        };

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);
</script>
</body>
</html>
