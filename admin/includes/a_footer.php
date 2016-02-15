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

</body>

</html>