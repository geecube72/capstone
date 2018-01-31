 		
		<section class="content-header">
			<div class="panel panel-heading"><h4><b> OSCA Employee Records </b></h4></div>
		</section>

		
	   	<section class="content">

			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">

				<thead>
					
					<th>User Type</th>
					<th>Name</th>
					<th>Mobile Number</th>	
					<th>E-mail Address</th>
					<th>Status</th>
					<th></th>
					
				</thead>

				<tbody>
					<?php foreach($employeeList as $data){

						echo "<tr>";
						echo "<td>".ucfirst($data->user_type)."</td>";
						echo "<td>".$data->first_name. '&nbsp;' . $data->last_name ."</td>";
						echo "<td>".$data->contact_number."</td>"; 
						echo "<td>".$data->email_address ."</td>";
						echo "<td>".ucfirst($data->emp_status)."</td>"; 
						?>
						<td>
							<button class="btn btn-info" onclick="view_employee_modal('<?php echo $data->user_id ?>');" name="view" value="view">View</button>
							<button class="btn btn-danger" onclick="remove_employee('<?php echo $data->user_id ?>');">Delete</button>
						</td>

					<?php }	
					?>
				</tbody>

			</table>
		</section>
