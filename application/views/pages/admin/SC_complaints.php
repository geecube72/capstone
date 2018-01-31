		
		<section class="content-header">
			<div class="panel panel-heading"><h4><b> Unverified Complaints List </b></h4></div>
		</section>

	
	   	<section class="content">
			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">

				<thead>
					
					<th>Senior Citizen ID</th>
					<th>Senior Citizen Name</th>	
					<th>Complaint Date</th>
					<th>Complaint Type</th>
					<th></th>
					
				</thead>

				<tbody>
					<?php foreach($complaintsList as $data){

						echo "<tr>";
						echo "<td>".$data->SC_ID."</td>";
						echo "<td>".$data->first_name. '&nbsp;' . $data->last_name ."</td>";
						echo "<td>".$data->date."</td>";
						echo "<td>".ucfirst($data->complaint_type)."</td>"; ?>
						<td><button class="btn btn-info" name="view" value="view" onclick="spec_complaint_modal('<?php echo $data->complaint_no?>');">View</button></td>

					<?php }	
					?>
				</tbody>

			</table>
		</section>

	<div aria-hidden="false" role="dialog" tabindex="-1" id="specComplainModal" class="modal leread-modal fade in">
		<div class="modal-dialog">
			<!-- Start change section -->
			<div id="login-content" class="modal-content">
				<div class="modal-header">
					<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title"><i class="fa fa-calendar-check-o"><?php echo '&nbsp;' ?>Specific Complaint</i></h4>
				</div>
					<!-- Start Modal body -->
				<div class="modal-body" id="SC_Details">

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-4">
								<b> Complain Number: </b> 
							</div>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="complain_no" disabled>
							</div>      
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-4">
								<b> Senior Citizen ID: </b>  
							</div>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="SC_id" disabled>     
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-4">
								<b> Complainant: </b>
							</div>
							<div class="col-sm-5">
								<input type="text"  class="form-control" id="SC_name" disabled>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-4">
								<b> Date: </b>
							</div>
							<div class="col-sm-5"> 
								<input type="text" class="form-control" id="complain_date" disabled>     
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-4">
								<b> Message: </b>
							</div>
							<div class="col-sm-5">
								<textarea type="text" class="form-control" id="complain_message" disabled></textarea>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-offset-1">
							<button class="btn btn-warning" type="button" onclick="verifyComplaint()">Verify</button>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="close" type="button">Close</button>
				</div> 
			</div>
		</div>
	</div>

	<div aria-hidden="false" role="dialog" tabindex="-1" id="verifyComplainModal" class="modal leread-modal fade in">
		<div class="modal-dialog">
			<!-- Start change section -->
			<div id="login-content" class="modal-content">
				<div class="modal-header">
					<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title"><i class="fa fa-calendar-check-o"><?php echo '&nbsp;' ?>Verify Complaint</i></h4>
				</div>
					<!-- Start Modal body -->
				<div class="modal-body" id="SC_Details">
					<?php $attributes = array('class' => 'form-signin', 'id' => 'verifyComplaint', 'method' => 'POST'); echo form_open('SecondaryController/verifyComplaint', $attributes); ?>
					<div class="error"></div>
					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-4">
								<b> Complaint Number: </b>
							</div>
							<div class="col-sm-5">
								<input type="hidden" name="verify_complain_no" id="verify_complain_no">
								<input type="text" class="form-control" id="verify_complain_no1" disabled>
							</div>      
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-4">
								<b> Senior Citizen ID: </b>  
							</div>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="verify_SC_id" disabled>  
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="form-group has-feedback">
							<div class="col-sm-4">
								<b> Complaint Type: </b>
							</div>
							<div class="col-sm-5">
								<select class="form-control" id="complaint_type" name="complaint_type" autofocus>
									<option disabled selected value="">Unverified</option>
									<option value="allowance">Allowance</option>
									<option value="service">Customer Service</option>
									<option value="others">Others</option> 
								</select>
							</div>
						</div>
					</div><br>					
							
					<button class="btn btn-lg btn-info btn-block btn-signin" type="submit" onclick="submitVerification()">Verify Complaint</button>

				<?php form_close();?>
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="close" type="button">Close</button>
				</div> 
			</div>
		</div>
	</div>