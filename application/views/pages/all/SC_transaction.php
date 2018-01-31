		<section class="content-header">
			<div class="panel panel-heading"><h4><b> Allowance Transaction </b></h4></div><br>
		</section>

		
	   	<section class="content">

			<table class="table table-hover cell-border" cellspacing="0" width="100%" id="example">

				<thead>
					
                    <th>Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date Received</th>
					
				</thead>

				<tbody>
					<?php foreach($transactionList as $row){
                                    
                    	echo "<tr>";
                        echo "<td>".$row->name."</td>";
                        echo "<td>".$row->description."</td>"; 
                        echo "<td>".$row->amount."</td>"; 
                        echo "<td>".$row->date_given."</td>";

 					} ?>
				</tbody>

			</table>
			<?php if($this->session->userdata('user_type') == 'admin'){ ?>
				<a href="<?= site_url('MainController/adminSCList')?>">Back</a>
			<?php }else if($this->session->userdata('user_type') == 'employee'){ ?>
				<a href="<?= site_url('MainController/employeeSCList')?>">Back</a>
			<?php } ?>

		</section>