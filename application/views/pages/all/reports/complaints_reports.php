<section class="content-header">
	<div class="panel panel-heading"><h4><b> Complaints Reports </b></h4></div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="col-md-6">
			<button class="btn btn-warning" onclick="viewComplaintsStatistics()">View Statistics</button>
		</div>
		<div class="col-md-12 col-sm-8 col-xs-8">
			<canvas id="complaints_reports"></canvas>			
		</div>
	</div>
</section>

<div aria-hidden="false" role="dialog" tabindex="-1" id="complaintsStatisticsModal" class="modal leread-modal fade in">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
				<h4 class="modal-title"><i class="fa fa-calendar-check-o"><b> Complaints Statistics </b> </i></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6">
						<b>Unverified:</b>
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="unverified" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<b>Allowance:</b>
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="allowance" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<b>Customer Service:</b>
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="service" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<b>Others:</b>
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="others" disabled>
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

$(document).ready(function(){

	$.ajax({

		method : "GET",
		url  : "<?= site_url('SecondaryController/getComplaintReport')?>",

		success : function(data){
			/*var count = [];
			var data = [];*/
			var stat = [];

			for(var i in data){
				stat.push(data[i].complainCount);
			}

			var chartdata = {
						labels: ['Unverified','Allowance','Service','Others'],
						datasets: [
							{
							backgroundColor: ['#f1c40f','#e67e22','#16a085','#2980b9'],
							data: stat 
							}
						]
					};
			
			var options = {
				animation: { 
					animationScale : true
				},
				title: {
					display: true,
					position: "top",
					text: "Complaints from Senior Citizens",
					fontSize: 30,
					fontColor: "#111",
				}
			};

			var ctx = $("#complaints_reports");

			var pieChart = new Chart(ctx,{
				type: 'pie',
				data: chartdata,
				options: options
				});

		},
		error : function(data){
			console.log(data);
		}

	});
})

	function viewComplaintsStatistics(){

		$.ajax({
			type : "GET",
			url : "<?= site_url('SecondaryController/getComplaintReport')?>",

			success : function(data){
				var stat = [];

				for(var i in data){
					stat.push(data[i].complainCount);
				}
				$("#complaintsStatisticsModal").modal('show');
				$("#unverified").val(stat[0]);
				$("#allowance").val(stat[1]);
				$("#service").val(stat[2]);
				$("#others").val(stat[3]);	
			}
		});

	}

</script>