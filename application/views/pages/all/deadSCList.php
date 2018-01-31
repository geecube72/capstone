<section class="content-header">
			<div class="panel panel-heading"><h4><b> Senior Citizen Records (Deceased) </b></h4></div>
		</section>

	
	   	<section class="content">
			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">

				<thead>
					
					<th>Senior Citizen ID</th>
					<th>Name</th>
					<th>Age</th>	
					<th>Birthday</th>
					<th>Date of Death</th>

					
					
				</thead>

				<tbody>
					<?php foreach($deadList as $data){

						echo "<tr>";
						echo "<td>".$data->SC_ID ."</td>";
						echo "<td>".$data->first_name. '&nbsp;' . $data->last_name ."</td>";
						echo "<td>".$data->age."</td>"; 
						echo "<td>".$data->date_of_birth ."</td>";
						echo "<td>".$data->date_of_death."</td>"; ?>

					<?php }	
					?>
				</tbody>

			</table>
		</section>