<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Settings 
					<small>Account Management</small>
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="jumbotron">
					<h1><center>Page under construction.</center></h1>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});

$(document).ready(function() {
	// $('[data-toggle="tooltip"]').tooltip();
	$('#pageSettings').removeAttr('href');
});
</script>
</body>
</html>