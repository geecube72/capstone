 		
		<section class="content-header">
			<div class="panel panel-heading"><h4><b> Pending Notification List </b></h4></div>
		</section>

		<section class="content">
			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">

				<thead>
						

					<th>Title</th>
					<th>Date Created</th>
					<th>Message</th>	
					<th>Date to be Sent</th>
					<th>Area/Barangay</th>	
					<th></th>							
								
				</thead>

				<tbody>

				<?php foreach($notificationList as $row){	
					echo "<tr>";
					echo "<td>". $row->title ."</td>";
					echo "<td>". $row->date_created ."</td>";
					echo "<td>". $row->message ."</td>";					 
					echo "<td>". $row->send_date ."</td>";
					echo "<td>". $row->name ."</td>"; ?>
					<td><button class="btn btn-success" onclick="announcement_send('<?php echo $row->notification_no ?>');" name="view" value="send">Send</button></td>
				<?php } ?>
				</tbody>
			</table>
		</section>

		<div aria-hidden="false" role="dialog" tabindex="-1" id="viewAnnouncement" class="modal leread-modal fade in">
			<div class="modal-dialog">
			
				<div class="modal-content">
					<div class="modal-header">
						<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title"><i class="fa fa-calendar-check-o"><b>Confirm Message</b></i></h4>
					</div>
					
					<div class="modal-body">
						<?php $attributes = array('id' => 'confirmAnnouncement_CHIKKA', 'method' => 'POST'); echo form_open('SecondaryController/sendGroupSMS_CHIKKA', $attributes); ?>
							<div class="row">
								<div class="form-group has-feedback">
									<div class="col-sm-2">
										<b> ID: </b>
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="announcement_id" name="announcement_id" disabled>
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="form-group has-feedback">      
									<div class="col-sm-2">
										<b> Title: </b>
									</div>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="Title" name="title" disabled>
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="form-group has-feedback">      
									<div class="col-sm-2">
										<b> Date Created: </b>
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="date_created" name="date_created" disabled>
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="form-group has-feedback">      
									<div class="col-sm-2">
										<b> Type: </b>
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="type" name="type" disabled>
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="form-group has-feedback">      
									<div class="col-sm-2">
										<b> Barangay/Area: </b>
									</div>
									<div class="col-sm-4">
										<input type="hidden" id="barangay1" name="barangay_number">
										<input type="text" class="form-control" id="barangay2" disabled>
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="form-group has-feedback">      
									<div class="col-sm-2">
										<b> Message: </b>
									</div>
									<div class="col-sm-6">
										<input type="hidden" class="form-control" id="message1" name="message">
										<textarea class="form-control" id="message2"  disabled></textarea>
									</div>
								</div>
							</div><br>
							<div class="form-group">
								<button class="btn btn-warning" type="submit">Submit</button>
							</div>
						<?php form_close(); ?>
					</div>
					
					<div class="modal-footer">
						<button data-dismiss="modal" class="close" type="button">Close</button>
					</div> 
				</div>
			</div>
		</div>