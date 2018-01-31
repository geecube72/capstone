		
		<section class="content-header">

    		<center>
    			<h1><b>Welcome</b> <?= $admininfo->first_name . "&nbsp;" . $admininfo->last_name;?> </h1>
    			<?php 
    				date_default_timezone_set("Asia/Singapore");
    				$date = date('Y-m-d');
    				$mydate = strtoTime($date);
    				echo "<h3>" . "Date : " .  date('F jS, Y', $mydate);
    			 ?>
    			 <div id="time"></div>
    		</center>
            
    	</section>

    <div class="container-fluid">
    	<section class="content pull-left" style="width: 50%; ">
            <div class="panel panel-info" style="margin-top:5%;">
                <div class="panel panel-heading"><h4><b>Pending Announcements</b></h4></div>
                <div class="panel panel-body">
                    <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date Created</th>
                                        <th>Send Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($pendingList as $row){
                                        echo "<tr>";
                                        echo "<td>".$row->title."</td>";
                                        echo "<td>".$row->date_created."</td>"; 
                                        echo "<td>".$row->send_date."</td>";
                                    } ?>
                                </tbody>  
                        </table>
                    </div><!--/table-resp-->
                </div>
            </div>
        </section>

        <section class="content pull-right" style="width: 50%;">
    		<div class="panel panel-info" style="margin-top:5%;">
    			<div class="panel panel-heading"><h4><b>Latest Announcements</b></h4></div>
                <div class="panel panel-body">
                    <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date Posted</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($bulletinList as $row){
                                        echo "<tr>";
                                        echo "<td>".$row->title."</td>";
                                        echo "<td>".$row->send_date."</td>";
                                        echo "<td>".$row->date_created."</td>"; 
                                    } ?>
                                </tbody>  
                        </table>
                    </div><!--/table-resp-->
                </div>
    		</div>
    	</section>
    </div>

		<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>
 


