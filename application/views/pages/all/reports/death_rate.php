<section class="content-header">
	<div class="panel panel-heading"><h4><b> Deaths per Month </b></h4></div>
</section>

<section class="content">

	<div class="row">
		<div class="col-sm-4">
			<h4> Deaths per Year
				<select id="year" name="year" class="form-control col-sm-2">
					<option disabled selected value="">----</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
				</select>
			</h4>
		</div>

		<div class="col-sm-4">
			<h4>Barangay Name
				<select id="barangay" name="barangay" class="form-control col-sm-2">
					<option disabled selected value="">----</option>
					<?php foreach($barangayList as $row){?>
					<option value="<?= $row->barangay_no; ?>"><?= $row->name; ?></option>
					<?php }?>
				</select>
			</h4>
		</div>
		<div class="col-sm-2">
			<h4>Search
			<button class="btn btn-warning form-control col-sm-2" onclick="searchData()">Search</button>
			</h4>
		</div>

		<div class="col-sm-2">
			<h4>Statisctics
			<button class="btn btn-warning form-control col-sm-2" onclick="viewDeathStatistics()">View Statistics</button>
			</h4>
		</div>
	</div><br>

	<div class="container-fluid">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<canvas id="death_month"></canvas>
		</div>
	</div>

</section>

<div aria-hidden="false" role="dialog" tabindex="-1" id="deceasedStatisticsModal" class="modal leread-modal fade in">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
				<h4 class="modal-title"><i class="fa fa-calendar-check-o"><b> Deceased Senior Citizens Statistics </b> </i></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-4">
						<b>January:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="jan" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>February:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="feb" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>March:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="mar" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>April:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="apr" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>May:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="may" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>June:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="jun" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>July:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="jul" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>August:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="aug" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>September:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="sep" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>October:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="oct" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>November:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nov" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>December:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="dec" disabled>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" type="button" class="close">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.js');?>"> </script>
<script type="text/javascript" src="<?= base_url('assets/chartJS/Chart.min.js');?>"></script>

<script type="text/javascript">

	function searchData(){

		$.ajax({
			url  : "<?= site_url('SecondaryController/getDeathRateReport')?>",
			type : "POST",
			data : {
				year : $("#year").val(),
				barangay_no : $("#barangay").val()
			},

			success : function(data){
				var months = ['January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'];
                    var stat = [];

                    for(var i in data){
                    	stat.push(data[i].deathCount);
                    }
                    var chartdata = {
                    	labels : months,
                    	datasets : [{
	                    	label: "Number of Senior Citizens",
				            backgroundColor: "#26B99A",
				            borderColor: "rgba(38, 185, 154, 0.7)",
				            pointBorderColor: "rgba(38, 185, 154, 0.7)",
				            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
				            pointHoverBackgroundColor: "#fff",
				            pointHoverBorderColor: "rgba(220,220,220,1)",
				            pointBorderWidth: 1,
				            fill: false,
				            data: stat
				        }],
				    };
				    var ctx = $("#death_month");
				    var options = {
				    	elements : {
				    		line : {
				    			tension : 0,
				    		}
				    	}
				    }

				    var lineGraph = new Chart(ctx,{
				    	type : 'line',
				    	data : chartdata,
				    });
			},
			error : function(data){
				console.log($data);
			}
		});

	}

</script>

<script type="text/javascript">

	function viewDeathStatistics(){
		$.ajax({
			type : "POST",
			url  : "<?= site_url('SecondaryController/getDeathRateReport'); ?>",
			data : {
				year : $("#year").val(),
				barangay_no : $("#barangay").val()
			},
			dataType : "json",

			success : function(data){
				console.log(data);
				var stat = [];

				for(i in data){
					stat.push(data[i].deathCount);
				}
				$("#deceasedStatisticsModal").modal('show');
				$("#jan").val(stat[0]);
				$("#feb").val(stat[1]);
				$("#mar").val(stat[2]);
				$("#apr").val(stat[3]);
				$("#may").val(stat[4]);
				$("#jun").val(stat[5]);
				$("#jul").val(stat[6]);
				$("#aug").val(stat[7]);
				$("#sep").val(stat[8]);
				$("#oct").val(stat[9]);
				$("#nov").val(stat[10]);
				$("#dec").val(stat[11]);
			}
		});
	}

</script>