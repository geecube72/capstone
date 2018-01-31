<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/sweetalert-dev.js');?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
		swal({
			title : "Error!",
			text  : "Please Log in to Continue",
			type  : "error",
			closeOnConfirm : false,
			},

			function(){
				window.location.href = "<?= site_url('MainController');?>";
			});
	});
</script>
