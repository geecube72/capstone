<?php $date_given = date('Y-m-d'); ?>		
		<section class="content-header">
			<div class="panel panel-heading"><h4><b> Allowance Tracker </b></h4></div>
		</section>

		<div>
			<button class="btn btn-warning pull-right" type="button" onclick= "view_allowance_modal()" style="margin-right:7%; margin-bottom: 2%;"> Add Allowance </button>
		</div>

		<section class="content">
			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">

				<thead>
						
					<th>Senior Citizen ID</th>
					<th>Name</th>	
					<th>Allowance Received</th>
					<th>Date Received</th>
					<th>Amount Received</th>							
								
				</thead>

				<tbody>
				<?php foreach($transactionList as $row){
					echo "<tr>";
					echo "<td>". $row->SC_ID ."</td>";
					echo "<td>". $row->first_name . " " . $row->last_name  ."</td>";
					echo "<td>". $row->name ."</td>"; 
					echo "<td>". $row->date_given ."</td>";
					echo "<td>". $row->amount ."</td>"; 
				} ?>
				</tbody>
			</table>
		</section>
 
		<div aria-hidden="false" role="dialog" tabindex="-1" id="trackAllowance" class="modal leread-modal fade in">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
						<h4 class="modal-title"><i class="fa fa-calendar-check-o"><b> Track Allowance </b> </i></h4>
					</div>
					<div class="modal-body">
						<div class="requirement"><b style="color:red;"> * Fields are Required </b> </div><br>
						<?php $attributes = array('id' => 'registerAllowance', 'method' => 'POST'); echo form_open('SecondaryController/registerAllowance', $attributes); ?>
						<div class="error"></div>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b>Senior Citizen ID:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="trac_SC_id" id="trac_SC_id" autofocus>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b>Date Given: </b>
								</div>
								<div class="col-sm-4">
									
									<input type="text" class="form-control" name="date_given" value="<?php echo $date_given ?>" disabled>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b>Name: </b>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="SC_name" id="SC_name" disabled>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b>Allowance Description:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
								</div>
								<div class="col-sm-4"> 	
									<select class="form-control" id="allowance_desc" name="allowance_desc">
										<option disabled selected value="">Description</option>
										<?php foreach($allowanceList as $row){?>
										<option value="<?= $row->announcement_no;?>"><?= $row->title; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="form-group has-feedback">
								<div class="col-sm-3">
									<b>Amount:<span class="required" style="color:red; margin-left:5px;">*</span> </b>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="amount" autofocus>
								</div>
							</div>
						</div><br>
						<button class="btn btn-lg btn-info btn-block btn-signin" type="submit">Register Allowance</button>
						<?php echo form_close(); ?>
					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" type="button" class="close">Close</button>
					</div>
				</div>
			</div>
		</div> 