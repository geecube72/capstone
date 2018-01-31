		<section class="content-header">
			<div class="panel panel-heading"><h4><b> Per Barangay </b></h4></div>
		</section>

		
	   	<section class="content">

			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">

				<thead>
					
					<th>Senior Citizen ID.</th>
					<th>Name</th>	
					<th>Birthday</th>
					<th>Age</th>
					
				</thead>

				<tbody>
					<?php foreach($list_per_barangay as $data){

						echo "<tr>";
						echo "<td>".$data->SC_ID."</td>";
						echo "<td>".$data->first_name. '&nbsp;' . $data->last_name ."</td>";
						echo "<td>".$data->date_of_birth."</td>"; 
						echo "<td>".$data->age ."</td>"; ?>
					
					<?php }	
					?>
				</tbody>

			</table>

			<a href="<?= site_url('MainController/populationMap')?>">Back</a>
		</section>