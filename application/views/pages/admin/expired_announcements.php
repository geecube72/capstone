		<section class="content-header">
			<div class="panel panel-heading"><h4><b> Expired Announcement List </b></h4></div>
		</section>

		<section class="content">
			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">
				<thead>
						
					<th>Title</th>
					<th>Annnouncement Type</th>
					<th>Message</th>	
					<th>Date Created</th>
					<th>Date to be Sent</th>
					<th>Status</th>								
								
				</thead>
				<tbody>
				<?php foreach($expiredList as $row){	
					echo "<tr>";
					echo "<td>". $row->title ."</td>";
					echo "<td>". $row->type ."</td>";
					echo "<td>". $row->message ."</td>";
					echo "<td>". $row->date_created ."</td>"; 
					echo "<td>". $row->send_date ."</td>";
					echo "<td>". $row->status ."</td>"; ?>
				<?php } ?>
				</tbody>
			</table>
		</section>