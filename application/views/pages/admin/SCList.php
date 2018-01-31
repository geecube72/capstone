	
		
		<section class="content-header">
			<div class="panel panel-heading"><h4><b> Senior Citizen Records </b></h4></div>
		</section>

	
	   	<section class="content">
			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">

				<thead>
					
					<th>Senior Citizen ID</th>
					<th>Name</th>
					<th>Age</th>	
					<th>Birthday</th>
					<th>Date Registered</th>
					<th></th>
					
				</thead>

				<tbody>
					<?php foreach($SCList as $data){

						echo "<tr>";
						echo "<td>".$data->SC_ID ."</td>";
						echo "<td>".$data->first_name. '&nbsp;' . $data->last_name ."</td>";
						echo "<td>".$data->age."</td>"; 
						echo "<td>".$data->date_of_birth ."</td>"; 
						echo "<td>".$data->date_registered."</td>"; ?>
						<td><button class="btn btn-info" onclick="view_SC_modal('<?php echo $data->barangay_no?>','<?php echo $data->SC_no?>');" name="view" value="view">View</button>
						</td>

					<?php }	
					?>
				</tbody>

			</table>
		</section>


	<div aria-hidden="false" role="dialog" tabindex="-1" id="SCModal" class="modal leread-modal fade in">
		<div class="modal-dialog modal-lg">
			<!-- Start change section -->
			<div id="login-content" class="modal-content">
				<div class="modal-header">
					<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title"><i class="fa fa-calendar-check-o"><?php echo '&nbsp;'?><input type="text" id="header" style="border:0px;" disabled></i></h4>
				</div>
					<!-- Start Modal body -->
				<div class="modal-body" id="SC_Details">

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-1">
								<b> Name: </b> 
							</div>
							<div class="col-sm-4">
								<input type="hidden" id="SC_no" name="SC_no">
								<input type="hidden" id="barangay_no">
								<input type="text" class="form-control" id="Firstname" disabled>
							</div>      
							<div class="col-sm-2">
								<b> Generated ID Number: </b>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="SC_id" disabled>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-1">
								<b> Address: </b>  
							</div>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" id="Address" disabled></textarea>       
							</div>
							<div class="col-sm-1">
								<b>Religion: </b>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="Religion" disabled>             
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-2">
								<b> Contact number: </b>
							</div>
							<div class="col-sm-3">
								<input type="text"  class="form-control" id="MobileNumber" disabled>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-2">
								<b> Civil Status: </b>
							</div>
							<div class="col-sm-3"> 
								<input type="text" class="form-control" id="CivilStatus" disabled>     
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-2">
								<b> Gender: </b>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="Gender" disabled>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-2">
								<b>Date of Birth: </b>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="Birthday" disabled>            
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-2">
								<b> Age: </b>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="Age" disabled>             
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-2">
								<b>Place of Birth:</b>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="BirthPlace" disabled>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-3">
								<b> highest education attained: </b>
							</div>
							<div class="col-sm-3" style="margin-left: -30px;">
								<input type="text" class="form-control" id="highest_educ_attained" disabled>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-1">
								<b> Status: </b>
							</div>
							<div class="col-sm-2">
								<input type=text class="form-control" id="Status" disabled>        
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-2 col-xs-4">
								<img src="" id="profile_photo" class="img-responsive img-thumbnail" alt="responsive-img">
							</div>
							<div class="col-sm-2 col-xs-4">
								<img src="" id="signature_photo" class="img-responsive img-thumbnail" alt="responsive-img">
							</div>
							<div class="col-sm-2 col-xs-4">
								<img src="" id="SC_ID_photo" class="img-responsive img-thumbnail" alt="responsive-img">
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-offset-1">
							<button class ="btn btn-warning" id="generate" onclick="generate_id()">Generate ID</button>
							<button class="btn btn-danger" onclick="remove_SC()">Delete</button>
							<button class="btn btn-info" onclick="spec_message_modal()">Send SMS</button>
							<button class="btn btn-warning" onclick="transHistory_modal()">Transaction History</button>
						</div>
					</div><br>
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="close" type="button">Close</button>
				</div> 
			</div>
		</div>
	</div>

	<div aria-hidden="false" role="dialog" tabindex="-1" id="sendSMSModal" class="modal leread-modal fade in">
		<div class="modal-dialog">
			<div id="login-content" class="modal-content">
				<div class="modal-header">
					<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
					<h4 class="modal-title"><i class="fa fa-calendar-check-o"><?php echo '&nbsp;' ?>Send SMS</i></h4>
				</div>
				<div class="modal-body">
					<div class="error"></div>
					<?php $attributes = array('id' => 'sendSMSform_CHIKKA', 'method' => 'POST'); echo form_open('SecondaryController/sendSMS_CHIKKA', $attributes); ?>
					<input type="hidden" id="SC_num" name="SC_num">
					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-1">
								<b> Name: </b>
							</div>
							<div class="col-sm-4 col-sm-offset-1">
								<input type="text" class="form-control" id="SC_name" disabled>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-1">
								<b> Contact Number: </b>
							</div>
							<div class="col-sm-4 col-sm-offset-1">
								<input type="hidden" id="send_contact" name="contact_number">
								<input class="form-control" id="contact_number" disabled>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-1">
								<b> Message: </b>
							</div>
							<div class="col-sm-4 col-sm-offset-1">
								<textarea class="form-control" name="message"></textarea>
							</div>
						</div>
					</div><br>
					<div class="row">
						<button class="btn btn-warning col-sm-2" style="margin-left:10px;" type="submit">Send</button>
					</div>
					<?php echo form_close();?>
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="close" type="button">Close</button>
				</div>
			</div>
		</div>
	</div>
