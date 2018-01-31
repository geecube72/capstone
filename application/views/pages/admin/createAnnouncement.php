<?php $date_created = date('Y-m-d'); ?>		
		<section class="content-header">
			<div class="panel panel-heading"><h4><b> Announcement List </b></h4></div>
		</section>

		<div>
			<button class="btn btn-warning pull-right" type="button" onclick= "view_creAnnoun_modal()" style="margin-right:7%; margin-bottom: 2%;"> Create Announcement </button>
		</div>

		<section class="content">
			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">
				<thead>
						
					<th>Title</th>
					<th>Date Created</th>		
					<th>Message</th>	
					<th>Annnouncement Type</th>
					<th>Date to be Sent</th>
					<th>Status</th>
					<th></th>								
								
				</thead>
				<tbody>
				<?php foreach($announcementList as $row){	
					echo "<tr>";
					echo "<td>". $row->title ."</td>";
					echo "<td>". $row->date_created ."</td>";
					echo "<td>". $row->message ."</td>";
					echo "<td>". $row->type ."</td>"; 
					echo "<td>". $row->send_date ."</td>";
					echo "<td>". $row->status ."</td>"; ?>
					<td><button class="btn btn-success" onclick="announcement_post('<?php echo $row->announcement_no ?>');">Post</button>
						<button class="btn btn-danger" onclick="delete_post('<?php echo $row->announcement_no ?>');">Delete</button></td>
				<?php } ?>
				</tbody>
			</table>
		</section>

		<div aria-hidden="false" role="dialog" tabindex="-1" id="createAnnouncement" class="modal leread-modal fade in">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
						<h4 class="modal-title"><i class="fa fa-calendar-check-o"><b> Create Announcement </b> </i></h4>
					</div>
					<div class="modal-body">
						<div class="requirement"><b style="color:red;"> * Fields are Required </b> </div><br>
						<?php $attributes = array('id' => 'registerAnnouncement', 'method' => 'POST'); echo form_open('SecondaryController/createAnnouncement', $attributes); ?>
						<div class="error"></div>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b> Date to be posted:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
								</div>
								<div class="col-sm-4">
									<input type="date" name="post_date" id="post_date" class="form-control" autofocus>
								</div>
								
							</div>
						</div><br>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b> Type:<span class="required" style="color:red; margin-left:5px;">*</span>  </b>
								</div>
								<div class="col-sm-4">
									<select class="form-control" id="announcement_type" name="announcement_type" autofocus>
										<option disabled selected value="">------</option>
										<option value="allowance">Allowance</option>
										<option value="meeting">Meeting</option>
										<option value="others">Others</option>
									</select>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b> Title:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
								</div>
								<div class="col-sm-4">
									<input type="text" name="title" id="title" class="form-control" autofocus>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b> Date Created: </b>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="date_created" value="<?php echo $date_created ?>" disabled>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b> Message:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
								</div>
								<div class="col-sm-4">
									<textarea type="text" class="form-control" name="announcement_message" autofocus></textarea>
								</div>
							</div>
						</div><br>

						<button class="btn btn-lg btn-info btn-block btn-signin" type="submit">Create Announcement</button>

						<?php form_close(); ?>
					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" type="button" class="close">Close</button>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>
		<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/sweetalert-dev.js');?>"></script>
		<script src="<?= base_url('assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
		

		<script>
	    var date = new Date();
	        date.setDate(date.getDate());

	        $('#post_date').datepicker({
	            format: 'yyyy-mm-dd',
	            startDate: date
	        });
		</script>

		<script>

		$("#registerAnnouncement").submit(function(e){

			e.preventDefault();

			var that = $(this),
			btn = that.find(['type = submit']);

			btn.addClass('disabled');
			$.post(that.attr('action'), that.serialize()).done(function(response){
				if(response.result == false){
					$('.error').replaceWith($('<div>', {
                    class : "alert alert-danger",
                    html : function(){
                        return '<ul class="list-unstyled"><li>' + response.errors.join('</li><li>') + '</li><ul>'
                    }
                	})),
                    window.setTimeout(function(){
                        window.location.href="<?= site_url('MainController/createAnnouncement');?>";
                    }, 2000);
				}

				else if(response.result == true){
					swal({
						title : "Success",
						text  : "Announcement Created Successfully!",
						type  : "success",
						closeOnConfirm : false
						},

						function(){
							window.location.href = "<?= site_url('MainController/createAnnouncement'); ?>"
						});
					
				}
			})

		})

	</script>

	<script>
		
		function announcement_post(id){
			$.ajax({
				type : "POST",
				url  : "<?= site_url('SecondaryController/postAnnouncement');?>",
				data :{
					id : id
				},
				dataType : "json",

				success : function(e){
					if(e.result == false){
						swal("Error!", "Already Changed!", "error");
					}
					else if(e.result == true){
						swal({

	                            title : "Success!",  
	                            text  : "Posted Successfully!",
	                            type  : "success",
	                            closeOnConfirm : false

	                        },

	                        function(){
	                            window.location.href = "<?= site_url('MainController/createAnnouncement');?>";
	                    });
					}
				}
			});
		}

		function delete_post(id){
			swal({

                title : "Are you sure?",
                text  : "You will not be able to retrieve the file!",
                type  : "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false

        	},

        function(isConfirm){

        if(isConfirm){ 

            $.ajax({
                type : "POST",
                url  : "<?= site_url('SecondaryController/deletePost')?>",
                data : {
                    id : id
                },
                dataType : "json",

                success : function(e){
                	if(e.result == true){
                        swal({

                            title : "Success!",  
                            text  : "Deleted Successfully!",
                            type  : "success",
                            closeOnConfirm : false

                        },

                        function(){
                            window.location.reload();
                        });
                    }
                }
            });               

            } else {
                swal("Cancelled", "Not Removed!","warning"); 
            }
        });
		}
	</script>