<section class="content-header">
	<div class="panel panel-heading"><h4><b> Age Bracket </b></h4></div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="col-md-6">
			<button class="btn btn-warning" onclick="viewAgeStatistics()">View Statistics</button>
		</div>
		<div class="col-md-12 col-sm-8 col-xs-8">
			<canvas id="age_bracket"></canvas>			
		</div>
	</div>
</section>

<div aria-hidden="false" role="dialog" tabindex="-1" id="ageStatisticsModal" class="modal leread-modal fade in">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button>
				<h4 class="modal-title"><i class="fa fa-calendar-check-o"><b> Age Bracket Statistics </b> </i></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-4">
						<b>60 - 69:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="sixty" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>70 - 79:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="seventy" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>80 - 89:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="eighty" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>90 - 99:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="ninety" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<b>100+:</b>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="hundred" disabled>
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
		url  : "<?= site_url('SecondaryController/getAgeReport')?>",

		success : function(data){
			/*var count = [];
			var data = [];*/
			var cnt60 = [];
			var cnt70 = [];
			var cnt80 = [];
			var cnt90 = [];
			var cnt100 = [];

			for(var i in data){
				/*count.push(data[i].cnt);
				data.push(data[i].datas);*/
				cnt60.push(data[i].data1);
				cnt70.push(data[i].data2);
				cnt80.push(data[i].data3);
				cnt90.push(data[i].data4);
				cnt100.push(data[i].data5);
			}

			var chartdata = {
						labels: ['60-69','70-79','80-89','90-99','100+'],
						datasets: [
							{
							backgroundColor: ['#f1c40f','#e67e22','#16a085','#2980b9'],
							data: [cnt60,cnt70,cnt80,cnt90,cnt100] 
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
					text: "Age Bracket For Senior Citizens",
					fontSize: 30,
					fontColor: "#111",
				}
			};

			var ctx = $("#age_bracket");

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

	
	function viewAgeStatistics(){
		
		$.ajax({
			type : "GET",
			url  : "<?= site_url('SecondaryController/getAgeReport');?>",

			success : function(data){
				var cnt60 = [];
				var cnt70 = [];
				var cnt80 = [];
				var cnt90 = [];
				var cnt100 = [];

				for(var i in data){
					/*count.push(data[i].cnt);
					data.push(data[i].datas);*/
					cnt60.push(data[i].data1);
					cnt70.push(data[i].data2);
					cnt80.push(data[i].data3);
					cnt90.push(data[i].data4);
					cnt100.push(data[i].data5);
				}
				$("#ageStatisticsModal").modal('show');
				$("#sixty").val(cnt60);
				$("#seventy").val(cnt70);
				$("#eighty").val(cnt80);
				$("#ninety").val(cnt90);
				$("#hundred").val(cnt100);
			}
		});
	}
</script> 