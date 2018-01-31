<?php $date_created = date('Y-m-d'); ?>

	<section class="content-header">
		<div class="panel panel-heading"><h4><b>Create Notification</b></h4></div>
		<div class="requirement"><b style="color:red;"> * Fields are Required </b> </div>
	</section>

	<section class="content">
		<?php $attributes = array('class' => 'form-signin', 'id' => 'announcementForm', 'method' => 'POST'); echo form_open('SecondaryController/createNotification', $attributes); ?>

		<span id="reauth-email" class="reauth-email"></span>
		<div class="error"></div>
		<div class="row">
			<div class="form-group has-feedback">
				<div class="col-sm-2">
					<b> Date to be sent:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
				</div>
				<div class="col-sm-3" style="margin-left: -60px; width:250px;">
					<input type="date" name="submit_date" id="submit_date" class="form-control" autofocus>
				</div>
				<div class="col-sm-1">
					<b> Type:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
				</div>
				<div class="col-sm-2">
					<input type="hidden" class="form-control" name="type" id="notifType" value="">
					<input type="text" class="form-control" id="notif_type" value="" disabled>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1">
					<b> Title:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
				</div>
				<div class="col-sm-3">
					<select class="form-control" name="title" id="notif_title" autofocus>
						<option disabled selected value="">----</option>
						<?php foreach($postedList as $postedRow){ ?>
						<option value="<?= $postedRow->announcement_no; ?>"><?= $postedRow->title; ?></option>
						<span id="notif_title_no" class="form-control>"></span>
						<?php } ?>
					</select>
				</div>
			<div class="col-sm-2">
				<b> Date Created:</b>
			</div>
			<div class="col-sm-2" style="margin-left: -70px; width: 165px;">
				<input type="text" class="form-control" name="date_created" value="<?php echo $date_created ?>" disabled>
			</div>
		</div>
		<div class="row">
			<div class="form-group has-feedback">
				<div class="col-sm-1">
					<b> Barangay:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
				</div>
				<div class="col-sm-3">
					<select class="form-control" style="margin-bottom: 10px;" name="notifbarangay" autofocus>
						<option disabled selected value="">Barangay</option>
						<?php foreach($barangayList as $row){ ?>
						<option value="<?= $row->barangay_no; ?>"> <?= $row->name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group has-feedback">
				<div class="col-sm-1">
					<b> Message:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
				</div>
				<div class="col-sm-6">
					<input type="hidden" class="form-control" name="notifmessage" id="notifMessage">
					<textarea type="text" class="form-control" id="notif_message" disabled></textarea>
				</div>
			</div>
		</div><br><br>

		<button class="btn btn-lg btn-info btn-signin" type="submit">Create Notification</button>

		<?php form_close(); ?>

	</section>

	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>
	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/sweetalert-dev.js');?>"></script>
	<script src="<?= base_url('assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
	
	<script>
    var date = new Date();
        date.setDate(date.getDate());

        $('#submit_date').datepicker({
            format: 'yyyy-mm-dd',
            startDate: date
        });
	</script>

	<script type="text/javascript">
		$("#notif_title").change(function(e){
			
			e.preventDefault();

			$.ajax({
				type : "POST",
				url  : "<?= site_url('SecondaryController/getAnnouncementInfo');?>",
				data : {
					id : $("#notif_title").val()
				},
				dataType : "json",

				success : function(e){
					console.log(e);
					document.getElementById('notifType').setAttribute('value', e[0].type);
					document.getElementById('notif_type').setAttribute('value', e[0].type);
					$("#notifMessage").val(e[0].message);
					$("#notif_message").val(e[0].message);
				}
			})
		})	
	</script>

	<script>

		$("#announcementForm").submit(function(e){

			e.preventDefault();

			var that = $(this),
			btn = that.find(['type = submit']);

			btn.addClass('disabled');
			$.post(that.attr('action'), that.serialize()).done(function(response){
				if(response.result == "error"){
					$('.error').replaceWith($('<div>', {
                    class : "alert alert-danger",
                    html : function(){
                        return '<ul class="list-unstyled"><li>' + response.errors.join('</li><li>') + '</li><ul>'
                    }
                	})),
                    window.setTimeout(function(){
                        window.location.href="<?= site_url('MainController/createNotification');?>";
                    }, 1000);
				}
				else if (response.result == false){
					swal({
						title : "Error",
						text  : "Something is wrong!",
						type  : "error",
						closeOnConfirm : false
						},

						function(){
							window.location.reload();
						});
				
				}						
				else if(response.result == true){
					swal({
						title : "Success",
						text  : "Notification Created Successfully!",
						type  : "success",
						closeOnConfirm : false
						},

						function(){
							window.location.href = "<?= site_url('MainController/announcementList'); ?>"
						});
					
				}
			})

		})

	</script>